<?php
namespace app\index\controller;
use think\Controller;
// use app\admin\model\Article;
// use app\admin\model\Category;
use think\Db;
/**
 * 
 */
class User extends Controller
{
	public function index(){
		return view('user/index');
	}
	public function login(){
		// halt(session('user_info'));
		$user_info['username']=input('username');
		$user_info['password']=input('password');
		//判断是用户是否存在
		$res = Db::name('User')->where(['username'=>$user_info['username'],'password'=>$user_info['password']])->find();
		if(!$res){
			$this->error('用户名或密码错误');
		}else{
			session('user_info',$user_info);
			$this->success('登录成功','index/index');
		}
		
	}
	public function logout(){
		
		session('user_info',null);
		return json(['status'=>true,'message'=>'ok']);
	}
}