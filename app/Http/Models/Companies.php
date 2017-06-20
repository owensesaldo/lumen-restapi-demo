<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    //To disable Eloquent Timestamps - created_at, updated_at
    public $timestamps = false;
    
    //
    protected $fillable = ['name','category','description'];
}