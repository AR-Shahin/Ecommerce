@extends('layouts.frontend_app')

@section('title','Login')

@section('app_content')
<div class="container">
    <div class="row no-gutters">
        <div class="col-md-2 ">
            <ul class="list-group">
                <li class="list-group-item @if ($navItem === 'dashboard') active @endif"><a href="{{ route('dashboard') }}" class="text-dark">Dashboard</a></li>
                <li class="list-group-item @if ($navItem === 'orders') active @endif"><a href="{{ route('orders') }}" class="text-dark">Orders</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Coments</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Profile</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Setting</a></li>
                <li class="list-group-item ">
                    <form action="{{ route('logout') }}" class="d-inline" method="POST">
                        @csrf
                        <button class="btn btn-success btn-block">Logout</button>
                    </form>
                </li>
              </ul>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @yield('frontend_master_content')
                </div>
            </div>
        </div>
    </div>
</div>
@stop
