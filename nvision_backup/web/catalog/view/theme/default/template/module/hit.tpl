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
														<button class="popular_goods_basket_add" onclick="addToCart('<?php echo $product['product_id']; ?>');"></button>
													</div>
												</div>
											</div>
											<?php } ?>
											
											<?php } ?>
											  


										</div>		
									</div>		
								</div>
							</div>
						</div>
					</div>