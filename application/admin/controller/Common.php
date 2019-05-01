<?php 
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
/**
* 后台的公共控制器
*/
class Common extends Controller
{
	public $_user=[];//保存用户的信息
	public function __construct()
	{
		// 1、执行父类的构造方法
		parent::__construct();
		// 判断用户是否登陆
		$admin_info = cookie('admin_info');

		if (!$admin_info) {
			$this->error('还未登录','Login/index');
		}
		// 将用户的信息存储到属性中
		$this->_user = $admin_info;
	}

}

?>