<?php

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
        Route::any('/login',
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

