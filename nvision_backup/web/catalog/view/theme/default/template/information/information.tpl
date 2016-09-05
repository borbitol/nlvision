<?php echo $header; ?><?php echo $column_left; ?>


<!-- Middle section -->
<div class="middle">
		
<!-- Inner page title -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="inner_page_title">
				<h1><?php echo $heading_title; ?></h1>
				<ul class="breadcrumb_list">
				<?php for ($i=0; $i < (count($breadcrumbs) - 1); $i++) { ?>
					<li><?php echo $breadcrumbs[$i]['separator']; ?><a href="<?php echo $breadcrumbs[$i]['href']; ?>"><?php echo $breadcrumbs[$i]['text']; ?></a></li>
				<?php } ?>
		
					<li><?php echo $breadcrumbs[$i]['separator']; ?><?php echo $breadcrumbs[$i]['text']; ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="inner_page">
				<div class="row">

					<!-- About page -->
					<div class="about_page clearfix">
						<div class="col-md-12">
							<?php echo $description; ?>
						</div>
					</div>
					<?php echo $content_top; ?>
					<?php echo $column_right; ?>

				</div>
			</div>
			
		</div>
	</div>
</div>


<?php echo $content_bottom; ?>
<?php echo $footer; ?>