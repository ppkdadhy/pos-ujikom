@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Manage Products
            </div>
        </div>
        <div class="card-body">
            <div class="table table-responsive">
                <a href="{{ route('product.create') }}" class="btn btn-primary mt-2 mb-2">ADD</a>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->category_id }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->product_photo) }}" alt="" width="120">
                            </td>
                            <td>{{ $item->product_description }}</td>
                            <td>
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('product.destroy', $item->id) }}" method="post"
                                    style="display: inline" onsubmit=" return confirm('Ingin delete ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
