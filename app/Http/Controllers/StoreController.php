<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;

use CodeCommerce\Http\Requests;
use CodeCommerce\Tag;

class StoreController extends Controller
{
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Product
     */
    private $product;
    /**
     * @var Tag
     */
    private $tag;

    public function __construct(Category $category, Product $product, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;
    }
    public function index()
    {
        $categories =  $this->category->all();
        $featureds = $this->product->Featured()->get();
        $recommendeds = $this->product->Recommended()->get();
        return view('store.index', compact('categories', 'featureds', 'recommendeds'));
    }

    public function listProductsCategory($id)
    {
        $categories =  $this->category->all();
        $category =  $this->category->find($id);
        return view('store.products_categorie', compact('category', 'categories'));
    }

    public function ProductDetails($id)
    {
        $categories =  $this->category->all();
        $product = $this->product->find($id);
        return view('store.product_detail', compact('product', 'categories'));
    }

    public function listProductsTags($id)
    {
        $categories =  $this->category->all();
        $tag =  $this->tag->find($id);
        return view('store.products_tag', compact('tag', 'categories'));
    }
}
