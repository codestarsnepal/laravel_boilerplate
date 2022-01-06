<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Organization;
use App\Models\User;
use App\Models\UserOrganization;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class OrganizationUserController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $organization_id)
    {
        if ($request->ajax()) {
            $organization = Organization::query()->findorfail($organization_id);
            return DataTables::of($organization->users)->make(true);
        }
        return view('super_admin.organization_user.index', compact('organization_id'));
    }

    public function create($organization_id)
    {
        return view('super_admin.organization_user.create', compact('organization_id'));
    }

    public function store(UserStoreRequest $request, $organization_id)
    {
        $request->validate();
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $request->role
        ]);
        UserOrganization::create([
            'user_id' => $user->id,
            'organization_id' => $organization_id
        ]);
        return redirect()->route('super.admin.organization.user', $organization_id);
    }

    public function edit($id)
    {
        return view('super_admin.organization_user.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('super.admin.organization..user');
    }

    public function delete($id)
    {
        $item = User::findorfail($id);
        if ($item->count() > 0) {
            $item->delete();
            return true;
        } else {
            return false;
        }
    }
}
