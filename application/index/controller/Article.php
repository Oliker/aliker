<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Category;
use app\admin\model\Comment;
use think\Db;
use think\Request;

/**
 * 文章专栏控制器
 */
class Article extends Controller
{

   //文章评论
	public function comment(Request $request){
		// halt(strlen($_POST['content']));
		if ( !session('user_info') ) {
			return json(['status'=>false,'message'=>'请登录再评论']);
		}elseif ( strlen($_POST['content'])<3 ) {
			return json(['status'=>false,'message'=>'请填写至少2个字符']);
		}else{
			//接受ajax传的数据
			$data = $request->post();
			$data['date'] = time();
			$username = session('user_info')['username'];
			//查找当前用户的id 并放入数组data
			$user = Db::name('User')->where('username',$username)->find();
			$data['u_id'] = $user['id'];
			//若ajax所带数据pid为0 表示评论，不为0则表示回复
			if ($data['pid']=="0") {
				Db::name('Comment')->insert($data);
				}else{
				//数据库里pid记录的为每条评论的co_id，则为回复情况下将co_id的值赋给pid再写入数ju
				$data['pid'] = $data['co_id'];
				unset($data['co_id']);
				Db::name('Comment')->insert($data);
				}
			$data['username'] = $username;
			return json(['status'=>true,'message'=>'评论成功']);
		}
	}
	//文章选项页
	public function index(){
		
		//查找所有分类
		$data['category'] = Category::select();
		//获取关键字
		$keywords = input('keywords');
		if ($keywords) {
			//若关键字存在则用关键字搜索
			$where['a_title']=['like','%'.$keywords.'%'];
			$data['article_hot'] = Db::name('Article')->where($where)->paginate(6,false,['query'=>input()]);
			// halt($data['article_hot']->items());【$data['article_hot']->items()存储文章信息】	
		}else{
			//默认显示热门文章 有搜索到文章就显示搜索到的文章
			//热门文章
			$data['article_hot'] = Db::name('Article')->order('a_click','desc')->paginate(6,false,['query'=>input()]);
		}
		//将关键字带到模板中，搜索不到文章时将关键字返回给用户
		$data['keywords'] = $keywords;
		// halt($data);
		$this->assign('data',$data);
		return view('article/index');
	}
		
	//文章详情页
	public function detail(){
		//查找文章信息
		$a_id = input('id');
		// halt($a_id);
		$article = Db::name('Article')->find($a_id);
		//查找所有分类
		$category = Category::select();

		//查找上一篇
		$pre = Db::name('Article')->where('a_id','<',$a_id)->order('a_id','desc')->limit(1)->find();
		//查找上一篇
		$next = Db::name('Article')->where('a_id','>',$a_id)->limit(1)->find();
		//查找该条文章的所有主评论
		$comment = Db::name('Comment')->alias('a')->join('blog_user b','a.u_id=b.id','left')->field('a.*,b.username,b.header_img,b.id')->where(['a_id'=>$a_id,'pid'=>0])->order('date','desc')->select();
		
		if ($comment != null) {
			//查找每条主评论的回复
			$commentAll = Db::name('Comment')->select();
			foreach ($comment as $key => $v) {
				$reply = get_comments($commentAll,$v['co_id']);
			}
			// var_dump($reply);exit;
			if ($reply != null) {
				foreach ($reply as $k => $value) {
					$u_id = $value['u_id'];
					$reply[$k]['user']= Db::name('User')->field('id,username,header_img')->where('id',$u_id)->find();
					$this->assign('reply', $reply);
				}
			}else{
				$this->assign('reply',[]);
			}	
		}
		
		
		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('article', $article);
		$this->assign('comment', $comment);
		
		$this->assign('category', $category);
		return view('article/detail');	
	}
	public function test(){
		$data = Db::name('Comment')->select();
		$list = get_comments($data,2);
		halt($list);
	}
}
