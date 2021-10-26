@extends('layouts.frontend_app')

@section('title','Shipping & Payment')

@section('app_content')
<div class="container">
<h2 class="text-center text-success">Shipping <i class="fa fa-truck"></i> & Payment <i class="fa fa-buck"></i></h2>
<hr>
<form action="">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5><b>Shipping Address</b></h5>
                    <hr>
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name : </label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email : </label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone : </label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter your Phone number">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Region : </label>
                                    <input type="text" class="form-control" name="region" placeholder="Enter your Region">
                                    @error('region')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">City : </label>
                                    <input type="text" class="form-control" name="city" placeholder="Enter your City">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address : </label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter your Address">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Remark : </label>
                                    <textarea name="remark" id="" cols="30" rows="5" class="form-control"></textarea>
                                    @error('remark')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><b>Cart Summery</b></h5>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <th>Total Product</th>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td>300</td>
                        </tr>
                    </table>

                    <h5><b>Payment Method</b></h5>
                    <hr>
                    <input type="radio" name="payment_method" value="hand_cash"> <span>Hand Cash</span>
                    <input type="radio" name="payment_method" value="bkash"> <span>Bksh</span>
                    <div class="form-group mt-2">
                        <input type="text" class="form-control" id="trans_id" name="trans_id" placeholder="Transiction No.(AB5036)">
                    </div>

                    <button class="btn btn-success btn-block">Order Now</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop
