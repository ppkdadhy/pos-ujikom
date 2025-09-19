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
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($orders as $item)
                        <tbody>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> <a href="{{ route('transaction.show', $item->id) }}">{{ $item->order_code }}</a></td>
                                <td>{{ $item->order_amount == null ? '-' : $item->order_amount }}</td>
                                <td>{{ $item->order_status == 0 ? 'Order' : 'Paid in Full' }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
