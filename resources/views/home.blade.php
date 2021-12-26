@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            Create Your Post
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
{{--                    <label for="title">{{ __('Your Post!') }}</label>--}}
                    <input
                        id="title"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        name="title"
                        value="{{ old('name') }}"
                        required
                        placeholder="Write your thoughts down here..."
                        autofocus
                    >

                    @error('title')
                    <div class="alert alert-danger mt-1 mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="images">Select files:</label>
                    <input type="file" id="images" name="images[]" multiple>
                    @error('images.*')
                    <div class="alert alert-danger mt-1 mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-group text-center mb-0 float-left">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Post!') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('inc.posts', $posts)
@endsection
