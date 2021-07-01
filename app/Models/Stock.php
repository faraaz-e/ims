<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    //  Table Name
    protected $table = 'stocks';

    //  Primary key
    public $primaryKey = ['id','product_sku'];

    //  Timestamps
    //  public $timestamps = true;
}
