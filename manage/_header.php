<header>
	<div class="brand">
		<div class="logo"><a href="../index.php"><img src="../../images/all/logo.png?20191108" alt="<?php echo $WebName?>"></a></div>
		<h2>後端管理系統</h2>
	</div>
	<div class="btnWrap">
		<button class="full" onclick="window.open('<?php echo RootURL($_SERVER['PHP_SELF'])?>')" title="預覽網站">預覽網站</button>
		<?php if(! stristr($_SERVER["PHP_SELF"],"index.php")){?>
		<button onclick="location.href='../index.php?Action=logout'" title="登出">登出</button>
		<?php }?>
	</div>
</header>
