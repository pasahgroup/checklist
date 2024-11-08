<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\answer;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userProfilePic = answer::first()->photo; // The path to the profile pic
      //  dd($userProfilePic);
            $path = $userProfilePic->storeAs('public/img/', $userProfilePic);
$imageData = Storage::disk('public')->get($userProfilePic);

         return view('image');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
         'image' => 'required',
         'image.*' => 'mimes:jpeg,jpg,gif,png'
     ]);

     $image = $request->file('image');
     $input['imagename'] = time().'.'.$image->extension();


     $destinationPath = public_path('/thumbnail');
     // dd('dd');
     // $img = Image::make($image->path());
     $img = ImageResize::make($image->path());
     dd('dd');
     $img->resize(100, 100, function ($constraint) {
         $constraint->aspectRatio();
     })->save($destinationPath.'/'.$input['imagename']);

     $destinationPath = public_path('/image');
     $image->move($destinationPath, $input['imagename']);

Image::create(['image' => $input['imagename'], 'thumbnail' => $input['imagename']]);

     return back()
         ->with('success','Successfully Save Your Image file')
         ->with('imageName',$input['imagename']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
