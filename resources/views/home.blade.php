@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Blogs </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('posts.create') }}" class="btn btn-success float-right">Add New Blog</a>

                    <div class="my-3 p-3 bg-white rounded shadow-sm">

                    @foreach($posts  as $post)
                    <div class="media text-muted pt-3">
                        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{ $post->title }}</strong>
                        {{ $post->detail }}
                        </p>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
