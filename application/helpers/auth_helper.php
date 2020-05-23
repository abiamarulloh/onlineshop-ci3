<?php 

function is_logged_in(){
    $bee = get_instance();
    if(!$bee->session->userdata('email')){
        redirect('login');
    }
}


function is_logged_in_admin(){
    $bee = get_instance();
    if($bee->session->userdata('role_id') == 2){
        redirect('member');
    }
}

function is_logged_in_member(){
    $bee = get_instance();
    if($bee->session->userdata('role_id') == 1){
        redirect('dashboard');
    }
}


