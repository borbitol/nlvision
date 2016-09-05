<?php 
	class ControllerCheckoutCart extends Controller {
		private $error = array();
		
		public function index() {
			$this->language->load('checkout/cart');
			
      ini_set('display_errors',1);
error_reporting(E_ALL);
    
      // print_r($this->cart->getProducts());
      
			// Remove
			if (isset($this->request->get['remove'])) {
				$this->cart->remove($this->request->get['remove']);
				$this->session->data['success'] = $this->language->get('text_remove');	
				$this->redirect($this->url->link('checkout/cart'));
      }
			
			
			if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
        
        foreach ($this->request->post['products'] as $key => $quantity)
          $this->cart->update($key, $quantity);
        
        if ($this->validate())
        {
          
          $total_data = array();
          $total = 0;
          $taxes = $this->cart->getTaxes();
          
          $this->load->model('setting/extension');
          
          $sort_order = array(); 
          
          $results = $this->model_setting_extension->getExtensions('total');
          
          foreach ($results as $key => $value) {
            $sort_order[$key] = $this->config->get($value['code'] . '_sort_order');
          }
          
          array_multisort($sort_order, SORT_ASC, $results);
          
          foreach ($results as $result) {
            if ($this->config->get($result['code'] . '_status')) {
              $this->load->model('total/' . $result['code']);
              
              $this->{'model_total_' . $result['code']}->getTotal($total_data, $total, $taxes);
            }
          }
          
          $sort_order = array(); 
          
          foreach ($total_data as $key => $value) {
            $sort_order[$key] = $value['sort_order'];
          }
          
          array_multisort($sort_order, SORT_ASC, $total_data);
          
          
          
          if (empty($this->request->post['need_assistance']))
          {
            $this->request->post['need_assistance'] = 0;
          }
          else
          {
            $this->request->post['need_assistance'] = (int)$this->request->post['need_assistance'];
          }
          
          $data = $this->request->post;
          
          $data['language_id'] = $this->config->get('config_language_id');
          
          $product_data = array();
          
          foreach ($this->cart->getProducts() as $product) {
            $option_data = array();
            
            foreach ($product['option'] as $option) {
              if ($option['type'] != 'file') {
                $value = $option['option_value'];	
                } else {
                $value = $this->encryption->decrypt($option['option_value']);
              }	
              
              $option_data[] = array(
              'product_option_id'       => $option['product_option_id'],
              'product_option_value_id' => $option['product_option_value_id'],
              'option_id'               => $option['option_id'],
              'option_value_id'         => $option['option_value_id'],								   
              'name'                    => $option['name'],
              'value'                   => $value,
              'type'                    => $option['type']
              );					
            }
            
            $product_data[] = array(
            'product_id' => $product['product_id'],
            'name'       => $product['name'],
            'model'      => $product['model'],
            'option'     => $option_data,
            'download'   => $product['download'],
            'quantity'   => $product['quantity'],
            'subtract'   => $product['subtract'],
            'price'      => $product['price'],
            'total'      => $product['total'],
            'tax'        => $this->tax->getTax($product['price'], $product['tax_class_id']),
            'reward'     => $product['reward']
            ); 
          }
          
          
          $data['products'] = $product_data;
          $data['totals'] = $total_data;
          $data['total'] = $total;
          
          $this->load->model('checkout/order');
          $this->session->data['order_id'] = $this->model_checkout_order->addOrderSimple($data);
          
          
          $this->model_checkout_order->confirm($this->session->data['order_id'], 1, '', true);
          
          // echo $this->session->data['order_id'];
          
          $this->redirect($this->url->link('checkout/success'));
          
        }
        
        
      }
			
			$this->document->setTitle($this->language->get('heading_title'));
      
      $this->data['heading_title'] = $this->language->get('heading_title');
			
      $this->data['breadcrumbs'] = array();
			
      $this->data['breadcrumbs'][] = array(
      'href'      => $this->url->link('common/home'),
      'text'      => $this->language->get('text_home'),
      'separator' => false
      ); 
			
      // $this->data['breadcrumbs'][] = array(
      // 'href'      => $this->url->link('checkout/cart'),
      // 'text'      => $this->language->get('heading_title'),
      // 'separator' => $this->language->get('text_separator')
      // );
			
			
			$this->data['breadcrumbs'][] = array(
      'href'      => false,
      'text'      => $this->language->get('heading_title'),
      'separator' => $this->language->get('text_separator')
      );
			
			if ($this->cart->hasProducts()) {
				
				
				if (isset($this->request->post['standard']))
        {
          $this->data['standard'] = $this->request->post['standard'];
        }
        else
        {
          $this->data['standard'] = '';
        }
        
        // echo $this->data['standard'];
        
        
        if (isset($this->request->post['firstname']))
        {
          $this->data['firstname'] = $this->request->post['firstname'];
        }
        else
        {
          $this->data['firstname'] = '';
        }
        
        if (isset($this->request->post['lastname']))
        {
          $this->data['lastname'] = $this->request->post['lastname'];
        }
        else
        {
          $this->data['lastname'] = '';
        }
        
        
        
        if (isset($this->request->post['email']))
        {
          $this->data['email'] = $this->request->post['email'];
        }
        else
        {
          $this->data['email'] = '';
        }
        
        
        
        if (isset($this->request->post['telephone']))
        {
          $this->data['telephone'] = $this->request->post['telephone'];
        }
        else
        {
          $this->data['telephone'] = '';
        }
        
        
        
        
        if (isset($this->error['error_standard'])) {
          $this->data['error_standard'] = $this->error['error_standard'];
          } else {
          $this->data['error_standard'] = '';
        }
        
        if (isset($this->error['error_firstname'])) {
          $this->data['error_firstname'] = $this->error['error_firstname'];
          } else {
          $this->data['error_firstname'] = '';
        }
        
        
        if (isset($this->error['error_lastname'])) {
          $this->data['error_lastname'] = $this->error['error_lastname'];
          } else {
          $this->data['error_lastname'] = '';
        }
        
        if (isset($this->error['error_email'])) {
          $this->data['error_email'] = $this->error['error_email'];
          } else {
          $this->data['error_email'] = '';
        }  
        
        if (isset($this->error['error_telephone'])) {
          $this->data['error_telephone'] = $this->error['error_telephone'];
          } else {
          $this->data['error_telephone'] = '';
        }  
        
        
        if (isset($this->request->post['need_assistance']))
        {
          $this->data['need_assistance'] = $this->request->post['need_assistance'];
        }
        else
        {
          $this->data['need_assistance'] = 0;
        }
        
        
        
				if (isset($this->error['warning'])) {
					$this->data['error_warning'] = $this->error['warning'];
					} elseif (!$this->cart->hasStock() && (!$this->config->get('config_stock_checkout') || $this->config->get('config_stock_warning'))) {
          $this->data['error_warning'] = $this->language->get('error_stock');		
					} else {
					$this->data['error_warning'] = '';
        }
				
				if ($this->config->get('config_customer_price') && !$this->customer->isLogged()) {
					$this->data['attention'] = sprintf($this->language->get('text_login'), $this->url->link('account/login'), $this->url->link('account/register'));
					} else {
					$this->data['attention'] = '';
        }
				
				if (isset($this->session->data['success'])) {
					$this->data['success'] = $this->session->data['success'];
					
					unset($this->session->data['success']);
					} else {
					$this->data['success'] = '';
        }
				
        
        
        
				$this->data['action'] = $this->url->link('checkout/cart');   
				
				
				$this->load->model('tool/image');
				$this->load->model('catalog/category');
				
				$this->data['categories'] = array();
				
        
        $grouped_products = $this->cart->getProductsGrouped();
        

        $this->data['other_products'] = $this->formProductsArray($grouped_products['other_products']);

				foreach ($grouped_products as $cat1_id => $cat1) 
				{
        
          if ($cat1_id == 'other_products') continue;
					
					$cat1_products = array();
					$cat1_children = array();
					
					if ($cat1_id)
          {
            $category_info = $this->model_catalog_category->getCategory($cat1_id);
            $cat1_name = $category_info['name'];
          }
          else
          {
            $cat1_name = $this->language->get('text_other');
          }
					
					switch ($cat1_id)
					{
						case 59: $cat1_thumb_image = 'all-cab.png'; break;
						case 67: $cat1_thumb_image = 'all-products.png'; break;
						default: $cat1_thumb_image = 'all-products.png'; break;
          }
					
					if (isset($cat1['products']))
					{
						$cat1_products = $this->formProductsArray($cat1['products']);
          }
					
					foreach ($cat1 as $cat2_id => $cat2)
					{	
						if ($cat2_id != 'products')
						{
							if ($cat2_id)
              {
                $category2_info = $this->model_catalog_category->getCategory($cat2_id);
                $cat2_name = $category2_info['name'];
              }
              else
              {
                $cat2_name = $this->language->get('text_other');
              }
							
							$cat2_products = array();
							if (isset($cat2['products']))
							{
								$cat2_products = $this->formProductsArray($cat2['products']);
              }
							$cat1_children[] = array(
							'category_id' => $cat2_id,
							'category_name' => $cat2_name,
							'products' => $cat2_products
							);
            }
          }
					
					
					$this->data['categories'][] = array(
					'category_id' => $cat1_id,
					'thumb' => $cat1_thumb_image,
					'children' => $cat1_children,
					'category_name' => $cat1_name,
					'products' => $cat1_products
					);
        }
				
				
				
				if (isset($this->request->post['next'])) {
					$this->data['next'] = $this->request->post['next'];
					} else {
					$this->data['next'] = '';
        }
				
				
				$this->data['shipping_status'] = $this->config->get('shipping_status') && $this->config->get('shipping_estimator') && $this->cart->hasShipping();	
				
				
				
				if (isset($this->request->post['shipping_method'])) {
					$this->data['shipping_method'] = $this->request->post['shipping_method'];				
					} elseif (isset($this->session->data['shipping_method'])) {
					$this->data['shipping_method'] = $this->session->data['shipping_method']['code']; 
					} else {
					$this->data['shipping_method'] = '';
        }
				
				// Totals
				$this->load->model('setting/extension');
				
				$total_data = array();					
				$total = 0;
				$taxes = $this->cart->getTaxes();
				
				// Display prices
				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
					$sort_order = array(); 
					
					$results = $this->model_setting_extension->getExtensions('total');
					
					foreach ($results as $key => $value) {
						$sort_order[$key] = $this->config->get($value['code'] . '_sort_order');
          }
					
					array_multisort($sort_order, SORT_ASC, $results);
					
					foreach ($results as $result) {
						if ($this->config->get($result['code'] . '_status')) {
							$this->load->model('total/' . $result['code']);
							
							$this->{'model_total_' . $result['code']}->getTotal($total_data, $total, $taxes);
            }
						
						$sort_order = array(); 
						
						foreach ($total_data as $key => $value) {
							$sort_order[$key] = $value['sort_order'];
            }
						
						array_multisort($sort_order, SORT_ASC, $total_data);			
          }
        }
				
				$this->data['totals'] = $total_data;
				
				$this->data['continue'] = $this->url->link('common/home');
				
				$this->data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
				
				} else {
				
				$this->data['categories'] = array();
      }
			
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/checkout/cart.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/checkout/cart.tpl';
				} else {
				$this->template = 'default/template/checkout/cart.tpl';
      }
			
			$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_bottom',
			'common/content_top',
			'common/footer',
			'common/header'	
			);
			
			$this->response->setOutput($this->render());					
			
    }
		
		protected function validateCoupon() {
			$this->load->model('checkout/coupon');
			
			$coupon_info = $this->model_checkout_coupon->getCoupon($this->request->post['coupon']);			
			
			if (!$coupon_info) {			
				$this->error['warning'] = $this->language->get('error_coupon');
      }
			
			if (!$this->error) {
				return true;
				} else {
				return false;
      }		
    }
		
		protected function validateVoucher() {
			$this->load->model('checkout/voucher');
			
			$voucher_info = $this->model_checkout_voucher->getVoucher($this->request->post['voucher']);			
			
			if (!$voucher_info) {			
				$this->error['warning'] = $this->language->get('error_voucher');
      }
			
			if (!$this->error) {
				return true;
				} else {
				return false;
      }		
    }
		
		protected function validateReward() {
			$points = $this->customer->getRewardPoints();
			
			$points_total = 0;
			
			foreach ($this->cart->getProducts() as $product) {
				if ($product['points']) {
					$points_total += $product['points'];
        }
      }	
			
			if (empty($this->request->post['reward'])) {
				$this->error['warning'] = $this->language->get('error_reward');
      }
			
			if ($this->request->post['reward'] > $points) {
				$this->error['warning'] = sprintf($this->language->get('error_points'), $this->request->post['reward']);
      }
			
			if ($this->request->post['reward'] > $points_total) {
				$this->error['warning'] = sprintf($this->language->get('error_maximum'), $points_total);
      }
			
			if (!$this->error) {
				return true;
				} else {
				return false;
      }		
    }
		
		protected function validateShipping() {
			if (!empty($this->request->post['shipping_method'])) {
				$shipping = explode('.', $this->request->post['shipping_method']);
				
				if (!isset($shipping[0]) || !isset($shipping[1]) || !isset($this->session->data['shipping_methods'][$shipping[0]]['quote'][$shipping[1]])) {			
					$this->error['warning'] = $this->language->get('error_shipping');
        }
				} else {
				$this->error['warning'] = $this->language->get('error_shipping');
      }
			
			if (!$this->error) {
				return true;
				} else {
				return false;
      }		
    }
		
		public function add() {
			$this->language->load('checkout/cart');
			
			$json = array();
			
			if (isset($this->request->post['product_id'])) {
				$product_id = $this->request->post['product_id'];
				} else {
				$product_id = 0;
      }
			
			$this->load->model('catalog/product');
			
			$product_info = $this->model_catalog_product->getProduct($product_id);
			
			if ($product_info) {			
				if (isset($this->request->post['quantity'])) {
					$quantity = $this->request->post['quantity'];
					} else {
					$quantity = 1;
        }
				
				if (isset($this->request->post['option'])) {
					$option = array_filter($this->request->post['option']);
					} else {
					$option = array();	
        }
				
				$product_options = $this->model_catalog_product->getProductOptions($this->request->post['product_id']);
				
				foreach ($product_options as $product_option) {
					if ($product_option['required'] && empty($option[$product_option['product_option_id']])) {
						$json['error']['option'][$product_option['product_option_id']] = sprintf($this->language->get('error_required'), $product_option['name']);
          }
        }
				
				if (!$json) {
					$this->cart->add($this->request->post['product_id'], $quantity, $option);
					
					$json['success'] = sprintf($this->language->get('text_success'), $this->url->link('product/product', 'product_id=' . $this->request->post['product_id']), $product_info['name'], $this->url->link('checkout/cart'));
					
					unset($this->session->data['shipping_method']);
					unset($this->session->data['shipping_methods']);
					unset($this->session->data['payment_method']);
					unset($this->session->data['payment_methods']);
					
					// Totals
					$this->load->model('setting/extension');
					
					$total_data = array();					
					$total = 0;
					$taxes = $this->cart->getTaxes();
					
					// Display prices
					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
						$sort_order = array(); 
						
						$results = $this->model_setting_extension->getExtensions('total');
						
						foreach ($results as $key => $value) {
							$sort_order[$key] = $this->config->get($value['code'] . '_sort_order');
            }
						
						array_multisort($sort_order, SORT_ASC, $results);
						
						foreach ($results as $result) {
							if ($this->config->get($result['code'] . '_status')) {
								$this->load->model('total/' . $result['code']);
								
								$this->{'model_total_' . $result['code']}->getTotal($total_data, $total, $taxes);
              }
							
							$sort_order = array(); 
							
							foreach ($total_data as $key => $value) {
								$sort_order[$key] = $value['sort_order'];
              }
							
							array_multisort($sort_order, SORT_ASC, $total_data);			
            }
          }
					
					$json['total'] = sprintf($this->language->get('text_items'), $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0), $this->currency->format($total));
					} else {
					$json['redirect'] = str_replace('&amp;', '&', $this->url->link('product/product', 'product_id=' . $this->request->post['product_id']));
        }
      }
			
			$this->response->setOutput(json_encode($json));		
    }
		
		public function quote() {
			$this->language->load('checkout/cart');
			
			$json = array();	
			
			if (!$this->cart->hasProducts()) {
				$json['error']['warning'] = $this->language->get('error_product');				
      }				
			
			if (!$this->cart->hasShipping()) {
				$json['error']['warning'] = sprintf($this->language->get('error_no_shipping'), $this->url->link('information/contact'));				
      }				
			
			if ($this->request->post['country_id'] == '') {
				$json['error']['country'] = $this->language->get('error_country');
      }
			
			if (!isset($this->request->post['zone_id']) || $this->request->post['zone_id'] == '') {
				$json['error']['zone'] = $this->language->get('error_zone');
      }
			
			$this->load->model('localisation/country');
			
			$country_info = $this->model_localisation_country->getCountry($this->request->post['country_id']);
			
			if ($country_info && $country_info['postcode_required'] && (utf8_strlen($this->request->post['postcode']) < 2) || (utf8_strlen($this->request->post['postcode']) > 10)) {
				$json['error']['postcode'] = $this->language->get('error_postcode');
      }
			
			if (!$json) {		
				$this->tax->setShippingAddress($this->request->post['country_id'], $this->request->post['zone_id']);
				
				// Default Shipping Address
				$this->session->data['shipping_country_id'] = $this->request->post['country_id'];
				$this->session->data['shipping_zone_id'] = $this->request->post['zone_id'];
				$this->session->data['shipping_postcode'] = $this->request->post['postcode'];
				
				if ($country_info) {
					$country = $country_info['name'];
					$iso_code_2 = $country_info['iso_code_2'];
					$iso_code_3 = $country_info['iso_code_3'];
					$address_format = $country_info['address_format'];
					} else {
					$country = '';
					$iso_code_2 = '';
					$iso_code_3 = '';	
					$address_format = '';
        }
				
				$this->load->model('localisation/zone');
				
				$zone_info = $this->model_localisation_zone->getZone($this->request->post['zone_id']);
				
				if ($zone_info) {
					$zone = $zone_info['name'];
					$zone_code = $zone_info['code'];
					} else {
					$zone = '';
					$zone_code = '';
        }	
				
				$address_data = array(
				'firstname'      => '',
				'lastname'       => '',
				'company'        => '',
				'address_1'      => '',
				'address_2'      => '',
				'postcode'       => $this->request->post['postcode'],
				'city'           => '',
				'zone_id'        => $this->request->post['zone_id'],
				'zone'           => $zone,
				'zone_code'      => $zone_code,
				'country_id'     => $this->request->post['country_id'],
				'country'        => $country,	
				'iso_code_2'     => $iso_code_2,
				'iso_code_3'     => $iso_code_3,
				'address_format' => $address_format
				);
				
				$quote_data = array();
				
				$this->load->model('setting/extension');
				
				$results = $this->model_setting_extension->getExtensions('shipping');
				
				foreach ($results as $result) {
					if ($this->config->get($result['code'] . '_status')) {
						$this->load->model('shipping/' . $result['code']);
						
						$quote = $this->{'model_shipping_' . $result['code']}->getQuote($address_data); 
						
						if ($quote) {
							$quote_data[$result['code']] = array( 
							'title'      => $quote['title'],
							'quote'      => $quote['quote'], 
							'sort_order' => $quote['sort_order'],
							'error'      => $quote['error']
							);
            }
          }
        }
				
				$sort_order = array();
				
				foreach ($quote_data as $key => $value) {
					$sort_order[$key] = $value['sort_order'];
        }
				
				array_multisort($sort_order, SORT_ASC, $quote_data);
				
				$this->session->data['shipping_methods'] = $quote_data;
				
				if ($this->session->data['shipping_methods']) {
					$json['shipping_method'] = $this->session->data['shipping_methods']; 
					} else {
					$json['error']['warning'] = sprintf($this->language->get('error_no_shipping'), $this->url->link('information/contact'));
        }				
      }	
			
			$this->response->setOutput(json_encode($json));						
    }
		
		public function country() {
			$json = array();
			
			$this->load->model('localisation/country');
			
			$country_info = $this->model_localisation_country->getCountry($this->request->get['country_id']);
			
			if ($country_info) {
				$this->load->model('localisation/zone');
				
				$json = array(
				'country_id'        => $country_info['country_id'],
				'name'              => $country_info['name'],
				'iso_code_2'        => $country_info['iso_code_2'],
				'iso_code_3'        => $country_info['iso_code_3'],
				'address_format'    => $country_info['address_format'],
				'postcode_required' => $country_info['postcode_required'],
				'zone'              => $this->model_localisation_zone->getZonesByCountryId($this->request->get['country_id']),
				'status'            => $country_info['status']		
				);
      }
			
			$this->response->setOutput(json_encode($json));
    }
		
		
		public function add_group() {
			
			
			
			ini_set('display_errors',1);
			error_reporting(E_ALL);
			
			
			
			$this->language->load('checkout/cart');
			
			$json = array();
			
			if (empty($this->request->post['products']))
			{
				$json['error']['empty'] = 'No products';
				$this->response->setOutput(json_encode($json));	
				return false;
      }
			
			
			
			$this->load->model('catalog/product');
			
			
			foreach ($this->request->post['products'] as $product_id => $quantity)
			{
				$product_info = $this->model_catalog_product->getProduct($product_id);
        

				// print_r($product_info); echo "<br>";
				
				if ($product_info) {
					
					if (!$quantity) {
						$quantity = 1;
          }
					
					if (isset($this->request->post['option'])) {
						$option = array_filter($this->request->post['option']);
						} else {
						$option = array();	
          }
					
					// $product_options = $this->model_catalog_product->getProductOptions($product_id);
					
					// foreach ($product_options as $product_option) {
					// if ($product_option['required'] && empty($option[$product_option['product_option_id']])) {
					// $json['error']['option'][$product_option['product_option_id']] = sprintf($this->language->get('error_required'), $product_option['name']);
					// }
					// }
					
					if (!$json) {
						
						// $product_path = $this->getPathByProduct($product_id);
						
						// echo $product_id . "<br>";
						
						$this->cart->add($product_id, $quantity, $option);
						
						// $json['total'] = sprintf($this->language->get('text_items'), $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0), $this->currency->format($total));
						} else {
						// $json['redirect'] = str_replace('&amp;', '&', $this->url->link('product/product', 'product_id=' . $product_id));
          }
        }
      }
			
			
			
      
      
      $this->session->data['panels_in_cart'][$this->request->post['panel_id']] = true;
      
      
      
			
			$json['success'] = true;
			
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			
			
			
			
			
			// Totals
			$this->load->model('setting/extension');
			
			$total_data = array();					
			$total = 0;
			$taxes = $this->cart->getTaxes();
			
			// Display prices
			
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$sort_order = array(); 
				
				$results = $this->model_setting_extension->getExtensions('total');
				
				foreach ($results as $key => $value) {
					$sort_order[$key] = $this->config->get($value['code'] . '_sort_order');
        }
				
				array_multisort($sort_order, SORT_ASC, $results);
				
				foreach ($results as $result) {
					if ($this->config->get($result['code'] . '_status')) {
						$this->load->model('total/' . $result['code']);
						
						$this->{'model_total_' . $result['code']}->getTotal($total_data, $total, $taxes);
          }
					
					$sort_order = array(); 
					
					foreach ($total_data as $key => $value) {
						$sort_order[$key] = $value['sort_order'];
          }
					
					array_multisort($sort_order, SORT_ASC, $total_data);			
        }
      }
			
			
			$this->response->setOutput(json_encode($json));		
    }
		
		
		
		
		
		public function formProductsArray($products)
		{
			$products_array = array();
			
			$this->load->model('tool/image');
			
			foreach ($products as $product)
			{
				if ($product['image']) {
					$image = $this->model_tool_image->resize($product['image'], 100, 100);
					} else {
					$image = '';
        }
				
				$products_array[] = array(
				'key'      => $product['key'],
				'thumb'    => $image,
				'name'     => $product['name'],
				'remove' => $this->url->link('checkout/cart', 'remove=' . $product['key']),
				'quantity' => $product['quantity'],	
				'href'     => $this->url->link('product/product', 'product_id=' . $product['product_id'])		
				);
      }
			
			return $products_array;
			
    }
		
		
		
		
    protected function validate() {
    	if (empty($this->request->post['standard'])) {
        $this->error['error_standard'] = $this->language->get('error_standard');
      }
      
      if (empty($this->request->post['firstname'])) {
        $this->error['error_firstname'] = $this->language->get('error_firstname');
      }
      
      if (empty($this->request->post['lastname'])) {
        $this->error['error_lastname'] = $this->language->get('error_lastname');
      }
      
      if (empty($this->request->post['email'])) {
        $this->error['error_email'] = $this->language->get('error_email');
      }
      
      if (empty($this->request->post['telephone'])) {
        $this->error['error_telephone'] = $this->language->get('error_telephone');
      }
      
    	if (!$this->error) {
        return true;
        } else {
        return false;
      }  	
    }
    
    
  }
?>