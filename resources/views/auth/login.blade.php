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
                            <h2 class="text-light">Login <span class="fw-bold text-warning">MyPocket</span></h2>
                        </div>
                        <div class="col-12 mt-4 px-4">
                            <form action="{{ route('authentication') }}" method="POST">
                                @csrf
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="ri-mail-fill"></i></span>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="{{ old('email') }}">
                                </div>
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="ri-lock-2-fill"></i></span>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember">
                                            <label class="form-check-label" for="gridCheck">
                                                <small>Remember me</small>
                                            </label>
                                        </div>
                                        <a href="{{ route('forgot.password') }}" class="link-light"><small>Forgot
                                                Password?</small></a>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit"
                                        class="btn btn-warning w-75 fw-bold text-light rounded-5 mb-1">LOGIN</button>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <small>Are you new? <a href="{{ route('register') }}" class="link-light fw-medium">Create an
                                            Account</a></small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
