@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-pattern">
            <div class="card-body p-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="text-center w-75 m-auto">
                    <a href="{{ route('login') }}">
                        <span><img src="{{ asset('assets/images/logo-01.png') }}" alt="" height="45"></span>
                    </a>
                    <p class="text-muted mb-4 mt-3">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit"> Reset Password </button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="text-white-50">
                    Back to
                    <a href="{{ route('login') }}" class="text-white ml-1">
                        <b>Log in</b>
                    </a>
                </p>
            </div> <!-- end col -->
        </div>
    </div>
@endsection
