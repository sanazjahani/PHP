@extends('auth.master')

@section('title', 'تکمیل نام نویسی')

@section('content')
    <div class="form-group">
        <p>شما با موفقیت نام نویسی کردید!</p>
        <div class="height-15"></div>
        <a href="{{url('/login')}}" class="btn btn-wide btn-big btn-bg">ورود به سایت</a>
    </div>
@endsection