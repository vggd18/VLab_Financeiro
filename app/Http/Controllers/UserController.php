<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    // CRIAR A TABELA DE USUÁRIO
    public function create(Request $request, User $user)
    {   
        if(!Gate::allows('create-user', $user)){
            abort(403);
        }

        $data = $request->post();
        
        $newUser = $user->create($data);
    
        if(!$newUser){
            return response()->json(['message' => 'User create failed'], 500);
        }
        return response()->json($newUser, 201);
    }
    

    public function update(Request $request, User $user)
    {
        if(!Gate::allows('update-user', $user)){
            abort(403);
        }

        $req = $request->input();
        $id = $request->id;

        $updateUser = User::find($id);
        if($req['name']){
            $updateUser->name = $req['name'];
        }
        if($req['cpf']){
            $updateUser->cpf = $req['cpf'];
        }
        if($req['email']){
            $updateUser->email = $req['email'];
        }
        if($req['password']){
            $updateUser->password = $req['password'];
        }
        $updateUser->save();
    
        return response()->json($updateUser);
    }
    


    public function remove(string|int $id, User $user)
    {
        if(!Gate::allows('delete-user', $user)){
            abort(403);
        }

        if(!$removeUser = User::find($id)){
            return back()->json(['message' => 'User remove failed', 500]);
        }

        $removeUser->delete();

        return response()->json(['message' => 'User removed successfuly', 200]);
    }
}
