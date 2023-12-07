<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
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
        $pageTitle = __('title.index.category');
        $listTitle = __('title.list.category');
        $createTitle = __('title.create.category');
        
        $categories = $this->categoryModel->getAll();

        return view('site.category.index', compact('categories', 'pageTitle', 'listTitle', 'createTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = __('title.index.category');
        $listTitle = __('title.list.category');
        $createTitle = __('title.create.category');

        $categories = $this->categoryModel->getAll();

        return view('site.category.create',  compact('categories', 'pageTitle', 'listTitle', 'createTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($str_slug, $id)
    {
        // echo $id;
        // $getId = $this->categoryModel->getById($id);
        // return view('site.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = __('title.edit.category');

        $category = $this->categoryModel->findId($id);
        $categories = $this->categoryModel->getAll();

        if (!$category) {
            abort(404);
        }
        $breadcrumbs = getBreadcrumbs($category->id);
        return view('site.category.edit', compact('pageTitle', 'category', 'categories', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
