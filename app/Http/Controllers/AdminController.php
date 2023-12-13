<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function login(){
        return view('admin.admin_login');
    }


    public function profile(){
        return view('admin.profile.profile');
    }

    public function update(UserRequest $request){

        $id = Auth::user()->id;


        if($request->file('photo')){
            $user = Auth::user()->photo;
            if(File::exists(public_path('uploads/admin/profile/').$user)){
                File::delete(public_path('uploads/admin/profile/').$user);
            }
            $file = $request->photo;
            $fileName = hexdec(uniqid()).$file->getClientOriginalName();
            $file->move(public_path('uploads/admin/profile/'),$fileName);

        }
        else{
            $fileName = Auth::user()->photo;
        }
        User::findOrFail($id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'photo' => $fileName
        ]);
        toastr()->addSuccess('Your Profile Updated Successfully');
        return redirect()->back();
    }



    // Password


    public function changePassword(){
        return view('admin.profile.change_password');
    }

    // Update Password

    public function updatePassword(UserPasswordRequest $request){
        Log::info('Updating password...');
        $id = Auth::user()->id;

        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::findOrFail($id)->update([
                'password' => Hash::make($request->password),
            ]);

            toastr()->addSuccess('Congratulations! Your password was changed successfully');
            return redirect()->back();
        }

        toastr()->addError('Old password does not match with our records');
        return redirect()->back();

    }
}
