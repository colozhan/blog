<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div id="main">
		
		<div id="article">
			<h1><a href="<?php echo $value['log_url']; ?>" title="<?php echo $log_title; ?>"><?php echo $log_title; ?></a></h1>
			<div class="info">
            	<span class="meat_span">作者: <?php blog_author($author); ?></span>
                <span class="meat_span">分类: <?php blog_sort($logid); ?></span>
                <span class="meat_span">发布时间: <?php echo gmdate('Y-n-j', $date); ?></span>
                <span class="meat_span"><i class="iconfont">&#279;</i><?php echo $views; ?> 次浏览</span>
                <span class="meat_span"><i class="iconfont">&#54;</i><?php echo $comnum;?> 条评论</span>
               
            </div>
			<div class="text"><?php echo $log_content; ?>
			<?php doAction('log_related', $logData); ?></div>
            <div class="text_add">
                <div class="copy"><p style="color:#F00;">本文出自 <?php echo $blogname;?>，转载时请注明出处及相应链接。</p><p style="color:#777;font-size:12px;">本文永久链接: <a href="<?php echo BLOG_URL; ?>?post=<?php echo $logid; ?>"><?php echo BLOG_URL; ?>?post=<?php echo $logid; ?></a></p></div>
                </div>
			<div class="meta"><i class="iconfont">&#48;</i><?php blog_tag($logid); ?></div>
		</div>

        <div class="post_link">
			<?php neighbor_log($neighborLog); ?>
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