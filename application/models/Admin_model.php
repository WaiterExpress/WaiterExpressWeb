<?php

class Admin_Model extends CI_Model 
{

	public function updateSettings($data) 
	{
		$this->db->where("ID", 1)->update("site_settings", $data);
	}

	public function add_ipblock($ip, $reason) 
	{
		$this->db->insert("ip_block", array(
			"IP" => $ip,
			"reason" => $reason,
			"timestamp" => time()
			)
		);
	}

	public function get_ip_blocks() 
	{
		return $this->db->get("ip_block");
	}

	public function get_ip_block($id) 
	{
		return $this->db->where("ID", $id)->get("ip_block");
	}

	public function delete_ipblock($id) {
		$this->db->where("ID", $id)->delete("ip_block");
	}

	public function get_email_templates() 
	{
		return $this->db->get("email_templates");
	}

	public function get_email_template($id) 
	{
		return $this->db->where("ID", $id)->get("email_templates");
	}

	public function update_email_template($id, $title, $message) 
	{
		$this->db->where("ID", $id)->update("email_templates", array(
			"title" => $title,
			"message" => $message
			)
		);
	}
	
	public function get_user_groups() 
	{
		return $this->db->get("user_groups");
	}

	public function add_group($data) 
	{
		$this->db->insert("user_groups", $data);
	}

	public function get_user_group($id) 
	{
		return $this->db->where("ID", $id)->get("user_groups");
	}

	public function delete_group($id) {
		$this->db->where("ID", $id)->delete("user_groups");
	}

	public function delete_users_from_group($id) 
	{
		$this->db->where("groupid", $id)->delete("user_group_users");
	}

	public function update_group($id, $data) 
	{
		$this->db->where("ID", $id)->update("user_groups", $data);
	}

	public function get_users_from_groups($id, $page) 
	{
		return $this->db->where("user_group_users.groupid", $id)
			->select("usuarios.id_usuario as userid, usuarios.username, user_groups.name, 
				user_groups.ID as groupid, user_groups.default")
			->join("usuarios", "usuarios.id_usuario = user_group_users.userid")
			->join("user_groups", "user_groups.ID = user_group_users.groupid")
			->limit(20, $page)
			->get("user_group_users");
	}

	public function get_all_group_users($id) 
	{
		return $this->db->where("user_group_users.groupid", $id)
			->select("usuarios.id_usuario as userid, usuarios.email, usuarios.username, 
				user_groups.name, user_groups.ID as groupid, 
				user_groups.default")
			->join("usuarios", "usuarios.id_usuario = user_group_users.userid")
			->join("user_groups", "user_groups.ID = user_group_users.groupid")
			->get("user_group_users");
	}

	public function get_total_user_group_members_count($groupid) 
	{
		$s= $this->db->where("groupid", $groupid)
			->select("COUNT(*) as num")->get("user_group_users");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_user_from_group($userid, $id) 
	{
		return $this->db->where("userid", $userid)
			->where("groupid", $id)->get("user_group_users");
	}

	public function delete_user_from_group($userid, $id) 
	{
		$this->db->where("userid", $userid)
			->where("groupid", $id)->delete("user_group_users");
	}

	public function add_user_to_group($userid, $id) 
	{
		$this->db->insert("user_group_users", 
			array(
			"userid" => $userid, 
			"groupid" => $id
			)
		);
	}

	public function get_all_users() 
	{
		return $this->db->select("usuarios.email, usuarios.id_usuario as userid")->get("usuarios");
	}

	public function add_payment_plan($data) 
	{
		$this->db->insert("payment_plans", $data);
	}

	public function get_payment_plans() 
	{
		return $this->db->get("payment_plans");
	}

	public function get_payment_plan($id) 
	{
		return $this->db->where("ID", $id)->get("payment_plans");
	}

	public function delete_payment_plan($id) 
	{
		$this->db->where("ID", $id)->delete("payment_plans");
	}

	public function update_payment_plan($id, $data)
	{
		$this->db->where("ID", $id)->update("payment_plans", $data);
	}

	public function get_payment_logs($page) 
	{
		return $this->db->select("usuarios.id_usuario as userid, usuarios.username, usuarios.email,
			payment_logs.email, payment_logs.amount, payment_logs.timestamp, 
			payment_logs.ID")
			->join("usuarios", "usuarios.id_usuario = payment_logs.userid")
			->limit(20, $page)
			->order_by("payment_logs.ID", "DESC")
			->get("payment_logs");
	}

	public function get_total_payment_logs_count() 
	{
		$s= $this->db
			->select("COUNT(*) as num")->get("payment_logs");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_user_roles() 
	{
		return $this->db->get("user_roles");
	}

	public function add_user_role($data) 
	{
		$this->db->insert("user_roles", $data);
	}

	public function get_user_role($id) 
	{
		return $this->db->where("ID", $id)->get("user_roles");
	}

	public function update_user_role($id, $data) 
	{
		$this->db->where("ID", $id)->update("user_roles", $data);
	}

	public function delete_user_role($id) 
	{
		$this->db->where("ID", $id)->delete("user_roles");
	}

	public function get_premium_users($page) 
	{
		
		$this->db->order_by("usuarios.id_usuario", "DESC");
		
		return $this->db->select("usuarios.username, usuarios.email, usuarios.first_name, 
		usuarios.last_name, usuarios.id_usuario, usuarios.joined, usuarios.oauth_provider, 
			payment_plans.name, usuarios.premium_time")
		->join("payment_plans", "payment_plans.ID = usuarios.premium_planid")
		->where("usuarios.premium_time >", time())
		->or_where("usuarios.premium_time", -1)
		->limit(20, $page)
		->get("usuarios");
	}

	public function get_total_premium_users_count() 
	{
		$s= $this->db
			->select("COUNT(*) as num")->where("premium_time >", time())
			->or_where("usuarios.premium_time", -1)
			->join("payment_plans", "payment_plans.ID = usuarios.premium_planid")
			->get("usuarios");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}
}

?>