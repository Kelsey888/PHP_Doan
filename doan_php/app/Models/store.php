<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "store";
}

class InvoiceItem extends Model
{
    use HasFactory;
    protected $table = "store_item";
}
