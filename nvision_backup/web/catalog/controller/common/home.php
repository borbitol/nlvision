<?php  
class ControllerCommonHome extends Controller {
	public function index() {
  
  
    if (empty($this->session->data['cart']))
    {
      $this->session->data['panels_in_cart'] = array();
    }
		
		// $this->session->data['cart'] = false;
		
		// echo "<pre>";
		// print_r($this->cart->getProducts());
		// print_r($this->cart->getProductsGrouped());
		// print_r($this->session->data['cart']);
		// echo "</pre>";
		// exit;
		
		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');
		
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		
        
        $this->data['categories'] = array();
        
        
        
        // Кабина
        $all_cab_categories = $this->model_catalog_category->getCategories(59);
       
        
		$this->data['all_cab_categories'] = array();
        
        
        foreach($all_cab_categories as $category)
        {
            $category_info = $this->model_catalog_category->getCategory($category['category_id']);
            $results = $this->model_catalog_product->getProducts(array('filter_category_id' => $category['category_id']));
            
            $products = array();
            foreach ($results as $result)
            {
                $products[] = array(
                    'product_id' => $result['product_id'],
                    'name' => $result['name'],
                    'default_quantity' => $result['default_quantity'],
                    'href' => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                    'thumb' => $this->model_tool_image->resize($result['image'], 80, 80)
                );
            }
            
            $this->data['all_cab_categories'][$category['category_id']] = array(
                'name' => $category_info['name'],
                'products' => $products
            );
		}
        
        
        
        
        
        
        
        // Внешнее светосигнальное оборудование
        $external_light_categories = $this->model_catalog_category->getCategories(67);
       
        
		$this->data['external_light_categories'] = array();
        
        
        foreach($external_light_categories as $category)
        {
            $category_info = $this->model_catalog_category->getCategory($category['category_id']);
            $results = $this->model_catalog_product->getProducts(array('filter_category_id' => $category['category_id']));
            
            $products = array();
            foreach ($results as $result)
            {
                $products[] = array(
                    'product_id' => $result['product_id'],
                    'name' => $result['name'],
                    'default_quantity' => $result['default_quantity'],
                    'href' => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                    'thumb' => $this->model_tool_image->resize($result['image'], 80, 80)
                );
            }
            
            $this->data['external_light_categories'][$category['category_id']] = array(
                'name' => $category_info['name'],
                'products' => $products
            );
		}
        
        
		
    if(isset($this->session->data['panels_in_cart']))
    {
        $this->data['panels_in_cart'] = $this->session->data['panels_in_cart'];
    }
    else
    {
        $this->data['panels_in_cart'] = array();
    }

		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/home.tpl';
		} else {
			$this->template = 'default/template/common/home.tpl';
		}
		
		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->render());
	}
}
?>