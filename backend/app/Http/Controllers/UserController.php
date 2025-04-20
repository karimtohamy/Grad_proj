<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $image = $request->file('profile_image');
        $image->store('public/profile-images');
        $filename = $image->hashName();
        Image::create([
            'user_id' => Auth::id(),
            'image_path' => $filename
        ]);

        return response()->json(['filename' => $filename]);
    }

}
