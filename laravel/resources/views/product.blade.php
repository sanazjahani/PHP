@extends('master')
@section('title', '')
@section('description', "{{$Product->description}}")
@section('keywords', "{{$Product->title}}")
@section('main')
    <div class="content-home" >
        <div class="container-fluid">
            <div class="col-sm-12">
                <h1 class="head">{{$Product->title}}</h1>
                <span class="desc">{{$Product->description}}</span><br><br>
                <span>قیمت : </span><span class="desc">{{$Product->price}}</span><br><br>
                <span>زیر دسته : </span><a href="{{url('/cat/'.$Product->subcat->id)}}">{{$Product->subcat->name}}</a><br><br>
                <button data="{{$Product->id}}" class="btn btn-danger add-to-basket"><img src="{{asset('assets/img/shop-basket.png')}}">افزودن به سبد خرید</button>
            </div>
            <div class="col-sm-1"></div>
        </div><br>
        <div class="container-fluid ">
            <div class="col-sm-6">
                <textarea placeholder="دیدگاهتان را بنویسید" class="form-control comment"></textarea><br>
                <button data="{{$Product->id}}" class="btn btn-wide btn-success send-comment">ارسال دیدگاه</button>
            </div>
        </div>
        <div class="container-fluid">
            <div style="direction: rtl;text-align: right" class="">
                <br>
                <h4 class="title"> دیدگاه ها</h4>
                @forelse($Comment as $comment)
                    <div id="combody" class="effect2">
                        <span id="comboxtitle">{{$comment->user->name}}<br><em style="margin-right:3px;font-size: 11px;font-family: 'Iransans', Tahoma, sans-serif">نوشت :</em></span>
                        <br><span  id="commtext">{{$comment->content}}</span><br><br>
                    </div><!---end combody-->
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('sidebar')
    <div class="content-home" >
        <div class="container-fluid">
            @forelse($Cat as $cat)
                <a href="{{url('/cat/'.$cat->id)}}" class="feed-item"><span class="glyphicon glyphicon-folder-close"></span>{{$cat->name}}</a><br>
                @forelse($cat->subcat as $sub)
                    <a href="{{url('/cat/'.$sub->id)}}" style="padding-right: 20px"><span class="glyphicon glyphicon-folder-open"></span>{{$sub->name}}</a><br>
                @empty
                @endforelse
            @empty
            @endforelse
        </div>
    </div>
@endsection