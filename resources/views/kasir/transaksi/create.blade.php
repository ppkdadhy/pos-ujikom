@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Create Transaction</div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="" class="form-label">Order Code</label>
                        <input type="text" class="form-control" name="order_code" value="{{ $orderCode }}" readonly>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Order Date</label>
                        <input type="text" class="form-control" name="order_date" value="{{ $today }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="form-label">Status Order</label>
                        <input type="text" class="form-control text-primary fw-bold" readonly>
                    </div>
                    <div class="col-6 d-flex align-items-center mt-2">
                        <button type="button" class="btn btn-primary" id="counterBtn">Click Order</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Products</th>
                                    <th>Qty</th>
                                    <th>Order Price</th>
                                    <th>Order Subtotal</th>
                                    <th>Cancel Order</th>
                                </tr>
                            </thead>
                            <tbody id="dataTransactions">
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">ADD Orders</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
