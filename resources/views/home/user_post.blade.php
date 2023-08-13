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
      <h1 class="text-center mt-4"><b>ADD POST</b></h1>
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
                <div class="col-lg-8 mx-auto bg-warning">
                    <form action="{{ url('add_user_post') }}" method="POST" enctype="multipart/form-data">

                        @csrf 

                        <div class="form-group">
                            <label class="text-white" for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label  class="text-white for="description">Description</label>
                            <textarea name="description" cols="30" rows="10" class="form-control border-s-black text-black"></textarea>
                        </div>

                        <div class="form-group">
                            <label  class="text-white for="image">Add Image</label>
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