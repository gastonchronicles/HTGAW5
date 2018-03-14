<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Auth;

class ProfileController extends Controller
{
    public function profile($username){
    	$user = User::whereUsername($username)->first();
    	return view('user.profile', compact('user'));
    }

    public function followUser($user_id){
    	$exists = true;
    	$follower = Follow::where('user_id', '=', $user_id)->where('follow_id', '=', Auth::user()->id)->first();

    	if($follower == null){
    		$follow = new Follow;
	    	$follow->user_id = $user_id;
	    	$follow->follow_id = Auth::user()->id;
	    	$follow->save();

	    	

	    	$user= User::find($user_id);
	        $followers = array();
	        foreach($user->follows as $follow){
	            $followers[] = array(
	                'username'=>$follow->follower->username,
	                'name'=>$follow->follower->name
	                );
	        }
	        // dd($followers);
	        
    	}
    	return $followers;
    }

    public function unfollowUser($user_id){
    	$exists = true;
    	$follower = Follow::where('user_id', '=', $user_id)->where('follow_id', '=', Auth::user()->id)->first();

    	if($follower != null){
    		// echo $follower->id;

    		$f = Follow::findOrFail($follower->id);
    		$f->delete();

	    	$user= User::find($user_id);
	        $followers = array();
	        foreach($user->follows as $follow){
	            $followers[] = array(
	                'username'=>$follow->follower->username,
	                'name'=>$follow->follower->name
	                );
	        }
    	}
    	 // dd($followers);
	        return $followers;
    }
}