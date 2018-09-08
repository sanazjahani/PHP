<?php
namespace App\Http\Controllers;
use App\Model\Comment;
use App\Model\Order;
use  Illuminate\Contracts\Pagination;
use Illuminate\Support\Facades\Request;

class CommentController
{
    public function getComment()
    {
        $comment = Comment::pagination(10);
        return view('comment',['Comment'=>$comment]);
    }
    public function getOrder()
    {
        $order = Order::where('status','=',0)->get();
        return view('order',['Order'=>$order]);
    }
    public function postSubmitComment()
    {
        $comment = Comment::find(Request::input('id','empty'));
        $comment->status = 1;
        $comment->save();
        return 1;
    }
    public function postSubmitOrder()
    {
        $order = Order::find(Request::input('id','empty'));
        $order->status = 1;
        $order->save();
        return 1;
    }
    public function postDeleteComment()
    {
        $comment = Comment::find(Request::input('id','empty'));
        $comment->delete();
        return 1;
    }
}