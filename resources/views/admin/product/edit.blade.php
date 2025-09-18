@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Update Product
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mt-2">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        <option value="">Pilih Kategori</option>
                        <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>Makanan</option>
                        <option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>Minuman</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control">
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Picture Product</label><br>
                    <img class="mb-2" src="{{ asset('storage/' . $product->product_photo) }}" width="120"
                        alt="">
                    <input type="file" class="form-control" name="product_photo">
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Price Product</label>
                    <input type="number" class="form-control" value="{{ $product->product_price }}" name="product_price">
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Product Description</label>
                    <textarea name="product_description" class="form-control" cols="30" rows="10">{{ $product->product_description }}</textarea>
                </div>
                <div class="mt-2">
                    <label for="" class="form-label">Status</label><br>
                    <input type="radio" name="is_active" value="1" {{ $product->is_active == 1 ? 'checked' : '' }}>
                    Available
                    <input type="radio" name="is_active" value="0" {{ $product->is_active == 0 ? 'checked' : '' }}>
                    Not Available
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </form>
        </div>
    </div>
@endsection
