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
								
								<!-- Product page -->
								<div class="product_page">
									<div class="col-md-12">
										<div class="row">
											<div class="product_info clearfix">
												<div class="col-md-4">
													<div class="product_img">
														<img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" />
													</div>
												</div>
												<div class="col-md-8">
													<h2 class="product_name"><?php echo $heading_title; ?></h2>
													<div class="product_quantity">
													<input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />
														<form>
															<div class="number">
																<span class="minus"></span>
																<input type="text" name="quantity" size="2" value="<?php echo $default_quantity; ?>" />

																<span class="plus"></span>
															</div>
															<button id="button-cart" class="green_btn"><?php echo $this->language->get('text_add_to_cart'); ?></button>
														</form>
													</div>
                          <?php if ($main_category_name) { ?>
                            <div class="product_category">
                              <p><?php echo $this->language->get('text_category'); ?>: <a href="<?php echo $main_category_href; ?>"><?php echo $main_category_name; ?></a></p>
                            </div>
                          <?php } ?>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="product_description">
												<div class="col-md-12">
													<ul class="description_tabs_link">
														<li class="active" rel="descr-panel1"><?php echo $this->language->get('text_description'); ?></li>
														<?php if ($attribute_groups) { ?>
														<li rel="descr-panel2"><?php echo $this->language->get('text_properties'); ?></li>
														<? } ?>
													</ul>
													<div id="descr-panel1" class="description_tabs_content active">
														<div class="description_header"></div>
														<div class="row">
														
															<div class="col-md-12">
															
																<? echo $description; ?>
																
															</div>
															
														</div>
													</div>
													
  											   <?php if ($attribute_groups) { ?>
													<div id="descr-panel2" class="description_tabs_content">
														<h4 class="inner_page_head_title"><?php echo $this->language->get('text_properties'); ?></h4>
														<table class="descr-option">
														<?php foreach ($attribute_groups as $attribute_group) { ?>
														<?php foreach ($attribute_group['attribute'] as $attribute) { ?>
															<tr>
																<td><?php echo $attribute['name']; ?></td>
																<td><?php echo $attribute['text']; ?></td>
															</tr>
														<? } ?>
														<? } ?>
														</table>
													</div>
												<? } ?>
												</div>		
											</div>
										</div>

										<?php if ($products) { ?>
										<div class="row">
											<div class="similar">
												<h4 class="inner_page_head_title"><?php echo $this->language->get('text_similar_products'); ?></h4>
												<?php foreach ($products as $product) { ?>
												<div class="col-md-4 col-sm-6">
													<div class="popular_goods_item">
														<div class="popular_goods_image">
															<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" /></a>
														</div>
														<div class="popular_goods_name_block">
															<a href="<?php echo $product['href']; ?>" class="popular_goods_name"><?php echo $product['name']; ?></a>
															<button onclick="addToCart('<?php echo $product['product_id']; ?>');" class="popular_goods_basket_add"></button>
														</div>
													</div>
												</div>
												<? } ?>
											</div>
										</div>
										<? } ?>
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

  <?php echo $content_bottom; ?>


<?php echo $footer; ?>
<script type="text/javascript"><!--
$('#button-cart').bind('click', function(e) {
  e.preventDefault();
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('.product_page input[type=\'text\'], .product_page input[type=\'hidden\'], .product_page input[type=\'radio\']:checked, .product_page input[type=\'checkbox\']:checked, .product_page select, .product_page textarea'),
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, information, .error').remove();
			
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
			} 
			
			if (json['success']) {
				// $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
					
				// $('.success').fadeIn('slow');
					
				// $('#cart-total').html(json['total']);
				
        $('html, body').animate({ scrollTop: 0 }, 'slow'); 
          
          $('.basket').load('index.php?route=module/cart', function(){
            
              $('.basket_content').slideDown();
            
            
          });
			}	
		}
	});
});
//--></script>
