<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function libraries()
    {
      return $this->belongsToMany('App\Models\Library');
    }

    public function datas()
    {
      return $this->belongsToMany('App\Models\Data');
    }

    public function medias()
    {
      return $this->belongsToMany('App\Models\Media');
    }

    public function files()
    {
      return $this->belongsToMany('App\Models\File');
    }
}
