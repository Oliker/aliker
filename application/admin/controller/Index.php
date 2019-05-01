<?php
//后台首页
namespace app\admin\Controller;


class Index extends Common
{
    public function index(){
       // var_dump(__STATIC__);exit;
       $this->assign('admin_info',$this->_user); 
       return $this->fetch();
    }
}