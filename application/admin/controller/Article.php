<?php 
namespace app\admin\controller;
use think\Request;
use think\Controller;
use think\Db;

/**
 * 文章管理类
 */
class Article extends Common
{	
	//文章回收站列表**************************************
	public function recycle(){
		$model = model('article');
		//查找分类
		$category = model('Category')->getTree();
		$this->assign('category',$category);
		//获取is_del为1的商品列表 is_del为1的
		$data = $model->listData(1);
		$this->assign('data',$data);
		return $this->fetch();
	}
	//文章伪删除**************************************
	public function remove(){
		$a_id = input('id');
		Db::name('article')->where(['a_id'=>$a_id])->setField('a_del',1);
		$this->success('ok','recycle');
	}
	//文章列表显示**************************************
	public function index(){
		//分类显示
		$category = model('Category')->getTree();
		$this->assign('category',$category);
		//模型里用listData方法查找 显示文章信息显示
		$data = model('Article')->listData();
		$this->assign('data',$data);
		return $this->fetch();
	}
	//文章编辑****************************************
	public function edit(Request $request){
		$article_model = model('Article');
		$a_id = input('id');//接收修改商品的id
		
		if($request->isGet()){
			//获取所有分类信息
			$category = model('Category')->getTree();
			$this->assign('category',$category);
 			// 获取当前文章的信息
			$data = $article_model->getArticleInfo($a_id);
			$this->assign('data',$data);
			 //获取所有标签
            $tags = Db::name('Tag')->select();
            $this->assign('tags',$tags);
            //获取文章id与标签对应的数据
            $article_tags = Db::name('ArticleTag')->where('a_id',$a_id)->alias('a')->join('blog_tag b','a.t_id=b.t_id','left')->field('a.*,b.t_name')->select();
            //如果该文章有标签，则处理其标签的t_id 没有则返回空数组
            $t_ids = [];
            if ($article_tags) {
            	 //将当前文章所有标签的id值放入一个数组
	            foreach ($article_tags as $k => $v) {
	            	$t_ids[] = $v['t_id'];
	            }
            }
            $this->assign('t_ids',$t_ids);
			return $this->fetch();
		}
		$data = input();
		// 实现图片的上传
		$this->uploadArticleThumb($data,false);
		// 提交表单数据
		$result = $article_model->editArticle($data);
		if($result===false){
			$this->error($article_model->getError());
		}
		$this->success('更新成功','index');

	}
	//新增文章
    public function add(Request $request){
        if($request->isGet()){
        	 //使用模型调用方法getTree得到已经格式化的所有分类数据
            $category= model('Category')->getTree();
            $this->assign('category',$category);
            //获取所有标签
            $tags = Db::name('Tag')->select();
            $this->assign('tags',$tags);
        	return $this->fetch();
        }
        $data = input();

        //实现商品图片的上传
		$this->uploadArticleThumb($data);
		//提交数据
		$model = model('Article');
		$result = $model->add($data);

		if($result===false){
			$this->error($model->getError());
		}
		$this->success('添加成功','index');
    }
    //图片上传的方法***********************************
	protected function uploadArticleThumb(&$data,$is_must=true){
		//获取file类的对象
		$file = request()->file('a_img');
		// halt($file);
		if(!$file){
			if($is_must){
				//没有上传文件
				$this->error('请上传文章图片');
			}else{
				//逻辑允许编辑状态不上传图片
				return true;
			}	
		}
		//获取配置文件中上传图片的设定目录
		$upload_base = config('upload_base');
		$info = $file->validate(['ext'=>'jpg,png'])->move($upload_base);
		// dump($info->getFileName());exit;
		if (!$info){
			//文件上传错误
			$this->error($file->getError());
		}
		//文件上传成功，获取图片路径
		$a_img =$upload_base.'/'.$info->getSaveName();
		//将图片地址放入data数组中，并调整路径中'\'为'/';
		$data['a_img'] = str_replace('\\','/',$a_img);
		// dump($data['goods_img']);exit;
		//生成略缩图
		$img = \think\Image::open($data['a_img']);
		// dump($img);exit;
		//根据本次上传的图片的地址生成略缩图的地址
		$data['a_thumb'] = $upload_base.'/'.date('Ymd').'/thumb_'.$info->getFileName();
		// dump($data['goods_thumb']);exit();
		//生成略缩图
		$img->thumb(180,100,6)->save($data['a_thumb']);
		// dump($img);exit;
	}
}