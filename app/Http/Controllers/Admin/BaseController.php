<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Route;

//use App\Http\Requests\AdminRequest;

class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    const DIRECTORY = 'admin.pages.';
    protected $model = null;
    protected $resource = null;
    protected $requestType;

    public function __construct($requestType)
    {
        $this->requestType = $requestType;
    }


    public function index()
    {
        $data = $this->model::query()->get();
        return view(self::DIRECTORY . "$this->resource.index", compact('data',));
    }

    public function create()
    {
        return view(self::DIRECTORY . "$this->resource.create-edit");
    }

    public function store()
    {
        $requestClass = $this->requestType;
        $request = app($requestClass);
        $this->model::create($request->all());
        return redirect()->route("admin." ."$this->resource.index")->with('success','created successfully');
    }


    public function edit($id)
    {

        $data = $this->model::query()->findOrFail($id);
        return view(self::DIRECTORY . "$this->resource.create-edit", compact('data'));
    }

    public function show($id)
    {
        $data = $this->model::query()->findOrFail($id);
        return view(self::DIRECTORY . "$this->resource.show", compact('data'));

    }

    public function update($id)
    {
        $request = app($this->requestType);
        $data = $this->model::query()->findOrFail($id);
        $data->update($request->all());
        return redirect()->route("admin." ."$this->resource.index")->with('edit',' updated successfully');
    }

    public function destroy($id)
    {

        $this->model::query()->findOrFail($id)->delete();
        return redirect()->route("admin." ."$this->resource.index")->with('delete','deleted successfully');

    }
}
