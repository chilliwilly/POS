<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login_model extends CI_Model {
	function __construct()
     {
          parent::__construct();
     }
     public function CreaMenu($idUser){
     	//$sql ="SELECT U.ID, U.NOMBRE, U.APELLIDOS, AU.USUARIO, AU.PROTECCION, AU.ESTATUS, M.ID AS IDMENU, M.LINEA,";
     	//$sql = $sql." M.DESCRIPCION, M.URL FROM USUARIOS AS U INNER JOIN ACCESOSUSUARIOS AS AU ON U.ID=AU.USUARIO ";
		//$sql = $sql." INNER JOIN MENU AS M ON AU.PROTECCION = M.ID WHERE AU.USUARIO='".$idUser."' AND AU.ESTATUS=1 ORDER BY M.ID ASC";
          //$qry=$this->db->query($sql);

          $this->db->select('USUARIOS.ID, USUARIOS.NOMBRE, USUARIOS.APELLIDOS, ACCESOSUSUARIOS.USUARIO, ACCESOSUSUARIOS.PROTECCION, ACCESOSUSUARIOS.ESTATUS, MENU.ID, MENU.LINEA, MENU.DESCRIPCION, MENU.URL');
          $this->db->from('USUARIOS');
          $this->db->join('ACCESOSUSUARIOS', 'USUARIOS.ID = ACCESOSUSUARIOS.USUARIO');
          $this->db->join('MENU', 'ACCESOSUSUARIOS.PROTECCION = MENU.ID');
          $qry = $this->db->get();

		return $qry->result();
     }
      function LoginBD($username)
     {
          $this->db->where('EMAIL', $username);
          //$this->db->where('PASSWORD', $password);
          return $this->db->get('USUARIOS')->row();
     }
}