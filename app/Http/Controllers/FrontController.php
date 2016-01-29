<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Tag;

use Illuminate\Support\Facades\Validator;
use View;
use Mail;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
class FrontController extends Controller
{
    public $total=0;
    public function __construct()
    {
        //le master est alimenté pour toutes les pages avec cette version
        view::composer('partials.nav', function($view){
            $categories = Category::all();
            $view->with(compact('categories'));
        });

    }
    public function index(Request $request){
        //le nom du scope est appellé en minuscule
        $products = Product::with('tags','category','picture')->online()->orderBy('published_at','desc')->paginate(5);
//        $products = Product::paginate(5);


        if ($request->ajax()) {
            return response()->json(View::make('partials.listProduct', array('products' => $products))->render());
        }
        return view('front.index', compact('products')); //['products'=> $products]
    }



    public function showProduct($id, $slug=''){
//        $product = Product::find($id);
        $product = Product::findOrFail($id); //si cela ne retroune rien alors on fait
        // la liaison sur la page 404.blade.php
//        try{
//            $product = Product::findOrFail($id);
//        } catch(\Exception $e)
//        {
////            dd($e->getMessage()); //var_dump customisé + die
//            return view('front.no_product');
//        }
//        var_dump($products);
        return view('front.product', compact('product'));
    }

    public function showProductByTag($id){
        $tag = Tag::findOrFail($id);
        $products = $tag->products;
        return view('front.tag', compact('products','product'));
    }

    public function showProductByCategory($id, $slug=''){
        $category = Category::findOrFail($id);
        $products = $category->products()->with('tags','category','picture')
            ->online()->orderBy('published_at','desc')->get();
        return view('front.category', compact('products'));
    }

    public function showContact(){
        return view('front.contact');
    }

    public function storeContact(Request $request){
//        $validator = Validator::make($request->all(),[
//                //pour specifier que le champ est obligatoire
//                // est que le champ email est sous le format d'un email
//                //on peut mettre autant de teste séparer par des |
//                'email' => 'required|email',
//                'content' => 'required|max:200'
//            ]);
//        //fails test si sa echou ou pas retourne true ou false
////        dd($validator->fails());
//        if($validator->fails())
//            return back()->withInput()->withErrors($validator);

        // equivalent à plus court
        $this->validate($request,[
            'email' => 'required|email',
            'content' => 'required|max:200'
        ]);
        //envoi d'un mail via maildev
        $content = $request->input('content');
        Mail::send('emails.contact', compact('content'), function($m) use($request){
            $m->from($request->input('email'),'Client');
            $m->to(env('EMAIL_TECH'),'admin')->subject('Contact e-boutique');
        });
        //        on peut faire aussi redirect('contact');
        // with: LARAVEL met tout dans l'objet SESSION laravel
        return back()->with([
            'message' => trans('app.contactSuccess'),
            'alert' => 'success' // css pour les différents alertes de nos messages
        ]);

    }

    public function mentions(){
        return view('front.mentions');
    }

}
