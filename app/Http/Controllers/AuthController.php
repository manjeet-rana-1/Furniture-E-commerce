<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLoginForm(){
        return view('user.login');
    }
    public function showRegisterForm(){
        return view('user.registration');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only(['email', 'password']);
        if (!Auth::attempt($credentials)){
            return redirect()->back()->withErrors(['Invalid Credentials']);
        }
        if(Auth::check() && Auth::user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.home');
    }

    public function store(Request $request)
    {
        $request ->validate([
            'name'=> 'required|string|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'phone' => 'required|numeric',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> $request->password,
            'phone' => $request->phone,
        ]);
        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }














    // public function logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/login')->with('success', 'Logged out successfully.');
    // }


























































public function showImagesForm(){
    $images = images::all();
    return view('admin_dashboard.images_collection.images', compact('images'));
}
public function storeImages(Request $request){
    $request->validate([
        'images' => 'required|array',
        'images.*' => 'mimes:jpg,jpeg,png,gif,svg|max:2048',
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $imageName = time() . '_' . uniqid() . '.' . $file->extension();
            $file->move(public_path('img_collection'), $imageName);
            Images::create([
                'images' => 'img_collection/' . $imageName,
            ]);
        }
    }

    return back()->with('success', 'Images uploaded successfully.');

}

public function deleteImage($id){
    $images = Images::find($id);
    $images->delete();
    return redirect()->route('show.form')->with('Success', 'Category Deleted Successfully');
}
}
