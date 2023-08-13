<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Blogs </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">
                  
             
               @foreach($post as $post)
                  <div class="col-md-4 p-2">
                     <div><img style="height: 400px; width: 550px" src="/post image/{{ $post->image}}" class="services_img"></div>
                     <h3><b>{{$post->title}}</b></h3>
                     <h4>Posted by <b>{{ $post->name}}</b></h4>
                     <div class="btn_main"><a href="{{ url('post_detail', $post->id) }}">Read More</a></div>
                  </div>
               @endforeach
               </div>
            </div>
         </div>
      </div>