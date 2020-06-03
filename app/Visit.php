<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visit';
    protected $primaryKey = 'v_id';
    public $timestamps = false;
    protected $guarded = [];//黑名单
}
