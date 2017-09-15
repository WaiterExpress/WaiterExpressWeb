<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Necesidades básicas de la página -->
    <title><?php echo lang('page_title'); ?></title>
    
    <link rel="icon" href="" />

    <meta name="description" content="">
    <meta name="author" content="Devfy">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url('estatico/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('estatico/css/colors/blue.css'); ?>" id="colors">
    <link rel="stylesheet" href="<?php echo base_url('estatico/css/devfy.css'); ?>">
</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->
        <header id="header-container">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <?php echo anchor('home', '<img src="'.base_url('estatico/images/logo.png').'" title=""  alt=""/> ');?>
                        </div>

                        <!-- Mobile Navigation -->
                        <div class="menu-responsive">
                            <i class="fa fa-reorder menu-trigger"></i>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">
                                <li><?php echo anchor('home/',  '<i class="sl sl-icon-home"></i> '.lang('home').''); ?></li>
                                <li><?php echo anchor('contact/',  '<i class="sl sl-icon-envelope-open"></i> '.lang('contact').''); ?></li>

                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>
                    <!-- Left Side Content / End -->


                    <!-- Right Side Content / End -->
                    <div class="right-side">
                        <div class="header-widget">
                            
                            <?php if($this->user->loggedin) { ?>
                                <a href="<?php echo site_url("profile/" . $this->user->info->username); ?>" class="sign-in"><i class="sl sl-icon-user-following"></i> <?php echo $this->user->info->username; ?></a>
                            <?php }else{ ?>
                                <a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
                            <?php } ?>
                            <a href="<?php echo base_url('dashboard/addlisting/'); ?>" class="button border with-icon"> Add Listing <i class="sl sl-icon-plus"></i></a>
                            <a href="" class="idioma"><img src="<?php echo base_url('estatico/images/es_cr.png'); ?>" title=""/> </li>
                            <a href="" class="idioma"><img src="<?php echo base_url('estatico/images/en_us.png'); ?>" title=""/> </li>
                        </div>
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- Sign In Popup -->
                    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

                        <div class="small-dialog-header">
                            <h3>Sign In</h3>
                        </div>

                        <!--Tabs -->
                        <div class="sign-in-form style-1">

                            <ul class="tabs-nav">
                                <li class=""><a href="#tab1">Log In</a></li>
                                <li><a href="#tab2">Create Account</a></li>
                            </ul>

                            <div class="tabs-container alt">

                                <!-- Login -->
                                <div class="tab-content" id="tab1" style="display: none;">
                                    <?php
                                    $atributos = array('class' => 'login');
                                    echo form_open(site_url("login/pro"), $atributos);
                                    ?>
                                        <p class="form-row form-row-wide">
                                            <label for="username">Email Address:
                                                <i class="im im-icon-Male"></i>
                                                <input type="email" class="input-text" name="email" id="email" placeholder="Enter your Email Address" required />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="password">Password:
                                                <i class="im im-icon-Lock-2"></i>
                                                <input class="input-text" type="password" name="pass" id="password" placeholder="Enter your password" required/>
                                            </label>
                                            <span class="lost_password">
                                                <a href="<?php echo site_url("login/forgotpw"); ?>" >Lost Your Password?</a>
                                            </span>
                                        </p>

                                        <div class="form-row">
                                            <button type="submit" class="btn-login" name="login"><i class="sl sl-icon-login"></i> Login</button>
                                        </div>
                                    <?php echo form_close() ?>

                                    <?php if(!$this->settings->info->disable_social_login) : ?>
                                        <div class="social-linea">
                                            <div class="linea"></div>
                                                <div class="leyenda"> Ó </div>
                                            <div class="linea"></div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="margin-top-10">
                                                <a href="<?php echo site_url("login/facebook_login"); ?>" class="btn-facebook">
                                                    <i class="im im-icon-Facebook"></i> Sign in with Facebook
                                                </a>
                                                <a href="<?php echo site_url("login/google_login"); ?>" class="btn-google">
                                                    <i class="im im-icon-Google-Plus"></i> Sign in with Google
                                                </a>
                                                <a href="<?php echo site_url("login/twitter_login"); ?>" class="btn-twitter">
                                                    <i class="im im-icon-Twitter"></i> Sign in with Twitter
                                                </a>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                </div>

                                <!-- Register -->
                                <div class="tab-content" id="tab2" style="display: none;">
                                    <form method="post" class="register">

                                        <p class="form-row form-row-wide">
                                            <label for="username2">Username:
                                                <i class="im im-icon-Male"></i>
                                                <input type="text" class="input-text" name="username" id="username2" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="email2">Email Address:
                                                <i class="im im-icon-Mail"></i>
                                                <input type="text" class="input-text" name="email" id="email2" value="" />
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="password1">Password:
                                                <i class="im im-icon-Lock-2"></i>
                                                <input class="input-text" type="password" name="password1" id="password1"/>
                                            </label>
                                        </p>

                                        <p class="form-row form-row-wide">
                                            <label for="password2">Repeat Password:
                                                <i class="im im-icon-Lock-2"></i>
                                                <input class="input-text" type="password" name="password2" id="password2"/>
                                            </label>
                                        </p>
                                        <div class="form-row">
                                            <button type="submit" class="btn-login" name="register"><i class="im im-icon-Add-User"></i> Create Account</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Sign In Popup / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->