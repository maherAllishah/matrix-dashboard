<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessPartners;
use Illuminate\Http\Request;

class businessPartnersRequests extends Controller
{
    public function index()
    {
        $businessPartners = BusinessPartners::with('province')->get();

        return view('admin.pages.business-partners-settings.business_partners_requests', compact('businessPartners'));
    }

    public function list()
    {
        $businessPartners = BusinessPartners::with('province')->get();
        return view('admin.pages.business-partners-settings.business_partners', compact('businessPartners'));

    }

    public function filter(Request $request)
    {
        $status = $request->get('status');
        // Retrieve BusinessPartners based on the selected status
        if ($status) {
            $businessPartners = BusinessPartners::where('status', $status)->get();
        } else {
            $businessPartners = BusinessPartners::all();
        }
        return view('admin.pages.business-partners-settings.business_partners_requests', compact('businessPartners'));
    }

    public function accept(Request $request, $id)
    {
        $businessPartner = BusinessPartners::findOrFail($id);
        $businessPartner->status = 'accepted';
        $businessPartner->save();

        return redirect()->back();
    }

    public function reject(Request $request, $id)
    {
        $businessPartner = BusinessPartners::findOrFail($id);
        $businessPartner->status = 'rejected';
        $businessPartner->save();

        return redirect()->back();
    }

    public function former(Request $request, $id)
    {
        $businessPartner = BusinessPartners::findOrFail($id);
        $businessPartner->status = 'former';
        $businessPartner->former = $businessPartner->updated_at;
        $businessPartner->save();

        return redirect()->back();
    }

    public function approved(Request $request, $id)
    {

        $businessPartner = BusinessPartners::findOrFail($id);
        $businessPartner->status = 'approved';
        $businessPartner->approved = $businessPartner->updated_at;
        $businessPartner->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        BusinessPartners::where('id', $id)->delete();

        return redirect()->route('admin.business_requests.index');
    }
}
