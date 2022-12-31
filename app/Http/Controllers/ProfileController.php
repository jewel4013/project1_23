<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function index()
    {
        return view('profile.index', [
            'user' => auth()->user(),
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    // oi bow. I love You tomar cheye o beshi.
    
    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    
    public function update()
    {
        
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => '',
            'profile_pic' => 'image|mimes:jpg,jpeg,png',
            'password' => request('password') ? 'required|string|min:6|confirmed' : '',
        ]);
        
        $user = auth()->user();

        $user->name = request('name');
        $user->date_of_birth = request('date_of_birth');
        if(request('password'))
        {
            $user->password = Hash::make(request('password'));
        }
        
        if(request()->hasFile('profile_pic'))
        {
            $ext = request()->file('profile_pic')->getClientOriginalExtension();
            $file_name = $user->id.'.'.$ext;
            request()->file('profile_pic')->move('images/profile', $file_name);

            $user->profile_pic = $file_name;
        }

        $user->save();


        return redirect('/profile')->with('successdismiss', 'Profile update success');
    }

    
    public function destroy($id)
    {
        //
    }
}
