<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
     @include('home.css')

     <style type="text/css">
        .post_dsg
        {
            padding: 30px;
            text-align: center;
        }
        .title_dsg
        {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
        }
        .dsc_dsg
        {
            font-size: 18px;
            font-weight: bold;
            padding: 15px;

        }
        .img_dsg
        {
            height: 150px;
            width: 180px;
            padding: 30px;
            margin: auto;
        }
     </style>
   </head>
   <body>
     
      <div class="header_section">
        @include('home.header') 
         
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hideen="true">
                    x
                </button>
                {{ session()->get('message') }}
            </div>

        @endif
      </div>
      
      @foreach($data as $data)
      <div  class="post_dsg">
            <img class="img_dsg" src="/post image/{{ $data->image }}" alt="">

            <h3 class="title_dsg" >{{ $data->title}}</h3>

            <h4 class="dsc_dsg">{{ $data->description }}</h4>

            <h4>Posted by:{{ $data->name}}</h4>

            <a href="{{ url('delete_userpost', $data->id)}}" onclick="return onclick('are you sure to delete?')" class="btn btn-danger">delete</a>

            <a href="{{ url('edit_userpost', $data->id) }}" class="btn btn-success">edit</a>

      </div>
      @endforeach
      
      @include('home.footer') 
   </body>
</html>