<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('account', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $user = User::find(Auth::id());
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->name=$request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->mobile=$request->mobile;
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
 

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function upload(Request $request)
    {
        $extension= $request->image->extension();
        $filename = time().".".$extension;
       
        $path = $request->image->storeAs(
            'avatars',
            $filename,
            'public'
        );
        
       
        $user = User::find(Auth::id());
        $user->photo_path = $path;
        $user->save();


        return Redirect::route('post-job');
    }
}
