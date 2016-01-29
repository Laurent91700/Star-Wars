<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use App\picture;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
       return view('admin.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('name', 'id');
        return view('admin.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->file('thumbnail'));
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'published_at' => 'date_format:d/m/Y',
            'thumbnail'     => 'image|max:3000', //300Mo
            'tags[]'  => 'max:4'
        ]);

//        dd($request->all());
        $products = Product::create($request->all());
        if (!empty($request->input('tags')))
            $products->tags()->attach($request->tags); //equivalent à $request->input('tags')

        if(!is_null($request->file('thumbnail'))) {
            //function test image
            Picture::createpicture($request, $products->id);
        }

        return redirect('/product')->with(['message' => 'Product inserted', 'alert' => 'success']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('name', 'id');
//        dd($product);
        return view('admin.edit', compact('product','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'published_at' => 'date_format:d/m/Y',
            'thumbnail'     => 'image|max:3000', //300Mo
            'tags' => 'max:4'
        ]);

        $product = Product::find($id);
        if(!empty($request->input('tags')))
        {
//            $product->tags()->detach();     detach les tags
//            $product-tags()->attach($request->input('tags'));  attach les tags
            $product->tags()->sync($request->input('tags')); // detach et attach
        } else{
            $product->tags()->detach();
        }

        if($request->input('delete')=='true')
        {
            if(!is_null($product->picture->uri))
            {
                Storage::delete($product->picture->uri);
                $product->picture->delete();
            }
        }

        if(!is_null($request->file('thumbnail'))) {
            Storage::delete($product->picture->uri);
            $product->picture->delete();
            //function test image 2eme
            Picture::createpicture($request, $product->id);
        }

        $product->update($request->all());
        return redirect('product')->with(['message' => 'Product Updated', 'alert' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $product = Product::find($id);
        $picture = $product->picture;
        if(!is_null($picture))
        {
            Storage::delete($picture->uri);// Storage de laravel voir config/filesystems.php
            $picture->delete();
        }
        $product->delete(); // delete from products where id=11
        //identique à Product::destroy($id);

        return redirect('/product')->with(['message' => 'Product deleted','alert' => 'success']);
    }


    public function changestatus($id){
        $product = Product::find($id);
        $product->status = ($product->status=='opened') ? 'closed' : 'opened';
        $product->save();
        return redirect('/product')->with(['message' => 'Status changed','alert' => 'success']);
    }

}
