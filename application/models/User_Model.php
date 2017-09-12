
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
        // code could be injected for safe use see get_where
        //$q = $this->db->query("select * from users where uname = '".$user."' and pass = '".$pwd."'");


        $q = $this->db->get_where("users" , array('uname' => $user), 1);
        if($this->db->affected_rows()>0){
          $row = $q->row();
          $pass = $row->pass;
          return ($this->User_Model->verifyPass($pwd,$pass))? true:false ;
        }
        return false;
    }

    function register($user,$pwd){

            $pass = $this->encrypt($pwd);
            $string = array(
                'uname'=> $user,
                'pass'=>$pass,
            );
            $q = $this->db->insert_string('users',$string);
            $this->db->query($q);
            return ($this->db->affected_rows()>0)? true:false ;



    }




    function encrypt($pass){

        $options = [
            'cost' => '11',
            'salt' => mcrypt_create_iv(22,
            MCRYPT_DEV_URANDOM),
        ];
        return password_hash($pass,
        PASSWORD_BCRYPT, $options);
    }


    function verifyPass($pass,$hash){
        return password_verify($pass,$hash);
    }

}
?>
