<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Http\Trait\UploadImage;
use App\Models\Service;

class ServiceController extends BaseController
{
    public function __construct()
    {

        parent::__construct(ServiceRequest::class);
    }

    protected $model = Service::class;
    protected $resource = 'services';

    use UploadImage;

    public function store()
    {

        $request = app($this->requestType);
        $input = $request->all();

        $data = Service::create($input);
        self::upload($request, $data, 'image', 'images_of_services');
        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function update($id)
    {

        $request = app($this->requestType);
        $input = $request->all();
        $data = $this->model::query()->findOrFail($id);
        $data->update($input);
        self::upload($request, $data, 'image', 'images_of_services');

        return redirect()->route('admin.services.index')
            ->with('success', 'Service Updated successfully.');
    }
}
