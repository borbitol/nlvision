<?php echo $header; ?>


<?php echo $column_left; ?>
<?php echo $column_right; ?>

<?php echo $content_bottom; ?>


<!-- Middle section -->
<div class="middle">
    
    <div class="container">
        <div class="tooltip_msg">
            <div class="row">
                <div class="col-md-12">
                    <p><?php echo $this->language->get('text_choose_panel'); ?></p>
                    <img class="close-btn" src="catalog/view/theme/default/stylesheet/img/close-msg.png" alt="Close icon">
                </div>
            </div>
        </div>
        
        <div class="range_goods clearfix">
            <div class="row">
                <!-- Main Tabs -->
                <div class="tabs-block">
                    <div class="col-lg-8 col-md-12">
                        <div class="tab-panels">
                            <ul class="tabs main-tabs-title clearfix">
                                <li rel="panel1" class="active">
                                    <div class="main-tabs-title_first"><?php echo $this->language->get('text_tab_kabina'); ?></div>
                                </li>
                                <li rel="panel2">
                                    <div class="main-tabs-title_last"><?php echo $this->language->get('text_tab_external'); ?></div>
                                </li>
                            </ul>
                            <div id="panel1" class="panel active">
                                <div class="inner-tabs">
                                    <div id="motopress-main" class="main-holder">
                                        <div class="slider-block">
                                            <div id="slider-wrapper" class="slider">
                                                <div id="map_wrapper">
                                                    <div class="map" id="all-cab">

                                                        <img src="catalog/view/theme/default/stylesheet/img/nvision.jpg" alt="Nvision" height="418" class="map" usemap="#m_map" width="768">
                                                        <!-- Правая приборная доска 65 -->
                                                        <div class='map-btn-container' id="Area3Cat" data-content="46" style="right: 108px; top: 258px;">
                                                            <div class='btn-left'></div>
                                                            <div class="map-cat-name" >
                                                                <?php echo $all_cab_categories[65]['name']; ?><br/>
                                                            </div>
                                                            <div class='btn-right'></div>
                                                        </div>
                                                        <!-- Левая приборная доска 64 -->
                                                        <div class='map-btn-container' id="Area2Cat" data-content="47" style="left: 172px; top: 258px;">
                                                            <div class='btn-left'></div>
                                                            <div class="map-cat-name" >
                                                                <?php echo $all_cab_categories[64]['name']; ?><br/>
                                                            </div>
                                                            <div class='btn-right'></div>
                                                        </div>
                                                        <!-- Панель автопилота 66 -->
                                                        <div class='map-btn-container' id="Area1Cat" data-content="50" style="  left: 442px; top: 301px;">
                                                            <div class='btn-left'></div>
                                                            <div class="map-cat-name" >
                                                                <?php echo $all_cab_categories[66]['name']; ?><br/>
                                                            </div>
                                                            <div class='btn-right'></div>
                                                        </div>
                                                        <!-- Левая панель электропульта 61 -->
                                                        <div class='map-btn-container' id="Area6Cat" data-content="51" style="left: 42px; top: 127px;">
                                                            <div class='btn-left'></div>
                                                            <div class="map-cat-name">
                                                                <?php echo $all_cab_categories[61]['name']; ?><br/>
                                                            </div>
                                                            <div class='btn-right'></div>
                                                        </div>
                                                        <!-- Центральная панель электропульта 62 -->
                                                        <div class='map-btn-container' id="Area4Cat" data-content="54" style="  left: 262px; top: 124px;">
                                                            <div class='btn-left'></div>
                                                            <div class="map-cat-name" >
                                                                <?php echo $all_cab_categories[62]['name']; ?><br/>
                                                            </div>
                                                            <div class='btn-right'></div>
                                                        </div>
                                                        <!-- Правая панель электропульта 63 -->
                                                        <div class='map-btn-container' id="Area7Cat" data-content="52" style="right: 15px; top: 126px;">
                                                            <div class='btn-left'></div>
                                                            <div class="map-cat-name" >
                                                                <?php echo $all_cab_categories[63]['name']; ?><br/>
                                                            </div>
                                                            <div class='btn-right'></div>
                                                        </div>
                                                        <!-- Панели АЗС 60 -->
                                                        <div class='map-btn-container' id="Area5Cat" data-content="53" style="  left: 262px; top: 64px;">
                                                            <div class='btn-left'></div>
                                                            <div class="map-cat-name" >
                                                                <?php echo $all_cab_categories[60]['name']; ?><br/>
                                                            </div>
                                                            <div class='btn-right'></div>
                                                        </div>
                                                        <div id="map-info">
                                                            <span><?php echo $this->language->get('text_choose_panel_bottom'); ?></span>
                                                        </div>
                                                        <map name="m_map" id="m_map">
                                                            <area alt="Area3" rel="inner-panel3" class="inner-tab-links" shape="poly" coords="599,302, 597,303, 593,304, 468,304, 467,303, 465,302, 464,301, 463,299, 464,211, 464,209, 465,208, 466,207, 469,206, 571,206, 575,207, 578,209, 581,211, 583,215, 598,252, 599,254, 601,259, 601,264, 601,266, 601,297, 601,300, 599,302" href="#Area3">
                                                            <area alt="Area7" rel="inner-panel7" class="inner-tab-links" shape="poly" coords="583,73, 585,72, 589,72, 671,73, 754,74, 757,74, 759,76, 759,78, 759,81, 730,158, 729,161, 727,162, 725,163, 722,163, 701,160, 699,159, 698,158, 698,156, 698,155, 703,143, 703,139, 702,135, 699,131, 695,129, 623,121, 621,121, 616,120, 611,120, 609,120, 576,120, 572,119, 571,117, 569,114, 569,111, 571,105, 575,92, 579,78, 581,75, 583,73" href="#Area7">
                                                            <area alt="Area5" rel="inner-panel5" class="inner-tab-links" shape="poly" coords="244,15, 246,14, 250,13, 387,13, 525,13, 529,15, 531,17, 532,19, 533,23, 527,52, 525,55, 524,57, 521,59, 516,60, 387,59, 258,60, 253,59, 251,58, 249,55, 247,51, 242,21, 242,18, 244,15" href="#Area5">
                                                            <area alt="Area4" rel="inner-panel4" class="inner-tab-links" shape="poly" coords="209,73, 212,71, 215,70, 291,67, 294,67, 303,66, 310,66, 313,66, 389,66, 465,66, 467,66, 473,66, 480,67, 482,67, 563,70, 566,72, 567,74, 568,75, 568,79, 560,114, 558,117, 556,118, 554,120, 550,121, 441,121, 333,121, 224,121, 220,120, 218,118, 216,115, 215,112, 208,79, 208,76, 209,73" href="#Area4">
                                                            <area alt="Area6" rel="inner-panel6" class="inner-tab-links" shape="poly" coords="49,75, 51,74, 53,73, 183,72, 185,72, 190,73, 193,74, 195,77, 197,81, 204,110, 204,113, 202,116, 200,118, 196,120, 167,120, 164,120, 159,120, 154,121, 151,121, 81,129, 75,130, 71,128, 68,126, 65,122, 48,80, 48,77, 49,75" href="#Area6">
                                                            <area alt="Area1" rel="inner-panel1" class="inner-tab-links" shape="poly" coords="343,302, 345,301, 349,301, 426,301, 429,301, 431,303, 432,306, 432,309, 429,323, 429,327, 429,330, 429,332, 437,391, 437,394, 435,397, 433,399, 430,399, 344,400, 340,400, 338,398, 337,395, 336,391, 344,331, 345,327, 344,323, 342,308, 342,305, 343,302" href="#Area1">
                                                            <area alt="Area2" rel="inner-panel2" class="inner-tab-links" shape="poly" coords="176,302, 178,303, 181,304, 306,304, 308,303, 309,302, 310,301, 311,299, 310,211, 310,209, 309,208, 308,207, 306,206, 204,206, 199,207, 197,209, 194,211, 192,215, 176,252, 175,254, 174,259, 173,264, 173,266, 173,297, 174,300, 176,302" href="#Area2">
                                                        </map>
                                                    
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="panel2" class="panel">
                                <div class="inner-tabs">
                                    <img src="catalog/view/theme/default/stylesheet/img/nvision-external.jpg" alt="Nvision" height="418" class="map" width="768">
                                    <ul class="external-list">
                                        <!-- Посадки РД прожектор 73 -->
                                        <li><a href="javascript:void(0)" class="tooltip inner-tab-links" rel="inner-panel8" title="<?php echo $external_light_categories[73]['name']; ?>"></a></li>
                                       <!-- Астронавигационный огонь 72 -->
                                        <li><a href="javascript:void(0)" class="tooltip inner-tab-links" rel="inner-panel9" title="<?php echo $external_light_categories[72]['name']; ?>"></a></li>
                                        <!-- Контурный огонь 69 -->
                                        <li><a href="javascript:void(0)" class="tooltip inner-tab-links" rel="inner-panel10" title="<?php echo $external_light_categories[69]['name']; ?>"></a></li>
                                       <!-- Хвостовой огонь 70 -->
                                        <li><a href="javascript:void(0)" class="tooltip inner-tab-links" rel="inner-panel11" title="<?php echo $external_light_categories[70]['name']; ?>"></a></li>
                                        <!-- Строевой огонь 71 -->
                                        <li><a href="javascript:void(0)" class="tooltip inner-tab-links" rel="inner-panel12" title="<?php echo $external_light_categories[71]['name']; ?>"></a></li>
                                        <li><a href="javascript:void(0)" class="tooltip inner-tab-links" rel="inner-panel13" title="Lorem"></a></li>
                                    </ul>
                                    <div id="map-info map-info1">
                                        <span><?php echo $this->language->get('text_choose_panel_bottom'); ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="inner-panel last-block">
                            <div>
                                <?php echo html_entity_decode($this->language->get('text_group_was_added'), ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                        </div>
                        <div class="inner-panel active first-block"> <!-- active -->
                            <div>
                                <span><?php echo $this->language->get('text_choose_from_panel'); ?></span><br>
                                <img src="catalog/view/theme/default/stylesheet/img/arrow-long.png" alt="Arrow Long">
                            </div>
                        </div>
                        <!-- Панель автопилота 66 -->
                        <div id="inner-panel1" class="inner-panel maphilight_goods">
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $all_cab_categories[66]['name']; ?></p></div>
                            
                            <form>
                               <input type="hidden" name="panel_id" value="1" />
                                <ul class="products-list">
                                    <?php foreach ($all_cab_categories[66]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        </div>
                        
                        <!-- Левая приборная доска 64 -->
                        <div id="inner-panel2" class="inner-panel maphilight_goods">
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $all_cab_categories[64]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="2" />
                                <ul class="products-list">
                                    <?php foreach ($all_cab_categories[64]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        </div>
                        
                        <!-- Правая приборная доска 65 -->
                        <div id="inner-panel3" class="inner-panel maphilight_goods">
                            
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $all_cab_categories[65]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="3" />
                                <ul class="products-list">
                                    <?php foreach ($all_cab_categories[65]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        </div>
                        
                        <!-- Центральная панель электропульта 62 -->
                        <div id="inner-panel4" class="inner-panel maphilight_goods">
                            
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $all_cab_categories[62]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="4" />
                                <ul class="products-list">
                                    <?php foreach ($all_cab_categories[62]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                            
                        </div>
                        
                        <!-- Панели АЗС 60 -->
                        <div id="inner-panel5" class="inner-panel maphilight_goods">
                            
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $all_cab_categories[60]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="5" />
                                <ul class="products-list">
                                    <?php foreach ($all_cab_categories[60]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                            
                        </div>
                        
                        <!-- Левая панель электропульта 61 -->
                        <div id="inner-panel6" class="inner-panel maphilight_goods">
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $all_cab_categories[61]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="6" />
                                <ul class="products-list">
                                    <?php foreach ($all_cab_categories[61]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        </div>
                        
                        <!-- Правая панель электропульта 63 -->
                        <div id="inner-panel7" class="inner-panel maphilight_goods">
                        
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $all_cab_categories[63]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="7" />
                                <ul class="products-list">
                                    <?php foreach ($all_cab_categories[63]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        
                        </div>
                        
                        
                        <!-- Посадки РД прожектор 73 -->
                        <div id="inner-panel8" class="inner-panel maphilight_goods">
                            
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $external_light_categories[73]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="8" />
                                <ul class="products-list">
                                    <?php foreach ($external_light_categories[73]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        
                        </div>
                        
                        <!-- Астронавигационный огонь 72 -->
                        <div id="inner-panel9" class="inner-panel maphilight_goods">
                        
                             <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $external_light_categories[72]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="9" />
                                <ul class="products-list">
                                    <?php foreach ($external_light_categories[72]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        
                        </div>
                        
                        
                        <!-- Контурный огонь 69 -->
                        <div id="inner-panel10" class="inner-panel maphilight_goods">
                        
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $external_light_categories[69]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="10" />
                                <ul class="products-list">
                                    <?php foreach ($external_light_categories[69]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        
                        </div>
                        
                        
                        <!-- Хвостовой огонь 70 -->
                        <div id="inner-panel11" class="inner-panel maphilight_goods">
                        
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $external_light_categories[70]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="11" />
                                <ul class="products-list">
                                    <?php foreach ($external_light_categories[70]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        
                        </div>
                        
                        
                        <!-- Строевой огонь 71 -->
                        <div id="inner-panel12" class="inner-panel maphilight_goods">
                        
                            <div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p><?php echo $external_light_categories[71]['name']; ?></p></div>
                            
                            <form>
                              <input type="hidden" name="panel_id" value="12" />
                                <ul class="products-list">
                                    <?php foreach ($external_light_categories[71]['products'] as $product) { ?>
                                        <li>
                                            <a href="<?php echo $product['href']; ?>">
                                                <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
                                                <p><?php echo $product['name']; ?></p>
                                                <span class="fixed-quantity"><?php echo $product['default_quantity']; ?></span>
                                            </a>
                                        </li>
                                        <input type="hidden" name="products[<?php echo $product['product_id']; ?>]" value="<?php echo $product['default_quantity']; ?>" />
                                    <?php } ?>
                                </ul>
                                
                                
                                <button class="maphilight_goods_btn add_group_button"><?php echo $this->language->get('text_add_to_cart'); ?></button>
                            </form>
                        
                        </div>
                        
                        
                        <div id="inner-panel13" class="inner-panel maphilight_goods"><div class="total-part-count"><span><?php echo $this->language->get('text_we_recommend'); ?></span><p>Lorem ipsum</p></div><button class="maphilight_goods_btn"><?php echo $this->language->get('text_add_to_cart'); ?></button></div>
                    </div>
                </div>	
            </div>
        </div>
        
        <?php echo $content_top; ?>
        
        
    </div>
 
 
 <?php 
 $panels_array = array();
 foreach ($panels_in_cart as $panel_id => $value) $panels_array[] = $panel_id; 
 
 if ($panels_array)
 {
  $panels_string = implode(',', $panels_array);
 }
 else
 {
  $panels_string = '';
 }
 ?>
 
 
 <script>
  var panels = [<?php echo $panels_string; ?>];
</script>


<?php echo $footer; ?>	

<!--<script>
$(document).ready(function(){
  
  <?php foreach ($panels_in_cart as $panel_id => $value) { ?>
  
    console.log('panel' + <?php echo $panel_id; ?>);
    $('#panel1 .inner-tabs img.red_img.inner-panel' + <?php echo $panel_id; ?> + '-img').addClass('activated');
    //$('#panel1 .inner-tabs img.red_img.inner-panel' + <?php echo $panel_id; ?> + '-img').css('visibility', 'hidden');
    // $('#panel2 .inner-tabs ul.external-list > li > a[rel="inner-panel' + <?php echo $panel_id; ?> + '"]').addClass('active');
    $('#panel2 .inner-tabs ul.external-list > li > a[rel="inner-panel' + <?php echo $panel_id; ?> + '"]').addClass('activated');
  <?php } ?>
});
</script>-->
