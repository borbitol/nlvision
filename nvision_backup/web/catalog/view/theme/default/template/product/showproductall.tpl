<?php echo $header; ?><?php echo $column_left; ?>
<?php echo $content_top; ?>

<!-- Middle section -->
		<div class="middle">




<!-- Inner page title -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="inner_page_title">
				<h1 class="shop-title"><?php echo $heading_title; ?></h1>
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
								
								<!-- Shop page -->
								<div class="shop_page">
									<div class="col-md-12">
										<div class="row">
											<?php if ($products) { ?>
											<?php foreach ($products as $product) { ?>
											<div class="col-md-4 col-sm-6">
												<div class="popular_goods_item">
													<div class="popular_goods_image">
														<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" /></a>
													</div>
													<div class="popular_goods_name_block">
														<a href="<?php echo $product['href']; ?>" class="popular_goods_name"><?php echo $product['name']; ?></a>
														<button class="popular_goods_basket_add" onclick="addToCart(<?php echo $product['product_id']; ?>, <?php echo $product['default_quantity']; ?>, $(this));"></button>
													</div>
												</div>
											</div>
											<?php } ?>
											<?php echo $pagination; ?>
											<?php } ?>
											  <?php if (!$products) { ?>
											  		<?php echo $text_empty; ?>
											  <?php } ?>


										</div>		
									</div>		
								</div>
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