<?php  
namespace app\admin\model;
use think\Model;
/**
 * 
 */
class Admin extends Model
{
	//验证登录
	public function login($data){
		$where = [
			'u_name'=>$data['u_name'],
			'u_pass'=>md5($data['u_pass'])
		];
		$user = model('Admin')->get($where);
		if(!$user){
			$this->error = '用户名或者密码错误';
			return false;
		}
		//保存用户的登录状态
		$expire = 24*3*3600;
		cookie('admin_info',$user->toArray(), $expire);
		// dump($user->toArray());exit;
	}
}




?>