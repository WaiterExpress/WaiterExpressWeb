<?php

class User_Model extends CI_Model 
{

	public function getUser($email, $pass) 
	{
		return $this->db->select("id_usuario")->where("email", $email)->where("password", $pass)->get("usuarios");
	}

	public function get_user_by_id($userid) 
	{
		return $this->db->where("id_usuario", $userid)->get("usuarios");
	}

	public function get_user_by_username($username) 
	{
		return $this->db->where("username", $username)->get("usuarios");
	}

	public function delete_user($id) 
	{
		$this->db->where("id_usuario", $id)->delete("usuarios");
	}

	public function get_new_members($limit) 
	{
		return $this->db->select("email, username, joined, oauth_provider")
		->order_by("id_usuario", "DESC")->limit($limit)->get("usuarios");
	}

	public function get_registered_users_date($month, $year) 
	{
		$s= $this->db->where("joined_date", $month . "-" . $year)->select("COUNT(*) as num")->get("usuarios");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_oauth_count($provider) 
	{
		$s= $this->db->where("oauth_provider", $provider)->select("COUNT(*) as num")->get("usuarios");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_total_members_count() 
	{
		$s= $this->db->select("COUNT(*) as num")->get("usuarios");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_active_today_count() 
	{
		$s= $this->db->where("online_timestamp >", time() - 3600*24)->select("COUNT(*) as num")->get("usuarios");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_new_today_count() 
	{
		$s= $this->db->where("joined >", time() - 3600*24)->select("COUNT(*) as num")->get("usuarios");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_online_count() 
	{
		$s= $this->db->where("online_timestamp >", time() - 60*15)->select("COUNT(*) as num")->get("usuarios");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_members($page, $col, $sort) 
	{
		if($col !== 0) {
			$this->db->order_by($col, $sort);
		} else {
			$this->db->order_by("usuarios.id_usuario", "DESC");
		}

		return $this->db->select("usuarios.username, usuarios.dni, usuarios.email, usuarios.first_name, 
			usuarios.last_name, usuarios.id_usuario, usuarios.joined, usuarios.oauth_provider,
			usuarios.user_role, user_roles.name as user_role_name")
		->join("user_roles", "user_roles.ID = usuarios.user_role", 
				 	"left outer")
		->limit(20, $page)
		->get("usuarios");
	}

	public function get_members_by_search($search) 
	{
		return $this->db->select("usuarios.username, usuarios.dni, usuarios.first_name, 
			usuarios.last_name, usuarios.id_usuario, usuarios.joined, usuarios.oauth_provider,
			usuarios.user_role, user_roles.name as user_role_name")
		->join("user_roles", "user_roles.ID = usuarios.user_role", 
				 	"left outer")
		->limit(20)
		->like("usuarios.username", $search)
		->get("usuarios");
	}

	public function search_by_username($search) 
	{
		return $this->db->select("usuarios.username, usuarios.dni, usuarios.email, usuarios.first_name, 
			usuarios.last_name, usuarios.id_usuario, usuarios.joined, usuarios.oauth_provider,
			usuarios.user_role, user_roles.name as user_role_name")
		->join("user_roles", "user_roles.ID = usuarios.user_role", 
				 	"left outer")
		->limit(20)
		->like("usuarios.username", $search)
		->get("usuarios");
	}

	public function search_by_email($search) 
	{
		return $this->db->select("usuarios.username, usuarios.dni, usuarios.email, usuarios.first_name, 
			usuarios.last_name, usuarios.id_usuario, usuarios.joined, usuarios.oauth_provider,
			usuarios.user_role, user_roles.name as user_role_name")
		->join("user_roles", "user_roles.ID = usuarios.user_role", 
				 	"left outer")
		->limit(20)
		->like("usuarios.email", $search)
		->get("usuarios");
	}

	public function search_by_first_name($search) 
	{
		return $this->db->select("usuarios.username, usuarios.dni, usuarios.email, usuarios.first_name, 
			usuarios.last_name, usuarios.id_usuario, usuarios.joined, usuarios.oauth_provider,
			usuarios.user_role, user_roles.name as user_role_name")
		->join("user_roles", "user_roles.ID = usuarios.user_role", 
				 	"left outer")
		->limit(20)
		->like("usuarios.first_name", $search)
		->get("usuarios");
	}

	public function search_by_last_name($search) 
	{
		return $this->db->select("usuarios.username, usuarios.dni, usuarios.email, usuarios.first_name, 
			usuarios.last_name, usuarios.id_usuario, usuarios.joined, usuarios.oauth_provider,
			usuarios.user_role, user_roles.name as user_role_name")
		->join("user_roles", "user_roles.ID = usuarios.user_role", 
				 	"left outer")
		->limit(20)
		->like("usuarios.last_name", $search)
		->get("usuarios");
	}

	public function update_user($userid, $data) {
		$this->db->where("id_usuario", $userid)->update("usuarios", $data);
	}

	public function check_block_ip() 
	{
		$s = $this->db->where("IP", $_SERVER['REMOTE_ADDR'])->get("ip_block");
		if($s->num_rows() == 0) return false;
		return true;
	}

	public function get_user_groups($userid) 
	{
		return $this->db->where("user_group_users.userid", $userid)
			->select("user_groups.name,user_groups.ID as groupid")
			->join("user_groups", "user_groups.ID = user_group_users.groupid")
			->get("user_group_users");
	}

	public function check_user_in_group($userid, $groupid) 
	{
		$s = $this->db->where("userid", $userid)->where("groupid", $groupid)
			->get("user_group_users");
		if($s->num_rows() == 0) return 0;
		return 1;
	}

	public function get_default_groups() 
	{
		return $this->db->where("default", 1)->get("user_groups");
	}

	public function add_user_to_group($userid, $groupid) 
	{
		$this->db->insert("user_group_users", array(
			"userid" => $userid, 
			"groupid" => $groupid
			)
		);
	}

	public function add_points($userid, $points) 
	{
        $this->db->where("id_usuario", $userid)
        	->set("points", "points+$points", FALSE)->update("usuario");
    }

    public function get_verify_user($code, $username) 
    {
    	return $this->db
    		->where("activate_code", $code)
    		->where("username", $username)
    		->get("usuarios");
    }

    public function get_user_event($request) 
    {
    	return $this->db->where("IP", $_SERVER['REMOTE_ADDR'])
    		->where("event", $request)
    		->order_by("ID", "DESC")
    		->get("user_events");
    }

    public function add_user_event($data) 
    {
    	$this->db->insert("user_events", $data);
    }


}

?>