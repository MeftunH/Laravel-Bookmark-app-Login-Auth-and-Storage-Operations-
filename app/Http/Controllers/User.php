<?php

namespace App\Http\Controllers;
use App\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class user extends Controller
{
    function view()
    {
      $data= DB::Table('users')->get();
      return view('user',['data'=>$data]);
    }
}
