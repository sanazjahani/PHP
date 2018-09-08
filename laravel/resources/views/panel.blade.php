@extends('master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection
@section('title', 'صفحه مدیریت')
@section('main')
    <div class="container site-content">
        <div class="col-md-11">
            @if(Auth::user()->Privilege()->find(1) != null)
            <div class="row">
                <a>مدیریت مدیران : </a>
                <a href="{{url('/panel/new-manager')}}" class="btn btn-default">افزودن مدیر جدید</a>
            </div><br>
            @endif
            @if(Auth::user()->Privilege()->find(3) != null)
                <div class="row">
                <a>مدیریت محصولات : </a>
                <a href="{{url('/panel/new-product')}}" class="btn btn-default">افزودن محصول جدید</a>
                <a href="{{url('/panel/product')}}" class="btn btn-default">مدیریت محصولات</a>
                </div><br>
            @endif
            @if(Auth::user()->Privilege()->find(2) != null)
                <div class="row">
                <a>مدیریت دیدگاه ها : </a>
                <a href="{{url('/panel/comment')}}" class="btn btn-default">مدیریت دیدگاه ها</a>
                </div><br>
            @endif
            <div class="row">
                <a>سفارشات :</a>
                <a href="{{url('/panel/order')}}" class="btn btn-default">مدیریت سفارشات</a>
            </div><br>
        </div>
    </div>
@endsection