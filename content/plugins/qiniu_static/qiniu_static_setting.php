<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!');
if (!defined('QINIU_STATIC_ROOT'))
	define('QINIU_STATIC_ROOT', EMLOG_ROOT.'/content/plugins/qiniu_static');
function plugin_setting_view(){
	require (QINIU_STATIC_ROOT . '/qiniu_static_config.php');
	?>
		<h2>七牛镜像存储设置</h2>
		<?php
		if(isset($_GET['setting'])){
			echo "<span class='actived'>设置保存成功!</span>";
		}
		?>
		受到EMLOG接口限制，不能够将所有的文件链接都替换为七牛的链接。<br>
		如果需要全部替换，需要修改模板，<span style="color:red;font-weight:bold">请严格按照下面操作！</span><br>
		<span style="color:blue">请修改模板中的header.php，将&lt;?php doAction('index_head'); ?&gt;移到&lt;head&gt;标签后。</span>
	<form action="plugin.php?plugin=qiniu_static&action=setting" method="post">
		<table class="tb-set">
			<tr>
				<td align="right" width="25%"><b>七牛绑定的域名</b></td>
				<td width="75%"><input style="width:400px" type="text" name="cdn_host" value="<?php echo CDN_HOST;?>"></td>
			</tr>
			<tr>
				<td align="right" width="25%"><b>&nbsp;</b></td>
				<td width="75%">请填写你在七牛绑定的域名，一般为xxx.qiniudn.com或xxx.u.qiniudn.com。</td>
			</tr>
			<tr>
				<td align="right" width="25%"><b>静态文件域名</b></td>
				<td width="75%"><input style="width:400px" type="text" name="local_host" value="<?php echo LOCAL_HOST;?>"></td>
			</tr>
			<tr>
				<td align="right" width="25%"><b>&nbsp;</b></td>
				<td width="75%">请填写你的静态文件存放域名，一般为博客地址。<br>
				<span style="color:red">请确保前后地址格式一致，并且都填上http://<br>
				七牛域名末尾有斜杠的话，静态文件域名也加上斜杠。</span></td>
			</tr>
			<tr>
				<td align="right" width="25%"><b>需要缓存的扩展名</b></td>
				<td width="75%"><input style="width:400px" type="text" name="cdn_exts" value="<?php echo CDN_EXTS;?>"></td>
			</tr>
			<tr>
				<td align="right" width="25%"><b>&nbsp;</b></td>
				<td width="75%">扩展名不需要加点，大小写请自行判断，多个扩展名请用|隔开。</td>
			</tr>
			<tr>
				<td align="right" width="25%"><b>* 是否启用HTML压缩</b></td>
				<td width="75%"><input type="radio" name="compressed" value="1" <?php if (COMPRESSED) echo 'checked=yes';?>>启用<input type="radio" name="compressed" value="0" <?php if (!COMPRESSED) echo 'checked=yes';?>>不启用</td>
			</tr>
			<tr>
				<td align="right" width="25%"><b>&nbsp;</b></td>
				<td width="75%">本功能为<span style="color:red">高级功能</span>，可以将HTML最大程度压缩以加快访问，默认不开启。</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="保存" /></td>
			</tr>
			<tr>
				<td align="right" width="25%"><b>&nbsp;</b></td>
				<td width="75%">更多问题请戳<a href="http://ihaotian.me">本人博客</a>，可以留言得到解答。</td>
			</tr>
		</table>
	</form>
	<?php
}

function plugin_setting(){
	$cdn_host = $_POST['cdn_host'];
	$local_host = $_POST['local_host'];
	$cdn_exts = $_POST['cdn_exts'];
	$compressed = $_POST['compressed'];
	$newConfig = "<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!');
	define('CDN_HOST','$cdn_host');
	define('LOCAL_HOST','$local_host');
	define('CDN_EXTS','$cdn_exts');
	define('COMPRESSED','$compressed');
?>";
	@file_put_contents(QINIU_STATIC_ROOT.'/qiniu_static_config.php', $newConfig);
}
