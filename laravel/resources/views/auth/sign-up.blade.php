@extends('auth.master')
@section('title', ' ثبت نام')
@section('description', ' ثبت نام فروشگاه آنلابن, فروشگاه آنلاین ..')
@section('keywords', ' ثبت نام فروشگاه آنلاین, فروشگاه آنلاین ..')

@section('content')
    <div class="form-group" >
        <form action="{{url('/register')}}" method="post">
            <input type="text" name="name" class="form-control ltr text-right"  title="نام" placeholder="نام">
            <input type="email" name="email" class="form-control ltr text-right"  title="ایمیل" placeholder="ایمیل">
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control ltr text-right" title="گذر واژه" placeholder="گذرواژه">
                <span class="input-group-addon hover">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </span>
            </div>
            <input hidden name="_token" value="{{csrf_token()}}">
            <input type="submit" class="btn btn-wide btn-big btn-bg" value="ثبت نام">
        </form>
        <div class="height-15"></div>
        <p class="text-bg text-center">
            <span>با ثبت نام شما</span>
            <a href="{{ url('/terms') }}" title="شرایط عضویت">شرایط عضویت</a>
            <span>را نیز می‌پذیرید.</span>
        </p>

        <div class="height-15"></div>
        <div class="container-fluid text-center">
            <div class="col-sm-6">
                <a href="{{ url('/remind') }}" title="گذرواژه را فراموش کرده‌اید؟">یادآوری گذرواژه</a>
            </div>
            <div class="col-sm-6">
                <a href="{{ url('/login') }}" title="اکانت دارید؟">ورود کاربران</a>
            </div>
        </div>
    </div>
@endsection