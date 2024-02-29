<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // CRIAR A TABELA DE USUÁRIO
    public function create(Request $request, Pessoa $pessoa)
    {
        $data = $request->all();
        $pessoa = $pessoa->create($data);
    
        if(!$pessoa){
            return response()->json(['message' => 'User create failed'], 500);
        }
        return response()->json($pessoa, 201);
    }
    

    public function update(Request $request)
    {
        $id = $request->id;
        $user = Pessoa::find($id);

        if($request->has('full_name')){
            $user->full_name = $request->full_name;
        }
        if($request->has('cpf')){
            $user->cpf = $request->cpf;
        }
        if($request->has('email')){
            $user->email = $request->email;
        }
        if($request->has('password')){
        $user->password = $request->password;
        }
        $user->save();

        return response()->json($user);
    }


    public function remove(string|int $id)
    {
        if(!$pessoa = Pessoa::find($id)){
            return back()->json(['message' => 'User remove failed', 500]);
        }

        $pessoa->delete();

        return response()->json(['message' => 'User removed successfuly', 200]);
    }
}
