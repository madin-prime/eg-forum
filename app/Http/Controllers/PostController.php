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
            'content' => 'required|min:1'
        ]);

        $validator->setCustomMessages([
            'content' => 'Content Must Required'

        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        $post = new Post();
        $post->content = $request->content;
        $post->user_id = $request->user()->id;
        $post->save();

        return redirect()->route('home');
    }
}
