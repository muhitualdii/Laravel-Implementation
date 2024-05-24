@extends('layouts.master')
@section('title', 'Checkout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>Checkout</h2>
            </div>
            <div class="card-body">
                <h3>Detail transaksi</h3>
                <p>No Invoice: {{ 'INV-' . time() }}</p>
                <p>Admin Fee: Rp. {{ number_format(5000, 0, ',', '.') }}</p>
                <p>Kode Unik: {{ rand(100, 999) }}</p>
                <p>Total: Rp. {{ number_format($product->price + 5000 + rand(100, 999), 0, ',', '.') }}</p>
                <p>Metode Pembayaran: VA BRI</p>
                <p>Status: Unpaid</p>
                <p>Tanggal Kedaluwarsa: {{ now()->addHours(3) }}</p>
                <hr>
                    <h3>Produk yang dibeli</h3>
                    <img src="{{ $product->image }}" alt="Gambar {{ $product->name }}" style="width: 120px; height: auto; float: left; margin-right: 10px;">
                    <p>Nama Produk: {{ $product->name }}</p>
                    <p>Harga: Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p>Deskripsi: {{ $product->description }}</p>
                <hr>
                <h3>Data Pembeli</h3>
                <p>Nama: {{ Auth::user()->name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Alamat: {{ Auth::user()->address }}</p>
                <p>Nomor Telepon: {{ Auth::user()->phone }}</p>
                <hr>
                <a href="{{ route('transactions.checkout', ['product_id' => $product->id]) }}" class="btn btn-primary">Bayar</a>
            </div>
        </div>
    </div>
@endsection
