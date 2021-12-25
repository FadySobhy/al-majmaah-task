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
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group mb-3">
                    <label for="emailaddress">Email address:</label>
                    <input class="form-control d-none @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                    <strong>{{ $email ?? old('email') }}</strong>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="emailaddress">New Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="emailaddress">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit"> Reset Password </button>
                </div>
            </form>
        </div> <!-- end card-body -->
    </div>
</div>
@endsection
