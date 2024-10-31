<?php
/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    is_Active_Woocommerce();
    return true;
} else {
    return false;
}
function is_Active_Woocommerce(){
    if ( class_exists( 'woocommerce' ) ) { return true; }
    return false;
}
function render_woocomerce_widiget(){
    
}
