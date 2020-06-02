<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesmanController extends Controller
{
    public function index(){
    	return view('salesman.index');
    }
}
