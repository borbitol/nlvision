<?php 
class ControllerModuleCart extends Controller {
	public function index() {
		$this->language->load('module/cart');
		
      	if (isset($this->request->get['remove'])) {
          	$this->cart->remove($this->request->get['remove']);
			
			unset($this->session->data['vouchers'][$this->request->get['remove']]);
      	}	
			
		
		
		ini_set('display_errors',1);
		error_reporting(E_ALL);


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
				case 59: $cat1_thumb_image = 'all-cab-white.jpg'; break;
				case 67: $cat1_thumb_image = 'all-products-white.jpg'; break;
				default: $cat1_thumb_image = 'all-products-white.jpg'; break;
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
		
		
		// Gift Voucher
		$this->data['vouchers'] = array();
		
		if (!empty($this->session->data['vouchers'])) {
			foreach ($this->session->data['vouchers'] as $key => $voucher) {
				$this->data['vouchers'][] = array(
					'key'         => $key,
					'description' => $voucher['description'],
					'amount'      => $this->currency->format($voucher['amount'])
				);
			}
		}
					
		$this->data['cart'] = $this->url->link('checkout/cart');
						
		$this->data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
	
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/cart.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/cart.tpl';
		} else {
			$this->template = 'default/template/module/cart.tpl';
		}
				
		$this->response->setOutput($this->render());		
	}
	
	public function formProductsArray($products)
	{
		$products_array = array();
		
		$this->load->model('tool/image');
		
		foreach ($products as $product)
		{
			if ($product['image']) {
				$image = $this->model_tool_image->resize($product['image'], 42, 42);
			} else {
				$image = '';
			}
																				
			$products_array[] = array(
				'key'      => $product['key'],
				'thumb'    => $image,
				'name'     => $product['name'],
				'quantity' => $product['quantity'],	
				'href'     => $this->url->link('product/product', 'product_id=' . $product['product_id'])		
			);
		}
		
		return $products_array;
		
	}
}
?>