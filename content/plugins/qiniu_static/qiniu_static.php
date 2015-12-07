<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!');
/*
Plugin Name: 七牛镜像存储插件
Version: 1.0.1
Plugin URL: http://ihaotian.me
Description: 使用七牛云存储实现 WordPress 博客静态文件 CDN 加速！
Author: Haotian
Author URL: http://ihaotian.me
*/

if (!defined('QINIU_STATIC_ROOT'))
	define('QINIU_STATIC_ROOT', EMLOG_ROOT.'/content/plugins/qiniu_static');

require_once QINIU_STATIC_ROOT.'/qiniu_static_config.php';

addAction('adm_sidebar_ext', 'qiniu_static_menu');
function qiniu_static_menu() {
	echo '<div class="sidebarsubmenu" id="qiniu_static"><a href="./plugin.php?plugin=qiniu_static">七牛镜像存储</a></div>';
}
addAction('index_head','qiniu_static_head');
function qiniu_static_head(){
	ob_start("qiniu_static_do");
}
addAction('index_footer','qiniu_static_footer');
function qiniu_static_footer(){
	ob_end_flush();
}

function qiniu_static_do($string){
	$regex	= '/'.str_replace('/','\/',LOCAL_HOST).'\/([^\s\?\\\'\"\;\>\<]{1,}.('.CDN_EXTS.'))([\"\\\'\s\?]{1})/';
	$string =  preg_replace($regex, CDN_HOST.'/$1$3', $string);
	if (COMPRESSED){
		$string = str_replace(array("\n","\t","\r\n"), '', $string);
		$pattern = array( "/> *([^ ]*) *</", "/[\s]+/", "/<!--[^!]*-->/", "'/\*[^*]*\*/'" );
		$replace = array( ">\\1<", " ", "", "\"", "\"", "" ); 
		return trim(preg_replace($pattern, $replace, $string));
	}
	return $string;
}