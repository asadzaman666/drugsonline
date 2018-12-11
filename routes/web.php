<?php

//landing page
//Route::get('/', 'DefaultController@index')->name('default.index');
Route::get('/', 'DefaultController@index')->name('default.index');

//about
Route::get('/about', 'DefaultController@about')->name('about');

//user Home
Route::get('/home', 'HomeController@index')->name('home.index')->middleware('loginCheck');

//signup
Route::get('/signup', 'UserController@create')->name('user.create');
Route::post('/signup', 'UserController@store')->name('user.store');

//signin | signout
Route::get('/signin', 'LoginController@index')->name('login.index');
Route::post('/signin', 'LoginController@home')->name('login.home');
Route::get('/signout', 'LogoutController@index')->name('logout.index')->middleware('loginCheck');

//product
Route::get('/medicine/{medicine}', 'MedicineController@show')->name('medicine.show');

//shopping cart
Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::get('/empty', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/update/{rowId}', 'CartController@updateQty')->name('cart.updateQty');

//order-store
Route::post('/checkout', 'OrderController@store')->name('order.store');

//search result
Route::get('/search', 'HomeController@searchResult')->name('searchResult');

//medicine by category
Route::get('/{id}/medicines', 'MedicineController@medByCat')->name('medicine.medByCat');

//thankyou
Route::get('/thankyou', 'HomeController@thankyou')->name('thankyou');

//user check w/ middleware
Route::group(['middleware' => ['checkUser']], function(){

    //coupon reedem
    Route::post('/coupon', 'OrderController@coupon')->name('order.coupon');
    //cancel order
    Route::delete('orders/{id}/delete', 'OrderController@destroy')->name('order.destroy');

    //check profile ownership w/ middleware
    Route::group(['middleware' => ['profileOwnership']], function(){

        //user CRUD
        Route::get('/user/{id}', 'UserController@show')->name('user.show');
        Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
        Route::put('/user/{id}/update', 'UserController@update')->name('user.update');
        Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');

        //order-show(user)
        Route::get('/{id}/orders', 'OrderController@show')->name('order.show');
        //order filter (user)
        Route::post('/{id}/orders/filter', 'OrderController@filter')->name('order.filter');
    });

});

//admin check w/ middleware
Route::group(['middleware' => ['checkAdmin']], function() {

    //admin profile & update
    Route::get('/admin/{id}/edit', 'UserController@edit')->name('user.edit')->middleware('profileOwnership');
    Route::put('/admin/{id}/update', 'UserController@adminUpdate')->name('user.adminUpdate');

    //admin-addproduct & category
    Route::get('/addmedicine', 'MedicineController@create')->name('medicine.create');
    Route::post('/addmedicine', 'MedicineController@store')->name('medicine.store');
    Route::post('/addcategory', 'CategoryController@store')->name('category.store');
    Route::get('/adminsearch', 'MedicineController@edit')->name('medicine.edit');

    //admin-display-resource
    Route::get('/medicines', 'MedicineController@showAll')->name('medicine.showAll');
    Route::get('/categories', 'CategoryController@show')->name('category.show');

    //order-show/update(admin)
    Route::get('/orders', 'OrderController@index')->name('order.index');
    Route::put('/order/{id}/status', 'OrderController@update')->name('order.update');

    //admin orders filter by status
    Route::post('/orders/filter', 'OrderController@filterOrder')->name('order.filterOrder');

    //admin med-cat destroy & update
    Route::delete('/category/{id}', 'CategoryController@destroy')->name('category.destroy');
    Route::delete('/medicine/{id}', 'MedicineController@destroy')->name('medicine.destroy');
    Route::put('/category/{id}', 'CategoryController@update')->name('category.update');
    Route::put('/medicine/{id}', 'MedicineController@update')->name('medicine.update');
    Route::get('/medicine/update/{id}', 'MedicineController@updateForm')->name('medicine.update.form');

});


//dummy
Route::get( '/test/{index}', 'HomeController@test' )->name ( 'test' );
//Route::get('/mail', 'OrderController@dummy')->name('dummy');
