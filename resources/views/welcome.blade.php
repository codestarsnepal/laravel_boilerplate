@extends('layouts.app')

@section('title')
    Welcome
@endsection

@section('style')

@endsection

@section('content')
<div class="container d-flex flex-column align-items-center ">
    <h3><a href="{{route('super.admin')}}">Super Admin</a></h3>
    <h3><a href="{{route('admin')}}">Admin</a></h3>
    <h3><a href="{{route('staff')}}">Staff</a></h3>
</div>
@endsection
