<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Necesidades básicas de la página -->
    <title><?php echo $this->settings->info->site_name ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('estatico/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('estatico/css/colors/blue.css'); ?>" id="colors">
    <link rel="stylesheet" href="<?php echo base_url('devfy.dashboard.css'); ?>">
</head>

<body>
<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">

                <!-- Logo -->
                <div id="logo">
                    <?php echo anchor('account', '<img src="'.base_url('estatico/images/logo.png').'" title="<?php echo $this->settings->info->site_name; ?>"  alt=""/> '); ?>
                    <?php echo anchor('account', '<img src="'.base_url('estatico/images/logo_alt.png', 'dashboard-logo').'" title="<?php echo $this->settings->info->site_name; ?>"  alt=""/> '); ?>
                </div>

				<!-- Mobile Navigation -->
				<div class="menu-responsive">
					<i class="fa fa-reorder menu-trigger"></i>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a class="current" href="<?php echo $url->UrlBase(); ?>"><i class="sl sl-icon-home"></i> <?php echo $idioma->Lang('Home'); ?></a></li>

						<li><a href="#">Listings</a>
							<ul>
								<li><a href="#">List Layout</a>
									<ul>
										<li><a href="listings-list-with-sidebar.html">With Sidebar</a></li>
										<li><a href="listings-list-full-width.html">Full Width</a></li>
									</ul>
								</li>
								<li><a href="#">Grid Layout</a>
									<ul>
										<li><a href="listings-grid-with-sidebar-1.html">With Sidebar 1</a></li>
										<li><a href="listings-grid-with-sidebar-2.html">With Sidebar 2</a></li>
										<li><a href="listings-grid-full-width.html">Full Width</a></li>
									</ul>
								</li>
								<li><a href="#">Half Screen Map</a>
									<ul>
										<li><a href="listings-half-screen-map-list.html">List Layout</a></li>
										<li><a href="listings-half-screen-map-grid-1.html">Grid Layout 1</a></li>
										<li><a href="listings-half-screen-map-grid-2.html">Grid Layout 2</a></li>
									</ul>
								</li>
								<li><a href="listings-single-page.html">Single Listing</a></li>
							</ul>
						</li>

						<li><a class="current" href="#">User Panel</a>
							<ul>
								<li><a href="dashboard.html">Dashboard</a></li>
								<li><a href="dashboard-messages.html">Messages</a></li>
								<li><a href="dashboard-my-listings.html">My Listings</a></li>
								<li><a href="dashboard-reviews.html">Reviews</a></li>
								<li><a href="dashboard-bookmarks.html">Bookmarks</a></li>
								<li><a href="dashboard-add-listing.html">Add Listing</a></li>
								<li><a href="dashboard-my-profile.html">My Profile</a></li>
								<li><a href="dashboard-invoice.html">Invoice</a></li>
							</ul>
						</li>

						<li><a href="#">Pages</a>
							<ul>
								<li><a href="pages-blog.html">Blog</a>
									<ul>
										<li><a href="pages-blog.html">Blog</a></li>
										<li><a href="pages-blog-post.html">Blog Post</a></li>
									</ul>
								</li>
								<li><a href="pages-contact.html">Contact</a></li>
								<li><a href="pages-elements.html">Elements</a></li>
								<li><a href="pages-pricing-tables.html">Pricing Tables</a></li>
								<li><a href="pages-typography.html">Typography</a></li>
								<li><a href="pages-404.html">404 Page</a></li>
								<li><a href="pages-icons.html">Icons</a></li>
							</ul>
						</li>
						
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					
					<!-- User Menu -->
					<div class="user-menu">
                        <?php if($this->user->loggedin) : ?>
                            <div class="user-name"><span><img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->user->info->avatar ?>" alt=""></span><?php echo $this->user->info->username; ?></div>
                            <ul>
                                <li><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                                <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages</a></li>
                                <li><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li>
                                <li><a href="index.html"><i class="sl sl-icon-power"></i> Logout</a></li>
                            </ul>
                        <?php else : ?>
                            <div class="user-name"><span><img src="<?php echo $url->Img('dashboard-avatar.jpg'); ?>" alt=""></span>Tom Perrin</div>
                        <?php endif; ?>
					</div>

					<a href="dashboard-add-listing.html" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
	
	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">
            <?php
            if(isset($sidebar)){
                echo $sidebar;
            }
            ?>
			<ul data-submenu-title="Main">
				<li class="<?php if(isset($activeLink['home']['general'])) echo "active" ?>"><a href="<?php echo site_url() ?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                <li class="<?php if(isset($activeLink['members']['general'])) echo "active" ?>"><a href="<?php echo site_url("members") ?>"><span class="glyphicon glyphicon-user"></span> <?php echo lang("ctn_155") ?></a></li>
                <li class="<?php if(isset($activeLink['settings']['general'])) echo "active" ?>"><a href="<?php echo site_url("user_settings") ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang("ctn_156") ?></a></li>
				<li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span></a></li>
			</ul>
			<?php if($this->user->loggedin && $this->user->info->user_level == 4) : ?>
			<ul data-submenu-title="Admin">
				<li class="<?php if(isset($activeLink['admin'])) echo "active" ?>" >
					<a><i class="sl sl-icon-layers"></i> <?php echo lang("ctn_157") ?></a>
					<ul>
						<li class="<?php if(isset($activeLink['admin']['settings'])) echo "active" ?>"><a href="<?php echo site_url("admin/settings") ?>"><span class="glyphicon glyphicon-arrow-right admin-sb-link"></span> <?php echo lang("ctn_158") ?></a></li>
						<li class="<?php if(isset($activeLink['admin']['social_settings'])) echo "active" ?>"><a href="<?php echo site_url("admin/social_settings") ?>"><span class="glyphicon glyphicon-arrow-right admin-sb-link"></span> <?php echo lang("ctn_159") ?></a></li>
                    	<li class="<?php if(isset($activeLink['admin']['members'])) echo "active" ?>"><a href="<?php echo site_url("admin/members") ?>"><span class="glyphicon glyphicon-arrow-right admin-sb-link"></span> <?php echo lang("ctn_160") ?></a></li>
                    	<li class="<?php if(isset($activeLink['admin']['user_groups'])) echo "active" ?>"><a href="<?php echo site_url("admin/user_groups") ?>"><span class="glyphicon glyphicon-arrow-right admin-sb-link"></span> <?php echo lang("ctn_161") ?></a></li>
                    	<li class="<?php if(isset($activeLink['admin']['ipblock'])) echo "active" ?>"><a href="<?php echo site_url("admin/ipblock") ?>"><span class="glyphicon glyphicon-arrow-right admin-sb-link"></span> <?php echo lang("ctn_162") ?></a></li>
                    	<li class="<?php if(isset($activeLink['admin']['email_templates'])) echo "active" ?>"><a href="<?php echo site_url("admin/email_templates") ?>"><span class="glyphicon glyphicon-arrow-right admin-sb-link"></span> <?php echo lang("ctn_163") ?></a></li>
                    	<li class="<?php if(isset($activeLink['admin']['email_members'])) echo "active" ?>"><a href="<?php echo site_url("admin/email_members") ?>"><span class="glyphicon glyphicon-arrow-right admin-sb-link"></span> <?php echo lang("ctn_164") ?></a></li>
					</ul>	
				</li>
			</ul>
            <?php endif; ?>
			<ul data-submenu-title="Listings">
				<li><a><i class="sl sl-icon-layers"></i> My Listings</a>
					<ul>
						<li><a href="dashboard-my-listings.html">Active <span class="nav-tag green">6</span></a></li>
						<li><a href="dashboard-my-listings.html">Pending <span class="nav-tag yellow">1</span></a></li>
						<li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li>
					</ul>	
				</li>
				<li><a href="dashboard-reviews.html"><i class="sl sl-icon-star"></i> Reviews</a></li>
				<li><a href="dashboard-bookmarks.html"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
				<li class="active"><a href="dashboard-add-listing.html"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li>
				<li><a href="index.html"><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>

		</div>
	</div>
	<!-- Navigation / End -->
    <?php
    $gl = $this->session->flashdata('globalmsg');
    if(!empty($gl)) : ?>
        <div class="row">
            <div class="col-md-12">
                    <div class="alert alert-success"><b><span class="glyphicon glyphicon-ok"></span></b> <?php echo $this->session->flashdata('globalmsg') ?></div>
            </div>
        </div>
    <?php endif; ?>
    <?php echo $content ?>

<!-- Scripts
================================================== -->
<script type="text/javascript" src="<?php echo base_url('estatico/script/jquery-2.2.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/jpanelmenu.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/chosen.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/slick.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/rangeslider.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/magnific-popup.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/waypoints.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/counterup.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/jquery-ui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/tooltips.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('estatico/script/custom.js'); ?>"></script>


<!-- Opening hours added via JS (this is only for demo purpose) -->
<script>
$(".opening-day.js-demo-hours .chosen-select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Closed</option>'+
        '<option>1 AM</option>'+
        '<option>2 AM</option>'+
        '<option>3 AM</option>'+
        '<option>4 AM</option>'+
        '<option>5 AM</option>'+
        '<option>6 AM</option>'+
        '<option>7 AM</option>'+
        '<option>8 AM</option>'+
        '<option>9 AM</option>'+
        '<option>10 AM</option>'+
        '<option>11 AM</option>'+
        '<option>12 AM</option>'+
        '<option>1 PM</option>'+
        '<option>2 PM</option>'+
        '<option>3 PM</option>'+
        '<option>4 PM</option>'+
        '<option>5 PM</option>'+
        '<option>6 PM</option>'+
        '<option>7 PM</option>'+
        '<option>8 PM</option>'+
        '<option>9 PM</option>'+
        '<option>10 PM</option>'+
        '<option>11 PM</option>'+
        '<option>12 PM</option>');
});
</script>

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="<?php echo base_url('estatico/script/dropzone.js'); ?>"></script>
</body>
</html>