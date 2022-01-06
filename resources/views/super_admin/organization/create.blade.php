@extends('layouts.super_admin.super-admin')

@section('title')
    Organization Create
@endsection

@section('style')
    <style>
         .row{
            margin-top: 40px;
        }
    </style>
@endsection

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Organization Create Form') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('super.admin.organization.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Plan</label>
                                <select class="form-control" name="plan_id">
                                    <option>---Select Plan---</option>
                                    <option value="1">Retailer</option>
                                    <option value="2">WholeSaler</option>
                                    <option value="3">Both</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="number" class="form-control" name="contact_number"
                                    placeholder="Enter Contact Number">
                            </div>
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input type="text" class="form-control" name="contact_person"
                                    placeholder="Enter Contact Person">
                            </div>
                            <div class="form-group">
                                <label>Pan/Vat Number</label>
                                <input type="text" class="form-control" name="vat_number"
                                    placeholder="Enter Contact Pan/Vat Number">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email_address"
                                    placeholder="Enter Email Address">
                            </div>

                            <div class="form-group">
                                <label>URL</label>
                                <input type="email" class="form-control" name="url" placeholder="Enter URL Address">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a type="button" class="btn btn-secondary"
                                    href="{{ route('super.admin.organization') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
