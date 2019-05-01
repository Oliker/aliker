<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"I:\phpStudy\PHPTutorial\project\aliker\public/../application/index\view\index\index.html";i:1556543367;}*/ ?>
﻿<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; Charset=gb2312">
    <meta http-equiv="Content-Language" content="zh-CN">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>不落阁 - 一个.NET程序员的个人博客网站</title>
    <link rel="shortcut icon" href="/front/images/Logo_40.png" type="image/x-icon">
    <!--Layui-->
    <link href="/front/plug/layui/css/layui.css" rel="stylesheet" />
    <!--font-awesome-->
    <link href="/front/plug/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!--全局样式表-->
    <link href="/front/css/global.css" rel="stylesheet" />
    <!-- 本页样式表 -->
    <link href="/front/css/home.css" rel="stylesheet" />

    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="/static/css/style.min.css" rel="stylesheet">
</head>
<body>
    <!-- 导航 -->
    <nav class="blog-nav layui-header">
        <div class="blog-container">
            <!-- QQ互联登陆 -->
            <!--  <a href="<?php echo url('user/index'); ?>" class="blog-user"><?php echo empty(session('user_info')['username'])?'登录':(session('user_info')['username']); ?></a><br>
             <a href="#" class="blog-user"><?php echo empty(session('user_info')['username'])?'':'退出'; ?></a>
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
                <li class="layui-nav-item layui-this">
                    <a href="home.html"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
                </li>
                <li class="layui-nav-item">
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
       
        <!-- 这个一般才是真正的主体内容 -->
        <div class="blog-container">
            <div class="blog-main">
                <!-- 网站公告提示 -->
                <div class="home-tips shadow">
                    <i style="float:left;line-height:17px;" class="fa fa-volume-up"></i>
                    <div class="home-tips-container">
                        <span style="color: #009688">偷偷告诉大家，本博客的后台管理也正在制作，为大家准备了游客专用账号！</span>
                        <span style="color: red">网站新增留言回复啦！使用QQ登陆即可回复，人人都可以回复！</span>
                        <span style="color: red">如果你觉得网站做得还不错，来Fly社区点个赞吧！<a href="http://fly.layui.com/case/2017/" target="_blank" style="color:#01AAED">点我前往</a></span>
                        <span style="color: #009688">不落阁 &nbsp;—— &nbsp;一个.NET程序员的个人博客，新版网站采用Layui为前端框架，目前正在建设中！</span>
                    </div>
                </div>
                <!--左边文章列表-->
                <div class="blog-main-left">
                      <?php if(is_array($data['article']) || $data['article'] instanceof \think\Collection || $data['article'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
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
                            <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo date("Y-m-d H:i:s",$vo['a_time']); ?></span>
                            <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $vo['a_author']; ?></span>
                            <span><i class="fa fa-tag"></i>&nbsp;&nbsp;<a href="#"><?php echo $data['category'][$vo['c_id']]['c_name']; ?></a></span>
                            <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;<?php echo $vo['a_click']; ?></span>
                            <span class="article-viewinfo"><i class="fa fa-commenting"></i>&nbsp;<?php echo $vo['a_like']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <ul class="pagination">
                     <?php echo $data['article']->render(); ?>
                    </ul>
              
                </div>
                <!--右边小栏目-->
                <div class="blog-main-right">
                    <div class="blogerinfo shadow">
                        <div class="blogerinfo-figure">
                            <img src="/front/images/Absolutely.jpg" alt="Absolutely" />
                        </div>
                        <p class="blogerinfo-nickname">Aliker</p>
                        <p class="blogerinfo-introduce">一枚php开发工程师</p>
                        <p class="blogerinfo-location"><i class="fa fa-location-arrow"></i>&nbsp;广东 - 深圳</p>
                        <hr />
                        <div class="blogerinfo-contact">
                            <a target="_blank" title="QQ交流" href="javascript:layer.msg('启动QQ会话窗口')"><i class="fa fa-qq fa-2x"></i></a>
                            <a target="_blank" title="给我写信" href="javascript:layer.msg('启动邮我窗口')"><i class="fa fa-envelope fa-2x"></i></a>
                            <a target="_blank" title="新浪微博" href="javascript:layer.msg('转到你的微博主页')"><i class="fa fa-weibo fa-2x"></i></a>
                            
                        </div>
                    </div>
                    <div></div><!--占位-->
                    <div class="blog-module shadow">
                        <div class="blog-module-title">热文排行</div>
                        <ul class="fa-ul blog-module-ul">
                            <?php if(is_array($data['article_hot']) || $data['article_hot'] instanceof \think\Collection || $data['article_hot'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['article_hot'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>   
                            <li><i class="fa-li fa fa-hand-o-right"></i><a href="<?php echo url('article/detail','id='.$vo['a_id']); ?>"><?php echo $vo['a_title']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>

                    <div class="blog-module shadow">
                        <div class="blog-module-title">热门标签</div>
                        <?php if(is_array($data['tags']) || $data['tags'] instanceof \think\Collection || $data['tags'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <a href=""><span class="layui-badge layui-bg-gray "><?php echo $vo['t_name']; ?></span>&nbsp;&nbsp;&nbsp;</a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>

                    <div class="blog-module shadow">
                        <div class="blog-module-title">最新评论</div>
                        <dl class="footprint">
                            <dt>2017年03月12日</dt>
                            <dd>新增留言回复功能！人人都可参与回复！</dd>
                        </dl>
                    </div>
               
                    <div class="blog-module shadow">
                        <div class="blog-module-title">友情链接</div>
                        <ul class="blogroll">
                            <li><a target="_blank" href="http://www.layui.com/" title="Layui">Layui</a></li>
                            <li><a target="_blank" href="http://www.pagemark.cn/" title="页签">页签</a></li>
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
        <li class="layui-nav-item layui-this">
            <a href="home.html"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
        </li>
        <li class="layui-nav-item">
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