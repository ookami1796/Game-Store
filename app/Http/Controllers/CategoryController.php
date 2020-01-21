<?php

namespace App\Http\Controllers;

use App\Model\Category;

class CategoryController extends Controller {
    public function index() {
        $category = Category::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "category",
            "result" => $category
        ];

        return response()->json($category, 200);
    }
}