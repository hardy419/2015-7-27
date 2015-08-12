<?php 
class session
{
	var $_sess_cookie_name="tc_session";
	var $sess_expiration=7200;
	var $db;
	var $table="tbl_sessions";
	var $now;
	
    function __construct()
    {
		global $config;
		global $link;
		$this->db=$link;
		$this->now=time();
		if(!empty($config['sess_cookie_name']))$this->_sess_cookie_name=$config['sess_cookie_name'];
    	session_set_save_handler(array(&$this,'open'), array(&$this,'close'), array(&$this,'read'), array(&$this,'write'), array(&$this,'destroy'), array(&$this,'gc'));
		
    }

    function session()
    {
		$this->__construct();
    }

	
	function userdata($item){
		return isset($_SESSION[$this->_sess_cookie_name][$item]) ? $_SESSION[$this->_sess_cookie_name][$item] : false;
	}
	
	function set_userdata($newdata = array(), $newval = ''){
		if (is_string($newdata))
		{
			$newdata = array($newdata => $newval);
		}

		if (count($newdata) > 0)
		{
			foreach ($newdata as $key => $val)
			{
				$_SESSION[$this->_sess_cookie_name][$key]=$val;
			}
		}
	}
	
	function flashdata($item){
		$val=$_SESSION[$this->_sess_cookie_name]['flashdata'][$item];
		$_SESSION[$this->_sess_cookie_name]['flashdata'][$item]=NULL;
		unset($_SESSION[$this->_sess_cookie_name]['flashdata'][$item]);
		
		return isset($val) ? $val : false;
	}
	
	function set_flashdata($newdata = array(), $newval = ''){
		if (is_string($newdata))
		{
			$newdata = array($newdata => $newval);
		}

		if (count($newdata) > 0)
		{
			foreach ($newdata as $key => $val)
			{
				$_SESSION[$this->_sess_cookie_name]['flashdata'][$key]=$val;
			}
		}
	}
	
	function unset_userdata($item){
		$_SESSION[$this->_sess_cookie_name][$item]=NULL;
	}

    function open($save_path, $session_name)
	{
		return true;
    }

    function close()
	{
        return $this->gc($this->sess_expiration);
    } 

    function read($id)
	{
		$r = $this->db->select_data($this->table, "user_data", "`session_id`='$id'", 0, 1);
		
		return $r ? unserialize($r['user_data']) : '';
    } 

    function write($id, $data)
	{
		$ip = $ip;
		$time = $this->now;
		$data=serialize($data);
		return $this->db->query("REPLACE INTO $this->table (`session_id`, `ip_address`, `last_activity`, `user_data`) VALUES('$id', '$ip', '$time', '$data')");
    } 

    function destroy($id)
	{
		return $this->db->query("DELETE FROM $this->table WHERE `session_id`='$id'");
    }

    function gc($maxlifetime)
	{
		if(rand(0,1000)%1000!=0)return false;
		$expiretime = $this->now - $maxlifetime;
		return $this->db->query("DELETE FROM $this->table WHERE `last_activity`<$expiretime"); 

    }
}
?>