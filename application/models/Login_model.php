<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* Author: lodontec  
 * Description: Login model class
 */
class Login_model extends CI_Model{
  function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function update($Data, $table_name, $where, $id) {
        $this->db->where($where, $id);
        if($this->db->update($table_name, $Data)) {
            return true;
        }
    }

    public function is_user_exist($data) {
        // echo "user";
        $this->db->from('londontec_users');
        $this->db->where('email', $data['email']);
        $this->db->where('password', md5($data['password']));
        $query = $this->db->get();
        // echo $this->db->last_query();
        $result = $query->num_rows();
        // var_dump($result);
        if ($result == 0) {

            return false;
        } else {
            return $query->row();
        }
    }

    public function reset_user_exist($email) {

        $this->db->from('londontec_users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $rest = $query->num_rows();
        if ($rest == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_user($email) {

        $this->db->from('londontec_users');
        $this->db->where('email', $email);
        return $this->db->get()->row();
    }

   
}
?>