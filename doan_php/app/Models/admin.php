<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'login';

    // // Định nghĩa phương thức kiểm tra quyền admin
    // public function isAdmin()
    // {


    //     return $this->role === 'admin';
    // }
}
