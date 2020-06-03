<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class client extends Model
{
    //
        //
      /**
* 关联到模型的数据表
*指定表名
* @var string
*/
protected $table = 'client';
/**
* The primary key associated with the table.
*指定主键
* @var string
*/
protected $primaryKey = 'c_id';
/**
* Indicates if the IDs are auto-incrementing.
*时间戳
* @var bool
*/
public $timestamps = false;
// /**
// * 可以被批量赋值的属性.
// *白名单
// * @var array
// */
// protected $fillable = ['name'];
/**
* 不能被批量赋值的属性
*黑名单
* @var array
*/
protected $guarded = [];

public static function getClientIndex($pageSzie){

    return self::orderBy('c_id','desc')->paginate($pageSzie);
}


