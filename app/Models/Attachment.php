<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachment';
    use HasFactory;
    public function dsTepPost()
    {
     return $this->belongsTo('App\Models\Post','idpost','id');
    }
}
