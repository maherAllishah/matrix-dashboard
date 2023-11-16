<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FeatureRequest;
use App\Http\Trait\UploadImage;
use App\Models\Feature;

class FeatureController extends BaseController
{
    use UploadImage;

    public function __construct()
    {
        parent::__construct(FeatureRequest::class);
    }

    protected $model = Feature::class;
    protected $resource = 'features';

    public function store()
    {
        $request = app($this->requestType);
        $input = $request->all();
        $features = Feature::create($input);
        self::upload($request, $features, 'image', 'images_of_features');
        return redirect()->route('admin.features.index');
    }


    public function update($id)
    {
        $request = app($this->requestType);
        $data = $this->model::query()->findOrFail($id);
        $input = $request->all();
        $data->update($input);
        self::upload($request, $data, 'image', 'images_of_features');

        return redirect()->route('admin.features.index');
    }

}
