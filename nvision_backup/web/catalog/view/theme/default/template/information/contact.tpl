<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<!-- Middle section -->
		<div class="middle">




<!-- Inner page title -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="inner_page_title">
				<h1><?php echo $this->language->get('text_contacts'); ?></h1>
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

					<!-- Contacts page -->
					<div class="contact_page clearfix">
						<div class="col-md-12">
							<div class="maps_block">Maps block</div>
						</div>
						<div class="col-md-4">
							<div class="contact_block">
								<div class="inner_page_head_title"><?php echo $this->language->get('text_contacts'); ?></div>
								<div class="contact_img"><img src="catalog/view/theme/default/stylesheet/img/no-site.png" alt="Image"></div>
								<?php echo html_entity_decode($this->language->get('html_development_director'), ENT_COMPAT, 'UTF-8'); ?>
							</div>
						</div>
						<div class="col-md-8">
							<div class="inner_page_head_title"><?php echo $this->language->get('text_feedback_form'); ?></div>
							<div class="row">
								<div class="contact_form">
									<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
										<div class="col-md-4"><input name="name" type="text" placeholder="Имя:">
									    <?php if ($error_name) { ?>
									    <span class="error"><?php echo $error_name; ?></span>
									    <?php } ?>
										</div>
										<div class="col-md-4"><input name="email" type="email" placeholder="<?php echo $this->language->get('text_mail'); ?>:">
									    <?php if ($error_email) { ?>
									    <span class="error"><?php echo $error_email; ?></span>
									    <?php } ?>
										</div>
										<div class="col-md-4"><input type="text" placeholder="<?php echo $this->language->get('text_tel'); ?>:"></div>
										<div class="col-md-12">
											<textarea name="enquiry" placeholder="<?php echo $this->language->get('text_your_message'); ?>:"></textarea>
										    <?php if ($error_enquiry) { ?>
										    <span class="error"><?php echo $error_enquiry; ?></span>
										    <?php } ?>
										    
										</div>
										<div class="col-md-4">
										    <input placeholder="<?php echo $this->language->get('text_captcha'); ?>" type="text" name="captcha" value="<?php echo $captcha; ?>" />
                        <?php if ($error_captcha) { ?>
										    <span class="error"><?php echo $error_captcha; ?></span>
										    <?php } ?>
										    </div>
										   
										    <div class="col-md-3" style="*width:23%;">
										    <img style="margin-top: 3px;" src="index.php?route=information/contact/captcha" alt="" />
										    </div>
										    <div class="col-md-4">
											<button style="margin-top:5px;" class="green_btn"><?php echo $this->language->get('text_send'); ?></button>
											</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php echo $footer; ?>