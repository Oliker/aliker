<?php  
namespace app\admin\model;
use think\Model;
use think\Db;
/**
 *文章模型 
 */
class Article extends Model
{
	//文章编辑更新
	public function editArticle($data){
		
		return $this->allowField(true)->isUpdate(true)->save($data);
	}
	//文章添加*************************************************
	public function add($data)
	{
		$data['a_time'] =time(); //追加时间选项
		// dump($data);exit;
		//开启事务功能
		Db::startTrans();
		try {
			//信息写入文章表
			$this->allowField(true)->save($data);
			//获取文章ID
			$a_id = $this->getLastInsID();
			// dump($a_id);exit;
			//获取文章标签id
			$t_ids = input('a_tags/a');
			//调用模型将数据格式化并写入
			model('ArticleTag')->insertAttr($a_id,$t_ids);
			
			Db::commit();
		} catch (\Exception $e) {
			$this->error='写入数据错误';
			Db::rollback();
			return false;
		}
		
	}
	//文章列表 查询所有文章**************************************************
	public function listData($a_del=0)
	{
		// 修改搜获条件 默认为获取正常状态的商品
		$where = [
			'a_del'=>$a_del,
		];//保存最终的条件
		// //1.用关键字搜索
		// $keyword = input('keyword');
		// if ($keyword) {
		// 	$where['goods_name']=['like','%'.$keyword.'%'];
		// }
		// //2.用推荐状态搜索
		// $intro_type = input('intro_type');//得到推荐状态的字段
		// if ($intro_type) {
		// 	$where[$intro_type]=1;
		// }
		// //3.使用分类作为条件搜索
		// $cate_id = input('cate_id');
		// if($cate_id){
		// 	// 根据所提交的分类的ID查询所有的子分类
		// 	$cate_ids = [];
		// 	$child = model('Category')->getTree($cate_id,true);
		// 	foreach ($child as $key => $value) {
		// 		$cate_ids[]= $value->id;
		// 	}
		// 	// 将本身的id追加到$cate_ids数组中
		// 	$cate_ids[] = $cate_id;
		// 	$where['cate_id'] =['in',$cate_ids];
		// }
		// $this->alias('a')->join('blog_category b','a.c_id=b.c_id','left')->field('a.*,b.c_name')->select();
		$list = $this->where($where)->paginate(5,false,['query'=>input()]);
		// dump($list);exit;
		return $list;
	}
	//商品编辑回显  根据a_id查询商品信息*********************************************
	public function getArticleInfo($a_id){
		
		return Article::get($a_id);
	}
}