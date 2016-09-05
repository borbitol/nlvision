<?php if ($articles) { ?>
	<!-- Standarts -->

	<div class="standarts clearfix">
		<div class="row">
			<h2><?php echo $this->language->get('text_available_standards'); ?></h2>
			<div class="col-md-12">
				<div class="tooltip_msg clearfix">
					<p><?php echo $this->language->get('text_available_standards_description'); ?></p>
					<img class="close-btn" src="catalog/view/theme/default/stylesheet/img/close-msg.png" alt="Close icon">
				</div>
			</div>
			
			<?php foreach ($articles as $articles_story) { ?>
				<div class="col-md-4 col-sm-6">
					<div class="standarts_item">
						<div class="standarts_item_img">
							<img src="<?php echo $articles_story['thumb']; ?>" alt="<?php echo $articles_story['title']; ?>">
						</div>
						<p class="standarts_item_name"><?php echo $articles_story['title']; ?></p>
						<p class="standarts_item_info"><?php echo $articles_story['description']; ?>...</p>
						<a href="<?php echo $articles_story['href']; ?>" class="standarts_item_button"><?php echo $this->language->get('text_standard_more'); ?></a>
					</div>
				</div>
			<?php } ?>
			
		</div>
	</div>
<?php } ?>
