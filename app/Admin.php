<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    //
      /**
* 关联到模型的数据表
*指定表名
* @var string
*/
protected $table = 'admin';
/**
* The primary key associated with the table.
*指定主键
* @var string
*/
protected $primaryKey = 'admin_id';
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
}
