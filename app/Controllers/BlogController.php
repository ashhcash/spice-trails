<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoryModel;
use App\Models\BlogModel;

class BlogController extends BaseController
{
    public function blog()
    {
        $model = new BlogModel();

        $data['blogs'] = $model->findAll();

        return view('admin/blog/index', $data);
    }



    public function editblog()
    {
        return view('adnin/blog/edit');
    }

    public function updateBlog()
    {
        //
    }

    public function createBlog()
    {
        $model = new CategoryModel();

        $data['category'] = $model->findAll();

      
        return view('admin/blog/create' , $data);
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


            $data = [
            
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'blog_name' => $this->request->getPost('blog_name'),
            'text' => $this->request->getPost('text'),
            'blog_image' => $imagePath,
            'date' => $this->request->getPost('date'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
        ];


        
        $model = new BlogModel();


          if($model->insert($data)){
            return redirect()->to('/admin/blog')->with('success', 'Blog created successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create blog');
        }
        

    }
}
