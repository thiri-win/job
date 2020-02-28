<?php

namespace App\Http\Controllers;

use App\Resume;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
	public function index()
	{
		return view('user.index',[
			'users' => User::all(),
		]);
	}
    public function show(User $user)
    {
    	return view('user.show', [
    		'user' => $user
    	]);
    }

    public function edit(User $user)
    {
    	return view('auth.register', [
    		'user' => $user,
    	]);
    }

    public function update(StoreUser $request, User $user)
    {
        // dd($request->all());

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'user_type' => $request->user_type,
            'experience' => $request->experience,
            'bio' => $request->bio,
            'cover_letter' => $request->cover_letter,
        ]);

        if( request()->hasFile('avatar') ) {
            $user->update([
                'avatar' => $request->avatar->store('avatar', 'public'),
            ]);
        }

        if( request()->hasFile('file_name') ) {
            $resume = $request->file('file_name')->store('resume');
            Resume::create([
                'file_name' => $resume,
                'user_id' => $user->id,
            ]);
        }

        return redirect(route('job.index'))->with('success', 'Your Profile Updated Successfully');
    }
}
