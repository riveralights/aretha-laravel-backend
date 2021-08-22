@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Item - {{ $transaction->uuid }}</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('transaction.update', $transaction) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name" class="form-control-label">Customer Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? $transaction->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Item Name">
                @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') ?? $transaction->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Customer Email">
                @error('email')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="number" class="form-control-label">Phone Number</label>
                <input type="text" name="number" id="number" value="{{ old('number') ?? $transaction->number }}" class="form-control @error('number') is-invalid @enderror" placeholder="Customer Phone Number">
                @error('number')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="address" class="form-control-label">Customer Address</label>
                <input type="text" min="0" name="address" id="address" value="{{ old('address') ?? $transaction->address }}" class="form-control @error('address') is-invalid @enderror" placeholder="Item address">
                @error('address')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Save changes</button>
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