@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Photo</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($product_galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gallery->product->name }}</td>
                                        <td>
                                            <img src="{{ url($gallery->photo) }}" alt="" />
                                        </td>
                                        <td>{{ $gallery->is_default ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <form action="{{ route('product-gallery.destroy', $gallery) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want delete this data?');">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data unavailable
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection