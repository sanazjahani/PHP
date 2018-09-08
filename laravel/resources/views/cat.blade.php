@extends('master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'مدیریت دسته ها')
@section('main')
    <div class="container site-content">
        <div class="col-md-12">
            <div class="container-fluid" style="border-top: 1px solid #fff; border-bottom: 1px solid #fff; background-color:#f6f9fa;;">
                <div style="direction: rtl;text-align: right" class="">
                    <br>
                    <h4 class="title"> دسته ها</h4>
                    @forelse($Cat as $cat)
                        <div id="combody" class="effect2">
                            <span id="comboxtitle">{{$cat->name}}</span>
                            <div id="{{$cat->id}}">
                                <button data="{{$cat->id}}"  class="btn btn-danger delete-cat">حذف </button>
                                <a href="{{url('/panel/cat/'.$cat->id)}}"  class="btn btn-info ">ویرایش </a>
                                <br><br>
                            </div>
                        </div><!---end combody-->
                    @empty
                    @endforelse
                </div>
                {{$Cat->Links('vendor.pagination.custom')}}
            </div>
        </div>
    </div>
@endsection