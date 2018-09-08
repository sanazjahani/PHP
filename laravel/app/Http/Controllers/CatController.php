<?php
namespace App\Http\Controllers;
use App\Models\Cat;
use App\Models\Product;
use App\Models\Subcat;
use Illuminate\Support\Facades\Request;

class CatController
{
    public function postDeleteCat()
    {
        $cat = Cat::find(Request::input('id'));
        $cat->delete();
        return 1;
    }

    public function getEditCat($id)
    {
        $cat = Cat::find($id);
        return view('edit-cat', ['Cat' => $cat]);
    }

    public function postEditCat($id)
    {
        $cat = Cat::find($id);
        $cat->name = Request::input('name');
        $cat->save();
        return redirect(url('/panel/cat'));
    }

    public function getCats()
    {
        $cat = Cat::where('name', 'like', '')->paginate(5);
        return view('cat', ['Cat' => $cat]);
    }

    public function getCat($id)
    {
        $sub = Cat::find($id)->Subcat()->get();
        $product = null;
        foreach ($sub as $s) {
            $v = $s->Product()->get();
            $product = $v->merge($v);
        }
        $cat = Cat::all();
        return view('cat-home', ['Product' => $product, 'Cat' => $cat]);
    }
}
