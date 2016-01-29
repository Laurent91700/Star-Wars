<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class picture extends Model
{
    protected $fillable = ['uri','size','title','type','product_id'];

    static function createpicture(Request $request, $id){
        //Php.ini limite le nombre d'octets pour une image téléchargée
        //$this->upload($request, $products);
        $img = $request->file('thumbnail');
        //extension de l'image
        $ext = $img->getClientOriginalExtension();

        //generation d'un nouveau nom aléatoirement
        $uri = str_random(12) . '.' . $ext;
        $img->move(env('UPLOAD_PATH', './uploads'), $uri);
        // exception renvoyé par le framework si problème donc le script s'arretera si le move ne se fait pas
        Picture::create([
            'uri' => $uri,
            // 'size' => $img->getSize(), => on peut l'utiliser en positionnant avant le move
            'size' => $img->getClientSize(),
            'type' => $ext,
            'product_id' => $id
        ]);
    }
}
