<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Http\Trait\UploadImage;
use App\Models\Business;
use App\Models\Product;

class ProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct(ProductRequest::class);
    }

    protected $model = Product::class;
    protected $resource = 'products';
    use UploadImage;


    public function create()
    {
        $data = Business::all();
        return view('admin.pages.products.create', compact('data'));
    }

    public function store()
    {

        $request = app($this->requestType);
        $input = $request->all();
        $product = Product::create($input);
        self::upload($request, $product, 'image', 'images_of_products');
        return redirect()->route('admin.products.index');
    }


    public function edit($id)
    {
        $data = $this->model::query()->findOrFail($id);
        $businesses = Business::all();
        return view('admin.pages.products.edit', compact('data', 'businesses'));
    }

    public function update($id)
    {

        $request = app($this->requestType);
        $input = $request->all();
        $data = $this->model::query()->findOrFail($id);
        $data->update($input);
        self::upload($request, $data, 'image', 'images_of_products');
        return redirect()->route('admin.products.index');
    }

}
