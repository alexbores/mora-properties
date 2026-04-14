<?php
// bloquear acceso a usuario y redirigir
if ( is_admin() && is_user_logged_in() && !defined( 'DOING_AJAX' ) ) {
    $user = wp_get_current_user();
    $roles = ( array ) $user->roles;

    if (empty(array_intersect($roles, array('administrator','editor','author')))) {
        if ( wp_safe_redirect( '/' ) ) {
            exit;
        }
    }
}



?>