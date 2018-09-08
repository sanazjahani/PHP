<?php
namespace App\Http\Controllers;
namespace App\Model;
use Illuminate\contracts\pagination;
use Illuminate\Support\Facades\Request;

class homeController
{
    public function getHome()
    {
        $product = Product::pagination(5);
        $cat = Cat::all();
        return view('home',['Product'=>$product,'Cat'=>$cat]);
    }
    public function postSearch()
    {
        $search_name = Request::input('search-name');
        $product = Product::where('title','LIKE','%'.$search_name.'%')->orwhere('description','LIKE','%'.$search_name.'%')->paginate(5);
        $cat = Cat::all();
        return view('search',['Product'=>$product,'Cat'=>$cat,'Search'=>$search_name]);
    }
    public function getPrice($id)
    {
        if($id == 1)
        {
            $product = Product::where('price','<',1000000)->paginate(5);
            $cat = Cat::all();
            return view('home',['Product'=>$product,'Cat'=>$cat]);
        }
        if($id == 2)
        {
            $product = Product::where('price','<',2000000)->paginate(5);
            $cat = Cat::all();
            return view('home',['Product'=>$product,'Cat'=>$cat]);
        }
        if($id == 3)
        {
            $product = Product::where('price','<',5000000)->paginate(5);
            $cat = Cat::all();
            return view('home',['Product'=>$product,'Cat'=>$cat]);
        }
    }
}