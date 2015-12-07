<?php
/*
*404页面
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html style="margin-top: 32px !important;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>404错误</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="<?php echo BLOG_URL; ?>favicon.ico" type="image/x-icon" />
<script src="<?php echo TEMPLATE_URL; ?>jquery.min.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>theme.js"></script>
<meta name="generator" content="emlog" />
</head>

<body class="customize-support">
<div id="wrap">
<div id="content">
	<div class="errors_404">
    <a href="/" class="to_home">  </a>
    <a href="javascript:history.go(-1)" class="to_back">  </a>
	</div>
    </div>
</div>
</body>
</html>
