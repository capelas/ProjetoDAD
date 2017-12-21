<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource as ImageResource;
use App\Image;

class ImageControllerAPI extends Controller
{
    public function getAllImage(Request $request) {
        if ($request->has('page')) {
            return ImageResource::collection(Image::paginate(5));
        } else {
            return ImageResource::collection(Image::all());
        }
    }
}
