@extends('layouts.app')

@section('content')
<div class="container w-100">
    <div class="row justify-content-center w-75">
        <form action="{{ route('posts.store') }}" class = "w-100" method = "POST" enctype="multipart/form-data">
            @csrf 
            <h1 class="m-0 pb-4"> Adding New Blog Post</h1>
            <div class="form-group">
                <label for="post title">Title <span class="must">*</span></label>
                <input class="form-control border-primary" type="text" name="title" id="title"
                placeholder="">
            </div>
            <div class="form-group">
                <label for="post body">Post Body <span class="must">*</span></label>
                <textarea id="summernote" class="form-control" name="body"></textarea>
            </div>
            <div class="form-group">
                <label for="post_image">image</label>
                <input class="form-control border-primary bg-transparent" type="file" name="image" id="post_image"
                    placeholder="post image">
            </div>
            <div class="form-group">
                <label for="post tags">Post tags</label>
                <input type="text" placeholder="Enter tags" id="Tag" name="tag" data-role="tagsinput"
                    value="" class="sr-only">
                <small class="d-block">click Enter after each tag **</small>
            </div>
            <div class="form-group">
                <button type="submit" class = "btn btn-primary"> Publish </button>
            </div>

            
        </form>
    </div>
</div>

@endsection

@push('css')
    {!! css('posts/create') !!}
    {!! css('posts/tagsinput') !!}
@endpush

@push('js')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{!! js('posts/tagsinput') !!}
@endpush

