@extends('layouts.master')
@section('title', 'Detail')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>Detail Produk</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($product->image) }}" class="img-fluid rounded mb-3">
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $product->name }}</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Stok:</strong> {{ $product->stock }}</p>
                            </div>

                            <div class="col-md-6" style="background-color: rgb(14, 169, 230); color: rgb(0, 0, 0); padding: 5px; font-size: 14px; max-width: 100px; border-radius: 8px;">
                                <p><strong> Rp. {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Kondisi:</strong> {{ $product->condition }}</p>
                            </div>
                            <div class="col-md-6">
                                <p> {{ $product->weight }} gr</p>

                            </div>
                        </div>
                        <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
                        <a href="{{ route('transactions.showCheckoutForm', ['product_id' => $product->id]) }}" class="btn btn-secondary">Check Out</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

