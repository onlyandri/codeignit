<?php 

function is_logged_in(){


	$ci = get_instance();

	if(!$ci->session->userdata('email')){

		redirect('auth');
	}
	else{

		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);

		 $querymenu = $ci->db->get_where('user_menu',['menu' => $menu])->row_array();

		 $menu_id = $querymenu['id'];

		 $useraccess = $ci->db->get_where('user_access_menu',['role_id' => $role_id, 'menu_id'=>$menu_id]);


		 if($useraccess->num_rows() < 1 ){

		 	redirect('auth/blocked');
		 }
	}
}


 ?>