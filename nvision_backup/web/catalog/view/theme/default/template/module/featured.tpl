<!-- Popular goods -->
	<div class="popular_goods">
		<div class="row">
			<h2><?php echo $this->language->get('text_popular_products'); ?></h2>
			<?php foreach ($products as $product) { ?>
			<div class="col-md-3 col-sm-6">
				<div class="popular_goods_item">
					<div class="popular_goods_image">
					<a href="<?php echo $product['href']; ?>">
						<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">	
					</a>
					</div>
					<div class="popular_goods_name_block">
						<a href="<?php echo $product['href']; ?>" class="popular_goods_name"><?php echo $product['name']; ?></a>
						<button class="popular_goods_basket_add" onclick="addToCart(<?php echo $product['product_id']; ?>, <?php echo $product['default_quantity']; ?>, $(this));"></button>
					</div>
				</div>
			</div>
			<? } ?>
			
			<div class="col-md-3 col-sm-6">
				<div class="popular_goods_all">
					<div class="popular_goods_all_icon">
						<img src="catalog/view/theme/default/stylesheet/img/featured-all-logo.png" alt="Featured logo">
					</div>
					<p class="popular_goods_all_text"><?php echo $this->language->get('text_all_products'); ?></p>
					<button class="popular_goods_all_button"><?php echo $this->language->get('text_shop'); ?></button>
				</div>
			</div>
		</div>
	</div>


