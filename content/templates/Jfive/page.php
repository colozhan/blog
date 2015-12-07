<?php 
/**
 * 自建页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div id="main">
		
		<div id="article">
			<h1 class="page" title="<?php echo $log_title; ?>"><?php echo $log_title; ?></h1>
			<div class="text"><?php echo $log_content; ?></div>     
		</div>
        <div id="comments">
		<?php blog_comments($comments,$comnum); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
        </div>
        <?php include View::getView('side'); ?>
	</div>
<?php
 include View::getView('footer');
?>