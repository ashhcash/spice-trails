<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\RecipeCategoryModel;
use App\Models\RecipeModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('web/index');
    }
    public function about(): string
    {
        return view('web/about');
    }
    public function registration(): string
    {
        return view('web/registration');
    }


    public function bloglist()
    {
        $blogModel = new BlogModel();
        $categoryModel = new CategoryModel();

        $category = trim((string) $this->request->getGet('category'));
        $search = trim((string) $this->request->getGet('search'));

        if ($category !== '') {
            $blogModel->where('category', $category);
        }

        if ($search !== '') {
            $blogModel
                ->groupStart()
                ->like('blog_name', $search)
                ->orLike('description', $search)
                ->orLike('category', $search)
                ->groupEnd();
        }

        $data = [
            'blogs' => $blogModel->orderBy('date', 'DESC')->findAll(),
            'categories' => $categoryModel->orderBy('name', 'ASC')->findAll(),
            'activeCategory' => $category,
            'search' => $search,
        ];

        return view('web/blog-list', $data);
    }

    public function singleBlog($slug)
    {
        $model = new BlogModel();

         $data['blogdata'] = $model->where('slug', $slug)->first();

        return view('web/single-blog' , $data);
    }


    public function recipeList()
    {
         $recipeModel = new RecipeModel();
        $categoryModel = new RecipeCategoryModel();

        $category = trim((string) $this->request->getGet('category'));
        $search = trim((string) $this->request->getGet('search'));

        if ($category !== '') {
            $recipeModel->where('category', $category);
        }

        if ($search !== '') {
            $recipeModel
                ->groupStart()
                ->like('name', $search)
                ->orLike('description', $search)
                ->orLike('category', $search)
                ->groupEnd();
        }

        $data = [
            'recipes' => $recipeModel->orderBy('date', 'DESC')->findAll(),
            'categories' => $categoryModel->orderBy('name', 'ASC')->findAll(),
            'activeCategory' => $category,
            'search' => $search,
        ];

        return view('web/recipe-list' , $data);
    }


    public function singleRecipe($slug)
    {
        $model = new RecipeModel();

         $data['recipedata'] = $model->where('slug', $slug)->first();

        return view('web/single-recipe' , $data);
    }
    
    
    }
