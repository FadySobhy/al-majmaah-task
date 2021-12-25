@extends('layouts.app')
@section('content')
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-pattern">
            <div class="card-body p-4">

                <div class="text-center w-75 m-auto">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo-dark.png')}}" alt="" height="45"></a>
                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access the system.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="form-group mb-3">
                    <label for="emailaddress">Email address</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="emailaddress" value="{{ old('email') }}" required="" placeholder="Enter your email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" id="password" placeholder="Enter your password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember" {{ old('remember')? 'checked' : '' }} checked>
                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                    </div>
                </div>

                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                </div>
                </form>
                @include('inc.social')

            </div> <!-- end card-body -->
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="text-white-50">Don't have an account? <a href="{{ route('register') }}" class="text-white ml-1"><b>Sign Up</b></a></p>
            </div> <!-- end col -->
        </div>
    </div>
@endsection
