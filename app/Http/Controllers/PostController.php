<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Validator;

class PostController extends Controller
{
    public function createPost(Request $request){
        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ]);

        if($validator->fails()){
            return 'error';
        }

        $post = new Post();
        $post->content = $request->content;
        $post->user_id = $request->user()->id;
        $post->save();

        return redirect()->route('home');
    }
}
