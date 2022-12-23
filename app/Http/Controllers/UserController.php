<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $search = request('search');
        $userLogged = auth()->user();
        if ($search) {
            $users = User::where([
                ['name', 'like', '%' . $search . '%']
            ])->get();
            $users = User::where([
                ['email', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $users = User::paginate(5);
        }

        return view('user.usersRead', ['users' => $users, 'search' => $search, 'userLogged' => $userLogged]);
    }

    public function create()
    {
        return view('user.usersCreate');
    }


    function debug_to_console($data)
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    public function store(Request $request)
    {
        try {
            if ($request->name != null && $request->email != null && $request->password != null) {
                $users = new User;


                $users->name = $request->name;
                $users->email = $request->email;
                $users->password = $request->password;
                $users->save();
                return redirect('/')->with('msg', "Usuário criado com sucesso!");
            } else {
                return redirect('/user/create')->with('msg-error', "Verifique todos os campos!");
            }
        }catch(QueryException $e){
            if($e->getCode() == 23000){
                return redirect('/user/create')->with('msg-error', "Esse email já está sendo usado!");
            }
        }
    }

    private function isValidUser($user)
    {
        return $user->name != null && $user->name != '' && $user->email != null && $user->email != '' && $user->password != '' &&
            $user->password != null;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.usersUpdate', ['user' => $user]);
    }

    public function update(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            if ($request->name != null && $request->email != null) {
                $data = $request->all();
                if ($request->password == null) {
                    $data['password'] = $user->password;
                }
                $user->update($data);
                return redirect('/')->with('msg', 'Usuário atualizado com sucesso.');
            } else {
                return redirect('/user/edit/' . $user->id)->with('msg-error', "Verifique todos os campos!");
            }
        }catch(QueryException $e){
            if($e->getCode() == 23000){
                return redirect('/user/edit/' . $user->id)->with('msg-error', "Esse email já está sendo usado!");
            }
        }
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Usuário deletado com sucesso.');
    }
}