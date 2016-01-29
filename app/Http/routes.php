<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*Route::get('/', function () {
    return view('home');
//    return view('welcome');
});*/


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::pattern('id','[1-9][0-9]*');
Route::pattern('slug', '[a-z_-]+');



Route::group(['middleware' => ['web']], function() {

    Route::get('/',
        ['as' => 'FrontController',
            'uses' => 'FrontController@index'
        ]);

    Route::get('/Prod/{id}/{slug?}',
        ['as' => 'Product',
            'uses' => 'FrontController@showProduct'
        ]);
    Route::get('/Tag/{id}',
        ['as' => 'Tag',
            'uses' => 'FrontController@showProductByTag'
        ]);
    Route::get('/cat/{id}/{slug?}',

        ['as' => 'category',
            'uses' => 'FrontController@showProductByCategory'
        ]);

    Route::get('/contact',
        ['as' => 'contact_home',
        'uses' => 'FrontController@showContact'
        ]);
    Route::post('storeContact',
        ['as' => 'contact',
        'uses' => 'FrontController@storeContact'
        ]);

    Route::get('/logout',
        ['as' => 'logout',
            'uses' => 'LoginController@logout'
        ]);

    Route::get('/registerUser',
        [ 'as' => 'registerUser',
            'uses' => 'LoginController@registerUser'
        ]);
    Route::post('/saveuser',
        ['as'   => 'saveuser',
            'uses'  =>  'LoginController@saveUser'
        ]);
    Route::get('/mentions',
        ['as'   => 'mentions',
            'uses'  =>  'FrontController@mentions'
        ]);
    Route::group(['middleware' => ['throttle:20,1']], function () {
        //20 tentatives dans 1 minute
        Route::any('/login', // fait get et post
            [ 'as' => 'login',
            'uses' => 'LoginController@login'
            ]);
    });

    Route::post('/cde/{id}',
        ['as'   => 'cdeproduct',
            'uses'  =>  'CommandeController@cdeproduct'
        ]);

    Route::get('/panier',
        ['as' => 'showpanier',
        'uses' => 'CommandeController@showpanier'
        ]);
    Route::get('/panier/{id}',
        ['as' => 'deleteproduct',
            'uses' => 'CommandeController@deleteproduct'
        ]);
    Route::POST('/majqte',
        ['as'   => 'majqte',
            'uses'  =>  'CommandeController@majqte'
        ]);

    Route::group(['middleware' => ['auth','admin']], function(){
        Route::resource('product','ProductController');

        Route::get('product/status/{id}',
            ['as' => 'changestatus',
            'uses' => 'ProductController@changestatus'
            ]);
        Route::get('product/destroy/{id}',
            ['as' => 'destroy',
                'uses' => 'ProductController@destroy'
            ]);
        Route::get('/history',
            ['as' => 'history',
                'uses' => 'DashboardController@showHistory'
            ]);

    });
    Route::group(['middleware' => 'auth'], function(){
        Route::post('/registerCustomer',
            ['as' => 'registerCustomer',
            'uses' => 'LoginController@registerCustomer'
            ]);

        Route::post('/saveCustomer',
            ['as' => 'saveCustomer',
            'uses' => 'LoginController@saveCustomer'
            ]);

        Route::get('/commande',
            ['as' => 'commande',
                'uses' => 'CommandeController@cde'
            ]);

        Route::get('/savecde',
            ['as' => 'savecde',
                'uses' => 'CommandeController@savecde'
            ]);
    });
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
