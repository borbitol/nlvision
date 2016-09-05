<?php
  class Cart {
    private $config;
    private $db;
    private $data = array();
    
  	public function __construct($registry) {
      $this->config = $registry->get('config');
      $this->cache = $registry->get('cache');
      $this->customer = $registry->get('customer');
      $this->session = $registry->get('session');
      $this->db = $registry->get('db');
      $this->tax = $registry->get('tax');
      $this->weight = $registry->get('weight');
      
      if (!isset($this->session->data['cart']) || !is_array($this->session->data['cart'])) {
        $this->session->data['cart'] = array();
      }
    }
    
  	public function getProducts() {
    
      if (!$this->data) {
        foreach ($this->session->data['cart'] as $key => $quantity) {
          $product = explode(':', $key);
          $product_id = $product[0];
          $stock = true;
          
          // Options
          if (isset($product[1])) {
            $options = unserialize(base64_decode($product[1]));
            } else {
            $options = array();
          } 
          
          $product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.date_available <= NOW() AND p.status = '1'");
          
          if ($product_query->num_rows) {
            $option_price = 0;
            $option_points = 0;
            $option_weight = 0;
            
            $option_data = array();
            
            foreach ($options as $product_option_id => $option_value) {
              $option_query = $this->db->query("SELECT po.product_option_id, po.option_id, od.name, o.type FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_option_id = '" . (int)$product_option_id . "' AND po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'");
              
              if ($option_query->num_rows) {
                if ($option_query->row['type'] == 'select' || $option_query->row['type'] == 'radio' || $option_query->row['type'] == 'image') {
                  $option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$option_value . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
                  
                  if ($option_value_query->num_rows) {
                    if ($option_value_query->row['price_prefix'] == '+') {
                      $option_price += $option_value_query->row['price'];
                      } elseif ($option_value_query->row['price_prefix'] == '-') {
                      $option_price -= $option_value_query->row['price'];
                    }
                    
                    if ($option_value_query->row['points_prefix'] == '+') {
                      $option_points += $option_value_query->row['points'];
                      } elseif ($option_value_query->row['points_prefix'] == '-') {
                      $option_points -= $option_value_query->row['points'];
                    }
                    
                    if ($option_value_query->row['weight_prefix'] == '+') {
                      $option_weight += $option_value_query->row['weight'];
                      } elseif ($option_value_query->row['weight_prefix'] == '-') {
                      $option_weight -= $option_value_query->row['weight'];
                    }
                    
                    if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $quantity))) {
                      $stock = false;
                    }
                    
                    $option_data[] = array(
										'product_option_id'       => $product_option_id,
										'product_option_value_id' => $option_value,
										'option_id'               => $option_query->row['option_id'],
										'option_value_id'         => $option_value_query->row['option_value_id'],
										'name'                    => $option_query->row['name'],
										'option_value'            => $option_value_query->row['name'],
										'type'                    => $option_query->row['type'],
										'quantity'                => $option_value_query->row['quantity'],
										'subtract'                => $option_value_query->row['subtract'],
										'price'                   => $option_value_query->row['price'],
										'price_prefix'            => $option_value_query->row['price_prefix'],
										'points'                  => $option_value_query->row['points'],
										'points_prefix'           => $option_value_query->row['points_prefix'],									
										'weight'                  => $option_value_query->row['weight'],
										'weight_prefix'           => $option_value_query->row['weight_prefix']
                    );								
                  }
                  } elseif ($option_query->row['type'] == 'checkbox' && is_array($option_value)) {
                  foreach ($option_value as $product_option_value_id) {
                    $option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$product_option_value_id . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
                    
                    if ($option_value_query->num_rows) {
                      if ($option_value_query->row['price_prefix'] == '+') {
                        $option_price += $option_value_query->row['price'];
                        } elseif ($option_value_query->row['price_prefix'] == '-') {
                        $option_price -= $option_value_query->row['price'];
                      }
                      
                      if ($option_value_query->row['points_prefix'] == '+') {
                        $option_points += $option_value_query->row['points'];
                        } elseif ($option_value_query->row['points_prefix'] == '-') {
                        $option_points -= $option_value_query->row['points'];
                      }
                      
                      if ($option_value_query->row['weight_prefix'] == '+') {
                        $option_weight += $option_value_query->row['weight'];
                        } elseif ($option_value_query->row['weight_prefix'] == '-') {
                        $option_weight -= $option_value_query->row['weight'];
                      }
                      
                      if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $quantity))) {
                        $stock = false;
                      }
                      
                      $option_data[] = array(
											'product_option_id'       => $product_option_id,
											'product_option_value_id' => $product_option_value_id,
											'option_id'               => $option_query->row['option_id'],
											'option_value_id'         => $option_value_query->row['option_value_id'],
											'name'                    => $option_query->row['name'],
											'option_value'            => $option_value_query->row['name'],
											'type'                    => $option_query->row['type'],
											'quantity'                => $option_value_query->row['quantity'],
											'subtract'                => $option_value_query->row['subtract'],
											'price'                   => $option_value_query->row['price'],
											'price_prefix'            => $option_value_query->row['price_prefix'],
											'points'                  => $option_value_query->row['points'],
											'points_prefix'           => $option_value_query->row['points_prefix'],
											'weight'                  => $option_value_query->row['weight'],
											'weight_prefix'           => $option_value_query->row['weight_prefix']
                      );								
                    }
                  }						
                  } elseif ($option_query->row['type'] == 'text' || $option_query->row['type'] == 'textarea' || $option_query->row['type'] == 'file' || $option_query->row['type'] == 'date' || $option_query->row['type'] == 'datetime' || $option_query->row['type'] == 'time') {
                  $option_data[] = array(
									'product_option_id'       => $product_option_id,
									'product_option_value_id' => '',
									'option_id'               => $option_query->row['option_id'],
									'option_value_id'         => '',
									'name'                    => $option_query->row['name'],
									'option_value'            => $option_value,
									'type'                    => $option_query->row['type'],
									'quantity'                => '',
									'subtract'                => '',
									'price'                   => '',
									'price_prefix'            => '',
									'points'                  => '',
									'points_prefix'           => '',								
									'weight'                  => '',
									'weight_prefix'           => ''
                  );						
                }
              }
            } 
            
            if ($this->customer->isLogged()) {
              $customer_group_id = $this->customer->getCustomerGroupId();
              } else {
              $customer_group_id = $this->config->get('config_customer_group_id');
            }
            
            $price = $product_query->row['price'];
            
            // Product Discounts
            $discount_quantity = 0;
            
            foreach ($this->session->data['cart'] as $key_2 => $quantity_2) {
              $product_2 = explode(':', $key_2);
              
              if ($product_2[0] == $product_id) {
                $discount_quantity += $quantity_2;
              }
            }
            
            $product_discount_query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "' AND quantity <= '" . (int)$discount_quantity . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY quantity DESC, priority ASC, price ASC LIMIT 1");
            
            if ($product_discount_query->num_rows) {
              $price = $product_discount_query->row['price'];
            }
            
            // Product Specials
            $product_special_query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY priority ASC, price ASC LIMIT 1");
            
            if ($product_special_query->num_rows) {
              $price = $product_special_query->row['price'];
            }						
            
            // Reward Points
            $product_reward_query = $this->db->query("SELECT points FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "'");
            
            if ($product_reward_query->num_rows) {	
              $reward = $product_reward_query->row['points'];
              } else {
              $reward = 0;
            }
            
            // Downloads		
            $download_data = array();     		
            
            $download_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_download p2d LEFT JOIN " . DB_PREFIX . "download d ON (p2d.download_id = d.download_id) LEFT JOIN " . DB_PREFIX . "download_description dd ON (d.download_id = dd.download_id) WHERE p2d.product_id = '" . (int)$product_id . "' AND dd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
            
            foreach ($download_query->rows as $download) {
              $download_data[] = array(
							'download_id' => $download['download_id'],
							'name'        => $download['name'],
							'filename'    => $download['filename'],
							'mask'        => $download['mask'],
							'remaining'   => $download['remaining']
              );
            }
            
            // Stock
            if (!$product_query->row['quantity'] || ($product_query->row['quantity'] < $quantity)) {
              $stock = false;
            }
            
            $this->data[$key] = array(
						'key'             => $key,
						'product_id'      => $product_query->row['product_id'],
						'name'            => $product_query->row['name'],
						'model'           => $product_query->row['model'],
						'shipping'        => $product_query->row['shipping'],
						'image'           => $product_query->row['image'],
						'option'          => $option_data,
						'download'        => $download_data,
						'quantity'        => $quantity,
						'minimum'         => $product_query->row['minimum'],
						'subtract'        => $product_query->row['subtract'],
						'stock'           => $stock,
						'price'           => ($price + $option_price),
						'total'           => ($price + $option_price) * $quantity,
						'reward'          => $reward * $quantity,
						'points'          => ($product_query->row['points'] ? ($product_query->row['points'] + $option_points) * $quantity : 0),
						'tax_class_id'    => $product_query->row['tax_class_id'],
						'weight'          => ($product_query->row['weight'] + $option_weight) * $quantity,
						'weight_class_id' => $product_query->row['weight_class_id'],
						'length'          => $product_query->row['length'],
						'width'           => $product_query->row['width'],
						'height'          => $product_query->row['height'],
						'length_class_id' => $product_query->row['length_class_id']					
            );
            } else {
            $this->remove($key);
          }
        }
      }
      
      return $this->data;
    }
    
  	
    
    
    
    
    
    
    
    
    
    
    public function getProductsGrouped() {
			// if (!$this->data) 
			{
				$temp_array = array();
        
        $temp_array['other_products'] = array();
        
				foreach ($this->session->data['cart'] as $key => $quantity) 
				{		
					
					$products = array();
					
					// foreach ($products_in_category as $key => $quantity)
					
					{
						$product = explode(':', $key);
						$product_id = $product[0];
						$stock = true;
						
						// Options
						if (isset($product[1])) {
							$options = unserialize(base64_decode($product[1]));
							} else {
							$options = array();
            } 
						
						$product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.date_available <= NOW() AND p.status = '1'");
						
						if ($product_query->num_rows) {
							$option_price = 0;
							$option_points = 0;
							$option_weight = 0;
							
							$option_data = array();
							
							foreach ($options as $product_option_id => $option_value) {
								$option_query = $this->db->query("SELECT po.product_option_id, po.option_id, od.name, o.type FROM " . DB_PREFIX . "product_option po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_option_id = '" . (int)$product_option_id . "' AND po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'");
								
								if ($option_query->num_rows) {
									if ($option_query->row['type'] == 'select' || $option_query->row['type'] == 'radio' || $option_query->row['type'] == 'image') {
										$option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$option_value . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
										
										if ($option_value_query->num_rows) {
											if ($option_value_query->row['price_prefix'] == '+') {
												$option_price += $option_value_query->row['price'];
												} elseif ($option_value_query->row['price_prefix'] == '-') {
												$option_price -= $option_value_query->row['price'];
                      }
											
											if ($option_value_query->row['points_prefix'] == '+') {
												$option_points += $option_value_query->row['points'];
												} elseif ($option_value_query->row['points_prefix'] == '-') {
												$option_points -= $option_value_query->row['points'];
                      }
											
											if ($option_value_query->row['weight_prefix'] == '+') {
												$option_weight += $option_value_query->row['weight'];
												} elseif ($option_value_query->row['weight_prefix'] == '-') {
												$option_weight -= $option_value_query->row['weight'];
                      }
											
											if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $quantity))) {
												$stock = false;
                      }
											
											$option_data[] = array(
											'product_option_id'       => $product_option_id,
											'product_option_value_id' => $option_value,
											'option_id'               => $option_query->row['option_id'],
											'option_value_id'         => $option_value_query->row['option_value_id'],
											'name'                    => $option_query->row['name'],
											'option_value'            => $option_value_query->row['name'],
											'type'                    => $option_query->row['type'],
											'quantity'                => $option_value_query->row['quantity'],
											'subtract'                => $option_value_query->row['subtract'],
											'price'                   => $option_value_query->row['price'],
											'price_prefix'            => $option_value_query->row['price_prefix'],
											'points'                  => $option_value_query->row['points'],
											'points_prefix'           => $option_value_query->row['points_prefix'],									
											'weight'                  => $option_value_query->row['weight'],
											'weight_prefix'           => $option_value_query->row['weight_prefix']
											);								
                    }
										} elseif ($option_query->row['type'] == 'checkbox' && is_array($option_value)) {
										foreach ($option_value as $product_option_value_id) {
											$option_value_query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_option_value_id = '" . (int)$product_option_value_id . "' AND pov.product_option_id = '" . (int)$product_option_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
											
											if ($option_value_query->num_rows) {
												if ($option_value_query->row['price_prefix'] == '+') {
													$option_price += $option_value_query->row['price'];
													} elseif ($option_value_query->row['price_prefix'] == '-') {
													$option_price -= $option_value_query->row['price'];
                        }
												
												if ($option_value_query->row['points_prefix'] == '+') {
													$option_points += $option_value_query->row['points'];
													} elseif ($option_value_query->row['points_prefix'] == '-') {
													$option_points -= $option_value_query->row['points'];
                        }
												
												if ($option_value_query->row['weight_prefix'] == '+') {
													$option_weight += $option_value_query->row['weight'];
													} elseif ($option_value_query->row['weight_prefix'] == '-') {
													$option_weight -= $option_value_query->row['weight'];
                        }
												
												if ($option_value_query->row['subtract'] && (!$option_value_query->row['quantity'] || ($option_value_query->row['quantity'] < $quantity))) {
													$stock = false;
                        }
												
												$option_data[] = array(
												'product_option_id'       => $product_option_id,
												'product_option_value_id' => $product_option_value_id,
												'option_id'               => $option_query->row['option_id'],
												'option_value_id'         => $option_value_query->row['option_value_id'],
												'name'                    => $option_query->row['name'],
												'option_value'            => $option_value_query->row['name'],
												'type'                    => $option_query->row['type'],
												'quantity'                => $option_value_query->row['quantity'],
												'subtract'                => $option_value_query->row['subtract'],
												'price'                   => $option_value_query->row['price'],
												'price_prefix'            => $option_value_query->row['price_prefix'],
												'points'                  => $option_value_query->row['points'],
												'points_prefix'           => $option_value_query->row['points_prefix'],
												'weight'                  => $option_value_query->row['weight'],
												'weight_prefix'           => $option_value_query->row['weight_prefix']
												);								
                      }
                    }						
										} elseif ($option_query->row['type'] == 'text' || $option_query->row['type'] == 'textarea' || $option_query->row['type'] == 'file' || $option_query->row['type'] == 'date' || $option_query->row['type'] == 'datetime' || $option_query->row['type'] == 'time') {
										$option_data[] = array(
										'product_option_id'       => $product_option_id,
										'product_option_value_id' => '',
										'option_id'               => $option_query->row['option_id'],
										'option_value_id'         => '',
										'name'                    => $option_query->row['name'],
										'option_value'            => $option_value,
										'type'                    => $option_query->row['type'],
										'quantity'                => '',
										'subtract'                => '',
										'price'                   => '',
										'price_prefix'            => '',
										'points'                  => '',
										'points_prefix'           => '',								
										'weight'                  => '',
										'weight_prefix'           => ''
										);						
                  }
                }
              } 
							
							if ($this->customer->isLogged()) {
								$customer_group_id = $this->customer->getCustomerGroupId();
								} else {
								$customer_group_id = $this->config->get('config_customer_group_id');
              }
							
							$price = $product_query->row['price'];
							
							// Product Discounts
							$discount_quantity = 0;
							
							foreach ($this->session->data['cart'] as $key_2 => $quantity_2) {
								$product_2 = explode(':', $key_2);
								
								if ($product_2[0] == $product_id) {
									$discount_quantity += $quantity_2;
                }
              }
							
							$product_discount_query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "' AND quantity <= '" . (int)$discount_quantity . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY quantity DESC, priority ASC, price ASC LIMIT 1");
							
							if ($product_discount_query->num_rows) {
								$price = $product_discount_query->row['price'];
              }
							
							// Product Specials
							$product_special_query = $this->db->query("SELECT price FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY priority ASC, price ASC LIMIT 1");
							
							if ($product_special_query->num_rows) {
								$price = $product_special_query->row['price'];
              }						
							
							// Reward Points
							$product_reward_query = $this->db->query("SELECT points FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "'");
							
							if ($product_reward_query->num_rows) {	
								$reward = $product_reward_query->row['points'];
								} else {
								$reward = 0;
              }
							
							// Downloads		
							$download_data = array();     		
							
							$download_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_download p2d LEFT JOIN " . DB_PREFIX . "download d ON (p2d.download_id = d.download_id) LEFT JOIN " . DB_PREFIX . "download_description dd ON (d.download_id = dd.download_id) WHERE p2d.product_id = '" . (int)$product_id . "' AND dd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
							
							foreach ($download_query->rows as $download) {
								$download_data[] = array(
								'download_id' => $download['download_id'],
								'name'        => $download['name'],
								'filename'    => $download['filename'],
								'mask'        => $download['mask'],
								'remaining'   => $download['remaining']
								);
              }
							
							// Stock
							if (!$product_query->row['quantity'] || ($product_query->row['quantity'] < $quantity)) {
								$stock = false;
              }
							
							$product = array(
							'key'             => $key,
							'product_id'      => $product_query->row['product_id'],
							'name'            => $product_query->row['name'],
							'model'           => $product_query->row['model'],
							'shipping'        => $product_query->row['shipping'],
							'image'           => $product_query->row['image'],
							'option'          => $option_data,
							'download'        => $download_data,
							'quantity'        => $quantity,
							'minimum'         => $product_query->row['minimum'],
							'subtract'        => $product_query->row['subtract'],
							'stock'           => $stock,
							'price'           => ($price + $option_price),
							'total'           => ($price + $option_price) * $quantity,
							'reward'          => $reward * $quantity,
							'points'          => ($product_query->row['points'] ? ($product_query->row['points'] + $option_points) * $quantity : 0),
							'tax_class_id'    => $product_query->row['tax_class_id'],
							'weight'          => ($product_query->row['weight'] + $option_weight) * $quantity,
							'weight_class_id' => $product_query->row['weight_class_id'],
							'length'          => $product_query->row['length'],
							'width'           => $product_query->row['width'],
							'height'          => $product_query->row['height'],
							'length_class_id' => $product_query->row['length_class_id']					
							);
              
							} else {
							// $this->remove($key);
            }
          }		
					
          
          $product_path = $this->getPathByProduct($product_id);
          if ($product_path)
          {
            $categories = explode('_', $product_path);         
          }
          else
          {
            $categories = false;
          }
          
					$eval_temp = '';
					
          if(!$categories)
          {
            // $eval_temp .= "[0]";
            $temp_array['other_products'][] = $product;
            continue;
          }
          else
          {
            foreach ($categories as $cat_id)
            {
              if (empty($cat_id))
              {
                $cat_id = 0;
              }
              $eval_temp .= "[(int)$cat_id]";
            }
          }
          
					eval('$temp_array' . $eval_temp . '["products"][] = $product;');
					// echo('$temp_array' . $eval_temp . '["products"][] = $product;');
					
					// $this->data[] = $this->array_recursion($categories, [], $products);
          
        }
        
      }
			
			return $temp_array;
    }
		
		
    
    
    
    
    
    
    
    public function add($product_id, $qty = 1, $option = array()) {
    	if (!$option) {
        $key = (int)$product_id;
        } else {
        $key = (int)$product_id . ':' . base64_encode(serialize($option));
      }
    	
      if ((int)$qty && ((int)$qty > 0)) {
    		if (!isset($this->session->data['cart'][$key])) {
          $this->session->data['cart'][$key] = (int)$qty;
          } else {
          $this->session->data['cart'][$key] += (int)$qty;
        }
      }
      
      $this->data = array();
    }
    
  	public function update($key, $qty) {
    	if ((int)$qty && ((int)$qty > 0)) {
        $this->session->data['cart'][$key] = (int)$qty;
        } else {
	  		$this->remove($key);
      }
      
      $this->data = array();
    }
    
  	public function remove($key) {
      if (isset($this->session->data['cart'][$key])) {
     		unset($this->session->data['cart'][$key]);
      }
      
      $this->data = array();
    }
    
  	public function clear() {
      $this->session->data['cart'] = array();
      $this->session->data['panels_in_cart'] = array();
      $this->data = array();
    }
    
  	public function getWeight() {
      $weight = 0;
      
    	foreach ($this->getProducts() as $product) {
        if ($product['shipping']) {
          $weight += $this->weight->convert($product['weight'], $product['weight_class_id'], $this->config->get('config_weight_class_id'));
        }
      }
      
      return $weight;
    }
    
  	public function getSubTotal() {
      $total = 0;
      
      foreach ($this->getProducts() as $product) {
        $total += $product['total'];
      }
      
      return $total;
    }
    
    public function getTaxes() {
      $tax_data = array();
      
      foreach ($this->getProducts() as $product) {
        if ($product['tax_class_id']) {
          $tax_rates = $this->tax->getRates($product['price'], $product['tax_class_id']);
          
          foreach ($tax_rates as $tax_rate) {
            if (!isset($tax_data[$tax_rate['tax_rate_id']])) {
              $tax_data[$tax_rate['tax_rate_id']] = ($tax_rate['amount'] * $product['quantity']);
              } else {
              $tax_data[$tax_rate['tax_rate_id']] += ($tax_rate['amount'] * $product['quantity']);
            }
          }
        }
      }
      
      return $tax_data;
    }
    
  	public function getTotal() {
      $total = 0;
      
      foreach ($this->getProducts() as $product) {
        $total += $this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')) * $product['quantity'];
      }
      
      return $total;
    }
    
  	public function countProducts() {
      $product_total = 0;
			
      $products = $this->getProducts();
			
      foreach ($products as $product) {
        $product_total += $product['quantity'];
      }		
      
      return $product_total;
    }
	  
  	public function hasProducts() {
    	return count($this->session->data['cart']);
    }
    
  	public function hasStock() {
      $stock = true;
      
      foreach ($this->getProducts() as $product) {
        if (!$product['stock']) {
	    		$stock = false;
        }
      }
      
    	return $stock;
    }
    
  	public function hasShipping() {
      $shipping = false;
      
      foreach ($this->getProducts() as $product) {
	  		if ($product['shipping']) {
	    		$shipping = true;
          
          break;
        }		
      }
      
      return $shipping;
    }
    
  	public function hasDownload() {
      $download = false;
      
      foreach ($this->getProducts() as $product) {
	  		if ($product['download']) {
	    		$download = true;
          
          break;
        }		
      }
      
      return $download;
    }	
    
    
    
    
    public function getPathByProduct($product_id) {
			$product_id = (int)$product_id;
			if ($product_id < 1) return false;
			
			static $path = null;
			if (!is_array($path)) {
				$path = $this->cache->get('product.seopath');
				if (!is_array($path)) $path = array();
      }
			
			if (!isset($path[$product_id])) {
				$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . $product_id . "' ORDER BY main_category DESC LIMIT 1");
				
				$path[$product_id] = $this->getPathByCategory($query->num_rows ? (int)$query->row['category_id'] : 0);
				
				$this->cache->set('product.seopath', $path);
      }
			
			return $path[$product_id];
    }
		
		
		
		private function getPathByCategory($category_id) {
			$category_id = (int)$category_id;
			if ($category_id < 1) return false;
			
			static $path = null;
			if (!is_array($path)) {
				$path = $this->cache->get('category.seopath');
				if (!is_array($path)) $path = array();
      }
			
			if (!isset($path[$category_id])) {
				$max_level = 10;
				
				$sql = "SELECT CONCAT_WS('_'";
				for ($i = $max_level-1; $i >= 0; --$i) {
					$sql .= ",t$i.category_id";
        }
				$sql .= ") AS path FROM " . DB_PREFIX . "category t0";
				for ($i = 1; $i < $max_level; ++$i) {
					$sql .= " LEFT JOIN " . DB_PREFIX . "category t$i ON (t$i.category_id = t" . ($i-1) . ".parent_id)";
        }
				$sql .= " WHERE t0.category_id = '" . $category_id . "'";
				
				$query = $this->db->query($sql);
				
				$path[$category_id] = $query->num_rows ? $query->row['path'] : false;
				
				$this->cache->set('category.seopath', $path);
      }
			
			return $path[$category_id];
    }
		
    
  }
?>