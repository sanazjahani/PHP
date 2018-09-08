<?php
namespace App\Http\Controllers;
use App\Models\Cat;
use App\Models\Code;
use App\Models\Comment;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Mockery\CountValidator\Exception;

class ProductController
{
    public function getEditProduct($id)
    {
        $product = Product::find($id);
        $cat = Cat::all();
        return view('edit-product',['Product'=>$product , 'Cat'=>cat]);
    }
    public function postEditProduct($id)
    {
        $product = Product::find($id);
        $product->title = Request::input('title');
        $product->price = Request::input('price');
        $product->description = Request::input('content');
        $product->cat_id = Request::input('cat');
        $product->save();
        return redirect(url('/panel/product'));
    }
    public function postDeleteProduct()
    {
        $product = Product::find(Request::input('id'));
        $product->delete();
        return 1;
    }
    public function getProducts()
    {
        $product = Product::paginate(4);
        return view('products',['Product'=>$product]);
    }
    public function getNewProduct()
    {
        $user = Auth::user();
        if($user->Privilege()->find(3)!= null)
        {
            $Cat =Cat::all();
            return view('new-product',['Cat'=>$Cat]);
        }
        else{
            return redirect(url('/panel'));
        }
    }
    public function postNewProduct()
    {
        $user = Auth::user();
        if($user->Privilege()->find(3)!= null)
        {
            try{
                $product = new Product();
                $product->title = Request::input('title');
                $product->price = Request::input('price');
                $product->description = Request::input('content');
                $product->cat_id = Request::input('cat');
                $product->save();
                return 1 ;
            }
            catch(Exception $e)
            {
                return 0 ;
            }
        }
        else{
            return redirect(url('/panel'));
        }
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        $cat = Cat::all();
        return view('product',['Product'=>$product,'Cat'=>$cat,'Comment'=>$product->Comment()->where('status','=',1)->get()]);
    }
    public function postNewComment()
    {
        $comment = new Comment();
        $comment->content = Request::input('comment');
        $comment->user_id = Auth::user()->id;
        $comment->product_id = Request::input('id');
        $comment->status = 0;
        $comment->save();
        return 1 ;
    }
    public function postAddBasket()
    {
        $stack = session('ids');
        array_push($stack, Request::input('id'));
        session(['ids'=>$stack]);
        return 1;
    }
    public function postAddress()
    {
        session(['address'=>Request::input('a')]);
        return 1;
    }
    public function getBasket()
    {
        $cat = Cat::all();
        return view('basket',['Cat'=>$cat]);
    }
    public function getSale($price)
    {
        try {
            $gateway = \Gateway::melat();
            $gateway->setCallback(url('/callback'));
            $gateway->price($price)->ready();
            $refId =  $gateway->refId();
            $transID = $gateway->transactionId();

            // Your code here

            return $gateway->redirect();

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }
}