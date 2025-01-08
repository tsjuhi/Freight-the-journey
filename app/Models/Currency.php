<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
use SoftDeletes;

protected $table='currencies';

    protected $fillable=[

      'code',
      'name',
      'symbol',

    ];
}
