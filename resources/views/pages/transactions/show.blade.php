<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $transaction->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $transaction->email }}</td>
    </tr>
    <tr>
        <th>Number</th>
        <td>{{ $transaction->number }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $transaction->address }}</td>
    </tr>
    <tr>
        <th>Transaction Total</th>
        <td>{{ $transaction->transaction_total }}</td>
    </tr>
    <tr>
        <th>Transaction Status</th>
        <td>{{ $transaction->transaction_status }}</td>
    </tr>
    <tr>
        <th>Product Payment</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                </tr>
                @foreach ($transaction->details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->product->type }}</td>
                    <td>$ {{ $detail->product->price }}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{ route('transaction.status', $transaction) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Success
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $transaction) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i> Set Failed
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $transaction) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>
</div>