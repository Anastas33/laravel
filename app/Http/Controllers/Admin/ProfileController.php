<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.profiles.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.profiles.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LoginRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
   /* public function update(LoginRequest $request, User $user)
    {
        $admin = Auth::user();
        $data = $request->only('id', 'name', 'email', 'is_admin');
        $data['password'] = User::find($data['id'])->password;
        $data['remember_token'] = User::find($data['id'])->remember_token;
        $errors = [];
        $password = $request->only('password');
dd($data);

        if (Hash::check($password['password'], $admin->password)) {
            $status = $user->fill($data)->save();
            if ($status) {
                return redirect()
                    ->route('profiles.index')
                    ->with('success', 'Данные сохранены');
            }
        } else {
            $errors['password'][] = 'Неверно введен пароль';
        }

        return back()->withInput()->withErrors($errors);
    }*/

    public function update(LoginRequest $request, int $id)
    {
        $admin = Auth::user();
        $user = User::find($id);
        $data = $request->only('id', 'name', 'email', 'is_admin');
        $data['password'] = $user->password;
        $data['remember_token'] = $user->remember_token;
        $errors = [];
        $password = $request->only('password');
//        dd($data);

        if (Hash::check($password['password'], $admin->password)) {
            $status = $user->fill($data)->save();
            if ($status) {
                return redirect()
                    ->route('profiles.index')
                    ->with('success', 'Данные сохранены');
            }
        } else {
            $errors['password'][] = 'Неверно введен пароль';
        }

        return back()->withInput()->withErrors($errors);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('profiles.index')
            ->with('success', 'Запись была удалена');
    }

}
