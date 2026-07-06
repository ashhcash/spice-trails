<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\BlogModel;
use App\Models\RecipeCategoryModel;
use App\Models\RecipeModel;
use App\Models\TagsModel;

class Admin extends BaseController
{



    // login
    public function login(): string
    {
        return view('admin/login');
    }

    public function authenticate()
    {
        $adminpass = env('admin-password');
        $adminemail = env('admin-email');

        $loginEmail = $this->request->getPost('email');
        $loginpass = md5($this->request->getPost('password'));

        if ($adminemail === $loginEmail && $adminpass === $loginpass) {
            session()->set(
                [
                    'admin_logged_in' => true,
                    'admin_email' => $loginEmail,
                ]
            );

            return redirect()->to('admin/dashboard');
        } else {

            return redirect()->back()->with('error', 'Incorrect email or password');
        }


        ;
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin/login');
    }


    // category section
    public function category()
    {
        $model = new CategoryModel();


        $data['categories'] = $model->findAll();

        return view('admin/category/index', $data);

    }


    public function categoryStore()
    {
        $model = new CategoryModel();
        $blogsModel = new BlogModel();

        $data = [

            'name' => $this->request->getPost('name')
        ];


        if ($model->insert($data)) {
            return redirect()->back()->with('done', 'Category created successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Failed to create blog');
        }


    }

    public function categoryUpdate()
    {
        $id = $this->request->getPost('id');
        $newName = trim($this->request->getPost('name'));

        $categoryModel = new CategoryModel();
        $blogsModel = new BlogModel();


        $category = $categoryModel->find($id);

        if (!$category) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Category not found']);
        }

        $oldName = $category['name'];


        $categoryUpdated = $categoryModel->update($id, ['name' => $newName]);


        $blogsUpdated = $blogsModel
            ->where('category', $oldName)
            ->set(['category' => $newName])
            ->update();

        if ($categoryUpdated && $blogsUpdated !== false) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }

    public function categoryDelete($id)
    {
        $model = new CategoryModel();

        $model->delete($id);

        return redirect()->back()->with('deleted', 'Category Deleted Successfully');
    }


    public function recipeCategory()
    {
        $model = new RecipeCategoryModel();

        $data['recipeCategory'] = $model->findAll();


        return view('admin/category/recipe', $data);
    }


    public function recipecategoryupdate()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');

        $model = new RecipeCategoryModel();

        if ($model->update($id, ['name' => $name])) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }

    public function recipecategorydelete($id)
    {
        $model = new RecipeCategoryModel();

        $model->delete($id);

        return redirect()->back()->with('deleted', 'Category Deleted Successfully');
    }

    // recipe section
    public function recipecatstore()
    {
        $model = new RecipeCategoryModel();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        if ($model->insert($data)) {
            return redirect()->to('admin/category/recipe')->with('success', 'Category Added Successfully');
        } else {
            return redirect()->to('admin/category/recipe')->with('error', 'Failed to create Category');
        }
    }



    public function recipe()
    {
        $model = new RecipeModel();


        $data['recipes'] = $model->findAll();

        return view('admin/recipe/index', $data);
    }

    public function createRecipe()
    {
        $model = new RecipeCategoryModel();

        $data['recipecategories'] = $model->findAll();

        return view('admin/recipe/create', $data);
    }

    public function storeRecipe()
    {
        helper(['form', 'url', 'text']);




        $rules = [
            'name' => 'required|min_length[3]',
            'category' => 'required',
            'description' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ];


        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $image = $this->request->getFile('image');


        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();

            $image->move(ROOTPATH . 'public/assets/recipeuploads', $newName);

            $imagePath = 'recipeuploads/' . $newName;

        } else {
            $imagePath = null;
        }


        $data = [

            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'name' => $this->request->getPost('name'),
            'text' => $this->request->getPost('text'),
            'image' => $imagePath,
            'date' => $this->request->getPost('date'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
        ];


        $model = new RecipeModel();


        if ($model->insert($data)) {
            return redirect()->to('/admin/recipe')->with('success', 'Recipe created successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create recipe');
        }

    }



    public function editRecipe($id)
    {
        helper(['form', 'url', 'text']);




        $rules = [
            'name' => 'required|min_length[3]',
            'category' => 'required',
            'description' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ];


        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $image = $this->request->getFile('image');


        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();

            $image->move(ROOTPATH . 'public/assets/recipeuploads', $newName);

            $imagePath = 'recipeuploads/' . $newName;

        } else {
            $imagePath = null;
        }


        $data = [

            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'name' => $this->request->getPost('name'),
            'text' => $this->request->getPost('text'),
            'image' => $imagePath,
            'date' => $this->request->getPost('date'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
        ];


        $model = new RecipeModel();


        if ($model->update($id, $data)) {
            return redirect()->to('/admin/recipe')->with('success', 'Recipe updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update recipe');
        }
    }

    public function viewEditRecipe($id)
    {
        $model = new RecipeModel();
        $CategoryModel = new RecipeCategoryModel();

        $data['recipe'] = $model->find($id);

        $data['recipecategories'] = $CategoryModel->findAll();
        return view('admin/recipe/edit', $data);
    }

    public function deleteRecipe($id)
    {
        $model = new RecipeModel();

        $model->delete($id);

        return redirect()->back()->with('delete', 'Recipe Deleted Successfully');
    }












    // tags section

    public function blogTags()
    {

        $model = new TagsModel();

        $data['tags'] = $model->findAll();

        return view('admin/tags/blog', $data);

    }

    public function storeTags()
    {
        $model = new TagsModel();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        if ($model->insert($data)) {
            return redirect()->back()->with('success', 'Tag created successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create tag');
        }
    }

    public function updateTags()
    {
        $id = $this->request->getPost('id');
        $newName = trim($this->request->getPost('name'));

        $tagsModel = new TagsModel();
        $blogsModel = new BlogModel();

     
        $tag = $tagsModel->find($id);

        if (!$tag) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tag not found'
            ]);
        }

        $oldName = $tag['name'];

        $tagUpdated = $tagsModel->update($id, ['name' => $newName]);

        $blogs = $blogsModel
            ->where("JSON_SEARCH(tags, 'one', '{$oldName}') IS NOT NULL")
            ->findAll();

        foreach ($blogs as $blog) {

            $tagsArray = json_decode($blog['tags'], true);

            if (!is_array($tagsArray))
                continue;

            $updatedTags = [];

            foreach ($tagsArray as $t) {
                $updatedTags[] = ($t === $oldName) ? $newName : $t;
            }

            $blogsModel->update($blog['id'], [
                'tags' => json_encode($updatedTags)
            ]);
        }

        return $this->response->setJSON([
            'status' => $tagUpdated ? 'success' : 'error'
        ]);
    }



    public function deleteTags($id)
    {
        $model = new TagsModel();

        $model->delete($id);

        return redirect()->back()->with('deleted', 'Tag Deleted Successfully');
    }
}
