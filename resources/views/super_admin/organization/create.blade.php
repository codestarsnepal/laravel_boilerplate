@extends('layouts.super_admin.super-admin')

@section('title')
    Organization Create
@endsection

@section('style')
    <style></style>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin: 25px;">
            <section class="content-header">
                <h2>Organization Create</h2>
            </section>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                            <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
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
@endsection
