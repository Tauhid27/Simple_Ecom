<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    
    function index(){
        $data = Product::all();
       
        return view('product',['products'=>$data]);
    }
}
// echo '<pre>';
// print_r($data);
// die();