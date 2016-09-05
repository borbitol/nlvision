<?php

class ModelCatalogArticles extends Model { 

	public function updateViewed($articles_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "articles SET viewed = (viewed + 1) WHERE articles_id = '" . (int)$articles_id . "'");
	}

	public function getArticlesStory($articles_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "articles a LEFT JOIN " . DB_PREFIX . "articles_description ad ON (a.articles_id = ad.articles_id) LEFT JOIN " . DB_PREFIX . "articles_to_store a2s ON (a.articles_id = a2s.articles_id) WHERE a.articles_id = '" . (int)$articles_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

		
	
	public function getArticles($data) {
		$sql = "SELECT * FROM " . DB_PREFIX . "articles a LEFT JOIN " . DB_PREFIX . "articles_description ad ON (a.articles_id = ad.articles_id) LEFT JOIN " . DB_PREFIX . "articles_to_store a2s ON (a.articles_id = a2s.articles_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC";
		if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
				$data['start'] = 0;
				}		
				if ($data['limit'] < 1) {
				$data['limit'] = 10;
				}	
		
				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
				}	
		
				$query = $this->db->query($sql);
	
	
		return $query->rows;
	}

	public function getArticlesShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "articles a LEFT JOIN " . DB_PREFIX . "articles_description ad ON (a.articles_id = ad.articles_id) LEFT JOIN " . DB_PREFIX . "articles_to_store a2s ON (a.articles_id = a2s.articles_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalArticles() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "articles a LEFT JOIN " . DB_PREFIX . "articles_to_store a2s ON (a.articles_id = a2s.articles_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
