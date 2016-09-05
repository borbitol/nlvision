<aside class="aside">
						<div class="col-md-3">
							<h2 class="aside_title"><?php echo $this->language->get('text_categories'); ?></h2>
							<ul class="aside_list">
								<li><a href="<?php echo $this->url->link('product/showproductall'); ?>"><?php echo $this->language->get('text_all_products'); ?></a></li>
								<?php foreach ($categories as $category) { ?>
								<li>
									<a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
									<?php if (($category['children'])) { ?>
									<ol>
									<?php foreach ($category['children'] as $child) { ?>
									
										<li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
										
									<? } ?>
									</ol>
									<? } ?>
								</li>
								<? } ?>
							</ul>
                            
							<h2 class="aside_title"><?php echo $this->language->get('text_engineers'); ?></h2>
							<div class="engineer_block">
								<div class="engineer_photo"><img src="catalog/view/theme/default/stylesheet/img/engineer_photo.png" alt="Engineer photo"></div>
								<div class="engineer_title"><?php echo $this->language->get('text_engin_name'); ?></div>
								<div class="engineer_text"><?php echo $this->language->get('text_engin_text'); ?></div>
								<ul class="engineer_list">
									<li><?php echo $this->language->get('text_tel'); ?>: +370 6 123 4567</li>
									<li><?php echo $this->language->get('text_mail'); ?>: name.surname@site.com</li>
								</ul>
								<button class="engineer_button" onclick="location = '<?php echo $this->url->link('information/contact'); ?>'"><?php echo $this->language->get('text_send_message'); ?></button>
							</div>
						</div>
					</aside>
