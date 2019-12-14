<?php
    Class Planmodel extends CI_Model {

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

		function editplan($id) {
			$this->db->select('*');
			$this->db->from('plans');
			$query = $this->db->get();
			return $query->row();			
		}

		function editprediction($id) {
			$this->db->select('*');
			$this->db->from('prediction');
			$query = $this->db->get();
			return $query->row();			
		}


    }