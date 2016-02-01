<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;

use CodeCommerce\Http\Requests;

class StoreController extends Controller
{
    public function index(Category $category, Product $product)
    {
        $categories = $category->all();
        $featureds = $product->Featured()->get();
        $recommendeds = $product->Recommended()->get();
        return view('store.index', compact('categories', 'featureds', 'recommendeds'));
    }

    public function listProductsCategory(Category $categoryModel, $id)
    {
        $categories = $categoryModel->all();
        $category = $categoryModel->find($id);
        return view('store.products_categories', compact('category', 'categories'));
    }
}
