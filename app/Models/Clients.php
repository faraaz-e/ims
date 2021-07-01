<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    //  Table Name
    protected $table = 'clients';

    //  Primary key
    public $primaryKey = 'id';

    //  Timestamps
    //  public $timestamps = true;

}
