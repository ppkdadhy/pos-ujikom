@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Create Product
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-2">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        <option value="">Pilih Kategori</option>
                        <option value="1">Makanan</option>
                        <option value="2">Minuman</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control">
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Picture Product</label>
                    <input type="file" class="form-control" name="product_photo">
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Price Product</label>
                    <input type="number" class="form-control" name="product_price">
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Product Description</label>
                    <textarea name="product_description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Status</label><br>
                    <input type="radio" name="is_active" value="1"> Available
                    <input type="radio" name="is_active" value="0"> Not Available
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </form>
        </div>
    </div>
@endsection
