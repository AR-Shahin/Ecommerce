@extends('layouts.frontend_app')

@section('title','Login')

@section('app_content')
<div class="container">
    <div class="row ">
        <div class="col-md-4 ">
            <ul class="list-group">
                <li class="list-group-item active"><a href="" class="text-light">Dashboard</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Brookmarks</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Coments</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Profile</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Setting</a></li>
              </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @yield('frontend_master_content')
                </div>
            </div>
        </div>
    </div>
</div>
@stop
