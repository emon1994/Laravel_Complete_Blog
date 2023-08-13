<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
     @include('home.css')
   </head>
   <body>
     
      <div class="header_section">
        @include('home.header') 
         
        
         
      </div>
      <div class="col-md-12 text-center">
            <div>
                <img style="padding: 20px; height: 250px; width: 300px;" class="mx-auto" src="/post image/{{ $post->image}}" class="services_img">
            </div>
            <h3><b>{{$post->title}}</b></h3>
           
            <p>{{ $post->description }}</p>

            <h4>Posted by <b>{{ $post->name}}</b></h4>
       </div>
      
      @include('home.footer') 
   </body>
</html>