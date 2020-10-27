<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserBookmark extends Controller
{
function index($id=0)
{
    $data= DB::Table('users')
        ->select('users.name','bookmarks.name','bookmarks.url','bookmarks.description','bookmarks.image')
        ->join('bookmarks','users.id','bookmarks.user_id')
        ->where('users.id',$id)
        ->get();

    if($data->isEmpty())
    {
        abort(404,"This Page not found or your data is Null");

    }
    else
    return view('userbookmark', compact('id','data'));
}
}
