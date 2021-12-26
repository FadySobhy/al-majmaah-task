<div class="col-md-4 col-sm-12">
    <p style="display: inline-block">Total: {{ $posts->total() }}</p>
</div>
    @forelse($posts as $post)
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-6">
                <div class="card" style="width: 30rem;">
                    <div class="card-header">
                        @if(count($post->images) > 0)
                        <div id="carouselExampleIndicators{{$loop->iteration}}" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($post->images as $image)
                                    <li data-target="#carouselExampleIndicators{{$loop->parent->iteration}}" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($post->images as $image)
                                    <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                        <img class="d-block w-100" src="{{ url('uploads/posts/'.$image->image)}}" alt="slide image">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators{{$loop->iteration}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators{{$loop->iteration}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="nav-user mr-0 waves-effect waves-light">
                            <img src="{{ url('assets') }}/images/users/default-user.jpg" alt="user-image" class="rounded-circle">
                            <span class="card-text">{{ $post->user->name }} | <small class="card-text">{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y h:i A') }}</small></span>
                        </div>
                        <p class="card-text pl-3 pt-2">{{ $post->title }}</p>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-6">
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <p class="card-text pl-3 pt-2">There are no posts yet!</p>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
<div>
    <span>{{ $posts->links('pagination::bootstrap-4') }}</span>
</div>

