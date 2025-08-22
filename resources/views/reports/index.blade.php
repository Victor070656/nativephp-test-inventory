@extends('layouts.app')

@section('content')
    <h2>Sales Report</h2>

    <form method="GET" action="{{ route('reports.index') }}" class="row g-3 mb-3">
        <div class="col-md-3">
            <label>From</label>
            <input type="date" name="from" value="{{ $from }}" class="form-control">
        </div>
        <div class="col-md-3">
            <label>To</label>
            <input type="date" name="to" value="{{ $to }}" class="form-control">
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <div class="mb-3">
        <strong>Total Items Sold:</strong> {{ $totalItems }} <br>
        <strong>Total Revenue:</strong> ₦{{ number_format($totalRevenue, 2) }}
    </div>

    <div class="mb-3">
        <a href="{{ route('reports.pdf', ['from' => $from, 'to' => $to]) }}" class="btn btn-danger">Export PDF</a>
        <a href="{{ route('reports.csv', ['from' => $from, 'to' => $to]) }}" class="btn btn-success">Export CSV</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $s)
                <tr>
                    <td>{{ $s->product->name }}</td>
                    <td>{{ $s->quantity }}</td>
                    <td>₦{{ number_format($s->total_price, 2) }}</td>
                    <td>{{ $s->sale_date->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No sales data</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
