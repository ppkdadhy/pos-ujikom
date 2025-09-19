@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Manage Transactions</div>
        </div>
        <div class="card-body">
            <div class="table table-responsive">
                <a href="{{ route('transaction.create') }}" class="btn btn-primary mt-1 mb-1">ADD Transaction</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Order Code</th>
                            <th>Order Amount</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
