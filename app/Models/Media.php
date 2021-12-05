<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';
    protected $guarded = [];

    public function charts()
    {
        return $this->belongsToMany('App\Models\Chart');
    }
}
