<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingsRequest;
use App\Models\Setting;

class SettingController extends BaseController
{
    public function __construct()
    {
        parent::__construct(SettingsRequest::class);
    }

    protected $model = Setting::class;
    protected $resource = 'settings';


    public function store()
    {
        $request = app($this->requestType);
        $setting = Setting::first(); //for storing always in first id
        $setting->update($request->all());
        return parent::index();
    }
}
