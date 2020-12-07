@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Blogs </div>

                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> 
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{ route('posts.store')}}" method="post">
                    @csrf
                      <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" required />
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="detail" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea name="detail" id="detail" class="form-control" rows="8" required>{{old('title')}}</textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="detail" class="col-sm-2 col-form-label">Publish?</label>
                        <div class="col-sm-10">
                          <input type="checkbox" name="publish">
                        </div>
                      </div>

                      <div class="form-group row text-center">
                      <div class="col-sm-10 offset-sm-2">
                          <input type="submit" class="btn btn-primary" value="Create" >
                      </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
