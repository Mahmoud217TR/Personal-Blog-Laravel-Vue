<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getValidData(){
        return request()->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,'.auth()->id(),
            'image' => 'nullable|image',
        ]);
    }

    public function edit(){
        $user = auth()->user();
        return view('profile',compact('user'));
    }

    public function update(){
        $data = $this->getValidData();
        
        if ($data['image']){
            $image = $data['image']->store('uploads','public');
            $img = Image::make('storage/'.$image);
            $img->fit(300, 300)->save();
            $image = '/storage/'. $image;
            auth()->user()->update(compact('image'));
        }

        auth()->user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return redirect()->route('profile');
    }
}
