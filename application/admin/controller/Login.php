<?php  
namespace app\admin\controller;
use think\Request;
use think\Controller;

/**
 *后台登录 
 */
class Login extends Controller
{   //验证码加载
    public function captcha(){
        $config = [
            'codeSet'=>'1',
            'length'=>4,
            'imageH' => 38
        ];
        $obj = new \think\captcha\Captcha($config);

        return $obj->entry();
    }
    //登录验证
    public function index(Request $request){
        if ($request->isGet()){
            return $this->fetch();
        }
        $data = input();//接收提交的数据
        // dump($data);exit;
        $obj = new \think\captcha\Captcha();//检查验证码

        if (!$obj->check($data['captcha'])) {
            $this->error('验证码错误');
        }
        //实现登录 模型对象调用login方法
        $model = model('Admin');
        $result = $model->login($data);
        if($result===false){
            $this->error($model->getError());
        }
        $this->success('登录成功','index/index');
    }
    //退出登录
    public function logout(){
        cookie('admin_info',NULL);
        $this->success('退出登录','login/index');
    }
}



?>