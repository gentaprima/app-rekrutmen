<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLowongan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "tbl_lowongan";
}
