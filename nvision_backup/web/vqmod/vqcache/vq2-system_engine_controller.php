<?php
	abstract class Controller {
		protected $registry;	
		protected $id;
		protected $layout;
		protected $template;
		protected $children = array();
		protected $data = array();
		protected $output;
		
		public function __construct($registry) {
			$this->registry = $registry;
		}
		
		public function __get($key) {
			return $this->registry->get($key);
		}
		
		public function __set($key, $value) {
			$this->registry->set($key, $value);
		}
		
		protected function forward($route, $args = array()) {
			return new Action($route, $args);
		}
		
		protected function redirect($url, $status = 302) {
			header('Status: ' . $status);
			header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url));
			exit();				
		}
		
		protected function getChild($child, $args = array()) {
			$action = new Action($child, $args);
			
		global $vqmod;
			if (file_exists($vqmod->modCheck($action->getFile()))) {
				require_once($vqmod->modCheck($action->getFile()));
				
				$class = $action->getClass();
				
				$controller = new $class($this->registry);
				
				$controller->{$action->getMethod()}($action->getArgs());
				
				return $controller->output;
				} else {
				trigger_error('Error: Could not load controller ' . $child . '!');
				exit();					
			}		
		}
		
		protected function render() {
			foreach ($this->children as $child) {
				$this->data[basename($child)] = $this->getChild($child);
			}
			
			
		global $vqmod;
		$file = $vqmod->modCheck(DIR_TEMPLATE . $this->template);
		if (file_exists($file)) {
		
				extract($this->data);
				
      		ob_start();
				
				require($file);
				
				$this->output = ob_get_contents();
				
      		ob_end_clean();
      		
				return $this->output;
				} else {
				trigger_error('Error: Could not load template ' . DIR_TEMPLATE . $this->template . '!');
				exit();				
			}
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
		
		
		
		public function getPathByCategory($category_id) {
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