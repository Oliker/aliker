<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"I:\phpStudy\PHPTutorial\project\aliker\public/../application/index\view\article\index.html";i:1556541637;}*/ ?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; Charset=gb2312">
    <meta http-equiv="Content-Language" content="zh-CN">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>繁星 - 关于本站</title>
    <link rel="shortcut icon" href="/front/images/Logo_40.png" type="image/x-icon">
    <!--Layui-->
    <link href="/front/plug/layui/css/layui.css" rel="stylesheet" />
    <!--font-awesome-->
    <link href="/front/plug/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!--全局样式表-->
    <link href="/front/css/global.css" rel="stylesheet" />
    <!-- 本页样式表 -->
    <link href="/front/css/about.css" rel="stylesheet" />

    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="/static/css/style.min.css" rel="stylesheet">
</head>
<body>
     <!-- 导航 -->
    <nav class="blog-nav layui-header">
        <div class="blog-container">
            <!-- QQ互联登陆 -->
            <!-- <a href="<?php echo url('user/index'); ?>" class="blog-user"><?php echo empty(session('user_info')['username'])?'登录':(session('user_info')['username']); ?></a><br>
             <a href="#" class="blog-user"><?php echo empty(session('user_info')['username'])?'':'退出'; ?></a>
            <a href="javascript:;" class="blog-user layui-hide">
                <img src="/front/images/Absolutely.jpg" alt="Absolutely" title="Absolutely" />
            </a> -->
             <div class="blog-user">
                <ul class="topbar-right">
                    <li class="dropdown dropdown-profile">
                      <a href="javascript:void(0)" data-toggle="dropdown">
                        <img class="img-avatar img-avatar-48 m-r-10" src="/static/images/users/avatar.jpg" alt="笔下光年" />
                        <span>admin <span class="caret" id=""></span></span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-right" id="me" style="display:none;">
                        <li> <a href="lyear_pages_login.html"><i class="mdi mdi-logout-variant"></i> 退出登录</a> </li>
                      </ul>
                    </li>
                </ul>
            </div>
            <!-- 导航菜单 -->
            <ul class="layui-nav" lay-filter="nav">
                <li class="layui-nav-item">
                    <a href="home.html"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
                </li>
                <li class="layui-nav-item layui-this">
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
                <a><cite>文章专栏</cite></a>
            </blockquote>
            <div class="blog-main">
                <div class="blog-main-left">
                    <div class="shadow" style="text-align:center;font-size:16px;padding:40px 15px;background:#fff;margin-bottom:15px;display: <?php echo empty($data['article_hot']->items())?'block':'none'; ?>;">
                        未搜索到与【<span style="color: #FF5722;"><?php echo $data['keywords']; ?></span>】有关的文章，随便看看吧！
                    </div>
                    <?php if(is_array($data['article_hot']) || $data['article_hot'] instanceof \think\Collection || $data['article_hot'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['article_hot'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="article shadow">
                        <div class="article-left">
                            <img src="/<?php echo $vo['a_thumb']; ?>" alt="" />
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <a href="<?php echo url('article/detail','id='.$vo['a_id']); ?>"><?php echo $vo['a_title']; ?></a>
                            </div>
                            <div class="article-abstract">
                               <?php echo $vo['a_desc']; ?>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="article-footer">
                            <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo date('Y-m-d H:i:s',$vo['a_time']); ?></span>
                            <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
                            <span><i class="fa fa-tag"></i>&nbsp;&nbsp;<a href="#">Web前端</a></span>
                            <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;0</span>
                            <span class="article-viewinfo"><i class="fa fa-commenting"></i>&nbsp;4</span>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <ul class="pagination">
                     <?php echo $data['article_hot']->render(); ?>
                    </ul>
                </div>
                <div class="blog-main-right">

                    <div class="blog-search">
                        <form class="layui-form" action="<?php echo url('article/index'); ?>" method="post">
                            <div class="layui-form-item">
                                <div class="search-keywords  shadow">
                                    <input type="text" name="keywords" lay-verify="required" placeholder="输入关键词搜索" autocomplete="off" class="layui-input">
                                </div>
                                
                            </div>
                        </form>
                    </div>

                    <div class="article-category shadow">
                        <div class="article-category-title">分类导航</div>
                        <?php if(is_array($data['category']) || $data['category'] instanceof \think\Collection || $data['category'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['category'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <a href="javascript:layer.msg(&#39;切换到相应分类&#39;)"><?php echo $vo['c_name']; ?></a> <?php endforeach; endif; else: echo "" ;endif; ?>                           
                        <div class="clear"></div>
                    </div>
                    <div class="blog-module shadow">
                        <div class="blog-module-title">作者推荐</div>
                        <ul class="fa-ul blog-module-ul">
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">Web安全之跨站请求伪造CSRF</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">ASP.NET MVC 防范跨站请求伪造（CSRF）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">C#基础知识回顾-扩展方法</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（一）（HTML篇）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（二）（CSS篇）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（三）（JS篇）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">写了个Win10风格快捷菜单！</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">ASP.NET MVC自定义错误页</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">ASP.NET MVC制作404跳转（非302和200）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">基于laypage的layui扩展模块（pagesize.js）！</a></li>
                        </ul>
                    </div>
                    <div class="blog-module shadow">
                        <div class="blog-module-title">随便看看</div>
                        <ul class="fa-ul blog-module-ul">
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（一）（HTML篇）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">ASP.NET MVC制作404跳转（非302和200）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">ASP.NET MVC 防范跨站请求伪造（CSRF）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（三）（JS篇）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">基于laypage的layui扩展模块（pagesize.js）！</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（二）（CSS篇）</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">写了个Win10风格快捷菜单！</a></li>
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">常用正则表达式</a></li>
                        </ul>
                    </div>
                    <!--右边悬浮 平板或手机设备显示-->
                    <div class="category-toggle"><i class="fa fa-chevron-left"></i></div>
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
    <!-- 全局脚本 -->
    <script src="/front/js/global.js"></script>
    <!-- 本页脚本 -->
    <script src="/front/js/home.js"></script>
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
    // $(function(){
    //     $('#s-btn').click(function(){
    //         var key = $('.layui-input').val()
    //         var url = "<?php echo url('article/index',[],false); ?>/"+key;
    //         $.post(url,'数据',function(res){

    //         })
    //     })
    // })
</script>
    
