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
                ]);

                return redirect()->to('admin/dashboard');
            }
            else {

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


    public function recipecategoryedit()
    {
        
    }



    public function recipe()
    {
        $model = new RecipeModel();


        $data['recipes'] = $model->findAll();

        return view('admin/recipe/index' , $data);
    }

    public function createRecipe()
    {
        $model = new RecipeModel();

        $data['recipes'] = $model->findAll();

        return view('admin/recipe/create' , $data);
    }


}
