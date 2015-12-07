</div>
<div id="totop" class="totop"><i class="iconfont">&#404;</i>回顶部</div>
<script type="text/javascript">
	$(window).scroll(function () {
        var dt = $(document).scrollTop();
        var wt = $(window).height();
        if (dt <= 0) {
            $("#totop").hide();
            return;
        }
        $("#totop").show();
        if ($.browser.msie && $.browser.version == 6.0) {//IE6返回顶部
            $("#totop").css("top", wt + dt - 110 + "px");
        }
    });
    $("#totop").click(function () { $("html,body").animate({ scrollTop: 0 }, 200) });
</script>
</div>
<div id="footer">
	&copy; 2015 <?php echo $blogname; ?>.
	Powered by <a href="http://www.emlog.net" rel="external nofollow" target="_blank">Emlog</a>.
    Theme Modify by <a href="http://blog.thanatos.xyz" title="一个有点二，有点精分的攻城狮" target="_blank">Thanatos.Xyz</a>.
        Version T.1449474815.
    <?php echo $icp; ?>
    <?php echo $footer_info; ?>
</div>
<?php doAction('index_footer'); ?>
</body>
</html>
