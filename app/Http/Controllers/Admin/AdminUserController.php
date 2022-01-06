<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use App\Models\UserOrganization;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $organization = Organization::query()->findorfail(Auth::user()->organization[0]->id);
            return DataTables::of($organization->users)->make(true);
        }
        return view('admin.admin_user.index');
    }

    public function create()
    {
        return view('admin.admin_user.create');
    }

    public function store(Request $request)
    {
        $organization_id = Auth::user()->organization[0]->id;
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);
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
        return redirect()->route('admin.user');
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
