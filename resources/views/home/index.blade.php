<!-- resources/views/master/index.blade.php -->
@extends('layouts.master')
@section('content')
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-4">
            <img src="https://i.pinimg.com/564x/25/81/f4/2581f4e8af56089bf9863c9f40f84465.jpg"
                 class="d-block mx-lg-auto img-fluid shadow-lg rounded" alt="Bootstrap Themes" width="340" height="150"
                 loading="lazy">
        </div>
        <div class="col-lg-8">
            <h4>Experience the luxurious Taste Of</h4>
            <h4 class="display-5 fw-bold lh-1 mb-3">🌟Red Velvet Latte !🌟</h4>
            <p class="lead">
                Selamat datang di dunia rasa yang memikat! Jelajahi kenikmatan tak terlupakan dengan Red Velvet, sebuah
                minuman yang memikat dengan kelembutan dan cita rasa manisnya yang istimewa. Biarkan setiap tegukan
                menyapu Anda dalam kehangatan dan kelezatan yang tak terlupakan. Segera nikmati Red Velvet dan rasakan
                sensasi yang menggugah selera di setiap detiknya ☕✨!
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4 me-md-2">Buy Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
