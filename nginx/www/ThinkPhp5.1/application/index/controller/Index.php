<?php

namespace app\index\controller;

use app\index\model\User;
use think\cache\driver\Redis;
use think\Controller;
use think\Request;

class Index extends Controller
{

    public function index()
    {
        $redis = new Redis();
        $user = new User;
        //连接本地的 Redis 服务
        if($redis->get("arr")==""){
            $arr = $user->show();
            //存进缓存，并设时长
            $redis->set("arr",$arr,6000);
            echo "<center><h2>存入缓存</h2></center>";
        }else{
            echo "<center><h2>从redis中取！</h2></center>";
            $arr=$redis->get("arr");
        }
        return $this->fetch('index', ['arr' => $arr]);
    }

    public  function create(){
        return view("add");
    }

    public function save()
    {
        $data=Request()->post();
        $user = new User();
        $result = $user->insertData($data);
        if ($result) {
            $redis = new Redis();
            //移除缓存
            $redis->rm("arr");
            $this->success('新增成功', '/index');
        } else {
            $this->error('新增失败');
        }

    }

    //删除
    public function delete($id)
    {
        $user = new User;
        $result = $user->deleteData($id);
        if ($result) {
            $redis = new Redis();
            $redis->rm("arr");
            $this->success('删除成功', '/index');
        } else {
            $this->error('删除失败');
        }
    }

    //修改页面
    public function edit($id)
    {
        $user = new User;
        $res = $user->findData($id);
        return view('edit', ['res' => $res]);
    }

    //删除页面
    public function drop($id){
        return view("delete",['id'=>$id]);
    }

    //修改数据
    public function update($id)
    {
        $data =Request()->post();
        foreach($data as $k=>$v){
            if($k == '_method') {
                unset($data[$k]);
            }
        }
        // var_dump($data);die;
        $user = new User;
        $result = $user->updates($data, $id);
        if ($result) {
            $redis = new Redis();
            $redis->rm("arr");
            $this->success('修改成功', '/index');
        } else {
            $this->error('修改失败');
        }
    }
}
