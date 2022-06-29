<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $imagerequest)
    {
        $image_url = [];
        $images = $imagerequest->file('images');
        $user = $imagerequest->user()->name;
        if (! array_is_list($images)) {
            $image_name = time()."_".Str::random(10).".".$images->getClientOriginalExtension();
            $images->move('Images', $image_name);
            $image_url[] = env('APP_URL')."Images/".$image_name;
            Image::create([
                'image'=>env('APP_URL')."Images/".$image_name,
                'uploadedby' =>$user,
            ]);
        }
        foreach ($images as $image) {
            $image_name = time()."_".Str::random(10).".".$image->getClientOriginalExtension();
            $image->move('Images', $image_name);
            $image_url[] = env('APP_URL')."/Images/".$image_name;
            Image::create([
                'image'=>env('APP_URL')."/Images/".$image_name,
                'uploadedby' =>$user,
            ]);
        }
        return $image_url;
    }

    public function delete($filename)
    {
        $image_name = public_path('/Images/'.$filename);
        $image_url = env('APP_URL')."/Images/".$filename;
        $image = Image::where('image', $image_url)->first();
        if (!$image) {
            return ResponseController::error('Image not found');
        }
        $image->delete();
        File::delete($image_name);
        return ResponseController::success('Image successfuly deleted', 200);
    }

    public function allImages()
    {
        $images = Image::paginate(10);
        $final = [
        'last_page'=> $images->lastPage(),
        'images' => []
       ];
        foreach ($images as $image) {
            $final['images'][] = [
            'image'=>$image->image,
            'uploadedby' =>$image->uploadedby,
            'uploaded_at' =>$image->created_at
        ];
        }
        return ResponseController::data($final);
    }
}
