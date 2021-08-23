@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone  Number</th>
                                        <th>Total Transaction</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->name }}</td>
                                        <td>{{ $transaction->email }}</td>
                                        <td>{{ $transaction->number }}</td>
                                        <td>$ {{ $transaction->transaction_total }}</td>
                                        <td>
                                            @if($transaction->transaction_status == 'PENDING')
                                                <span class="badge badge-info">
                                            @elseif($transaction->transaction_status == 'SUCCESS')
                                                <span class="badge badge-success">
                                            @elseif($transaction->transaction_status == 'FAILED')
                                                <span class="badge badge-danger">
                                            @endif
                                                {{ $transaction->transaction_status }}
                                            </span>
                                                
                                        </td>
                                        <td>
                                            @if ($transaction->transaction_status == 'PENDING')
                                                <a href="{{ route('transaction.status', $transaction) }}?status=SUCCESS" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                <a href="{{ route('transaction.status', $transaction) }}?status=FAILED" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                            @endif
                                            <a href="" data-target="#myModal" data-toggle="modal" data-title="Transaction - {{ $transaction->uuid }}" data-remote="{{ route('transaction.show', $transaction->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                            <a href="{{ route('transaction.edit', $transaction) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('transaction.destroy', $transaction) }}" method="POST" class="d-inline">
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