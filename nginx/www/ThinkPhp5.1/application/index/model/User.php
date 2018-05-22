<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/17
 * Time: 17:01
 */

namespace app\index\model;


use think\Db;
use think\Model;

class User extends Model
{
    protected $table ='user';
    //增加
    function insertData($data)
    {
        return Db::table($this->table)->insertGetId($data);
    }
//展示
    function show()
    {
        return Db::table($this->table)->select();
    }
//删除
    function deleteData($id)
    {
        return Db::table($this->table)->where('id','=',$id)->delete();
    }
//查询单条
    function findData($id)
    {
        return Db::table($this->table)->where('id','=',$id)->find();
    }
//修改
    function updates($data,$id)
    {
        return Db::table($this->table)->where('id','=',$id)->update($data);
    }
}