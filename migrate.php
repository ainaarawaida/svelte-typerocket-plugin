<?php

require "typerocket/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as DB;

$capsule = new DB;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => defined('DB_HOST') ? DB_HOST : 'localhost',
    'database'  => defined('DB_NAME') ? DB_NAME : 'ahli5',
    'username'  => defined('DB_USER') ? DB_USER : 'root',
    'password'  => defined('DB_PASSWORD') ? DB_PASSWORD : 'luqman1234',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

if (!DB::schema()->hasTable('user_details')) {
    DB::statement("CREATE TABLE IF NOT EXISTS `user_details` (
        `id` int(11) NOT NULL,
        `picture` varchar(200) DEFAULT NULL,
        `phone` varchar(200) DEFAULT NULL,
        `address` varchar(200) DEFAULT NULL,
        `city` varchar(200) DEFAULT NULL,
        `state` varchar(200) DEFAULT NULL,
        `postcode` varchar(200) DEFAULT NULL,
        `country` varchar(200) DEFAULT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    DB::statement("ALTER TABLE `user_details`
       ADD PRIMARY KEY (`id`)");
    DB::statement("ALTER TABLE `user_details`
       MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
}

if (!DB::schema()->hasTable('attachments')) {
    DB::statement("CREATE TABLE IF NOT EXISTS `attachments` (
        `id` int(11) NOT NULL,
        `user_id` int(11) DEFAULT NULL,
        `invoice_id` int(11) DEFAULT NULL,
        `file` varchar(200) DEFAULT NULL,
        `visibility` int(11) DEFAULT NULL,
        `note` text,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    DB::statement("ALTER TABLE `attachments`
    ADD PRIMARY KEY (`id`)");
    DB::statement("ALTER TABLE `attachments`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
}

if (!DB::schema()->hasTable('notes')) {
    DB::statement("CREATE TABLE IF NOT EXISTS `notes` (
        `id` int(11) NOT NULL,
        `user_id_from` int(11) DEFAULT NULL,
        `user_id_to` int(11) DEFAULT NULL,
        `invoice_id` int(11) DEFAULT NULL,
        `content` text,
        `visibility` int(11) DEFAULT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    DB::statement("ALTER TABLE `notes`
    ADD PRIMARY KEY (`id`)");
    DB::statement("ALTER TABLE `notes`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
}

if (!DB::schema()->hasTable('invoices')) {
    DB::statement("CREATE TABLE IF NOT EXISTS `invoices` (
        `id` int(11) NOT NULL,
        `user_id_from` int(11) DEFAULT NULL,
        `user_id_to` int(11) DEFAULT NULL,
        `name` varchar(200) DEFAULT NULL,
        `status` varchar(200) DEFAULT NULL,
        `invoice_date` datetime DEFAULT NULL,
        `due` datetime DEFAULT NULL,
        `summary` text,
        `subtotal` float DEFAULT NULL,
        `tax` float DEFAULT NULL,
        `total` float DEFAULT NULL,
        `paid` float DEFAULT NULL,
        `balance` float DEFAULT NULL,
        `term_condition` text,
        `footer` text,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    DB::statement("ALTER TABLE `invoices`
    ADD PRIMARY KEY (`id`)");
    DB::statement("ALTER TABLE `invoices`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
}

if (!DB::schema()->hasTable('invoice_items')) {
    DB::statement("CREATE TABLE IF NOT EXISTS `invoice_items` (
        `id` int(11) NOT NULL,
        `invoice_id` int(11) DEFAULT NULL,
        `product_id` int(11) DEFAULT NULL,
        `quantity` int(11) DEFAULT NULL,
        `price` float DEFAULT NULL,
        `tax_percent` number DEFAULT NULL,
        `tax` float DEFAULT NULL,
        `total` float DEFAULT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    DB::statement("ALTER TABLE `invoice_items`
    ADD PRIMARY KEY (`id`)");
    DB::statement("ALTER TABLE `invoice_items`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
}

if (!DB::schema()->hasTable('recurring_invoices')) {
    DB::statement("CREATE TABLE IF NOT EXISTS `recurring_invoices` (
        `id` int(11) NOT NULL,
        `start_date` datetime DEFAULT NULL,
        `recurring_frequency` int(11) DEFAULT NULL,
        `recurring_period` varchar(200) DEFAULT NULL,
        `next_date` datetime DEFAULT NULL,
        `stop_date` datetime DEFAULT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    DB::statement("ALTER TABLE `recurring_invoices`
    ADD PRIMARY KEY (`id`)");
    DB::statement("ALTER TABLE `recurring_invoices`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
}

if (!DB::schema()->hasTable('invoice_frequencies')) {
    DB::statement("CREATE TABLE IF NOT EXISTS `invoice_frequencies` (
        `id` int(11) NOT NULL,
        `recurring_invoice_id` int(11) DEFAULT NULL,
        `invoice_id` int(11) DEFAULT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    DB::statement("ALTER TABLE `invoice_frequencies`
    ADD PRIMARY KEY (`id`)");
    DB::statement("ALTER TABLE `invoice_frequencies`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
}

if (!DB::schema()->hasTable('products')) {
    DB::statement("CREATE TABLE IF NOT EXISTS `products` (
        `id` int(11) NOT NULL,
        `sku` varchar(200) DEFAULT NULL,
        `name` varchar(200) DEFAULT NULL,
        `desc` text,
        `image` varchar(200) DEFAULT NULL,
        `price` float DEFAULT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
        `updated_at` datetime DEFAULT NULL,
        `deleted_at` datetime DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1");
    DB::statement("ALTER TABLE `products`
    ADD PRIMARY KEY (`id`)");
    DB::statement("ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
}





// error_log('mula '.$results->user_login. ' :: '.date('Ymd H:i:s').PHP_EOL,3, dirname(__FILE__).'\log.txt');
