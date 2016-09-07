<footer class="footer">
  <div class="container">
    <div class="top-footer">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="footer_item">
            <h4 class="footer_item_title"><?php echo $this->language->get('text_contacts'); ?></h4>
            <div class="foonter_item_content">
              <p><?php echo $this->language->get('text_call_us'); ?></p>
              <span>+370 626 95055</span>
              <p><?php echo $this->language->get('text_or_by_email'); ?></p>
              <a href="mailto:vladimir.t@nvision.lt " class="mail">vladimir.t@nvision.lt</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer_item">
            <h4 class="footer_item_title"><?php echo $this->language->get('text_information'); ?></h4>
            <div class="foonter_item_content">
              <ul class="foonter_item_list">
                <li><a class="home_link" href="<?php echo HTTP_SERVER; ?>"><?php echo $this->language->get('text_home_page'); ?></a></li>
                <li><a href="<?php echo $this->url->link('product/showproductall'); ?>"><?php echo $this->language->get('text_shop'); ?></a></li>
                <li><a href="<?php echo $this->url->link('information/articles'); ?>"><?php echo $this->language->get('text_standards'); ?></a></li>
                <li><a href="<?php echo $this->url->link('information/information', 'information_id=4'); ?>"><?php echo $this->language->get('text_about_us'); ?></a></li>
                <li><a href="<?php echo $this->url->link('information/contact'); ?>"><?php echo $this->language->get('text_contacts'); ?></a></li>
                <li><a href="<?php echo $this->url->link('information/news'); ?>"><?php echo $this->language->get('text_news'); ?></a></li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer_item">
            <h4 class="footer_item_title"><?php echo $this->language->get('text_categories'); ?></h4>
            <div class="foonter_item_content">
              <ul class="foonter_item_list">
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
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer_item">
            <h4 class="footer_item_title"><?php echo $this->language->get('text_follow_us'); ?></h4>
            <div class="foonter_item_content">
              <a href="#" class="social"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom_footer">
    <div class="container">
      <div class="row">
        <p><span><?php echo $this->language->get('text_copyright'); ?></span></p>
      </div>
    </div>
  </div>
</footer>
<a href='#' id='Go_Top' class="go_top"></a>
</div>
</div>
<!-- Load Scripts Start -->


<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>


<script>
  var scr = {"scripts":[
    {"src" : "http://nvision.lt/catalog/view/theme/default/stylesheet/js/libs.js", "async" : false},
    {"src" : "http://nvision.lt/catalog/view/theme/default/stylesheet/js/common.js", "async" : false}
  ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
  
  
  
  
</script>

<!--<script type="text/javascript" src="catalog/view/theme/default/stylesheet/js/libs.js"></script>
<script type="text/javascript" src="catalog/view/theme/default/stylesheet/js/common.js"></script>-->


<script type="text/javascript">

  $(function(){
	$('button.link_to_cart').on('click', function(){
  location = '<?php echo $this->url->link('checkout/cart'); ?>';
	});
	
	$('button.popular_goods_all_button').on('click', function(){
  location = 'magazin';
	});
  });
</script>

<!-- Load Scripts End -->
</body></html>