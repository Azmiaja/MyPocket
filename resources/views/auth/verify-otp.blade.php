@extends('auth.app')
@section('container-auth')
    <div class="container">
        <div class="row align-items-center vh-100 justify-content-center">
            <div class="col-lg-4 col-12">
                <div class="toast ms-auto me-auto align-items-center border-0 fade {{ session('error') ? 'show' : '' }} transparent-bg mb-4"
                    role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body text-danger">
                            <b>{{ session('error') ?? '' }}</b>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
                <div class="card shadow-lg transparent-bg rounded-4">
                    <div class="row px-4 py-5 justify-content-center">
                        <div class="col-12 text-center mb-3">
                            <h2 class="text-light">Forgot Password</h2>
                        </div>
                        <div class="col-12">
                            <small>Masukan kode OTP yang telah di kirim pada <b>email</b> Anda.</small>
                        </div>
                        <div class="col-12 mt-4 px-4">
                            <form action="{{ route('verify.otp') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ request('email') }}">
                                @error('otp')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                                <div class="input-group mb-5">
                                    <span class="input-group-text"><i class="ri-scan-2-fill"></i></span>
                                    <input type="text" class="form-control" placeholder="Masukan Kode OTP" name="otp">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit"
                                        class="btn btn-warning w-75 fw-bold text-light rounded-5 mb-1">SEND OTP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
