<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"I:\phpStudy\PHPTutorial\project\aliker\public/../application/index\view\article\detail.html";i:1556698845;}*/ ?>
﻿<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; Charset=gb2312">
    <meta http-equiv="Content-Language" content="zh-CN">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>不落阁 - 文章专栏 - 基于layui的laypage扩展模块！</title>
    <link rel="shortcut icon" href="/front/images/Logo_40.png" type="image/x-icon">
    <!--Layui-->
    <link href="/front/plug/layui/css/layui.css" rel="stylesheet" />
    <!--font-awesome-->
    <link href="/front/plug/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!--全局样式表-->
    <link href="/front/css/global.css" rel="stylesheet" />
    <!-- 比较好用的代码着色插件 -->
    <link href="/front/css/prettify.css" rel="stylesheet" />
    <!-- 本页样式表 -->
    <link href="/front/css/detail.css" rel="stylesheet" />

    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="/static/css/style.min.css" rel="stylesheet">
</head>
<body id="ul">
    <!-- 导航 -->
    <nav class="blog-nav layui-header">
        <div class="blog-container">
            <!-- QQ互联登陆 -->
           <!-- <a href="<?php echo url('user/index'); ?>" id="login" class="blog-user"><?php echo empty(session('user_info')['username'])?'登录':(session('user_info')['username']); ?></a><br>
             <a href="javascript:void(0)" id="logout" class="blog-user"><?php echo empty(session('user_info')['username'])?'':'退出'; ?></a>
            <a href="javascript:;" class="blog-user layui-hide">
                <img src="/front/images/Absolutely.jpg" alt="Absolutely" title="Absolutely" />
            </a> -->
            <div class="blog-user">  
                <img class="img-avatar img-avatar-48 m-r-10" src="/static/images/users/avatar.jpg" alt="笔下光年" />
                <a href="<?php echo url('user/index'); ?>" data-toggle="dropdown">
                    <span id="info"><?php echo empty(session('user_info')['username'])?'请登录':(session('user_info')['username']); ?></span>
                </a>
                <span class="caret" id=""></span>
                <ul class="dropdown-menu dropdown-menu-right" id="me" style="display:none;">
                    <li> <a href="javascript:void(0)" id="logout"><i class="mdi mdi-logout-variant"></i> 退出登录</a> </li>
                </ul>  
            </div>
            
            <!-- 导航菜单 -->
            <ul class="layui-nav" lay-filter="nav">
                <li class="layui-nav-item">
                    <a href="<?php echo url('index/index'); ?>"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
                </li>
                <li class="layui-nav-item  layui-this">
                    <a href="<?php echo url('article/index'); ?>"><i class="fa fa-file-text fa-fw"></i>&nbsp;文章专栏</a>
                </li>
                <li class="layui-nav-item">
                    <a href="resource.html"><i class="fa fa-tags fa-fw"></i>&nbsp;资源分享</a>
                </li>
                <li class="layui-nav-item">
                    <a href="timeline.html"><i class="fa fa-hourglass-half fa-fw"></i>&nbsp;点点滴滴</a>
                </li>
                <li class="layui-nav-item">
                    <a href="about.html"><i class="fa fa-info fa-fw"></i>&nbsp;关于本站</a>
                </li>
            </ul>
            <!-- 手机和平板的导航开关 -->
            <a class="blog-navicon" href="javascript:;">
                <i class="fa fa-navicon"></i>
            </a>
        </div>
    </nav>
    <!-- 主体（一般只改变这里的内容） -->
    <div class="blog-body">
        <div class="blog-container">
            <blockquote class="layui-elem-quote sitemap layui-breadcrumb shadow">
                <a href="home.html" title="网站首页">网站首页</a>
                <a href="article.html" title="文章专栏">文章专栏</a>
                <a><cite>基于layui的laypage扩展模块！</cite></a>
            </blockquote>
            <div class="blog-main">
                <div class="blog-main-left">
                    <!-- 文章内容（使用Kingeditor富文本编辑器发表的） -->
                    <div class="article-detail shadow">
                        <div class="article-detail-title">
                            <?php echo $article['a_title']; ?>
                        </div>
                        <div class="article-detail-info">
                            <span>编辑时间：<?php echo date('Y-m-d H:i:s',$article['a_time']); ?></span>
                            <span>作者：<?php echo $article['a_author']; ?></span>
                            <span>浏览量：<?php echo $article['a_click']; ?></span>
                        </div>
                        <div class="article-detail-content">
                            <?php echo $article['a_content']; ?>
                            <hr />
                            
                            <ul class="pager" style="">
                                <li>上一篇：<a href="<?php echo isset($pre['a_id']) ? (url('article/detail','id='.$pre['a_id'])):('javascript:void(0);'); ?>" id="a-pager"  style="border:none;"><?php echo isset($pre['a_title']) ? $pre['a_title']:'无'; ?></a></li>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li>下一篇：<a href="<?php echo isset($next['a_id']) ? (url('article/detail','id='.$next['a_id'])):('javascript:void(0);'); ?>" id="a-pager" style="border:none;"><?php echo isset($next['a_title']) ? $next['a_title']:'无'; ?></a></li>
                             </ul>
        
                        </div>
                    </div>
                    <!-- 评论区域 -->
                    <div class="blog-module shadow" style="box-shadow: 0 1px 8px #a6a6a6;">
                        <fieldset class="layui-elem-field layui-field-title" style="margin-bottom:0">
                            <legend>来说两句吧</legend>
                            <div class="layui-field-box">
                                    <div class="form-group col-md-12">
                                        <!-- 加载编辑器的容器 -->
                                            <script id="container" name="a_content" type="text/plain" style="min-height: 100px;"></script>
                                            <!-- 配置文件 -->
                                            <script type="text/javascript" src="/front/ueditor/ueditor.config.js"></script>
                                            <!-- 编辑器源码文件 -->
                                            <script type="text/javascript" src="/front/ueditor/ueditor.all.js"></script>
                                            <!-- 实例化编辑器 -->
                                            <script type="text/javascript">
                                                var ue = UE.getEditor('container',
                                                    {toolbars: [
                                                            ['fullscreen', 'source', 'undo', 'redo', 'bold','cleardoc','fontfamily','emotion','forecolor']
                                                        ],
                                                        autoHeightEnabled: true,
                                                        autoClearEmptyNode:false,
                                                        autoFloatEnabled: true}
                                                        );
                                            </script>
                                        <!-- 加载编辑器的容器 -->

                                      </div>
    
                                    <div class="layui-form-item">
                                        <button class="layui-btn" type="button">提交评论</button>
                                    </div>
                            </div>
                        </fieldset>
                        <div class="blog-module-title">最新评论</div>
                        <?php echo empty($comment)?"暂无评论！！！":""; ?>
                        <!-- 查到评论则给一个空字符串，否则暂无评论！！！ -->
                        <ul class="blog-comment" >
                            <input type="hidden" id="article-id" value="<?php echo $article['a_id']; ?>">
                            <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <div class="comment-parent">
                                    <img src="/front/images/Absolutely.jpg" alt="absolutely" />
                                    <div class="info">
                                        <input type="hidden" id="user-id" value="<?php echo $vo['id']; ?>">
                                        
                                        <span class="username"><?php echo $vo['username']; ?></span>
                                        <span class="time"><?php echo date('Y-m-d H:i:s',$vo['date']); ?></span>
                                    </div>
                                    <ul class="content" >
                                        <?php echo $vo['content']; ?>&nbsp;<br><a style="color:#0b7df2;font-weight: bold;">回复<input type="hidden" class="co_id" value="<?php echo $vo['co_id']; ?>"></a>
                                        
                                        <!-- 评论内回复 -->
                                        <li id="" >
                                           <!--  <div>
                                                <textarea id="text-reply" style="width:680px;height:100px;resize:none;"></textarea>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary" id="btn-reply" type="button">提交评论</button>
                                            </div> -->
                                       
                                        </li>
                                        <!-- 评论内回复 -->
                                    </ul>
                                    
                                    <!-- 回复层主的评论展示 -->
                                    <?php if(is_array($reply) || $reply instanceof \think\Collection || $reply instanceof \think\Paginator): $i = 0; $__LIST__ = $reply;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($vo['co_id'] == $v['pid']): ?>
                                    <div class="comment-parent" style="margin-left: 40px;">
                                        <img src="/front/images/Absolutely.jpg" alt="absolutely" />
                                        <div class="info">
                                            <span style="color:red;"><?php echo $v['user']['username']; ?></span>
                                            <span style="color:black;">回复</span> 
                                            <span style="color:#01aaee;"><?php echo $vo['username']; ?></span>
                                             
                                            <span class="time"><?php echo date('Y-m-d H:i:s',$v['date']); ?></span>
                                        </div>
                                        
                                        <div class="content" id="">
                                            <?php echo $v['content']; ?>
                                        </div>
                                       
                                       
                                    </div>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    <!-- 回复层主的评论展示 -->
                                </div>

                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                     <!-- 评论区域完 -->
                </div>
                <div class="blog-main-right">
                    <!--右边悬浮 平板或手机设备显示-->
                    <div class="category-toggle"><i class="fa fa-chevron-left"></i></div><!--这个div位置不能改，否则需要添加一个div来代替它或者修改样式表-->
                    <div class="article-category shadow">
                        <div class="article-category-title">分类导航</div>
                        <!-- 点击分类后的页面和artile.html页面一样，只是数据是某一类别的 -->
                        <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?>                      
                        <a href="javascript:layer.msg(&#39;切换到相应分类&#39;)"><?php echo $cat['c_name']; ?></a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <div class="clear"></div>
                    </div>
                    <div class="blog-module shadow">
                        <div class="blog-module-title">相似文章</div>
                        <ul class="fa-ul blog-module-ul">
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">基于laypage的layui扩展模块（pagesize.js）！</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">基于laypage的layui扩展模块（pagesize.js）！</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">基于laypage的layui扩展模块（pagesize.js）！</a></li>
                        </ul>
                    </div>
                    <div class="blog-module shadow">
                        <div class="blog-module-title">最近评论</div>
                            <ul class="blog-comment">
                                <?php if(is_array($comment) || $comment instanceof \think\Collection || $comment instanceof \think\Paginator): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <div class="comment-parent">
                                        <img src="/front/images/Absolutely.jpg" alt="absolutely" />
                                        <div class="info">
                                            <span class="username"><?php echo $vo['username']; ?></span>
                                            <span class="time"><?php echo date('Y-m-d H:i:s',$vo['date']); ?></span>
                                        </div>
                                        <div class="content" id="">
                                            <?php echo $vo['content']; ?>&nbsp;<a href="" style="">回复</a>
                                        </div>
                                    </div>

                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- 底部 -->
    <footer class="blog-footer">
        <p><span>Copyright</span><span>&copy;</span><span>2017</span><a href="http://www.lyblogs.cn">不落阁</a><span>Design By LY</span></p>
        <p><a href="http://www.miibeian.gov.cn/" target="_blank">蜀ICP备16029915号-1</a></p>
    </footer>
    <!--侧边导航-->
    <ul class="layui-nav layui-nav-tree layui-nav-side blog-nav-left layui-hide" lay-filter="nav">
        <li class="layui-nav-item">
            <a href="home.html"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
        </li>
        <li class="layui-nav-item layui-this">
            <a href="article.html"><i class="fa fa-file-text fa-fw"></i>&nbsp;文章专栏</a>
        </li>
        <li class="layui-nav-item">
            <a href="resource.html"><i class="fa fa-tags fa-fw"></i>&nbsp;资源分享</a>
        </li>
        <li class="layui-nav-item">
            <a href="timeline.html"><i class="fa fa-road fa-fw"></i>&nbsp;点点滴滴</a>
        </li>
        <li class="layui-nav-item">
            <a href="about.html"><i class="fa fa-info fa-fw"></i>&nbsp;关于本站</a>
        </li>
    </ul>
    <!--分享窗体-->
    <div class="blog-share layui-hide">
        <div class="blog-share-body">
            <div style="width: 200px;height:100%;">
                <div class="bdsharebuttonbox">
                    <a class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    <a class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                </div>
            </div>
        </div>
    </div>
    <!--遮罩-->
    <div class="blog-mask animated layui-hide"></div>
    <!-- layui.js -->
    <script src="/front/plug/layui/layui.js"></script>
    <!-- 自定义全局脚本 -->
    <script src="/front/js/global.js"></script>
    <!-- 比较好用的代码着色插件 -->
    <script src="/front/js/prettify.js"></script>
    <!-- 本页脚本 -->
    <script src="/front/js/detail.js"></script>
    <script src="/front/js/jquery-1.8.3.min.js"></script>
</body>
</html>
<script type="text/javascript">
    //个人中心弹出菜单
    $(function(){
       $( '.caret' ).on( 'click', function( e ) {
            $( '#me' ).toggle();
        } );
    })
</script>

<script type="text/javascript">
    //退出登录
    $(function(){
       $( '#logout' ).on( 'click', function( e ) {
            var url = "<?php echo url('user/logout',[],false); ?>"//组装请求地址
            var username = $("#info").html()
                //发送ajax请求
                $.ajax({
                    type:'post',
                    data:{username:username},
                    url:url,
                    datatype:'json',
                    success:function(res){
                       if (res.status===true) {
                            location.reload(true); //重新加载父类
                       }
                    }
                })
            
        } );
    })
</script>

<script type="text/javascript">
    $(function(){
        //首次评论
        var url = "<?php echo url('article/comment',[],false); ?>"//组装请求地址
        $('.layui-btn').click(function(){
            var key = $('#article-id').val()//拿到文章id
            //拿到文本编辑器的内容
            var ue = UE.getEditor('container')
                 ue.ready(function() {
                 content  = ue.getPlainTxt()
             })

           //发送ajax请求
            $.ajax({
                type:'post',
                data:{'a_id':key,'content':content,'pid':0},
                url:url,
                datatype:'json',
                success:function(res){
                   if(res.status===false){
                    //未登录返回false 请先登录在评论
                        layer.msg(res.message, {icon: 5, time: 1000}, function(){
                            location.reload(true); //重新加载父类
                        })
                    }else{
                        layer.msg(res.message, {icon: 6, time: 1000},function(){
                            location.reload(true);
                        })
                    }
                }
            })
        })
    })
</script>

<script type="text/javascript">
  //回复层主弹出回复框
 $(function()
 {
    //事件委托给所有li绑定点击事件
    $("#ul").on("click","li",function(event)
    {
        var target = $(event.target);
        
        if(target[0].localName == "a")
        {
            //拿到此条评论的用户名
            p_uid = $("#user-id").val()
            //获取这条评论的co_id
            co_id =parseInt($(target[0]).children().val())
            
            target.next().html(`<div>
                                    <textarea id="text-reply" class="text-reply" style="width:680px;height:100px;resize:none;"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary" id="btn-reply" type="button">提交评论</button>
                                </div>`)
    
        }
    })
    //回复评论并提交
    $("#ul").on("click","button",function(event)
        {
            var target = $(event.target);
            if(target[0].id == "btn-reply")
            {
                //获取文本域的内容
               var reply = $('.text-reply').val()
               //发送ajax请求
               var key = $('#article-id').val()//拿到文章id
               var url = "<?php echo url('article/comment',[],false); ?>"//组装请求地址
                $.ajax({
                type:'post',
                data:{'a_id':key,'content':reply,'pid':p_uid,'co_id':co_id},
                url:url,
                datatype:'json',
                success:function(res){
                   if(res.status===false){
                    //未登录返回false 请先登录在评论
                        layer.msg(res.message, {icon: 5, time: 1000}, function(){
                            location.reload(true); //重新加载父类
                        })
                    }else{
                        layer.msg(res.message, {icon: 6, time: 1000},function(){
                            location.reload(true);
                        })
                    }
                }
            })

            }
        })
})
</script>
