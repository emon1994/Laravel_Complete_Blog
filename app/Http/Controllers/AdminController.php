<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {

        return view('admin.post_page');
    }

    public function add_post(Request $req)
    {
        $user     = Auth()->user();
        $user_id  = $user->id;
        $name     = $user->name;
        $usertype = $user->usertype;


        $post= new Post();

        $post->title       = $req->title;
        $post->description = $req->description;
        $post->name        = $name;
        $post->user_id     = $user_id;
        $post->usertype    = $usertype;
        $post->post_status = 'active';

        $imagename= '';
        if($image= $req->file('image'))
        {
            $imagename   = time().'.'.$image->getClientOriginalExtension();  
            $image->move('post image',$imagename);
            $post->image = $imagename;
        }

        $post->save();
       

        return redirect()->back()->with('message','Post Added Sucessfully!');

    }

    public function show_post()
    {
        $posts= Post::all();

        return view('admin.show_post', compact('posts'));
    }

    public function delete_post($id)
    {
        $post= Post::find($id);

        $post->delete();

        return redirect()->back()->with('message','deleted successfuly');
    }

    public function edit_post($id)
    {
        $post= Post::find($id);

        return view('admin.edit_post', compact('post'));

    }

    public function update_page(Request $req, $id)
    {
        $post= Post::find($id);

        $post->title= $req->title;
        $post->description= $req->description;
        $imagename= '';
        if($image= $req->file('image'))
        {
            $imagename   = time().'.'.$image->getClientOriginalExtension();  
            $image->move('post image',$imagename);
            $post->image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message','Post Edited Sucessfully!');

        
    }

    public function accept_post($id)
    {
        $data= Post::find($id);
        $data->post_status= 'active';

        $data->save();

        return redirect()->back()->with('message','post status has been activated!!!');
    }

    public function reject_post($id)
    {
        $data= Post::find($id);
        $data->post_status= 'rejected';

        $data->save();

        return redirect()->back()->with('message','post status has been rejected!!!');
    }



}


