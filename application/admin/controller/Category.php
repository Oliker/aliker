<?php 
namespace app\admin\controller;
use think\Request;
use think\Controller;
use think\Db;
/**
 * 分类管理
 */
class Category extends Common
{
	// 编辑分类
    public function edit(Request $request){
        $model = model('Category');
        $c_id = input('id');
        if($request->isGet()){
            //修改前对数据回显
            $info= $model->get($c_id);//找到id值为$cate_id)的这条数据
            $category= model('Category')->getTree();//找到所有分类
            return $this->fetch('edit',['info'=>$info,'category'=>$category]);
        }
        $result = $model->editCategory(input());//请求模型对类别进行修改
        if($result===false){
            $this->error($model->getError());
        }
        $this->success('ok');
    }
    //分类删除
    public function remove(){
        $result = model('Category')->remove(input('id'));
        // dump($result);exit;
        if($result===false){
            $this->error($model->getError());
        }
        $this->success('ok');
    }
    //分类列表展示
    public function index(){
        $data= model('Category')->getTree();
        // dump($data);exit;
        $this->assign('data',$data);
        return $this->fetch();
    }
    //新增分类
    public function add(Request $request){
        if($request->isGet()){
            //使用模型调用方法getTree得到已经格式化的所有数据
            $category= model('Category')->getTree();
            $this->assign('category',$category);
            return $this->fetch();
        }
        $data = $request->post();//获取表单数据
        Db::name('category')->insert($data);//数据添加    
        $this->success('写入成功','index');  
    }
}