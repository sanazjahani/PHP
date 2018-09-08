@extends('master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'مدیریت محصولات ')
@section('main')
    <div class="container site-content">
        <div class="col-md-12">
            <div class="container-fluid" style="border-top: 1px solid #fff; border-bottom: 1px solid #fff; background-color:#f6f9fa;;">
                <div style="direction: rtl;text-align: right" class="">
                    <br>
                    <h4 class="title">محصولات</h4>
                    @forelse($Product as $product)
                        <div id="combody" class="effect2">
                            <span style="font-size: 18px" id="comboxtitle">{{$product->title}}</span><br>
                            <span id="comboxtitle">{{$product->description}}</span><br>
                            <span>قیمت : </span><span id="comboxtitle">{{$product->price}}</span><br>
                            <span>دسته :</span><span id="comboxtitle">{{$product->subcat->name}}</span><br><br>
                            <div id="{{$product->id}}">
                                <button data="{{$product->id}}"  class="btn btn-danger delete-product">حذف </button>
                                <a href="{{url('/panel/product/'.$product->id)}}"  class="btn btn-info ">ویرایش </a>
                                <br><br>
                            </div>
                        </div><!---end combody-->
                    @empty
                    @endforelse
                </div>
                {{$Product->Links('vendor.pagination.custom')}}
            </div>
        </div>
    </div>
@endsection