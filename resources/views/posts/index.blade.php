@extends('layouts.app')

@section('content')

    <div class="container w-100">
        <div class ="posts w-100 d-flex align-items-start justify-content-start">
            @foreach( $posts as $post)
                <div class ="post w-30">
                    <div style = "width:100%;height:8rem;background-image: url({{ $post->image }})" class ="post-image"></div>
                    <div class="post-content">
                        <h4>{{ $post->title  }}</h4>
                        <div class = "tags">
                            @foreach($post->tags as $tag)
                                <span> {{ $tag->boy }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('css')
    {!! css('posts/index') !!}
@endpush

@push('js')

@endpush

