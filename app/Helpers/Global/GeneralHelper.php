<?php

use App\Models\Category;


if (! function_exists('getCategories')) {
    function getCategories($categories, $old = '', $parentId = 0, $char = '')
    {
        $id = request()->route()->category;
        $options = ''; // Sử dụng biến để tích lũy chuỗi HTML

        if ($categories) {
            foreach ($categories as $key => $category) {
                if ($category->parent_id == $parentId && $id != $category->id) {
                    $isSelected = ($old == $category->id) ? ' selected' : '';

                    $options .= '<option value="' . $category->id . '"' . $isSelected . '>' . $char . $category->name . '</option>';

                    unset($categories[$key]);
                    $options .= getCategories($categories, $old, $category->id, $char . ' |- ');
                }
            }
        }
        return $options; // Trả về chuỗi HTML tích lũy
    }
}

if (! function_exists('getCategoriesTable')) {
    function getCategoriesTable($categories, $parentId = 0, $char = '', $isParent = true)
    {
        $result = [];
        if (!empty($categories)) {
            foreach ($categories as $category) {
                if ($category['parent_id'] == $parentId) {
                    $result[] = [
                        'name' => ($isParent ? '<strong>' : '') . $char . $category['name'] . ($isParent ? '</strong>' : ''),
                        'slug' => $category['slug'],
                        'created_at' => $category['created_at']->format('d/m/Y'),
                        'edit' => '<a href="' . route('category.edit', $category['id']) . '" class="btn btn-warning">Edit</a>',
                        'delete' => '<a href="' . route('category.delete', $category['id']) . '" class="btn btn-danger delete-action">Delete</a>',
                        'link' => '<a target="_blank" href="" class="btn btn-primary">Xem</a>',
                    ];

                    $children = getCategoriesTable($categories, $category['id'], $char . '|--', false);
                    if ($children) {
                        $result = array_merge($result, $children);
                    }
                }
            }
        }

        return $result;
    }
}


if (!function_exists('getBreadcrumbs')) {
    function getBreadcrumbs($categoryId, $breadcrumbs = [])
    {
        $category = Category::find($categoryId);
           
        if ($category) {
            array_unshift($breadcrumbs, [
                'name' => $category->name,
                // 'url' => route('category.edit', $category->id),
            ]);

            if ($category->parent_id) {
                return getBreadcrumbs($category->parent_id, $breadcrumbs);
            }
        }

        return $breadcrumbs;
    }
}