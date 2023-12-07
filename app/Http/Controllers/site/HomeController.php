<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $categories = $this->categoryModel->getAll();
        return view('site.home.index', compact('categories'));
    }

    public function menuTreeView()
    {
        $pageTitle = 'Category';
        $categories = $this->categoryModel->getAll();
        return view('parts.menu', compact('categories', 'pageTitle'));
    }
}
