 @extends('master')
@section('head')
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'مدیریت دیدگاه ها')
@section('main')
    <div class="container site-content">
        <div class="col-md-12">
            <div class="container-fluid" style="border-top: 1px solid #fff; border-bottom: 1px solid #fff; background-color:#f6f9fa;;">
                <div style="direction: rtl;text-align: right" class="">
                    <br>
                    <h4 class="title"> دیدگاه ها</h4>
                    @forelse($Comment as $comment)
                        <div id="combody" class="effect2">
                            <span id="comboxtitle">{{$comment->user->name}} email : {{$comment->user->email}}<br><em style="margin-right:3px;font-size: 11px;font-family: 'Iransans', Tahoma, sans-serif"> برای محصول </em> <span id="comboxtitle">{{$comment->product->title}}</span><em style="margin-right:3px;font-size: 11px;font-family: 'Iransans', Tahoma, sans-serif">نوشت :</em></span>
                            <br><span  id="commtext">{{$comment->content}}</span><br><br>
                            <div id="{{$comment->id}}">
                                @if($comment->status == 0)
                                    <button data="{{$comment->id}}"  class="btn btn-success submit-comment">تایید و نمایش در سایت</button>
                                @endif
                                <button data="{{$comment->id}}"  class="btn btn-danger delete-comment">حذف این دیدگاه</button>
                                <br><br>
                            </div>
                        </div><!---end combody-->
                    @empty
                    @endforelse
        </div>
    </div>
@endsection