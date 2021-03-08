<header class="main_menu home_menu"> 
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-11">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?= base_url()?>"> <img src="<?php echo site_url('assets/images/1-02.png')?>" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item <?php if($this->uri->segment(2)==""){echo "active";}?>">
                                <a class="nav-link" href="https://alphawizz.org/sweets_ecommerce/">Home</a>
                            </li>
                            <li class="nav-item <?php if($this->uri->segment(2)=="aboutus"){echo "active";}?>">
                                <a class="nav-link" href="<?php echo site_url('welcome/aboutus') ?>">About Us</a>
                            </li>
                            <li class="nav-item <?php if($this->uri->segment(2)=="index"){echo "active";}?>">
                                <a class="nav-link" href="<?php echo site_url('Products/index') ?>">Product</a>
                            </li>
                            <li class="nav-item <?php if($this->uri->segment(2)=="blog"){echo "active";}?>">
                                <a class="nav-link" href="<?php echo site_url('welcome/blog') ?>">Blog</a>
                            </li>
                            <li class="nav-item <?php if($this->uri->segment(2)=="shop"){echo "active";}?>">
                                <a class="nav-link" href="<?php echo site_url('welcome/shop') ?>">Shop</a>
                            </li>
                            <li class="nav-item <?php if($this->uri->segment(2)=="contact"){echo "active";}?>">
                                <a class="nav-link" href="<?php echo site_url('welcome/contact') ?>">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <div class="cart">
                            <a class="" href=""  role="button">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            </a>
                        </div>
                        <a id="search_1" href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>

<br>
<br>
<br>
<br>
<br>
<br>

<section>
<div class="container" style="margin-left:253px;">
  <div class="row">
    <div class="col-sm-8">
	<form action="<?= base_url() ?>Paytm/Redirect/process" method="post">
    <?php  if(!empty($result)){  ?>
    <div class="alert alert-danger"><?= $result ?></div>
      <?php  } ?>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="user" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="pass" class="form-control" id="pwd">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <div style="margin-left:323px; ">
  <button type="submit" class="btn btn-primary">Submit</button> <br>
  <a href="<?= base_url() ?>login/signUp">Don't have account</a>
</div>
</form>
</div>
</div>
</div>
</section>