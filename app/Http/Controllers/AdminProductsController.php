<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductRequest $request, Tag $tagModel)
    {

        $data = $request->all();
        $tags = explode(',', str_replace(', ', ',', $data['tags']));
        $product = $this->product->fill($data);
        $relatedTags = array();
        $product->save();

        foreach($tags as $tag) {
            $tag = ucfirst(strtolower($tag));
            $thisTag = $tagModel->firstOrCreate(['name' => $tag]);
            $relatedTags[] = $thisTag->id;
        }
        $product->tags()->sync($relatedTags);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->product->find($id);
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductRequest $request, Tag $tagModel, $id)
    {
        $product = $this->product->find($id);
        $data = $request->all();
        $tags = explode(',', str_replace(', ', ',', $data['tags']));
        $relatedTags = [];
        $product->update($data);

        foreach($tags as $tag) {
            $tag = ucfirst(strtolower($tag));
            $thisTag = $tagModel->firstOrCreate(['name' => $tag]);
            echo $tag;
            $relatedTags[] = $thisTag->id;
        }
        $product->tags()->sync($relatedTags);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();
        return redirect()->route('products.index');
    }

    public function images($id)
    {
        $product = $this->product->find($id);
        return view('products.images.index', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->product->find($id);

        return view('products.images.create', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage->create([
            'product_id' => $id,
            'extension' => $extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images.index', $id);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if( file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension))
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images.index', ['id' => $product->id]);

    }

}
