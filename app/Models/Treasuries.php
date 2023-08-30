<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasuries extends Model
{
    use HasFactory;
    protected $table="Treasuries";
    protected $fillable=[
        'name','is_master','last_isal_exhcange','last_isal_collect','created_at','created_at','updated_at','added_by','updated_by','com_code','date'
    ];

    
}
