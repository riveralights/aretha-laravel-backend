@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Foto Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="productId" class="form-control-label">Product Name</label>
                <select name="product_id" id="productId" class="form-control @error('product_id') is-invalid @enderror">
                    <option disabled selected>-- Choose Product -- </option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo" class="form-control-label">Photo Product</label>
                <input type="file" name="photo" id="photo" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror" placeholder="Item Name" accept="image/*">
                @error('photo')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="is_default" class="form-control-label">Make it Default</label>
                <br>
                <label>
                    <input type="radio" name="is_default" id="isDefault" value="1" class="form-control @error('is_default') is-invalid @enderror"> Yes
                </label>
                &nbsp;
                <label>
                    <input type="radio" name="is_default" id="isDefault" value="0" class="form-control @error('is_default') is-invalid @enderror"> No
                </label>
                @error('is_default')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Add product photo</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('after-script')
<script>
    ClassicEditor
        .create(document.querySelector('#itemDescription'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush