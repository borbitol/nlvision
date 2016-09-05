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
				
				<!-- Middle block-->
					<div class="middle_block">
						<div class="col-md-9">
							<div class="row">
				
  <?php if (isset($news_info)) { ?>
    <div class="box-news" <?php if ($image) { echo 'style="min-height: ' . $min_height . 'px;"'; } ?>>
      <!--<?php if ($image) { ?>
        <a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" class="colorbox thickbox jqzoom" rel="fancybox"><img align="right" style="border: none; margin-left: 10px;" src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
      <?php } ?>-->
      <?php echo $description; ?>
    </div>
    
  <?php } elseif (isset($news_data)) { ?>
  <!-- News page -->
								<div class="news_page">
									<div class="col-md-12">
    <?php foreach ($news_data as $news) { ?>
    <div class="news_page_item">
											<div class="inner_page_head_title"><?php echo $news['title']; ?></div>
											<div class="inner_page_text"><?php echo $news['description']; ?></div>
											<a href="<?php echo $news['href']; ?>" class="standarts_item_button"><?php echo $this->language->get('text_standard_more'); ?></a>
										</div>
      
    <?php } ?>
    				</div>
			</div>
  <?php } ?>
  
  
							</div>
						</div>
					</div>
					<?php echo $column_right; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $footer; ?>
