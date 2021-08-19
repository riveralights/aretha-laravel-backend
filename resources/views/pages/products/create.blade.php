@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">Item Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Item Name">
                @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">Item Type</label>
                <input type="text" name="type" id="type" value="{{ old('type') }}" class="form-control @error('type') is-invalid @enderror" placeholder="Item Name">
                @error('type')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="form-control-label">Item Description</label>
                <textarea name="description" id="itemDescription" class="form-control  @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price" class="form-control-label">Item Price</label>
                <input type="number" min="0" name="price" id="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" placeholder="Item Price">
                @error('price')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="quantity" class="form-control-label">Item Quantity</label>
                <input type="number" min="0" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Item quantity">
                @error('quantity')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Add new item</button>
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