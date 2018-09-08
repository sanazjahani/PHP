@extends('master')

@section('title', 'محصول جدید')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main')
    <div style="margin-top: 30px" class="col-md-10  col-md-offset-2 col-xs-10 col-xs-offset-2">
        <br>
        <input class="edit" name="title" id="title" size="80" placeholder="عنوان محصول(بیش از ده حرف و کمتر از 60 حرف)"/>
        <input class="edit" name="price" id="price" size="80" placeholder="قیمت"/>
        <textarea  name="content" id="content"  cols="100" rows="15" placeholder="توضیحات"></textarea><br>
        <select  id="subcat" name="subcat" data-placeholder="زیر دسته محصول"   class="chosen chosen-rtl"  style="width:600px;direction: ltr">
            @forelse($Subcat as $subcat)
                <option style=""  value="{{$subcat->id}}">{{$subcat->name}}</option>
            @empty
            @endforelse
        </select><br><br>
        <!-- Large modal -->
        <button type="submit" class="btn btn-default btn-lg" name="send" id="submit"  data-toggle="modal" data-target=".bs-example-modal-lg">ثبت</button>
        <br><br><br><br>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 10px;font-size: 16px;text-align: center"  id="ask">
                    <p id="posted"></p>
                </div>
            </div>
        </div>
    </div>
@endsection