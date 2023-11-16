<?php

namespace App\Http\Controllers\Admin;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvincesController extends BaseController
{
    public function __construct()
    {
        parent::__construct(Request::class);
    }

    protected $model = Province::class;
    protected $resource = 'business-partners-settings.provinces';

    public function show($id)
    {
        $provinces = Province::query()->findOrFail($id);
        $count_of_partners = $provinces->businessPartners()->get();
        return view('admin.pages.business-partners-settings.provinces.provinces_details', compact('provinces'), compact('count_of_partners'));

    }

    public function edit($id)
    {
        $province = Province::query()->findOrFail($id);
        if ($province->status === 1) {
            $newStatus = 0;
        } else {
            $newStatus = 1;
        }
        // update the status value
        $province->update(['status' => $newStatus]);
        $data = Province::all();
        return view('admin.pages.business-partners-settings.provinces.index', compact('data'));
    }


    public function destroy($id)
    {
        $province = Province::findOrFail($id);
        $province->businessPartners()->where('province_id', $id)->delete();
        $province->delete();

        return redirect()->route('admin.provinces.index');
    }
}
