<?php

namespace App\Http\Controllers;


use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
            
        $users = User::all();

        

        return view('user.index', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return redirect()->back();
        }

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {   
        $data = $request->all();

        $user = new User();
        $hash = $user->generateHash($request->password);

        $data['password'] = $hash;

        User::create($data);
        return redirect()->back()->with('msg', 'Parabéns, seus dados foram registrados !');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $user = User::where('email', $email)->first();
        
        $this->authorize('view', $user);

        return view('user.show', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        $user = User::where('email', $email)->first();

        $this->authorize('update', $user);

        return view('user.edit', ['user' => $user]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $email)
    {
        $user = User::where('email', $email)->first();

        $this->authorize('update', $user);

        User::where('email', $email)->
        update(['firstname' => $request->firstname, 'lastname' => $request->lastname]);

        return redirect()->back()->with('msg', 'Dados do usuário atualizados com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        $user = User::where('email', $email)->first();

        $this->authorize('delete', $user);

        User::where('email', $email)->delete();

        return redirect()->route('users.index');

    }

    public function editPassword($email)
    {
        $user = User::where('email', $email)->first();

        $this->authorize('update', $user);

        return view('user.resetPassword', ['user' => $user]);
    }

    public function updatePassword(UpdatePasswordRequest $request, $email)
    {
        $user = User::where('email', $email)->first();

        $this->authorize('update', $user);

        $userModel = new User();

        if($userModel->compareHash($request->password, $user->password)){

            $hash = $userModel->generateHash($request->password2);

            User::where('email', $email)->update(['password' => $hash]);

            return redirect()->back()->with('msg', 'Senha redefinida com sucesso !');
        }
        
        return redirect()->back()->withErrors(['Erro ao redefinir a senha']);
    }
}
