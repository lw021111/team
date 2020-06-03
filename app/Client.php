<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'c_id';
    public $timestamps = false;
    protected $guarded = [];//黑名单
}
