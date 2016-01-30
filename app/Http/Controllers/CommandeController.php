<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Category;
use App\History;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\User;


class CommandeController extends Controller
{

    public function __construct()
    {
        view::composer('partials.nav', function($view){
            $categories = Category::all();
            $view->with(compact('categories'));
        });

    }

    public function cdeproduct(Request $request,$id)
    {
        if(Session::has('cde.prod'.$id))
        {
            $lineProduct = Session::get('cde.prod'.$id);
            $lineProduct[0]['quantity'] += $request->quantity;
            Session::put('cde.prod'.$id, $lineProduct);
        } else {
            $request->session()->push('cde.prod'.$id, [
                'id' => $id,
                'quantity' => $request->quantity
            ]);
        }
        return redirect('/')->with(['message' => 'article mis au panier', 'alert' => 'warning'

        ]);
    }

    public function majqte(Request $request){
        if(Session::has('cde.prod'.$request->id))
        {
            $total = 0;
            $id = $request->id;
            $quantity = $request->quantity;
            $product = Product::find($id);
            $lineProduct = Session::get('cde.prod'.$id);
            $lineProduct[0]['quantity'] = $quantity;
            Session::put('cde.prod'.$id, $lineProduct);
            foreach(Session::get('cde') as $pdts ){
                foreach($pdts as $pdt) {
                    $product = Product::find($pdt['id']);
                    $total += $product->price * $pdt['quantity'];
                }
            }
            return response()->json([ 'total' => $total, 'quantity' => $quantity, 'id' => $id]);
        }
    }

    public function showpanier(){
        $cde = array();
        $total = 0;
        foreach(Session::get('cde') as $pdts ){
            foreach($pdts as $pdt) {
                $product = Product::find($pdt['id']);
                $soustotal = $product->price * $pdt['quantity'];
                $cde[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'uri' => $product->picture->uri,
                    'price' => $product->price,
                    'quantity' => $pdt['quantity'],
                    'stock' => $product->quantity,
                    'soustotal' => $soustotal
                ];
                $total += $soustotal;
            }

        }

        return view('commande.panier',compact('cde', 'total'));
    }

    public function  deleteproduct($id)
    {
        Session::forget('cde.prod'.$id);
        if(sizeof(Session::get('cde'))==0){
            Session::forget('cde');
            return redirect('/');
        }else {
            return redirect('panier');
        }
    }


    public function cde(){
        $cde = array();
        $total = 0;
        foreach(Session::get('cde') as $pdts ){
            foreach($pdts as $pdt) {
                $product = Product::find($pdt['id']);
                $soustotal = $product->price * $pdt['quantity'];
                $cde[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'uri' => $product->picture->uri,
                    'price' => $product->price,
                    'quantity' => $pdt['quantity'],
                    'stock' => $product->quantity,
                    'soustotal' => $soustotal
                ];
                $total += $soustotal;
            }
        }

        return view('commande.commande',compact('cde', 'total'));
    }

    public function savecde(){
        $id = Auth::user()->id;
        if(User::find($id)->customer){
            $customer_id = User::find($id)->customer->id;
            $num_cde = History::orderBy('cde_id','desc')->first()->cde_id+1;
            foreach(Session::get('cde') as $pdts ){
                foreach($pdts as $pdt) {
                    $product = Product::find($pdt['id']);
                    $h = new History;
                    $h->product_id = $pdt['id'];
                    $h->customer_id = $customer_id;
                    $h->cde_id = $num_cde;
                    $h->price = $product->price;
                    $h->quantity = $pdt['quantity'];
                    $h->command_at = Carbon::now();
                    $h->status = 'finalized';
                    $h->save();
                    $product->quantity -=$pdt['quantity'];
                    $product->save();
                }
            }
            $customer = Customer::find($customer_id);
            $customer->number_command +=1;
            $customer->save();
            Session::forget('cde');
            return redirect('/')
                ->with(['message' => 'Votre commande a bien été validée sous le N° '.$num_cde, 'alert' => 'success']);
        } else {
            return redirect('/registerCustomer');
        }
    }

}
