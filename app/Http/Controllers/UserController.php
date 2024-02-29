<?php

namespace App\Http\Controllers;

use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Nette\Utils\Random;
use Psy\Util\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $types = TypeUser::all();

        return view('user.create', compact('types'));
    }

    public function store()
    {
        $data = request()->validate([
            'fio' => 'string',
            'draw_number' => 'int',
            'type_id' => '',
        ]);
        $data['login'] = Random::generate('5');
        $data['password'] = Random::generate('8');
        User::create($data);
        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        $type = TypeUser::find($user->type_id);
        return view('user.show', compact('user', 'type'));
    }

    public function edit(User $user)
    {
        $types = TypeUser::all();
        return view('user.edit', compact('user', 'types'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'fio' => 'string',
            'draw_number' => 'int',
            'type_id' => '',
        ]);

        $user->update($data);
        return redirect()->route('user.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
