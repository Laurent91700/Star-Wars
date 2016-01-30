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
        view::composer('partials.nav', function($view){
            $categories = Category::all();
            $view->with(compact('categories'));
        });

    }
    public function index(Request $request){
        $products = Product::with('tags','category','picture')->online()->orderBy('published_at','desc')->paginate(5);

        if ($request->ajax()) {
            return response()->json(View::make('partials.listProduct', array('products' => $products))->render());
        }
        return view('front.index', compact('products'));
    }

    public function showProduct($id, $slug=''){
        $product = Product::findOrFail($id);
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
        $this->validate($request,[
            'email' => 'required|email',
            'content' => 'required|max:200'
        ]);

        $content = $request->input('content');
        Mail::send('emails.contact', compact('content'), function($m) use($request){
            $m->from($request->input('email'),'Client');
            $m->to(env('EMAIL_TECH'),'admin')->subject('Contact e-boutique');
        });

        return back()->with([
            'message' => trans('app.contactSuccess'),
            'alert' => 'success'
        ]);

    }

    public function mentions(){
        return view('front.mentions');
    }

}
