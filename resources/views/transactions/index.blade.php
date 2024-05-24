@extends('layouts.master')
@section('title', 'Detail Transaksi')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>Detail Transaksi</h2>
            </div>
            <div class="card-body">
                <h1>Detail Transaksi</h1>
                <p>No Invoice: {{ $transaction->invoice_number }}</p>
                <p>Admin Fee: {{ $transaction->admin_fee }}</p>
                <p>Kode Unik: {{ $transaction->unique_code }}</p>
                <p>Total: {{ $transaction->total }}</p>
                <p>Metode Pembayaran: {{ $transaction->payment_method }}</p>
                <p>Status: {{ $transaction->status }}</p>
                <p>Tanggal Kedaluwarsa: {{ $transaction->expiration_date }}</p>
            </div>
        </div>
    </div>
@endsection
