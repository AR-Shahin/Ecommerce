
@extends('layouts.backend_master')
@section('title', 'Product')
@push('css')
<x-utility.data-table-css/>
@endpush
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Products</h4>
        <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Product</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="ProductTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->author->name }}</td>
                        <td><img src="{{ asset($product->image) }}" alt="" width="100px"></td>
                        <td>{{ $product->view }}</td>
                        <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="" id="status" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                            <a href="" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                            <a href="{{ route('admin.product.show',$product->slug) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.product.edit', $product->slug) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                           <form action="{{ route('admin.product.destroy', $product->slug) }}" class="d-inline" method="product">
                            @csrf
                            @method('DELETE')
                            <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                           </form>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
</div>
@endsection

@push('script')
<x-utility.data-table-js/>
<script>
   $('#ProductTable').DataTable();

</script>
@endpush
