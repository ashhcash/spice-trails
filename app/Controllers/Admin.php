<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\BlogModel;
use App\Models\RecipeCategoryModel;
use App\Models\RecipeModel;

class Admin extends BaseController
{
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



    public function category()
    {
        $model = new CategoryModel();


        $data['categories'] = $model->findAll();

        return view('admin/category/index', $data);

    }


    public function categoryStore()
    {
        $model = new CategoryModel();

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
        $name = $this->request->getPost('name');

        $model = new CategoryModel();

        if ($model->update($id, ['name' => $name])) {
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


}
