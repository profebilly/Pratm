@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <h1>{{ __('custom.student_dashboard_title') }}</h1>
    <p>{{ __('custom.welcome_student') }}</p>
    <p>{{ __('custom.filler_intro') }}</p>

    <h2>{{ __('custom.list_title') }}</h2>
    
    @if(isset($posts) && $posts->count() > 0)
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        @if($post->image)
                            <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 150) }}</p>
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">{{ __('custom.read_more') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>{{ __('custom.no_posts') }}</p>
    @endif

</div>
@endsection
