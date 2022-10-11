<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{

    public function getCategory()
    {

        return  Category::all();
    }
    public function CreateCategory(Request $request)
    {

        $model = new Category();
        $model->cat_name = $request->cat_name;
        $model->cat_image = $request->cat_image;
        $model->status = $request->status;
        if ($model->save()) {
            return ['message' => "Category created Successfully"];
        } else {
            return ['message' => "Category could not be created"];
        }
    }
}
