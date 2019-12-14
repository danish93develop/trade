<?php
class Homemodel extends CI_Model {
	
	public function insert($table, $data){
		$query = $this->db->insert($table, $data);
		//return $query->row();
	}

	public function update($table, $email){
		$this->db->where('email', $email);
		$this->db->update($table);
	}

	function updatePassword($table, $update, $id) {
		$this->db->where('id', $id);
		$this->db->update($table, $update);
	}

	public function verify($email, $type){
		$where = ['email' => $email, 'type' => $type];
		$this->db->where($where);
		$query=$this->db->get('users');
		return $query->row();		
	}

	function getWhere($table, $array) {
		$query = $this->db->get_where($table, $array);
		return $query->result();
	}

	function get($table, $array) {		
		$this->db->where($array);
		$query = $this->db->get($table);
		return $query->row();
	}

	public function login($email, $password){
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$query=$this->db->get('users');
		return $query->row();		
	}

	public function getUserDetail()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('subscription', 'subscription.user_id = users.id');
		$this->db->join('plans', 'plans.id = subscription.plan_id');
		$this->db->where('users.id',$this->sess);		
		$query = $this->db->get();
		//echo"<pre>"; print_r($query->row()); die;
		return $query->row();		
	}

	function getStockPrediction()
	{
		$this->db->order_by("ticker_publish_rate", "DESC");
		$query = $this->db->get_where('trade_stocks', array('status'=>1), 3);				
		return $query->result();
		//echo"<pre>"; print_r($query->result()); die;
	}

	function activeWatchList()
	{
		$query = $this->db->get_where('trade_stocks', array('status'=>1), 4);				
		return $query->result();		
	}

	function getGrphpData($id)
	{
		$this->db->select('*');
		$this->db->from('stock_history');
		$this->db->join('trade_stocks', 'trade_stocks.id = stock_history.ticker_id');
		$this->db->where('stock_history.ticker_id',$id);
		//$this->db->order_by("stock_history.current_date",'DESC');			
		$query = $this->db->get();
		return $query->result();
	}

	function getTickerData($id)
	{
		$query = $this->db->get_where('trade_stocks', array('id'=>$id));
		//print_r($query->row()); die;				
		return $query->row();
	}

	function getTickerStockHistoryData($id)
	{
		$query = $this->db->get_where('stock_history', array('ticker_id'=>$id));
		//print_r($query->row()); die;				
		return $query->result();
	}

	function getUserNotification($id)
	{
		$this->db->select('prediction.*, notification_user.id as usernotificationid, notification_user.notificationid, notification_user.userid, notification_user.status as notificationstatus, notification_user.created');
		$this->db->from('notification_user');
		$this->db->join('prediction', 'prediction.id = notification_user.notificationid');
		$this->db->where('notification_user.userid',$id);
		$this->db->where("(prediction.status ='1' AND notification_user.status ='0')");
		//$this->db->order_by("stock_history.current_date",'DESC');			
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function updateUserNotification($table, $update, $id) {
			$this->db->where('id', $id);
			$this->db->update($table, $update);
		}
	
}