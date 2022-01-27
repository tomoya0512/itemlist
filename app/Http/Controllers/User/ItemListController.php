<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemListController extends Controller
{
    public function home(){
        return view('user.home');
    }
    
    public function add(){
        return view('user.itemlist.create');
    }

    public function index(){
        return view('user.itemlist.index');
    }

}
