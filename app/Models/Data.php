<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
  use HasFactory;
  protected $table = "datas";
  protected $guarded = [];

  public function charts()
  {
    return $this->belongsToMany('App\Models\Chart');
  }
}
