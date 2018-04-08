<?php 
Class User extends CI_Model
{
	function login($username, $password)
	{
	   $this -> db -> select('id, username, password');
	   $this -> db -> from('users');
	   $this -> db -> where('username', $username);
	   $this -> db -> where('password', MD5($password));
	   $this -> db -> limit(1);
	
	   $query = $this -> db -> get();
	
	   if($query -> num_rows() == 1)
	   {
		  return $query->result();
	   }
	   else
	   {
		  return false;
	   }
	}
	
	function cek_data($username, $email)
	{
	    $this->db->select('id, username, email');
	    $this->db->from('users');
	    $this->db->where('username', $username);
	    $this->db->where('email', $email);
	    $this->db->limit(1);
	    $query = $this->db->get();
	    
	    if($query->num_rows() == 1)
	    {
	        return $query->result();
	    }else{
	        return false;
	    }
	}
	
	function ambil_data($where, $table)
	{
	    return $this->db->get_where($table, $where);
	}
	
	function update_data($where, $data, $table)
	{
	    $this->db->where($where);
	    $this->db->update($table, $data);
	}
	
	
}	
/*End of file user.php*/
/*Location: .PerjalananDinas/application/models/user.php*/