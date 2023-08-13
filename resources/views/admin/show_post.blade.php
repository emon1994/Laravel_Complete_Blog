<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
     
       @include('admin.sidebar')
     
       <div class="page-content bg-white">
       @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hideen="true">
                    x
                </button>
                {{ session()->get('message') }}
            </div>

        @endif
        <p class="text-white font-extrabold text-center mt-3 mb-2">Show Post</p>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                           <tr>
                                <th>titlle</th>
                                <th>description</th>
                                <th>post by</th>
                                <th>usertype</th>
                                <th>post_status</th>
                                <th>image</th>
                                <th>edit</th>
                                <th>delete</th>
                                <th>accept</th>
                                <th>reject</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title  }}</td>
                                <td>{{ $post->description  }} </td>
                                <td>{{ $post->name  }} </td>
                                <td>{{ $post->usertype }} </td>
                                <td>{{ $post->post_status }}</td>
                                <td> <img style="height: 80px; width: 150pxs;" src="post image/{{ $post->image}}"> </td>
                                <td>
                                    <a href="{{ url('edit_post', $post->id) }}" class="btn btn-success">update</a>
                                </td>
                                <td>
                                <a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger">delete</a>
                                </td>
                                <td>
                                    <a href="{{ url('accept_post',$post->id) }}" class="btn btn-success">accept</a>
                                </td>
                                <td>
                                    <a href="{{ url('reject_post', $post->id) }}" class="btn btn-danger">reject</a>
                                </td>
                            @endforeach    
                               
                            </tr>
                        </tbody>
                    </table>
                        
                </div>
            </div>
        </div>

        </div>

       @include('admin.footer')

  </body>
</html>
