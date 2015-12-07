<?php

/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
	//主题公告
		'zz' => array(
		'type' => 'text',
		'name' => '主题公告',
		'description' => '<iframe src="http://azt-lmt.com/line/theme-Jfive.html" width="100%" height="70" frameborder="0"></iframe>',
		'default' => '去不掉的input，对主题有问题请联系企鹅993745241，另外承接博客主题扒皮服务，价格公道',
		),	
	'sina' => array(
		'type' => 'text',
		'name' => '新浪微博',
		'description' => '你的新浪微博地址',
		'default' => '',
	),
		'tengxun' => array(
		'type' => 'text',
		'name' => '腾讯微博',
		'description' => '你的腾讯微博地址',
		'default' => '',
	),
);