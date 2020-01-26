<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function createPost(Request $request){
        $post = new Post;

        $post->data_post = $request->data_post;
        $post->quant_likes = $request->quant_likes;
        $post->horario_post = $request->horario_post;
        $post->quant_respostas = $request->quant_respostas;
        $post->serie_post = $request->serie_post;
        $post->user_id = $request->user_id;
        $post->save();

        return response()->json([$post]);
    }

    public function listPost(){

        $post = Post::all();
        return response()->json($post);
    }

    public function showPost($id){

        $post = Post::findOrFail($id);
        return response()->json([$post]);
    }
    
    public function updatePost(Request $request, $id){

        $post = Post::find($id);

        if($post){
            if($request->data_post){
                $post->data_post = $request->data_post;
            }
            if($request->quant_likes){
                $post->quant_likes = $request->quant_likes;
            }
            if($request->horario_post){
                $post->horario_post = $request->horario_post;
            }
            if($request->quant_respostas){
                $post->quant_respostas = $request->quant_respostas;
            }
            if($request->serie_post){
                $post->serie_post = $request->serie_post;
            }
            $post->save();
            return response()->json([$post]);
        }
    else{
        return response()->json(['Este comentario nao existe']);

    }

   }

   public function deletePost($id){
       Post::destroy($id);
       return response()->json(['Comentario deletado']);
   }
}
