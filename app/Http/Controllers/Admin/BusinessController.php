<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BusinessRequest;
use App\Http\Trait\UploadImage;
use App\Models\Business;

class BusinessController extends BaseController
{
    public function __construct()
    {
        parent::__construct(BusinessRequest::class);
    }

    protected $model = Business::class;
    protected $resource = 'business_cards';

    use UploadImage;


    public function store()
    {
        $requestClass = $this->requestType;
        $request = app($requestClass);
        $input = $request->all();
        $business = Business::create($input);
        self::upload($request, $business, 'image', 'images_of_businesses');

        return redirect()->route('admin.businesses.index');
    }


    public function update($id)
    {
        $request = app($this->requestType);
        $data = $this->model::query()->findOrFail($id);
        $data->update($request->all());
        self::upload($request, $data, 'image', 'images_of_businesses');

        return redirect()->route('admin.businesses.index');
    }

    public function destroy($id)
    {
        $business = $this->model::query()->findOrFail($id);
        $business->business()->delete();
        $business->delete();

        return redirect()->route('admin.businesses.index');
    }
}
