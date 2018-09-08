<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware'=>'auth'],function (){
    Route::get('/','homeController@getHome');
    Route::get('/', function () {
        session(['a'=>'webshop']);
        return view('welcome',['a'=>session('a')]);
    });
    Route::post('/search','homeController@postSearch');
    Route::get('/home', function () {
        return view('Home');
        Route::get('/panel','UserController@getPrivilege');
        Route::get('/panel/new-manager','UserController@getNewManager');
        Route::get('/panel/new-product','ProductController@getNewProduct');
        Route::post('/panel/new-product/posted','ProductController@postNewProduct');
        Route::get('/panel/new-cat','CatController@getNewCat');
        Route::post('/panel/new-cat','CatController@postNewCat');
        Route::post('/panel/new-subcat','CatController@postNewSubcat');
        Route::get('/panel/new-product','ProductController@getNewProduct');



    });
    Route::get('/product/{id}','ProductController@getProduct');
    Route::get('/cat/{id}','CatController@getCat');
    Route::get('/subcat/{id}','CatController@getSubcat');
    Route::post('/product/new-comment','ProductController@postNewComment');
    Route::get(url('/panel'),'app\Http\Controllers\UserControllers@getPrivilege');
    Route::get('/panel/comment','CommentController@getComment');
    Route::post('/panel/comment/submit','CommentController@postSubmitComment');
    Route::post('/panel/comment/delete','CommentController@postDeleteComment');
    Route::get('/basket','ProductController@getBasket');
    Route::post('/product/add-basket','ProductController@postAddBasket');
    Route::post('/buy','ProductController@postBuy');
    Route::get('/panel/order','CommentController@getOrder');
    Route::post('/panel/order/submit','CommentController@postSubmitOrder');
    Route::get('/panel/cat/{id}','CatController@getEditCat');
    Route::post('/panel/cat/{id}','CatController@postEditCat');
    Route::get('/panel/cat','CatController@getCats');
    Route::post('/panel/cat/delete','CatController@postDeleteCat');
    Route::get('/panel/product','ProductController@getProducts');
    Route::get('/panel/product/{id}','ProductController@getEditProduct');
    Route::post('/panel/product/{id}','ProductController@postEditProduct');
    Route::post('/panel/product/delete','ProductController@postDeleteProduct');

});
Route::group([],function () {

    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::post('/login', 'auth\LoginControllerlogin');
    Route::get('login', 'auth\LoginController@logout');
    Route::group([], function () {
        Route::get('/login', function () {
            if (Auth::user() != null) {
                return redirect(url('/'));
            }
            return view('auth.sign-in');

        });
        Route::post('/login', 'Auth\LoginController@login');
        Route::get('/register', function () {
            if (Auth::user() != null) {
                return redirect(url('/'));
            }
            return view('auth.sign-up');

        });
        Route::post('/register', 'Auth\RegisterController@postRegister');
        Route::get('/register-done', function () {
            return view('auth.sign-up-done');
        });

    });
    Route::get('/request/{price}','ProductController@getSale');
    Route::get('/request', function () {
        try {

            $gateway = \Gateway::make(new \Mellat());

            $gateway->setCallback(url('/callback/route'));
            $gateway
                ->price(1000)
                // setShipmentPrice(10) // optional - just for paypal
                // setProductName("My Product") // optional - just for paypal
                ->ready();

            $refId = $gateway->refId();
            $transID = $gateway->transactionId();


            return $gateway->redirect();

        } catch (\Exception $e) {

            echo $e->getMessage();
        }


    });
    Route::any('/callback', function () {

        try {

            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();
            return redirect('../done');


        } catch (\Larabookir\Gateway\Exceptions\RetryException $e) {

            echo $e->getMessage() . "<br>";

        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    });

    Route::get('/done', function () {
        return view('done');
    });});
Route::any('/callback',function(){
    try {
        $gateway = \Gateway::verify();
        $trackingCode = $gateway->trackingCode();
        $refId = $gateway->refId();
        $cardNumber = $gateway->cardNumber();
        $order = new \App\Models\Order();
        $order->address = session('address');
        $order->products = implode(",",session('ids'));
        $order->save();
        session(['address'=>""]);
        session(['ids'=>array()]);
        // Your code here
        return redirect('done');
    } catch (Exception $e) {

        echo $e->getMessage();
    }
});



