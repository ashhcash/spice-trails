<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoryModel;
use App\Models\BlogModel;
use App\Models\TagsModel;

class BlogController extends BaseController
{
    public function blog()
    {
        $model = new BlogModel();

        $data['blogs'] = $model->findAll();

        return view('admin/blog/index', $data);
    }



    // public function editblog()
    // {
    //     return view('adnin/blog/edit');
    // }

    // public function updateBlog()
    // {
    //     //
    // }

    public function createBlog()
    {
        $model = new CategoryModel();

        $tagsModel = new TagsModel();

        $data['category'] = $model->findAll();

        $data['tags'] = $tagsModel->findAll();


        return view('admin/blog/create', $data);
    }

    public function storeBlog()
    {
        helper(['form', 'url', 'text']);



        $rules = [
            'blog_name' => 'required|min_length[3]',
            'category' => 'required',
            'slug' => 'required|min_length[3]',
            'description' => 'required',
            'blog_image' => 'uploaded[blog_image]|is_image[blog_image]|max_size[blog_image,2048]'
        ];


        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong');
        }


        $image = $this->request->getFile('blog_image');


        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();

            $image->move(ROOTPATH . 'public/assets/uploads', $newName);

            $imagePath = 'uploads/' . $newName;

        } else {
            $imagePath = null;
        }

        $tags = $this->request->getPost('tags');


        $tagsJson = json_encode($tags);


        $data = [

            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'blog_name' => $this->request->getPost('blog_name'),
            'text' => $this->request->getPost('text'),
            'blog_image' => $imagePath,
            'date' => $this->request->getPost('date'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
            'tags' => $tagsJson,
            'src' => $this->request->getPost('src')
        ];



        $model = new BlogModel();


        if ($model->insert($data)) {
            return redirect()->to('/admin/blog')->with('success', 'Blog created successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create blog');
        }


    }


    public function editView($id)
    {
        $model = new BlogModel();

        $data['blogs'] = $model->find($id);

        $categoryModel = new CategoryModel();

        $data['category'] = $categoryModel->findAll();

        $tagsModel = new TagsModel();

        $data['tags'] = $tagsModel->findAll();



        return view('admin/blog/edit', $data);
    }

    public function blogEdit($id)
    {
        $model = new BlogModel();
        helper(['form', 'url', 'text']);

        $blog = $model->find($id);

        $rules = [
            'blog_name' => 'required|min_length[3]',
            'category' => 'required',
            'slug' => 'required|min_length[3]',
            'description' => 'required',
            'blog_image' => 'uploaded[blog_image]|is_image[blog_image]|max_size[blog_image,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong');
        }

        $data = [
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'meta_description' => $this->request->getPost('meta_description'),
            'meta_title' => $this->request->getPost('meta_title'),
            'blog_name' => $this->request->getPost('blog_name'),
            'text' => $this->request->getPost('text'),
            'date' => $this->request->getPost('date'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
            'src' => $this->request->getPost('src'),
        ];

        $image = $this->request->getFile('blog_image');

        if ($image && $image->isValid() && !$image->hasMoved()) {


            if (!empty($blog['blog_image'])) {
                $oldPath = ROOTPATH . 'public/assets/uploads/' . $blog['blog_image'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }


            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/assets/uploads', $newName);

            $data['blog_image'] = 'uploads/' . $newName;
        }

        if ($model->update($id, $data)) {
            return redirect()->to('admin/blog')->with('success', 'Blog Edited Successfully');
        } else {
            return redirect()->to('admin/blog')->with('error', 'Something went wrong');
        }
    }

    public function blogDelete($id)
    {
        $model = new BlogModel();

        $product = $model->find($id);



        if ($product) {

            //Delete main image
            if (!empty($product['blog_image'])) {
                $mainPath = ROOTPATH . 'public/assets/uploads' . $product['blog_image'];

                if (is_file($mainPath)) {
                    unlink($mainPath);
                    log_message('info', 'Main image deleted: ' . $mainPath);
                }
            }
        }
        $model->delete($id);
        return redirect()->back()->with('delete', 'Blog Deleted Successfully');
    }
}
