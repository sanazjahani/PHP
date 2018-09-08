@extends('master')
@section('title', 'خانه')
@section('description', 'فروشگاه آنلاین,خرید محصول')
@section('keywords', 'فروشگاه آنلاین,خرید محصول')
@section('scripts')
@endsection
@section('main')
    <div class="content-home" >
        <h1 class="head">خرید های شما</h1>
        <div class="container-fluid">
            <?php $Price = 0;?>
            @forelse(session('ids') as $product)
                <div class="col-sm-5  product-box">
                    <h2 class="title"><?php  $p = \App\Models\Product::find($product); echo $p->title ?></h2>

                        </span><br><br>
                </div>
                <div class="col-sm-1"></div>
            @empty
            @endforelse<br>
        </div>
        <div class="container-fluid">
            <h1 class="head">جمع کل : {{$Price}} ریال</h1>
            <textarea placeholder="اطلاعات پستی" cols="40" rows="5" class="address"></textarea><br><br>
            <a class="sale btn btn-default">تایید آدرس </a><br><br>
                <input type="submit"  class="btn btn-wide btn-success " value="پرداخت">
            </form><br>
        </div>
    </div>
@endsection
@section('sidebar')
    <div class="content-home" >
        <div class="container-fluid">
            @forelse($Cat as $cat)
                <a href="{{url('/cat/'.$cat->id)}}" class="feed-item"><span class="glyphicon glyphicon-folder-close"></span>{{$cat->name}}</a><br>
                @forelse($cat->subcat as $sub)
                    <a href="{{url('/subcat/'.$sub->id)}}" style="padding-right: 20px"><span class="glyphicon glyphicon-folder-open"></span>{{$sub->name}}</a><br>
                @empty
                @endforelse
            @empty
            @endforelse
        </div>
    </div>
@endsection
