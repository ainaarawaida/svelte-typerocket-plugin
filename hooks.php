<?php


add_filter('woocommerce_login_redirect', 'woocommerce_login_redirect', 20, 2);
function woocommerce_login_redirect($redirect, $user)
{
    // Get the first of all the roles assigned to the user
    $role = $user->roles[0];
    $myaccount = home_url('my-account');
    if ($role == 'administrator') {
        //Redirect administrators to the dashboard
        $redirect = admin_url();
    } elseif ($role == 'shop_manager') {
        //Redirect shop managers to the dashboard
        $redirect = $myaccount;
    } else {
        //Redirect any other role to the previous visited page or, if not available, to the home
        $redirect = wp_get_referer() ? wp_get_referer() : home_url();
    }
    return $redirect;
}

add_action('wp_logout', 'my_custom_logout_redirect');
function my_custom_logout_redirect()
{
    $redirect_url = home_url('my-account'); // Customize this URL based on your logic
    wp_redirect($redirect_url);
    exit;
}


add_action('wp_enqueue_scripts', 'my_plugin_assets', 20);
function my_plugin_assets()
{
    global $wp, $wp_scripts, $wp_styles;
    foreach ($wp_scripts->queue as $script) :
        // dump($script);
        $include = array(
            "admin-bar", "woocommerce", "wc-checkout",
            "selectWoo", "wc-add-to-cart", "wc-cart-fragments"
        );
        if (in_array($script, $include))
            continue;
        wp_dequeue_script($script);
    endforeach;

    // echo "-------------";
    foreach ($wp_styles->queue as $script) :
        // dump($script);
        $include = array(
            "admin-bar", "woocommerce", "wc-checkout",
            "selectWoo", "wc-add-to-cart", "wc-cart-fragments"
        );
        if (in_array($script, $include))
            continue;
        wp_dequeue_script($script);
    endforeach;
}

// add_action('woocommerce_before_checkout_billing_form', 'woocommerce_before_checkout_billing_form', 20, 1);
function woocommerce_before_checkout_billing_form($checkout)
{
    echo tr_field_nonce();
?>
    <style>
        #customer_details {
            display: none;
        }
    </style>
<?php
}

add_action('woocommerce_review_order_before_payment', 'woocommerce_review_order_before_payment', 20, 1);
function woocommerce_review_order_before_payment()
{
    echo tr_field_nonce();
    require_once TYPEROCKET_PLUGIN_INSTALL . '/typerocket/resources/views/public/checkout/table.php';
}

add_action('woocommerce_before_thankyou', 'woocommerce_before_thankyou', 20, 1);
function woocommerce_before_thankyou($order_id)
{
    echo tr_field_nonce();
    require_once TYPEROCKET_PLUGIN_INSTALL . '/typerocket/resources/views/public/checkout/thankyou.php';
}






add_filter('woocommerce_checkout_fields', 'woocommerce_checkout_fields');
function woocommerce_checkout_fields($fields)
{

    // $fields['billing_company']['required'] = false;
    // $fields['billing_phone']['required'] = false;
    return [];
}

add_filter('woocommerce_coupons_enabled', 'woocommerce_coupons_enabled');
function woocommerce_coupons_enabled()
{
    return false;
}

add_filter('woocommerce_add_cart_item_data', 'wdm_empty_cart', 10,  3);
function wdm_empty_cart($cart_item_data, $product_id, $variation_id)
{

    global $woocommerce;
    if (!$woocommerce->cart->is_empty())
        $woocommerce->cart->empty_cart();


    // Do nothing with the data and return
    return $cart_item_data;
}



add_action('template_redirect', 'custom_redirects');
function custom_redirects()
{
    global $wp;
    // if (isset($wp->query_vars['pagename']) && $wp->query_vars['pagename'] == 'sali') {
    //     require_once TYPEROCKET_PLUGIN_INSTALL . '/typerocket/resources/views/public/checkout/index.php';
    //     exit();
    // }
    //    dd($wp->query_vars['pagename'] == 'checkout');
    if (isset($wp->query_vars) && isset($wp->query_vars['pagename']) && $wp->query_vars['pagename'] == 'checkout') {
        // $product_id = create_product_if_not_exists();
        // TODO: Implement index() method.
        // WC()->cart->add_to_cart( $product_id );
        // require_once TYPEROCKET_PLUGIN_INSTALL.'/typerocket/resources/views/master.php';
        require_once TYPEROCKET_PLUGIN_INSTALL . '/typerocket/resources/views/public/checkout/index.php';
        // require_once TYPEROCKET_PLUGIN_INSTALL.'/typerocket/resources/views/myaccount/test.php';
        exit();
    }
    // if ( is_front_page() ) {
    //     require_once TYPEROCKET_PLUGIN_INSTALL.'/typerocket/resources/views/master.php';
    //     // require_once TYPEROCKET_PLUGIN_INSTALL.'/typerocket/resources/views/myaccount/test.php';
    //     exit();
    // }



}


function create_product_if_not_exists()
{
    // Check for existing product using a unique identifier (e.g., SKU)
    $query = new \WC_Product_Query(array(
        'sku' => 'mypayment',
    ));
    $product = collect($query->get_products())->first();


    if (!$product) {
        // Create a new product object
        $product = new \WC_Product_Simple();

        // Set product data
        $product->set_name('Payment');
        $product->set_sku('mypayment');
        $product->set_regular_price(1);
        $product->set_description('payment');
        $product->set_catalog_visibility('hidden');
        // ... set other product attributes as needed

        // Save the product
        $product->save();
    } else {
        // Product already exists, handle as needed (e.g., update data)
    }

    return $product->get_id();
}

add_filter('show_admin_bar', 'my_hide_admin_bar_for_role');
function my_hide_admin_bar_for_role($show_admin_bar)
{
    $current_user = wp_get_current_user();
    // is_user_logged_in()
    if (is_user_logged_in() && !in_array('administrator', $current_user->roles)) {
        return false;
    }
    return $show_admin_bar;
}

// add_filter( 'render_block', 'modify_block_innerHTML', 10, 2 );
function modify_block_innerHTML($block_content, $block)
{

    // if ( $block['blockName'] === 'woocommerce/checkout-express-payment-block' ) {
    //     // $block_content = str_replace( 'WordPress', 'WxxxP', $block_content );
    //     $block_content = '';
    // }
    if (in_array($block['blockName'], [
        'woocommerce/checkout-express-payment-block',
        'woocommerce/checkout-contact-information-block',
        'woocommerce/checkout-shipping-method-block',
        'woocommerce/checkout-pickup-options-block',
        'woocommerce/checkout-shipping-address-block',
        'woocommerce/checkout-billing-address-block',
        'woocommerce/checkout-shipping-methods-block',
        'woocommerce/checkout-order-note-block',
        'woocommerce/checkout-terms-block',
        'woocommerce/checkout-actions-block',
        // 'woocommerce/checkout-fields-block',
        'woocommerce/checkout-order-summary-cart-items-block',
        'woocommerce/checkout-order-summary-coupon-form-block',
        'woocommerce/checkout-order-summary-subtotal-block',
        'woocommerce/checkout-order-summary-fee-block',
        'woocommerce/checkout-order-summary-discount-block',
        'woocommerce/checkout-order-summary-shipping-block',
        'woocommerce/checkout-order-summary-taxes-block',
        'woocommerce/checkout-order-summary-block',
        // 'woocommerce/checkout-payment-block',
        'woocommerce/checkout-totals-block',
    ])) {
        $block_content = '';
    } else {
        dump($block['blockName']);
    }

    if ($block['blockName'] == 'woocommerce/checkout-fields-block') {
        // dd($block_content);
        $block_content = '
        <div>
        <div data-block-name="woocommerce/checkout-payment-block" class="wp-block-woocommerce-checkout-payment-block"></div>
        
        <button type="button" class="components-button wc-block-components-button wp-element-button wc-block-components-checkout-place-order-button contained"><span class="wc-block-components-button__text">Place Order</span></button>
        </div>';
    }

    return $block_content;
}

add_action('woocommerce_checkout_process', 'customise_checkout_field_process');
function customise_checkout_field_process()
{ // if the field is set, if not then show an error message.
    // if (!$_POST['invoiceId']) wc_add_notice(__('Please enter valuescscd.') , 'error');
}

add_action('woocommerce_before_calculate_totals', 'my_price_adjustments');
function my_price_adjustments($cart)
{

    if (isset($_REQUEST['invoices'])) {
        $invoices = explode("###", base64_decode($_REQUEST['invoices']));
        $invoices = json_decode($invoices[0]);
        foreach ($cart->get_cart() as $cart_item) {
            $cart_item['data']->set_price($invoices->total);
        }
    }

    // global $wpdb;
    // $id = explode("###",base64_decode($_REQUEST['id']))[0] ;
    // $invoices = DB::select("SELECT 
    // linvoices.*
    // FROM {$wpdb->prefix}linvoices linvoices
    // WHERE linvoices.id = '{$id}'
    // ");
    // $invoices = collect($invoices)->first();
    // // Perform price modifications here, e.g.,
    // foreach ( $cart->get_cart() as $cart_item ) {
    //     $cart_item['data']->set_price( $invoices->total );
    //     $cart_item['data']->set_meta_data( 'invoice_id', $id );
    // }
    // $cart->calculate_totals();
    // dd($_REQUEST);

}

add_action('woocommerce_checkout_order_created', 'woocommerce_checkout_order_created');
function woocommerce_checkout_order_created($order_id)
{
    global $wpdb;
    // Perform actions here, such as adding custom order notes
    // dd('aaaa');
    if (isset($_REQUEST['invoices'])) {

        $invoices = $_REQUEST['invoices'];
        $invoices = json_decode(explode("###", base64_decode($_REQUEST['invoices']))[0]);
        $order = wc_get_order($order_id);
        $order->update_meta_data('invoices', $invoices);
        $order->save();

        // $current_user = wp_get_current_user();
        $linvoices = DB::table($wpdb->prefix . 'linvoices')->updateOrInsert(
            ['id' => $invoices->id],
            [
                'status' => 'Paid',
                'paid' => $invoices->total,
                'balance' => 0,
                'payment_id' => $order->get_id()
            ]
        );
    }
}

// add_action( 'woocommerce_checkout_order_processed', 'my_custom_action_after_order' );
function my_custom_action_after_order($order_id)
{

    // Perform actions here, e.g., adding order notes
    $order = wc_get_order($order_id);
    $order->add_order_note('A custom note has been added after order completion.');
}


add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : home_url();
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}