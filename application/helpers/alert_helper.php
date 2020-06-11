<?php

function alert($name, $message, $type = 'success'){
    $bee = get_instance();
    $bee->session->set_flashdata($name, "<script> 
    Swal.fire(
        '".$message."',
        '',
        '".$type."' 
    )
</script>");
}