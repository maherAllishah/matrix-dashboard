<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingsOfBusinessPartnerRequest;
use App\Http\Trait\UploadImage;
use App\Models\BusinessPartners;
use App\Models\SettingsOfBusinessPartners;


class SettingsOfBusinessPartnersController extends BaseController
{

    public function __construct()
    {
        $type_of_request = SettingsOfBusinessPartnerRequest::class;
        parent::__construct(SettingsOfBusinessPartnerRequest::class);
    }

    protected $model = SettingsOfBusinessPartners::class;
    protected $resource = 'business-partners-settings';

    use UploadImage;

    public function index()
    {

        $count_of_partner = BusinessPartners::where('status', 'approved')->count();
        $data = SettingsOfBusinessPartners::orderBy('id', 'desc')->first();
        return view('admin.pages.business-partners-settings.index', compact('data'), compact('count_of_partner'));
    }

    public function store()
    {
        $requestClass = $this->requestType;
        $request = app($requestClass);
        $attributes = $request->all();
        $businessPartnersSettings = SettingsOfBusinessPartners::create($attributes);

        self::upload($request, $businessPartnersSettings, 'first_photo_in_title', 'images_of_settings');
        self::upload($request, $businessPartnersSettings, 'second_photo_in_title', 'images_of_settings');
        self::upload($request, $businessPartnersSettings, 'first_icon_features', 'images_of_settings');
        self::upload($request, $businessPartnersSettings, 'second_icon_features', 'images_of_settings');
        self::upload($request, $businessPartnersSettings, 'third_icon_features', 'images_of_settings');
        self::upload($request, $businessPartnersSettings, 'fourth_icon_features', 'images_of_settings');
        self::upload($request, $businessPartnersSettings, 'first_video', 'video_of_settings');
        self::upload($request, $businessPartnersSettings, 'first_image_video', 'images_of_settings');
        self::upload($request, $businessPartnersSettings, 'second_video', 'video_of_settings');
        self::upload($request, $businessPartnersSettings, 'second_image_video', 'images_of_settings');
        self::upload($request, $businessPartnersSettings, 'third_video', 'video_of_settings');
        self::upload($request, $businessPartnersSettings, 'third_image_video', 'images_of_settings');

        return redirect()->route('admin.business_partners_settings.index');

    }


    public function update($id)
    {
        $requestClass = $this->requestType;
        $request = app($requestClass);
        $settings = SettingsOfBusinessPartners::findOrFail($id);
        $validatedData = $request->except(['first_photo_in_title', 'second_photo_in_title', 'first_icon_features',
            'second_icon_features', 'third_icon_features', 'fourth_icon_features', 'first_video', 'first_image_video',
            'second_video', 'second_image_video', 'third_video', 'third_image_video']);
        $settings->update($validatedData);
        self::upload($request, $settings, 'first_photo_in_title', 'images_of_settings');
        self::upload($request, $settings, 'second_photo_in_title', 'images_of_settings');
        self::upload($request, $settings, 'first_icon_features', 'images_of_settings');
        self::upload($request, $settings, 'second_icon_features', 'images_of_settings');
        self::upload($request, $settings, 'third_icon_features', 'images_of_settings');
        self::upload($request, $settings, 'fourth_icon_features', 'images_of_settings');
        self::upload($request, $settings, 'first_video', 'video_of_settings');
        self::upload($request, $settings, 'first_image_video', 'images_of_settings');
        self::upload($request, $settings, 'second_video', 'video_of_settings');
        self::upload($request, $settings, 'second_image_video', 'images_of_settings');
        self::upload($request, $settings, 'third_video', 'video_of_settings');
        self::upload($request, $settings, 'third_image_video', 'images_of_settings');

        return redirect()->route('admin.business_partners_settings.index');
    }

    public function create()
    {
        return view('admin.pages.business-partners-settings.create');
    }

    public function edit($id)
    {
        $data = $this->model::query()->findOrFail($id);
        return view(self::DIRECTORY . "$this->resource.edit", compact('data'));
    }
    
}
