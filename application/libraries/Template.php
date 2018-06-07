<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    function view($file, $data = array())
    {
        $CI =& get_instance();
        
        $CI->load->view('template/header.php', $data);
        $CI->load->view('menu/menu_admin.php', $data);
        
        $CI->load->view($file, $data);
        
        $CI->load->view('template/footer.php', $data);
    }

}