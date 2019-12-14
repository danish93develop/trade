<?php
    Class Stockmodel extends CI_Model {
        function insert($table, $data) {
			$this->db->insert($table, $data);
			return $this->db->insert_id();
		}

		function get($table) {
			$this->db->order_by('id', 'desc');
			$query = $this->db->get($table);
			return $query->result();
		}
		function getWhere($table, $array) {
			$query = $this->db->get_where($table, $array);
			return $query->result();
		}
		function update($table, $update, $id) {
			$this->db->where('id', $id);
			$this->db->update($table, $update);
		}
		function countgetStockHistory() {
			$this->db->select('*');
			$this->db->from('trade_stocks');
			$this->db->join('stock_history', 'stock_history.ticker_id = trade_stocks.id');
			$this->db->where('trade_stocks.status', 1);			
			$this->db->order_by("stock_history.id",'ASC');
			$query = $this->db->get();
			return $query->num_rows();
			//return $query->result();
		}
		function stockHistoryArrayPaginationON ($limit, $pageLimit){
			$this->db->select('*');
			$this->db->from('trade_stocks');
			$this->db->join('stock_history', 'stock_history.ticker_id = trade_stocks.id');
			$this->db->where('trade_stocks.status', 1);	
			$this->db->limit($limit, $pageLimit);		
			$this->db->order_by("stock_history.id",'ASC');
			$query = $this->db->get();			
			return $query->result();
		}
		function editStock($stockid) {
			$this->db->select('*');
			$this->db->from('trade_stocks');
			$this->db->join('stock_history', 'stock_history.ticker_id = trade_stocks.id');
			//$this->db->where('stock_history.ticker_id',$stockid);
			$this->db->order_by("stock_history.current_date",'DESC');			
			$query = $this->db->get();
			return $query->row();

		}
    }