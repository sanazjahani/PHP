@extends('master')

@section('title', 'زیر دسته جدید')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/chosen.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jss/new-subcat.js') }}"></script>
@endsection
@section('main')
    <div style="margin-top: 30px" class="col-sm-5 col-sm-offset-5 content-home">
        <br>
        <input type="text" id="name" class="form-control ltr text-right"  title="نام زیر دسته" placeholder="نام زیر دسته"><br>
        <span>دسته اصلی</span><select  id="cat" name="cat" data-placeholder=" دسته اصلی"   class="chosen chosen-rtl"  style="width:290px;direction: ltr">
            @forelse($Cat as $cat)
                <option style=""  value="{{$cat->id}}">{{$cat->name}}</option>
            @empty
            @endforelse
        </select><br><br>
        <button class="submit btn btn-wide btn-success">افزودن</button>

    </div>
@endsection