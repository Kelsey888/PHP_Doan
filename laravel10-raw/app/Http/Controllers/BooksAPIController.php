<?php

namespace App\Http\Controllers;
use App\Models\Books;
use App\Models\Images;
use App\Models\EBooks;
use Illuminate\Http\Request;

class BooksAPIController extends Controller
{
    public function ShowDS(){
        $ShowDS = Books::with('images','genres_books','author')->get();
        if(empty($ShowDS)){
            return response()->json([
                'success' => false,
                'message'=>'FALSE',
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $ShowDS,
            'msg' => 'danh sach sach',
        ]);
    }
}
