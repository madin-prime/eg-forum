<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class CommentController extends Controller
{
    
    public function commentPost(Request $request , $id){
        $validator = Validator::make($request->all(), [
            'comment' => 'required|min:1'
        ]);
        
        $validator->setCustomMessages([
            'comment'=> 'Comment Must Required'
        ]);
        
        if($validator->fails()){
            return $validator->errors()->all();
        }

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $request->user()->id;
        $comment->post_id = $id;
        $comment->save();

        return redirect()->route('comment-box', ['id'=> $id->id]);

    }
    public function comment(Request $request, $id){
    
    
        $did = Post::where('id','=',$id)->first();
    
            
                return view('pages.comments', ['user' => $request->user() ,'id' => $did, 'comments'=> Comment::all()]);
                   
    }
}
