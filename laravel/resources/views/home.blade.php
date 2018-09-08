@extends('master')
@section('title', 'خانه')
@section('description', 'فروشگاه آنلاین,خرید محصول')
@section('keywords', 'فروشگاه آنلاین,خرید محصول')
@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
@endsection
@section('main')
    <div class="content-home" >
        <h1 class="head">محصولات</h1>
        <div class="container-fluid">
            <span>فیلتر قیمت</span>
            <select onchange="location = this.value ;"  id="subcat" name="subcat" data-placeholder="فیلتر قیمت" class="chosen chosen-rtl"  style="width:600px;direction: ltr">
                <option  style=""  value="">همه محصولات</option>
                <option value="{{url('/1')}}">100هزار تومان</option>
                <option value="{{url('/2')}}">200هزار تومان</option>
                <option value="{{url('/3')}}">500هزار تومان</option>
            </select><br><br>
        </div>
        <div class="container-fluid">
            @forelse($Product as $product)
                <div class="col-sm-5  product-box">
                    <h2 class="title">{{$product->title}}</h2>
                    <span class="desc">{{$product->description}}</span>...<br><br>
                    <span>قیمت : </span><span class="desc">{{$product->price}}</span><br><br>
                    <span>زیر دسته : </span><a href="{{url('/subcat/'.$product->subcat->id)}}">{{$product->subcat->name}}</a><br><br>
                    <a href="{{url('/product/'.$product->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-link"></span>جزییات کامل</a>
                    <a class="btn btn-danger"><img src="{{asset('assets/img/shop-basket.png')}}">افزودن به سبد خرید</a>
                </div>
                <div class="col-sm-1"></div>
                @empty
            @endforelse
        </div>
        {{$Product->Links('vendor.pagination.custom')}}
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