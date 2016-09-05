<?php echo $header; ?>



<!-- Middle section -->
<div class="middle">
	
	
	
	
	<!-- Inner page title -->
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="inner_page_title">
					<h1><?php echo $heading_title; ?></h1>
					<ul class="breadcrumb_list">
						<?php foreach ($breadcrumbs as $breadcrumb) { ?>
							<?php if ($breadcrumb['href']) { ?>
								<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
								<?php } else { ?>
								<li><?php echo $breadcrumb['text']; ?></li>
              <?php } ?>
            <?php } ?>
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
									
									<!-- Cart page -->
									<div class="shop_page">
										
										<div class="col-md-12">	
											
                      <?php if ($categories) { ?>
                        <?php if ($attention) { ?>
                          <div class="alert alert-attetion"><?php echo $attention; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
                        <?php } ?>
                        <?php if ($success) { ?>
                          <div class="alert alert-success"><?php echo $success; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
                        <?php } ?>
                        <?php if ($error_warning) { ?>
                          <div class="alert alert-error"><?php echo $error_warning; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
                        <?php } ?>
                      <?php } ?>
											
											
											<?php if (!$categories) { ?>
												<div class="empty_cart">
													<?php echo $this->language->get('text_empty_cart'); ?>
                        </div>
												
												<?php } else { ?>
												
												<form action="<?php echo $action; ?>" method="POST">
                          <?php foreach ($categories as $category) { ?>
                            <div class="shop_page_title">
                              <img src="catalog/view/theme/default/stylesheet/img/<?php echo $category['thumb']; ?>" alt="<?php echo $category['category_name'] ?>">
                              <span><?php echo $category['category_name'] ?></span>
                            </div>
                            
                            <?php if ($category['products']) { ?>
                              <div class="shop_table_block">
                                <table class="shop_table">
                                  <thead>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td class="product-thumbnail">&nbsp;</td>
                                      <td class="product-name"><?php echo $this->language->get('text_product'); ?></td>
                                      <td><?php echo $this->language->get('text_quantity'); ?></td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($child['products'] as $product) { ?>
                                      <tr>
                                        <td class="remove"><a href="<?php echo $product['remove']; ?>">×</a></td>
                                        <td class="product-thumbnail"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>"></a></td>
                                        <td class="product-name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
                                        <td>
                                          <div class="product_quantity">
                                            
                                            <div class="number">
                                              <span class="minus"></span>
                                              <input type="text" name="products[<?php echo $product['key']; ?>]" value="<?php echo $product['quantity']; ?>">
                                              <span class="plus"></span>
                                            </div>
                                            
                                          </div>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            <?php } ?>
                            
                            
                            <?php foreach ($category['children'] as $child) { ?>
                              <div class="shop_table_block">
                                <h3 class="table_header"><?php echo $child['category_name']; ?></h3>
                                <?php if ($child['products']) { ?>
                                  <table class="shop_table">
                                    <thead>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td class="product-thumbnail">&nbsp;</td>
                                        <td class="product-name"><?php echo $this->language->get('text_product'); ?></td>
                                        <td><?php echo $this->language->get('text_quantity'); ?></td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($child['products'] as $product) { ?>
                                        <tr>
                                          <td class="remove"><a href="<?php echo $product['remove']; ?>">×</a></td>
                                          <td class="product-thumbnail"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>"></a></td>
                                          <td class="product-name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
                                          <td>
                                            <div class="product_quantity">
                                              
                                              <div class="number">
                                                <span class="minus"></span>
                                                <input type="text" name="products[<?php echo $product['key']; ?>]" value="<?php echo $product['quantity']; ?>">
                                                <span class="plus"></span>
                                              </div>
                                              
                                            </div>
                                          </td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                  </table>
                                  
                                  
                                <?php } ?>
                              </div>
                            <?php } ?>
                            
                          <?php } ?>	
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          <?php if ($other_products) { ?>
                            <div class="shop_page_title">
                              <img src="catalog/view/theme/default/stylesheet/img/all-products.png" alt="<?php echo $this->language->get('text_other'); ?>">
                              <span><?php echo $this->language->get('text_other'); ?></span>
                            </div>
                            
                            <?php if ($other_products) { ?>
                              <div class="shop_table_block">
                                <table class="shop_table">
                                  <thead>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td class="product-thumbnail">&nbsp;</td>
                                      <td class="product-name"><?php echo $this->language->get('text_product'); ?></td>
                                      <td><?php echo $this->language->get('text_quantity'); ?></td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($other_products as $product) { ?>
                                      <tr>
                                        <td class="remove"><a href="<?php echo $product['remove']; ?>">×</a></td>
                                        <td class="product-thumbnail"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>"></a></td>
                                        <td class="product-name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
                                        <td>
                                          <div class="product_quantity">
                                            
                                            <div class="number">
                                              <span class="minus"></span>
                                              <input type="text" name="products[<?php echo $product['key']; ?>]" value="<?php echo $product['quantity']; ?>">
                                              <span class="plus"></span>
                                            </div>
                                            
                                          </div>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            <?php } ?>
                            
                          <?php } ?>	
                          
                          
                          
                          
                          
                          
                          
                          <div class="request_block">
                            <h3 class="request_title"><?php echo $this->language->get('text_send_request'); ?></h3>
                            
                            <?php if ($error_standard) { ?>
                              <span class="error"><?php echo $error_standard; ?></span>
                            <?php } ?>
                            <div class="request_standard_selection clearfix">
                              <div class="col-md-4 col-sm-4">
                                <div class="request_standard_item">	
                                  <label>
                                    <?php if ($standard == 'Standard 1') { ?>
                                      <input type="radio" name="standard" value="Standard 1" checked>
                                      <?php } else { ?>
                                      <input type="radio" name="standard" value="Standard 1">
                                    <?php } ?>
                                    <span><?php echo $this->language->get('text_standard'); ?> 1</span>
                                  </label>
                                </div>
                              </div>	
                              <div class="col-md-4 col-sm-4">
                                <div class="request_standard_item">	
                                  <label>
                                    <?php if ($standard == 'Standard 2') { ?>
                                      <input type="radio" name="standard" value="Standard 2" checked>
                                      <?php } else { ?>
                                      <input type="radio" name="standard" value="Standard 2">
                                    <?php } ?>
                                    <span><?php echo $this->language->get('text_standard'); ?> 2</span>
                                  </label>
                                </div>
                              </div>	
                              <div class="col-md-4 col-sm-4">
                                <div class="request_standard_item">	
                                  <label>
                                    <?php if ($standard == 'Standard 3') { ?>
                                      <input type="radio" name="standard" value="Standard 3" checked>
                                      <?php } else { ?>
                                      <input type="radio" name="standard" value="Standard 3">
                                    <?php } ?>
                                    <span><?php echo $this->language->get('text_standard'); ?> 3</span>
                                  </label>
                                </div>
                              </div>	
                            </div>
                            
                            
                            
                            <div class="feedback_block clearfix">
                              <div class="row">
                                <div class="col-md-6">
                                  <?php if ($error_firstname) { ?>
                                    <span class="error"><?php echo $error_firstname; ?></span>
                                  <?php } ?>
                                  <input type="text" placeholder="<?php echo $this->language->get('text_name'); ?>:" name="firstname" id="name" value="<?php echo $firstname; ?>">
                                </div>
                                <div class="col-md-6">
                                  <?php if ($error_lastname) { ?>
                                    <span class="error"><?php echo $error_lastname; ?></span>
                                  <?php } ?>
                                  <input type="text" placeholder="<?php echo $this->language->get('text_last_name'); ?>:"name="lastname" value="<?php echo $lastname; ?>">
                                  
                                </div>
                                <div class="col-md-6">
                                  <?php if ($error_email) { ?>
                                    <span class="error"><?php echo $error_email; ?></span>
                                  <?php } ?>
                                  <input type="text" placeholder="E-mail:" name="email" value="<?php echo $email; ?>">
                                  
                                </div>
                                <div class="col-md-6">
                                  <?php if ($error_telephone) { ?>
                                    <span class="error"><?php echo $error_telephone; ?></span>
                                  <?php } ?>
                                  <input type="text" placeholder="<?php echo $this->language->get('text_phone'); ?>" name="telephone" value="<?php echo $telephone; ?>">
                                  
                                </div>
                              </div>
                              <label>
                                <?php if ($need_assistance) { ?>
                                  <input type="checkbox" name="need_assistance" value="1" checked>
                                  <?php } else { ?>
                                  <input type="checkbox" name="need_assistance" value="1">
                                <?php } ?>
                                <span><?php echo $this->language->get('text_require_assistance'); ?></span>
                              </label><br>
                              <button class="engineer_button" type="submit"><?php echo $this->language->get('text_send_request'); ?></button>
                            </div>
                            
                            
                          </div>
                          
                        </form>
                      <?php } ?>
                      
                      
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
  <script>
    // $('.engineer_button').on('click', function(e){
    // e.preventDefault();
    // var form = $(this).closest('form');
    
    // console.log(form.serialize());
    // return;
    // });
  </script>
