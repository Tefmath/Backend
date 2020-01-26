<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function createUser(Request $request){
        $user = new User;

        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->senha = $request->senha;
        $user->idade = $request->idade;
        $user->num_seguidores = $request->num_seguidores;
        $user->perfil = $request->perfil;
        $user->save();

        return response()->json([$user]);
    }

    public function listUser(){

        $user = User::all();
        return response()->json($user);
    }

    public function showUser($id){

        $user = User::findOrFail($id);
        return response()->json([$user]);
    }   

    public function updateUser(Request $request, $id){

        $user = User::find($id);

        if($user){
            if($request->nome){
                $user->nome = $request->nome;
            }
            if($request->email){
                $user->email = $request->email;
            }
            if($request->senha){
                $user->senha = $request->senha;
            }
            if($request->idade){
                $user->idade = $request->idade;
            }
            if($request->num_seguidores){
                $user->num_seguidores = $request->num_seguidores;
            }
            if($request->perfil){
                $user->perfil = $request->perfil;
            }
            $user->save();
            return response()->json([$user]);
        }
    else{
        return response()->json(['Este usuário nao existe']);

    }

   }

   public function deleteUser($id){
       User::destroy($id);
       return response()->json(['User deletado']);
   }
}