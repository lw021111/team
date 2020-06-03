<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    protected $table = 'salesman';
    protected $primaryKey = 's_id';
    public $timestamps = false;
    protected $guarded = [];//黑名单
}
