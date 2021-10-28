
@extends('layouts.backend_master')
@section('title', 'Order')
@push('css')
<x-utility.data-table-css/>
@endpush
@section('master_content')
<div class="card ">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Manage Orders</h3>
            <div>
                <div class="btn-group" role="group" aria-label="Second group">
                    <a type="button" class="btn btn-warning">Pending</a>
                    <a type="button" class="btn btn-info">On Going</a>
                    <a type="button" class="btn btn-success">Received</a>
                  </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="orderTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->index + 1  }}</td>
                        <td>{{ $order->unique_id }}</td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        <td>{{ Str::ucfirst($order->status) }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.order_details',$order->unique_id) }}" class="btn btn-sm rounded btn-success"><i class="fa fa-eye"></i></a>

                            @if ($order->status === 'pending')
                            <form action="{{ route('admin.orders_on_going',$order->unique_id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm rounded btn-warning">On Going</button>
                            </form>
                            @endif

                            @if ($order->status === 'ongoing')
                            <form action="{{ route('admin.orders_received',$order->unique_id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm rounded btn-success">Received</button>
                            </form>
                            @endif
                            <a href="" class="btn btn-sm rounded btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="" class="btn btn-sm rounded btn-info"><i class="fa fa-print"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('script')
<x-utility.data-table-js/>
<script>
   $('#orderTable').DataTable();

</script>
@endpush
