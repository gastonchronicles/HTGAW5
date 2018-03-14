<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Like;
//use App\Users;
//
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //$users = new Users;
        $post = new Post;

        $post->user_id = Auth::user()->id;

        $post->subject = $request->subject;
        $post->quiz = $request->quiz;
        $post->assignment = $request->assignment;
        $post->attendance = $request->attendance;
        $post->longexams = $request->longexams;
        $post->finalexam = $request->finalexam;

        $post->quiztotal = $request->quiztotal;
        $post->assignmenttotal = $request->assignmenttotal;
        $post->attendancetotal = $request->attendancetotal;
        $post->longexamstotal = $request->longexamstotal;
        $post->finalexamtotal = $request->finalexamtotal;

//        $post->quizPercent = $request->quizPercent;
//        $post->assignmentPercent = $request->assignmentPercent;
//        $post->attendancePercent = $request->attendancePercent;
//        $post->longexamsPercent = $request->longexamsPercent;
//        $post->finalexamPercent = $request->finalexamPercent;

        $post->quizPercent = 5;
        $post->assignmentPercent = 5;
        $post->attendancePercent = 5;
        $post->longexamsPercent = 60;
        $post->finalexamPercent = 25;

        //$users ->



        $post->total= (($request->quiz/$request->quiztotal) * ($post->quizPercent/100) * 100) + (($request->assignment/$request->assignmenttotal) * ($post->assignmentPercent/100) * 100) + (($request->attendance/$request->attendancetotal) * ($post->attendancePercent/100)* 100) + (($request->longexams/$request->longexamstotal) * ($post->longexamsPercent/100)* 100) + (($request->finalexam/$request->finalexamtotal) * ($post->finalexamPercent/100)* 100);



        if(($post->total<=100) and ($post->total>95)){
            $post->status="1.0";
        }
        elseif(($post->total<=95) and ($post->total>90)){
            $post->status="1.25";
        }
        elseif(($post->total<=90) and ($post->total>85)){
            $post->status="1.5";
        }
        elseif(($post->total<=85) and ($post->total>80)){
            $post->status="1.75";
        }
        elseif(($post->total<=80) and ($post->total>75)){
            $post->status="2.0";
        }
        elseif(($post->total<=75) and ($post->total>70)){
            $post->status="2.25";
        }
        elseif(($post->total<=70) and ($post->total>65)){
            $post->status="2.5";
        }
        elseif(($post->total<=65) and ($post->total>60)){
            $post->status="2.75";
        }
        elseif(($post->total<=60) and ($post->total>55)){
            $post->status="3.0";
        }
        elseif(($post->total<=55) and ($post->total>50)){
            $post->status="4.0";
        }
        else{
            $post->status="5.0";
        }
        $post->save();
        //$syllabus->save();


        //Post::create($request->all());


        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();

        return redirect('/posts');
    }

    public function likePost($post_id){
        $like = new Like;
        $like->post_id = $post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        $post= Post::find($post_id);
        $likers = array();
        foreach($post->likes as $like){
            $likers[] = array(
                'username'=>$like->liker->username,
                'name'=>$like->liker->name
            );
        }
        return $likers;
    }
}
