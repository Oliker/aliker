<?php  
namespace app\admin\model;
use think\Model;
use think\Db;
/**
 *文章-标签模型 
 */
class ArticleTag extends Model
{
	public function insertAttr($a_id,$t_ids){
		//$a_id:文章id    $t_ids:标签id
		// dump($t_ids);exit;
		$list = [];
		foreach ($t_ids as $key => $value) {
			$list[] = [
				'a_id'=>$a_id,
				't_id'=>$value,	
			];
		}
		if($list){
			Db::name('article_tag')->insertAll($list);
		}
	}
}