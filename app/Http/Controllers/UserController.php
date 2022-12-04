<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\User;
use App\Enums\Gender;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('pages.user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'person_name', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'username' => ['required', 'string', 'username', 'min:8', 'max:20', Rule::unique(User::class)->ignore($user->id)],
            'gender' => ['required', 'string', new Enum(Gender::class)],
            'password' => ['sometimes', 'exclude_if:password,null', 'confirmed', Rules\Password::defaults()],
            'role' => ['sometimes', 'string', new Enum(Role::class)],
        ], [], [
            'email' => 'alamat email',
            'role' => 'jabatan',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return Redirect::route('user.show', $user->username)->with('alert', [
            'success' => true,
            'message' => "User $user->name berhasil diperbarui",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::route('user.index')->with('alert', [
            'success' => true,
            'message' => "User <b>$user->name</b> berhasil dihapus",
        ]);
    }
}
