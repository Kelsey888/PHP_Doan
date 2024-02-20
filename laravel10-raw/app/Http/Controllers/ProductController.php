<?php

namespace App\Http\Controllers;
use App\Models\Books;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function danhSach()
    {
        $dsSanPham = Books::all();

    }
}
