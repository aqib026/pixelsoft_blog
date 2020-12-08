@extends('layouts.app')

@section('content')
<div class="container">
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">
      Recent Blogs
      <form action="{{ url('/') }}" id="myForm"> 
        <select name="order" onchange="document.getElementById('myForm').submit();" class="form-control" style="float: right; width:200px;">
          <option value="DESC">Show Latest </option>
          <option value="ASC" @if($order == 'ASC') selected="selected" @endif>Show Oldest </option>
        </select>
        
      </form>
    </h6>

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
  <div class="d-flex justify-content-center">
  {!! $posts->links("pagination::bootstrap-4") !!}
       </div>
</div>
@endsection