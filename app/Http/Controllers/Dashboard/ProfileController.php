<?php

namespace App\Http\Controllers\Dashboard;

use App\Utils;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return Response
     */
    public function showProfile()
    {
        return view('dashboard.profile.index');
    }

    /**
     * Edit the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        // $muser=new Users();
        $this->validate($request, [
            'nama' => 'required|min:3|max:255',
            'username' => 'required|max:255|unique:user,username,'.$user->iduser.',iduser',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $updateValues = [
            'nama' => $request->input('nama', $user->nama),
            'username' => $request->input('username', $user->username),
        ];
        $password = $request->input('password', null);
        if (!empty($password)) {
            $updateValues['password'] = Hash::make($password);
        }

        if ($user->update($updateValues)) {
            flash()->success('Profile updated successfully.');
        } else {
            flash()->info('Profile was not updated.');
        }

        return redirect(route('dashboard::profile'));
    }
}
