<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class OrganizationController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $organizations = Organization::query();

            return DataTables::of($organizations)->make(true);
        }
        return view('super_admin.organization.index');
    }
}
