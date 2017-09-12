
<?php
 class User_Model extends CI_Model {

    var $Id = 0;
    var $Name   = '';
    var $Pass    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getAll(){  return $this->db->query("select pass from users;");}

    function login($user,$pwd){
        $q = $this->db->query("select * from users where uname = '".$user."' and pass = '".$pwd."'");
        return ($this->db->affected_rows()>0)? true:false ;
    }

    function getById($id){
        $q = $this->db->get_where('users',array('id' => $id));
        if($this->db->affected_rows()>0){
          $row = $q->row();
          return $row;
        }
          return 'nothing';

      //return $this->db->query("select * from users where id = ".$id);
    }








    function verifyPass($pass,$hash){
        return password_verify($pass,$hash);
    }

    function encrypt($pass){
      $options = [
          'cost' => '11',
          'salt' => mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),
      ];
      return password_hash($pass, PASSWORD_BCRYPT, $options);
    }
}
?>
