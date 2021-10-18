@extends('layouts.backend_master')
@section('title', 'Product | ' . $product->name)
@section('master_content')
<div class="conatiner pt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <td colspan="3">{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $product->category->name }}</td>
                    <th>Sub Category</th>
                    <td>{{ $product->sub_category->name }}</td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td>{{ $product->color->name }}</td>
                    <th>Size</th>
                    <td>{{ $product->size->name }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $product->info->price }}</td>
                    <th>Sell Price</th>
                    <td>{{ $product->info->sell_price }}</td>
                </tr>
                <tr>
                    <th>Sty</th>
                    <td>{{ $product->info->price }}</td>
                    <th>Sell Price</th>
                    <td>{{ $product->info->sell_price }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

