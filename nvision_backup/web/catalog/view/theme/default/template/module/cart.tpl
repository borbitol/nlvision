<p><?php echo $this->language->get('text_header_cart'); ?></p>
<div class="basket_content" style="display: none;">
	
	<?php if ($categories) { ?>
    
		<?php foreach ($categories as $category) { ?>
			<div class="basket_list">
				
				<div class="basket_content_title helecopter_cab" style="background-image:url(catalog/view/theme/default/stylesheet/img/<?php echo $category['thumb']; ?>)"><?php echo $category['category_name']; ?></div>
				
				<?php if ($category['products']) { ?>
					
					<div class="basket_item">
						<?php foreach ($category['products'] as $product) { ?>
							<div class="basket_thumbnail">
								<a href="<?php echo $product['href']; ?>">
									<img alt="<?php echo $product['name']; ?>" src="<?php echo $product['thumb']; ?>">
                </a>
								<p class="basket_thumbnail_quantity"><?php echo $product['quantity']; ?></p>
              </div>
            <?php } ?>
          </div>
					
					
        <?php } ?>
				
				
				
				<?php foreach ($category['children'] as $child) { ?>
					<div class="basket_item">
						<p class="basket_subtitle"><?php echo $child['category_name']; ?></p>
						<?php foreach ($child['products'] as $product) { ?>
							<div class="basket_thumbnail">
								<a href="<?php echo $product['href']; ?>">
									<img alt="<?php echo $product['name']; ?>" src="<?php echo $product['thumb']; ?>">
                </a>
								<p class="basket_thumbnail_quantity"><?php echo $product['quantity']; ?></p>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
		
    
    
    <?php if ($other_products) { ?>
			<div class="basket_list">
				
				<div class="basket_content_title helecopter_cab" style="background-image:url(catalog/view/theme/default/stylesheet/img/all-products-white.jpg)"><?php echo $this->language->get('text_other'); ?></div>
				
				<?php if ($other_products) { ?>
					
					<div class="basket_item">
						<?php foreach ($other_products as $product) { ?>
							<div class="basket_thumbnail">
								<a href="<?php echo $product['href']; ?>">
									<img alt="<?php echo $product['name']; ?>" src="<?php echo $product['thumb']; ?>">
                </a>
								<p class="basket_thumbnail_quantity"><?php echo $product['quantity']; ?></p>
              </div>
            <?php } ?>
          </div>
					
					
        <?php } ?>
        
      </div>
    <?php } ?>
		
    
    
    
    
    
    <div class="basket_footer">
			<p class="total"><strong><?php echo $this->language->get('text_total'); ?>:</strong> <?php echo $this->cart->countProducts(); ?></p>
			<button onclick="location = 'index.php?route=checkout/cart';" class="green_btn"><?php echo $this->language->get('text_view_cart'); ?></button>
    </div>
		<?php } else {?>
		
		<div class="basket_empty"><?php echo $this->language->get('text_empty_cart'); ?></div>
  <?php } ?>
</div>	