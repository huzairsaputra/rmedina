<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Files;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PersonalController extends Controller
{
    use Files;
    /**
     * Show the application profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.profile');
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->back()->withSuccess('Profil changed successfully.');
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|required_with:current_password|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'password_confirmation' => 'nullable|min:8|required_with:new_password|same:new_password'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return redirect()->back()->withErrors(['current_password'=>'Current password wrong.']);
            }
        }

        $user->save();

        return redirect()->back()->withSuccess('Password changed successfully.');
    }

    public function updateAvatar(Request $request){
        //foto sebelumnya
        $image_path = $this->fileStoragePath('path.avatar', Auth::user()->photo);
        if ($request->update_delete=='Save changes'){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            //hapus file sebelumnya
            $this->deleteFile($this->fileStoragePath('path.avatar', Auth::user()->photo));
            $filename = $this->randomFilename($request->photo, 'avatar');
            //store ke folder
            $request->photo->storeAs(config('path.avatar'), $filename);
            //update database
            Auth::user()->update(['photo'=>$filename]);
            return redirect()->back()->withSuccess('Photo changed successfully');
        }
        else{
            //hapus file
            $this->deleteFile($this->fileStoragePath('path.avatar', Auth::user()->photo));
            //update database
            Auth::user()->update(['photo'=>'']);
            return redirect()->back()->withSuccess('Photo deleted successfully');
        }
    }
}
