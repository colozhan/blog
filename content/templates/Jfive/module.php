<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
if (!function_exists('_g')) {
	emMsg('请先安装<a href="http://www.emlog.net/plugin/144" target="_blank">模板设置插件</a>', BLOG_URL . 'admin/plugins.php');
} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<div class="widget widget_calendar">
	<div id="calendar_wrap">
	<h3><?php echo $title; ?></h3>
    <div id="calendar">
    </div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</div></div>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
    
	<div class="widget">
	<h3><?php echo $title; ?></h3>
	<div class="tagcloud">
	<?php foreach($tag_cache as $value): ?>
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a>
	<?php endforeach; ?>
	</div>
	</div>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
    
	<div class="widget">
	<h3><?php echo $title; ?></h3>
	<ul>
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li class="cat-item cat-item">
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
    </li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
    
	<div class="widget widget_recent_comments" id="recent-comments">
	<h3><?php echo $title; ?></h3>
	<ul>
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><?php echo $value['t']; ?><?php echo $img;?></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
    
	<div class="widget widget_recent_comments" id="recent-comments">
	<h3><?php echo $title; ?></h3>
	<ul id="recentcomments">
	<?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
	<li class="recentcomments"><?php echo $value['name']; ?>
	:<a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
    
	<div id="recent-posts" class="widget widget_recent_entries">
	<h3><?php echo $title; ?></h3>
	<ul>
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	
	<div id="recent-posts" class="widget widget_recent_entries">
	<h3><?php echo $title; ?></h3>
	<ul>
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	
	<div id="recent-posts" class="widget widget_recent_entries">
	<h3><?php echo $title; ?></h3>
	<ul>
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>

<div id="search">
    <form name="keyform" method="get" id="searchform" action="<?php echo BLOG_URL; ?>index.php">
      <input name="keyword" id="s" type="text" value="" size="30" x-webkit-speech/>
      <button type="submit" id="searchsubmit" ><i class="iconfont">&#337;</i></button>
    </form>
  </div>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div class="widget widget_archive">
	<h3><?php echo $title; ?></h3>
	<ul>
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul></div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	 <div class="widget widget_text">
	<h3><?php echo $title; ?></h3>
	<div class="textwidget">
	<?php echo $content; ?>
	</div>
	</div>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
	<div class="widget">
	<h3><?php echo $title; ?></h3>
	<ul>
	<?php foreach($link_cache as $value): ?>
	<li class="cat-item cat-item"><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?> 
<?php
//blog：small导航
function blog_small_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<select class="selectnav" id="selectnav1">
    <option value="<?php echo BLOG_URL; ?>">选择频道</option>
	<?php
	foreach($navi_cache as $value):

        if ($value['pid'] != 0) {
            continue;
        }
		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
			<option value="<?php echo BLOG_URL; ?>admin/">管理站点</option>
			<option value="<?php echo BLOG_URL; ?>admin/?action=logout">退出</option>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
		<option class="<?php echo $current_tab;?>" value="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></option>
			<?php if (!empty($value['children'])) :?>
                <?php foreach ($value['children'] as $row){
                        echo '<option value="'.Url::sort($row['sid']).'">'.$row['sortname'].'</option>';
                }?>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<option value="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</option>';
                }?>
            <?php endif;?>
	<?php endforeach; ?>
	</select>
<?php }?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<ul id="nav">
	<?php
	foreach($navi_cache as $value):

        if ($value['pid'] != 0) {
            continue;
        }

		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
            <li id="menu-item-1000" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-1000"><a href="<?php echo BLOG_URL; ?>admin/">管理</a>
            <ul class="sub-menu">
			<li id="menu-item-997" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-997"><a href="<?php echo BLOG_URL; ?>admin/comment.php">评论</a></li>
            <li id="menu-item-998" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-998"><a href="<?php echo BLOG_URL; ?>admin/write_log.php">发表</a></li>
			<li id="menu-item-999" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-999"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li></ul></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
		<li id="menu-item-<?php echo $current_tab;?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-<?php echo $current_tab;?>">
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-menu">
                <?php foreach ($value['children'] as $row){
                        echo '<li id="menu-item-<?php echo $current_tab;?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-<?php echo $current_tab;?>"><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-nav">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li id="menu-item-<?php echo $current_tab;?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-<?php echo $current_tab;?>"><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

		</li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
       echo $top == 'y' ? "<img src=\"".TEMPLATE_URL."/images/top.png\" title=\"首页置顶文章\" /> " : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/sortop.png\" title=\"分类置顶文章\" /> " : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
    
	<?php endif;?>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = ' ';
		foreach ($log_cache_tags[$blogid] as $key=>$value){
			$tag .= "<a href=\"".Url::tag($value['tagurl'])."\" class=\"tag".$key."\">".$value['tagname'].' </a>';
		}
		echo $tag.' ';
	}else {
		echo '暂无标签';
	}
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
    <div class="prev">
	&laquo; <a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a></div>
	<?php endif;?>
	<?php if($nextLog && $prevLog):?>
		|
	<?php endif;?>
	<?php if($nextLog):?>
    <div class="next">
		 <a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a>&raquo;</div>
	<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments,$comnum){
    extract($comments);
    if($commentStacks): ?>
	<a name="comments"></a>
	<h3> <?php echo $comnum;?>条评论</h3>
	<?php endif; ?>
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<ol class="comment_list">
		<li id="li-comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" class="avatar avatar-40 photo"  height="40" width="40"/></div><?php endif; ?>
		<div class="comment">
         <div class="comment_meta">
         	<cite><?php echo $comment['poster']; ?></cite>
        	<span class="time"><?php echo $comment['date']; ?></span>
         </div>
			<P><?php echo $comment['content']; ?><span class="reply" style="float: right;"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" class="comment-reply-link">回复</a></span></P>
            
		</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</li></ol>
	<?php endforeach; ?>
    <div id="comment-nav-below" class="comment_nav" role="navigation">
	    <?php echo $commentPageUrl;?>
    </div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<ol class="children">
		<li id="li-comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" class="avatar avatar-40 photo"  height="40" width="40"/></div><?php endif; ?>
		<div class="comment">
         <div class="comment_meta">
         	<cite><?php echo $comment['poster']; ?></cite>
        	<span class="time"><?php echo $comment['date']; ?></span>
         	
         </div>
			<P><?php echo $comment['content']; ?><span class="reply" style="float: right;"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" class="comment-reply-link">回复</a></span></P>
            
		</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</li></ol>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
    <div id="comment-place">
    <div class="comment-post" id="comment-post">
    <div id="respond" class="comment-respond">
<h3 id="reply-title" class="comment-reply-title">发表评论：
<small><a name="respond"></a><span class="cancel-reply" id="cancel-reply" style="display: none;"><a rel="nofollow" id="cancel-comment-reply-link" href="javascript:void(0);" onclick="cancelReply()">取消回复</a></span></small>
</h3>
		<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform" class="comment-form">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<?php if(ROLE == ROLE_VISITOR): ?>
            <p class="comment-notes">电子邮件地址不会被公开。 必填项已用<span class="required">*</span>标注</p>
			<p class="comment-form-author">
				<label for="author">昵称<span class="required">*</span></label>
                <input type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="30" tabindex="1" style="width: 34%;">
			</p>
			<p class="comment-form-email">
				<label for="email">电子邮件<span class="required">*</span></label>
                <input type="text" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" size="30" tabindex="2" aria-required="true" style="width: 34%;">	
			</p>
			<p class="comment-form-url">
            <label for="url">个人主页 (选填)</label>
				<input type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="30" tabindex="3" style="width: 34%;">
				
			</p>
            
            
            <?php else:
			$CACHE = Cache::getInstance();
	$user_cache = $CACHE->readCache('user');?>
    <span>您当前已登录为: <?php echo $user_cache[UID]['name']; ?>-<a href="<?php echo BLOG_URL; ?>admin/?action=logout" title="登出此帐户">登出？</a></span>
			<?php endif; ?>
			<p class="comment-form-comment">
            <textarea name="comment" id="comment" cols="45" rows="8" tabindex="4" aria-required="true" style="width:99%;"></textarea></p><p><?php echo $verifyCode; ?></p>
			<p class="form-submit">
           <input type="submit" id="comment_submit" value="发表评论" tabindex="6" style="width:30%"/>
		<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/></p>
		</form>
	</div></div></div>
	</div>
	<?php endif; ?>
<?php }?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>