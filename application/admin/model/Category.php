<?php  
namespace app\admin\model;
use think\Model;
use think\Db;
/**
 * 
 */
class Category extends Model
{
	//获取所有分类
	public function getTree($c_id=0,$is_clear=true){
        $list = $this->all();//获取所有分类
        // dump($list);exit;
        $data = get_tree($list,$c_id,0,$is_clear);//调用公共方法 对已有数据格式化
        // dump($data);
        return $data;
    }
    //编辑分类 
    public function editCategory($data){
    	
        if($data['c_id']==$data['c_pid']){
           $this->error='设置上级分类错误';
           return false;
        }
        $child = $this->getTree($data['c_id']);
        // dump($child);exit;
        foreach ($child as $value) {
            if($data['c_pid']==$value['c_id']){
                $this->error='子孙错乱';
                return false;
            }
        }
        Category::isUpdate(true)->save($data);
    }
    //删除分类
    public function remove($c_id){
    	//查找该分类是否有子分类
        if(Db::name('category')->where('c_pid',$c_id)->find()){
            $this->error='存在子分类，无法删除';
            return false;
        }
        return Db::name('category')->delete($c_id);
    }
}




?>