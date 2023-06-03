<?php

function is_logged_in()
{
    if(session()->get('role_id') == ''){
        session()->setFlashdata('success', true);
		session()->setFlashdata('bahaya', 'Anda Belum Login');
		return redirect()->to(base_url('login'));
    }
}
function check_access($role_id, $menu_id)
{
    $model = new \App\Models\RoleModel();
    // $ci =& get_instance();
    $result = $model->db->table('user_access_menu')->where(['role_id' => $role_id, 'menu_id' =>$menu_id]);
    if ($result->get()->getRowArray() > 0 ) {
        return "checked='checked'";
    }
}