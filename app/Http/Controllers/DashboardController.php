<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\History;

class DashboardController extends Controller
{

    public function showHistory(){
        $histories = History::orderBy('command_at','cde_id','desc')->get();
        return view('admin.history',compact('histories'));
    }
}
