<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Article;
use app\admin\model\Category;
use think\Db;
/**
 * 
 */
class Index extends Controller
{
	public function index(){
		//查找所有标签
		$data['tags'] = Db::name('Tag')->select();
		$article = new Article();
		//查找所有文章放入data中 下标为article
		$data['article'] = $article->order('a_id','desc')->paginate(6,false,['query'=>input()]);
		//查找所有分类
		$category = Category::select();
		//c_id为下标 对应的所有数据为元素 放入cats中
 		foreach ($category as $v) {
			$cats[$v['c_id']] = $v;
		}
		//放入data中 下标为category
		$data['category'] = $cats;
		//热门文章
		$data['article_hot'] = $article->order('a_click','desc')->limit(5)->select();
		// halt($data);
		$this ->assign('data', $data);
		return view('index/index');
	}
}
