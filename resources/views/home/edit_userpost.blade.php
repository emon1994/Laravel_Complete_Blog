<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
     @include('home.css')
   </head>
   <body>
     
      <div class="header_section mb-5">
        @include('home.header') 
         
        
         
      </div>
      <h1 class="text-center mt-4"><b>Edit POST</b></h1>
      @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hideen="true">
                    x
                </button>
                {{ session()->get('message') }}
            </div>

        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto bg-primary">
                    <form action="{{ url('update_userpost', $data->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf 

                        <div class="form-group">
                            <label class="text-white" for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $data->title}}">
                        </div>

                        <div class="form-group">
                            <label  class="text-white" for="description">Description</label>
                            <textarea name="description" cols="30" rows="10" class="form-control border-s-black text-black">{{ $data->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Old Image</label>
                            <img height="200px" width="280px" src="/post image/{{ $data->image }}" alt="">

                        </div>

                        <div class="form-group">
                            <label  class="text-white" for="image">New Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                        
                            <input type="submit" class=" btn btn-success form-control">
                        </div>
                    </form>
                </div>
            </div>

        </div>
      @include('home.footer') 
   </body>
</html>