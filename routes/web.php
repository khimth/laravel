<?php

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    use App\Category;

    Route::get('/', [
      'uses' => 'FrontendController@index',
      'as' => 'index',
    ]);

    Route::get('post/{slug}', [
      'uses' => 'FrontendController@singlePost',
      'as' => 'single.post',
    ]);

    Route::get('category/{id}', [
      'uses' => 'FrontendController@getCategory',
      'as' => 'category.single',
    ]);

    Route::get('/shop', [
      'uses' => 'ShopController@index',
      'as' => 'index',
    ]);

    Route::get('/product/details/{id}', [
        'uses' => 'ShopController@productDetails',
        'as' => 'product.single'
    ]);

    Route::post('cart/add', [
        'uses' => 'ShopController@addToCart',
        'as' => 'cart.add'
    ]);

    Route::get('cart', [
        'uses' => 'ShopController@cart',
        'as' => 'cart'
    ]);

    Route::get('cart/delete/{id}', [
      'uses' => 'ShopController@deleteCartItem',
      'as' => 'cart.delete'
    ]);

    Route::get('cart/increment/{id}', [
      'uses' => 'ShopController@itemIncrement',
      'as' => 'cart.increment'
    ]);

    Route::get('cart/decrement/{id}', [
      'uses' => 'ShopController@itemDecrement',
      'as' => 'cart.decrement'
    ]);

    Route::get('/checkout', [
        'uses' => 'ShopController@checkout',
        'as' => 'checkout'
    ]);
    Route::post('/cart/checkout', [
      'uses' => 'ShopController@pay',
      'as' => 'cart.checkout'
    ]);
    Route::get('results', function () {
        $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')
          ->get();
        return view('results')->with(
          [
            'posts' => $posts,
            'site_name' => \App\Setting::first()->site_name,
            'title' => 'Search Result : ' . request('query'),
            'contact_email' => \App\Setting::first()->contact_email,
            'contact_phone' => \App\Setting::first()->contact_number,
            'address' => \App\Setting::first()->address,
            'query' => request('query'),
            'categories' => Category::take(5)->get(),

          ]
        );
    });

    Auth::routes();

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('/home', [
          'uses' => 'HomeController@index',
          'as' => 'home',
        ]);

        Route::get('/post/create', [
          'uses' => 'PostController@create',
          'as' => 'post.create',
        ]);

        Route::get('/posts', [
          'uses' => 'PostController@index',
          'as' => 'posts',
        ]);

        Route::post('/post/store', [
          'uses' => 'PostController@store',
          'as' => 'post.store',
        ]);

        Route::get('/post/edit/{id}', [
          'uses' => 'PostController@edit',
          'as' => 'post.edit',
        ]);

        Route::post('/post/update/{id}', [
          'uses' => 'PostController@update',
          'as' => 'post.update',
        ]);

        Route::get('/post/trashed', [
          'uses' => 'PostController@trashed',
          'as' => 'trashed',
        ]);

        Route::get('/post/trash/{id}', [
          'uses' => 'PostController@destroy',
          'as' => 'post.trash',
        ]);

        Route::get('/post/restore/{id}', [
          'uses' => 'PostController@restore',
          'as' => 'post.restore',
        ]);

        Route::get('/post/delete/{id}', [
          'uses' => 'PostController@delete',
          'as' => 'post.delete',
        ]);

        Route::get('/categories/create', [
          'uses' => 'CategoriesController@create',
          'as' => 'categories.create',
        ]);

        Route::post('/categories/store', [
          'uses' => 'CategoriesController@store',
          'as' => 'categories.store',
        ]);

        Route::get('/categories', [
          'uses' => 'CategoriesController@index',
          'as' => 'categories',
        ]);

        Route::get('/categories/edit/{id}', [
          'uses' => 'CategoriesController@edit',
          'as' => 'categories.edit',
        ]);

        Route::get('/categories/delete/{id}', [
          'uses' => 'CategoriesController@destroy',
          'as' => 'categories.delete',
        ]);

        Route::post('/categories/update/{id}', [
          'uses' => 'CategoriesController@update',
          'as' => 'categories.update',
        ]);

        Route::get('/products/create', [
          'uses' => 'ProductsController@create',
          'as' => 'products.create',
        ]);

        Route::post('/products/store', [
          'uses' => 'ProductsController@store',
          'as' => 'products.store',
        ]);

        Route::get('/products', [
          'uses' => 'ProductsController@index',
          'as' => 'products',
        ]);

        Route::get('/products/edit/{id}', [
          'uses' => 'ProductsController@edit',
          'as' => 'products.edit',
        ]);

        Route::get('/products/delete/{id}', [
          'uses' => 'ProductsController@destroy',
          'as' => 'products.delete',
        ]);

        Route::post('/products/update/{id}', [
          'uses' => 'ProductsController@update',
          'as' => 'products.update',
        ]);

        Route::get('/users', [
          'uses' => 'UsersController@index',
          'as' => 'users',
        ]);

        Route::get('/users/create', [
          'uses' => 'UsersController@create',
          'as' => 'users.create',
        ]);

        Route::post('/users/store', [
          'uses' => 'UsersController@store',
          'as' => 'users.store',
        ]);

        Route::get('/user/makeadmin/{id}', [
          'uses' => 'UsersController@makeadmin',
          'as' => 'user.makeadmin',
        ]);

        Route::get('/user/normaluser/{id}', [
          'uses' => 'UsersController@normaluser',
          'as' => 'user.normaluser',
        ]);

        Route::get('/user/profile', [
          'uses' => 'ProfileController@index',
          'as' => 'user.profile',
        ]);

        Route::post('/users/profile/update', [
          'uses' => 'ProfileController@update',
          'as' => 'users.profile.update',
        ]);

        Route::get('/settings', [
          'uses' => 'SettingsController@index',
          'as' => 'settings',
        ]);

        Route::post('/settings/update', [
          'uses' => 'SettingsController@update',
          'as' => 'settings.update',
        ]);
    });

