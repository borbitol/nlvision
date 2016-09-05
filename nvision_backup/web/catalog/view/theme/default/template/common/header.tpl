<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8" />
<title><?php echo $title; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<meta property="og:title" content="<?php echo $title; if (isset($_GET['page'])) { echo " - ". ((int) $_GET['page'])." ".$text_page;} ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $og_url; ?>" />
<?php if ($og_image) { ?>
<meta property="og:image" content="<?php echo $og_image; ?>" />
<?php } else { ?>
<meta property="og:image" content="<?php echo $logo; ?>" />
<?php } ?>
<meta property="og:site_name" content="<?php echo $name; ?>" />
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/css/main.css" />

<!--<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="catalog/view/javascript/common.js"></script>
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>

<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie7.css" />


<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie6.css" />
<script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('#logo img');
</script>

<?php if ($stores) { ?>
<script type="text/javascript">
$(document).ready(function() {
<?php foreach ($stores as $store) { ?>
$('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
<?php } ?>
});
</script>
<?php } ?>-->



<?php echo $google_analytics; ?>
</head>
<body>

<!-- Main block -->
	<div class="main">

		<!-- Header -->
		<header class="header">

			<div class="container">

				<div class="row">
					<div class="header_top clearfix">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="header_top_logo">
								<a href="#">
									<img src="catalog/view/theme/default/stylesheet/img/logo.png" alt="Logotype">
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="header_top_right">
								<div class="header_top_location">
									<a href="#">
										<img src="catalog/view/theme/default/stylesheet/img/lt.png" alt="Location country">
									</a>
                  </div>
								<?php echo $language; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="header_bottom">
							<div class="row">
								<div class="col-md-10 col-sm-6 col-xs-6">
									<nav class="header_menu">
										<a id="header__button" class="hamburger" href="javascript:void(0)">
											<div class="hamburger__inner"></div>
										</a>
										<ul>
											<li><a class="home_link" href="<?php echo $base; ?>"><?php echo $this->language->get('text_home_page'); ?></a></li>
											<li><a href="<?php echo $this->url->link('product/showproductall'); ?>"><?php echo $this->language->get('text_shop'); ?></a></li>
											<li><a href="<?php echo $this->url->link('information/articles'); ?>"><?php echo $this->language->get('text_standards'); ?></a></li>
											<li><a href="<?php echo $this->url->link('information/information', 'information_id=4'); ?>"><?php echo $this->language->get('text_about_us'); ?></a></li>
											<li><a href="<?php echo $this->url->link('information/contact'); ?>"><?php echo $this->language->get('text_contacts'); ?></a></li>
											<li><a href="<?php echo $this->url->link('information/news'); ?>"><?php echo $this->language->get('text_news'); ?></a></li>
										</ul>
									</nav>
								</div>
								<div class="col-md-2 col-sm-6 col-xs-6">
									<div class="basket">
                                        <?php echo $cart; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</header>
<div id="notification"></div>
