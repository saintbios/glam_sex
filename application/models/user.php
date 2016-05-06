<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{
	public function getUser($pLogin, $pPwd)
	{
		if(! $query = $this->db->get_where('user', array('login' => $pLogin, 'password' => $pPwd))) {
			return $this->db->error();
		} else {
			if ($query->num_rows() > 0) {
				$this->updateLastLogin($pLogin);
				return $query->row();
			} else {
				return false;
			}
		}
	}

	private function updateLastLogin($pLogin) {
		
		$update_data = array(
				'last_connection' => date("Y-m-d H:i:s")
		);
		$this->db->where('login', $pLogin);
		$this->db->update('user', $update_data);
	}
}