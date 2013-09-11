<?php
return array(
	/* 项目设定 */
    'APP_DEBUG' => true, // 开启调试模式

    // 数据库配置
	'URL_MODEL' => 2,
	'DB_TYPE'   => 'mysql',
	'DB_HOST'   => 'localhost',
	'DB_NAME'   => 'greenfibre',
	'DB_USER'   => 'root',
	'DB_PWD'    => '',
	'DB_PORT'   => 3306,
	'DB_PREFIX' => 'green_',

	/* 资源路径 */
    'TMPL_PARSE_STRING'     => array(
        '__CSS__' => __ROOT__.'/App/Public/Css',         // css路径
        '__IMG__' => __ROOT__.'/App/Public/Images',      // 图片路径
        '__JS__' => __ROOT__.'/App/Public/Js',           // js路径
        '__UPLOAD__' => __ROOT__.'/App/Public/Uploads',  // 上传文件路径
        //'__LOGIN__' => U('Accounts/doLogin'),
    ),

    /* URL设置 */
	'URL_ROUTER_ON'         => true , // 是否开启URL路由
	 'URL_MODEL'      => 1,     // PATHINFO 模式
    'URL_PATHINFO_MODEL'    => 1,       //设置为智能模式
    'URL_PATHINFO_DEPR'     => '/',	// PATHINFO模式下，各参数之间的分割符号
    'URL_HTML_SUFFIX'       => '',  // URL伪静态后缀设置

    /*登陆设置*/
    'SESSION_AUTO_START' => true,

    /*开启多语言包功能*/
    'LANG_SWITCH_ON' => true,   // 开启语言包功能
    'DEFAULT_LANG' => 'zh-cn', // 默认语言
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST'        => 'zh-cn,en-us', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'     => 'l', // 默认语言切换变量

);
?>