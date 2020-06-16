
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("dashboard"); ?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Wagiman <sup>Supply</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active text-uppercase">
  <a class="nav-link" href="<?=base_url('dashboard') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse E-commerce -->
<li class="nav-item text-uppercase">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#e-commerce" aria-expanded="true" aria-controls="e-commerce">
    <i class="fas fa-fw fa-store-alt"></i> 
    <span> E-Commerce</span>
  </a>
  <div id="e-commerce" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Options:</h6>
      <a class="collapse-item" href="<?=base_url('ecommerce_publish_product') ?>">
        <i class="far fa-plus-square"></i> Publish Product</a>
      <a class="collapse-item" href="<?=base_url('ecommerce_admin') ?>">
        <i class="far fa-folder-open"></i> Product</a>
      <a class="collapse-item" href="<?=base_url('ecommerce_category') ?>">
        <i class="fas fa-align-center"></i>  Shop Categories</a>
      <!-- <a class="collapse-item" href="<?=base_url('ecommerce_discount_codes') ?>"> 
        <i class="fas fa-percent"></i> Discount Codes</a> -->
    </div>
  </div>
</li>


<!-- Nav Item - Pages Collapse Blog -->
<li class="nav-item text-uppercase">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true" aria-controls="blog">
    <i class="fab fa-fw fa-blogger"></i>
    <span>Blog</span>
  </a>
  <div id="blog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Options:</h6>
      <a class="collapse-item" href="<?=base_url('blog_publish_post') ?>">
        <i class="far fa-plus-square"></i> Publish Post</a>
      <a class="collapse-item" href="<?=base_url('blog_admin') ?>">
        <i class="far fa-folder-open"></i> Post</a>
      <a class="collapse-item" href="<?=base_url('blog_category') ?>">
        <i class="fas fa-align-center"></i> Categories</a>
    </div>
  </div>
</li>


<!-- Nav Item - Pages Collapse Restorasi -->
<li class="nav-item text-uppercase">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#restorasi" aria-expanded="true" aria-controls="restorasi">
    <i class="fas fa-fw fa-motorcycle"></i>
    <span>Restorasi Vespa</span>
  </a>
  <div id="restorasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Options:</h6>
      <a class="collapse-item" href="<?= base_url("restorasi_publish_post") ?>"><i class="far fa-plus-square"></i> Publish  Restorasi</a>
      <a class="collapse-item" href="<?= base_url("restorasi_admin") ?>"><i class="far fa-folder-open"></i> Restorasi</a>
    </div>
  </div>
</li>


<!-- Nav Item - Pages Collapse Brands -->
<li class="nav-item text-uppercase">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Brands" aria-expanded="true" aria-controls="Brands">
    <i class="fas fa-fw fa-copyright"></i>
    <span>Brands</span>
  </a>
  <div id="Brands" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Options:</h6>
      <a class="collapse-item" href="<?= base_url("brand_publish_post") ?>"><i class="far fa-plus-square"></i> Publish  Brands</a>
      <a class="collapse-item" href="<?= base_url("brand_admin") ?>"><i class="far fa-folder-open"></i> Brands</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Brands -->
<li class="nav-item text-uppercase">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Invoice" aria-expanded="true" aria-controls="Invoice">
    <i class="fas fa-fw fa-envelope-open"></i>
    <span>Invoice</span>
  </a>
  <div id="Invoice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Options:</h6>
      <a class="collapse-item" href="<?= base_url("invoice_admin") ?>"><i class="far fa-folder-open"></i> Invoice</a>

      <a class="collapse-item" href="<?= base_url("invoice_bank_payment") ?>"><i class="fas fa-money-check-alt"></i> Bank Payment</a>
    </div>
  </div>
</li>



<!-- Nav Item - Pages Collapse Brands -->
<li class="nav-item text-uppercase">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting" aria-expanded="true" aria-controls="setting">
    <i class="fas fa-fw fa-cog"></i>
    <span>Setting</span>
  </a>
  <div id="setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Options:</h6>
      <a class="collapse-item" href="<?=base_url('about_admin') ?>"><i class="fas fa-fw fa-info"></i>  About</a> 
      <a class="collapse-item" href="<?=base_url('menu_setting') ?>"><i class="fas fa-fw fa-bars"></i>  Menu</a> 
      <a class="collapse-item" href="<?=base_url('carausel_setting') ?>"><i class="fas fa-fw fa-image"></i> Carausel</a> 
      <a class="collapse-item" href="<?=base_url('sosmed_setting') ?>"><i class="fas fa-fw fa-heart"></i> Sosial Media</a> 
    </div>
  </div>
</li>





<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->