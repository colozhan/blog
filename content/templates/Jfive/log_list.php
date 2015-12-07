<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div id="main">
    <?php doAction('index_loglist_top'); ?>
		<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
		<div class="post_list">
				<h2><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a></h2>
                 <div class="info"><?php blog_author($value['author']); ?> | <?php blog_sort($value['logid']); ?>  | <?php echo gmdate('Y-n-j', $value['date']); ?></div>
				<div class="excerpt">
                <?php 
		preg_match_all("|<img[^>
						]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);
		$rand_img = TEMPLATE_URL.'images/random/tb'.rand(1,20).'.jpg';
		$imgsrc = !empty($img[1]) ? $img[1][0] : $rand_img;
	?>
					<div class="thumbnail"><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><img src="<?php echo TEMPLATE_URL; ?>timthumb.php?src=<?php echo $imgsrc; ?>&h=169&w=300&zc=1" alt="<?php echo $value['log_title']; ?>"/></a></div>
                	<?php echo subString(strip_tags($value['content']),0,200,"..."); ?>
                	<span class="more">[<a href="<?php echo $value['log_url']; ?>" title="详细阅读 <?php echo $value['log_title']; ?>" rel="bookmark">阅读全文</a>]</span>
                </div>
                <div class="meta">
                	<span class="meat_span"><i class="iconfont">&#279;</i><?php echo $value['views']; ?>次浏览</span>
                    <span class="meat_span"><i class="iconfont">&#54;</i><?php echo $value['comnum']; ?>条评论</span>
                    <span class="meat_span meat_max"><i class="iconfont">&#48;</i><?php blog_tag($value['logid']); ?></span>
                </div>
		</div>
<?php 
endforeach;
else:
?>
<h2>未找到</h2>
	<p>抱歉，没有符合您查询条件的结果。</p>

<?php endif;?>
		<div class="navigation">
		<div class="pagination"><?php echo $page_url;?></div></div>
	</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>