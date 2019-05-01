<?php
use think\Config;

/*
对数据进行格式化
$data:接收的数据
$c_id:要查询的分类id，为0表示查询所有分类
$lev:标注分类的层次
$is_clear：是否清空$list静态变量中已有内容
*/ 
if(!function_exists('get_tree')){
    
    function get_tree($data,$c_id=0,$lev=0,$is_clear=false){
         // dump($data);exit;
        // dump($is_clear);exit;
        static $list = [];//保存最终数据
        if($is_clear){
            $list = [];
        }
            foreach ($data as $value) { 
                // dump($value);exit;
             if($value['c_pid']==$c_id){
                $value['lev']=$lev;//标识分类的层次
                $list[]=$value;
                get_tree($data,$value['c_id'],$lev+1);    
            }
        }
        return $list;
     }
}


/*
对数据进行格式化
$data:接收的数据
$co_id:要查询的评论id，为0表示查询所有评论
$lev:标注分类的层次
$is_clear：是否清空$list静态变量中已有内容
*/ 
if(!function_exists('get_comments')){
    
    function get_comments($data,$co_id=0,$lev=0,$is_clear=false){
         // dump($data);exit;
        // dump($is_clear);exit;
        static $list = [];//保存最终数据
        if($is_clear){
            $list = [];
        }
            foreach ($data as $value) { 
             if($value['pid']==$co_id){
                $value['lev']=$lev;//标识分类的层次
                $list[]=$value;
                get_comments($data,$value['co_id'],$lev+1);    
            }
        }
        
        return $list;
     }
}