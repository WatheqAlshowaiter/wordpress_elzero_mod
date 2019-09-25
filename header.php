<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!--  Dynamic titles-->
    <title>
      <?php wp_title('-', 'true', 'right'); ?> 
      <?php bloginfo('name') ?>
    </title>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
    <?php wp_head(); ?>
</head>

<body>
    

    <!-- New example -->
    <!-- <section class="hero is-info is-fullheight"> -->
    <div class="hero-head">
        <nav class="navbar is-black">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="<?php bloginfo('url')?>">
                        <strong><?php bloginfo('name')?></strong>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div id="navbarMenuHeroA" class="navbar-menu">
                <?php  register_custom_menu(); ?>
                <!-- <ul class="navbar-end">
              
                        <li>
                            <a href="" class="navbar-item">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="" class="navbar-item">
                                Examples
                            </a>
                        </li>
                        <li>
                            <a href="" class="navbar-item">Docs</a>
                        </li>
                    </ul> -->

                </div>
            </div>
        </nav>
    </div>

    </div>
    <!-- </section> -->
    <script>

    </script>
    <!-- <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target=" ">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Home
      </a>

      <a class="navbar-item">
        Documentation
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Jobs
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav> -->