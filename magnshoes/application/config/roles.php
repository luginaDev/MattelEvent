<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['roles'] = 
    array(
          'superadmin' => 
              array(
                "backend",
                "groups",
                "users",
                "members",
                "web_config",
                "pages",
                "categories",
                "products",
                "discounts",
                "price_lists",
                "sells",
                "payments",
                "delivers",
                "returns",
                "agama",
                "propinsi",
                "kota",
                "kecamatan",
                "kelurahan",
                "vendors",
                "fares",
                "faq",
                "penjualan","pengiriman","retur",
                "reports"
              ),
          'input' => 
              array(
                "backend",
                "categories",
                "products",
                "discounts",
                "price_lists",
                "sells",
                "pembayaran",
                "pengiriman",
                "retur",
                "agama",
                "propinsi",
                "kota",
                "kecamatan",
                "kelurahan",
                "vendors",
                "fares"
              ),
          'keuangan' => 
              array(
                "backend",
                "members",
                "penjualan","pengiriman","retur"
              ),
          'owner' => 
              array(
                "backend",
                "penjualan","pengiriman","retur"
              ),
          'operator' => 
              array(
                "backend",
                "groups",
                "users",
                "members"
              ),
          );
?>