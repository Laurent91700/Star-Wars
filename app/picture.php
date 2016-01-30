<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class picture extends Model
{
    protected $fillable = ['uri','size','title','type','product_id'];

    static function createpicture(Request $request, $id){
        $img = $request->file('thumbnail');
        $ext = $img->getClientOriginalExtension();
        $uri = str_random(12) . '.' . $ext;
        $img->move(env('UPLOAD_PATH', './uploads'), $uri);
        Picture::create([
            'uri' => $uri,
            'size' => $img->getClientSize(),
            'type' => $ext,
            'product_id' => $id
        ]);
    }
}
