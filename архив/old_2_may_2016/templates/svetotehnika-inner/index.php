<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php 
$document = & JFactory::getDocument();
$cur_lang = $document->language;
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="ru">
<head>
<jdoc:include type="head" />
<link href="templates/svetotehnika/css/styles.css?<?php echo rand(1,10000); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/svetotehnika/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="templates/svetotehnika/js/popup.menu.js"></script>
<script type="text/javascript">
$(function() {
	$('#upm').popUpMenu({
		direction: 'bottom'
	});

})
</script>
</head>
<body>
<div id="wrap">
	<div class="wrap-header">
    	<div class="header head-inner">
        	<div class="logo"><a href="<?php echo $this->baseurl ?>">
			<?php if ($cur_lang == 'en-gb') { ?>
				<img src="templates/svetotehnika/images/logo_en.png" alt="" />
				<?php } elseif ($cur_lang == 'lt-lt') { ?>
				<img src="templates/svetotehnika/images/logo_lt.png" alt="" />
			<?php } else { ?>
				<img src="templates/svetotehnika/images/logo.png" alt="" />
			<?php } ?>
			</a>
			</div>
			<jdoc:include type="modules" name="menu" />          
        </div>
    </div>
    <div class="cont-box">      

        	<jdoc:include type="message" />
			<jdoc:include type="component" />
			<jdoc:include type="modules" name="contact" />
        
    <div class="clear"></div>
    </div>
<div class="f-blank"></div>
</div>
<div id="footer">

	<div class="search-wrap">
    	<div class="search-wrap-in">
			<?php if ($cur_lang == 'en-gb') { ?>
				<div class="search-title">Search on site</div>
				<?php } elseif ($cur_lang == 'lt-lt') { ?>
				<div class="search-title" style="font-size:15px;">Paieška svetainėje</div>
			<?php } else { ?>
				<div class="search-title">Поиск по сайту</div>
			<?php } ?>
			<jdoc:include type="modules" name="search" />
  
        <div class="clear"></div>
        </div>
    </div>
	
    <div class="partners">
    	<jdoc:include type="modules" name="ikonki" />
    </div>
	
	<?php if ($cur_lang == 'en-gb') { ?>
		<div class="copy">Copyright &copy; 2014 Svetotehnika</div>
	<?php } else { ?>
		<div class="copy">Copyright &copy; 2014 Светотехника</div>
	<?php } ?>
</div>
</body>
</html>
