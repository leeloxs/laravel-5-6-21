<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index() {
        $users = $this->userRepository->all(['posts', 'items'], ['*'], 10);
        return view('admin.users.index', compact('users'));
    }
    public function store(Request $request)
    {
        $response =  $this->userRepository->create($request->all());
        return redirect()->route('admin.users.index')->with('status', $response->content());
    }

    public function edit(User $user)
    {
        $user->load(['posts', 'items']);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $response = $this->userRepository->update($request->all(), $user);

        return redirect()->back()->with('status', $response->content());
    }

    public function show(User $user)
    {
        $user->load(['posts', 'items']);

        return view('admin.users.show', compact('user' ));
    }

    public function destroy(User $user)
    {
        $response = $this->userRepository->delete($user);

        return redirect()->back()->with('status', $response->content());
    }

    public function updateAvatar(Request $request, User $user) {
        $response = $this->userRepository->updateAvatar($request, $user);

        return back()->with('status', $response->content());
    }
}
