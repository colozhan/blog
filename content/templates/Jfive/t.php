<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
<div id="contentleft">
    <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
    <div class="post_list">
   <div class="thumbnail"><img src="<?php echo $avatar; ?>" width="32px" height="32px" style="width:32px;height:32px;"/></div>
    <div class="post1"><span><?php echo $author; ?><a style="float: right;"><?php echo $val['date'];?></a></span><br /><?php echo $val['t'].'<br/>'.$img;?></div>
    <div class="clear"></div>
   	<ul id="r_<?php echo $tid;?>" class="r"></ul>
    </div>
    <?php endforeach;?>
	<div class="navigation"><div class="pagination"><?php echo $pageurl;?></div></div>
</div></div>
<?php include View::getView('side');?>
</div><!--end #contentleft-->
<?php include View::getView('footer');?>