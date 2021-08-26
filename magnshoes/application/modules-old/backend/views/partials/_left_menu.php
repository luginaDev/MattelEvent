<?php
  $nav_val = $this->uri->segment(1);
?>
<div class="span3">
  <div class="well sidebar-nav">
    <ul class="nav nav-list">
      <li class="nav-header active"><a href="#">Dashboard</a></li>
      
      <li class="nav-header">Manajemen User</li>
      <li <?php echo ($nav_val == "groups") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("groups")?>">Groups</a>
      </li>
      <li <?php echo ($nav_val == "users") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("users")?>">Users</a>
      </li>
      <li><a href="#">Static Pages</a></li>
      <li><a href="#">Web Setting</a></li>
      <li <?php echo ($nav_val == "members") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("members")?>">Member</a>
      </li>

      <li class="nav-header">Manajemen Produk</li>
      <li <?php echo ($nav_val == "categories") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("categories")?>">Categories</a>
      </li>
      <li <?php echo ($nav_val == "products") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("products")?>">Products</a>
      </li>
      <li <?php echo ($nav_val == "discounts") ? "class='active'" : ""; ?> >
        <a href="<?=base_url("discounts")?>">Diskon</a>
      </li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>

      <li class="nav-header">Manajemen Master</li>
      <li <?php echo ($nav_val == "agama") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("agama")?>">Master Agama</a>
      </li>
      <li <?php echo ($nav_val == "propinsi") ? "class='active'" : ""; ?>> 
        <a href="<?=base_url("propinsi")?>">Master Propinsi</a>
      </li>
      <li <?php echo ($nav_val == "kota") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("kota")?>">Master Kota/Kab</a>
      </li>
      <li <?php echo ($nav_val == "kecamatan") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("kecamatan")?>">Master Kecamatan</a>
      </li>
      <li <?php echo ($nav_val == "kelurahan") ? "class='active'" : ""; ?>>
        <a href="<?=base_url("kelurahan")?>">Master Kelurahan</a>
      </li>
    </ul>
  </div>
</div>