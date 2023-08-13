<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if(Auth::id())
        {
            $post= Post:: where('post_status','=','active')->get(); ;

            $usertype= Auth()->user()->usertype;

            if($usertype=='user')
            {
                return view('home.homepage', compact('post'));
            }
            if($usertype=='admin')
            {
                return view('admin.home');
            }
            else
            {
                return redirect()->back();
            }
        }
    }
    public function homepage()
    {
        $post= Post::where('post_status','=','active')->get();

        return view('home.homepage', compact('post'));
    }

    public function post_detail($id)
    {
        $post= Post::find($id);

        return view('home.post_detail', compact('post'));

    }


    public function user_post()
    {
        return view('home.user_post');
    }

    public function add_user_post( Request $req) 
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
        $post->post_status = 'pending';

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

    public function my_post()
    {
       $user= Auth::user();
       $userid= $user->id;

       $data= Post::where('user_id','=', $userid)->get();



        return view('home.my_post', compact('data'));
    }

    public function delete_userpost($id)
    {

        $data= Post::find($id);
        $data->delete();

        return redirect()->back()->with('message','post deleted sucessfuly');

    }

    public function edit_userpost($id)
   {

        $data= Post::find($id);

        return view('home.edit_userpost', compact('data'));


   }

   public function update_userpost(Request $req, $id)
    {
        $data= Post::find($id);
        $data->title = $req->title;
        $data->description = $req->description;
        $data->name = $req->name;

        $image = $req->file('image');

        if($image)
        {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $image->move('post image', $imagename);
            $data->image= $imagename;

        }

        $data->save();

        return redirect()->back()->with('message', 'Post Edited Succesfully');



    }
   
}
