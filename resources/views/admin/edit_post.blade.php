<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
     
       @include('admin.sidebar')
     
       <div class="page-content">
        <h1 class="text-center text-white pt-5 pb-2 font-bold">EDIT POST</h1>
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hideen="true">
                    x
                </button>
                {{ session()->get('message') }}
            </div>

        @endif
        <div class="col-md-10 mx-auto">
            <form action="{{ url('update_page',$post->id)}}" method="POST" enctype="multipart/form-data">

                @csrf 

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id=""   cols="30" rows="10" class="form-control bg-white text-black">{{ $post->description }}</textarea>
                </div>

                <div>
                    <label for="">OLD IMAGE</label>
                    <img height="150px" width="200px" src="/post image/{{ $post->image }}" alt="">
                </div>

                <div class="form-group">
                    <label for="image">Add Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                   
                    <input type="submit" class=" btn btn-success form-control">
                </div>
            </form>
        </div>

       

       </div>

       @include('admin.footer')

  </body>
</html>
