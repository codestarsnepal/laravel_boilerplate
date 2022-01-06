<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationRequest;
use App\Models\OragnizationPlan;
use App\Models\Organization;
use App\Repositories\OrganizationRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class OrganizationController extends Controller
{
    public function __construct(OrganizationRepositoryInterface $organizationRepo)
    {
        $this->organizationRepo = $organizationRepo;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $organizations = Organization::query()->with('plan');
            return DataTables::of($organizations)->make(true);
        }
        return view('super_admin.organization.index');
    }

    public function create()
    {
        return view('super_admin.organization.create');
    }

    public function store(OrganizationRequest $request)
    {
        $request->validated();
        $requestData = $request->all();
        $this->organizationRepo->create($requestData);
        return redirect()->route('super.admin.organization');
    }

    public function edit($id)
    {
        $organization = $this->organizationRepo->findorfail($id);
        $plans = OragnizationPlan::all();
        return view('super_admin.organization.edit', compact('organization','plans'));
    }

    public function update(Request $request, $id)
    {
        $organization = $this->organizationRepo->findorfail($id);
        $organization['plan_id'] = $request->plan_id;
        $organization['name'] = $request->name;
        $organization['address'] = $request->address;
        $organization['contact_number'] = $request->contact_number;
        $organization['contact_person'] = $request->contact_person;
        $organization['vat_number'] = $request->vat_number;
        $organization['vat_number'] = $request->vat_number;
        $organization['email_address'] = $request->email_address;
        $organization['url'] = $request->url;
        $organization->save();
        return redirect()->route('super.admin.organization');
    }

    public function delete($id)
    {
        $item = Organization::findorfail($id);
        if ($item->count() > 0) {
            $item->delete();
            return true;
        } else {
            return false;
        }
    }
}
