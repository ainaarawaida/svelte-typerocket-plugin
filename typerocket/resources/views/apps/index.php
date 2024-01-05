<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        wp_head();

        require_once __DIR__ . '/sveltehelpers.php';

    ?>


    <link rel="icon" href="<?php echo tr_assets_url('luq/assets'); ?>/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo tr_assets_url('luq/assets'); ?>/images/favicon.png" type="image/x-icon">
    <title>4in44</title>
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/themify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/select2.css">
    <!-- Flag icon-->

    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/prism.css">
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/vector-map.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo tr_assets_url('luq/assets'); ?>/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/responsive.css">


    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo tr_assets_url('luq/assets'); ?>/css/datatable-extension.css">

    <style>
        div.dt-buttons button.dt-button.datatablebgcolor {
            background: var(--theme-deafult, #1b4c43);
            color: white;

        }
    </style>
    
</head>
<body>
<script>
     let asseturl = <?php echo json_encode(tr_assets_url('/')); ?>;
     let baseurl = <?php echo json_encode(site_url()); ?>;
     let tr_nonce = <?php echo json_encode(tr_nonce()); ?>;
     let allData = <?php echo json_encode(tr_response()->getReturn()->getData()); ?>;
     let logoutURL = <?php echo json_encode(wp_logout_url()); ?>;
     let current_user = <?php echo json_encode($current_user); ?>;
     let logo_url = <?php echo json_encode($logo_url); ?>;
     let gravatar_url = <?php echo json_encode($gravatar_url); ?>;
</script>

    <?= vite('main.js') ?>

    <div id="app"></div>
    

    <?php
        wp_footer(); 
    ?>
</body>
</html>