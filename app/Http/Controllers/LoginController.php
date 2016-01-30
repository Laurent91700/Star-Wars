<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;

class LoginController extends Controller
{
    public function __construct()
    {
        view::composer('partials.nav', function($view){
            $categories = Category::all();
            $view->with(compact('categories'));
        });

    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required',
                'remember' => 'in:true'
            ]);
            $remember = !empty($request->input('remember')) ? true : false;

            if(Auth::attempt([
                'email'=> $request->input('email'),
                'password' => $request->input('password')],
                $remember))
            {
                return redirect()->intended('product');
            }
            else {
                return back()->withInput($request->only('email', 'remember'))
                    ->with(['message' => trans('app.noAuth'), 'alert' => 'warning'
                    ]);
            }
        }
        else {
            return view('auth.login');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with(['message' => 'Vous êtes bien délogué', 'alert' => 'warning']);

    }

    public function registerCustomer(){
        return view('auth.registerCustomer');
    }
    public function saveCustomer(Request $request){
        $this->validate($request,[
            'address' => 'required|max:200',
            'number_card' => 'required|numeric',
        ]);
        $c = new Customer();
        $c->user_id = Auth::user()->id;
        $c->address = $request->address;
        $c->number_card = $request->number_card;
        $c->number_command = 0;
        $c->save();
        return redirect('commande')
            ->with(['message' => 'Votre inscription est complete', 'alert' => 'success']);
    }

    public function registerUser(){
        return view('auth.registerUser');
    }

    public function saveUser(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $parameters = $request->except(['password_confirmation','_token']);
        $u = new user;
        $u->name    = $parameters['name'];
        $u->email    = $parameters['email'];
        $u->password    = Hash::make($parameters['password']);
        $u->save();
        return redirect('/login') ->with(['message' => trans('app.login'), 'alert' => 'warning'
        ]);
    }

}
