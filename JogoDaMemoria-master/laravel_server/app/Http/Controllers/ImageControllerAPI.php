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

    public function getImage($id)
    {
        return new ImageResource(Image::find($id));
    }
    /*
    public function store(Request $request)
    {
        $request->validate([
                'face' => 'required | regex:(tile,hidden)',
                'active' => 'number | max: ',
                'path' => 'required',
                
            ]);
        $imagem = new Image();
        $Image->fill($request->all());
       
        $Image->save();
        return response()->json(new ImageResource($Image), 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
               'face' => 'required | regex:(tile,hidden)',
                'active' => 'number | max: ',
                'path' => 'required',
            ]);
        $image = Image::findOrFail($id);
        $image->update($request->all());
        return new ImageResource($image);
    }*/

    public function delete($id)
    {
        
        $image = Image::findOrFail($id);
        
        $image->delete();
        return response()->json(null, 204);
    }
}
