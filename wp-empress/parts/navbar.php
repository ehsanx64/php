<div class="navbar-fixed" id="the-navbar">
	<nav>
		<div class="nav-wrapper container">
			<header class="main-header">
				<a href="<?php echo home_url(); ?>" class="brand-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="responsive-img" />
					<?php
					//				empress\Theme\Options::customLogo();
					echo '';
					?>
				</a>

				<?php /* Disable site title for now 
				<h1 class="site-title">
					<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
				</h1>
				*/ ?>
				<?php /* Disable site description as well
				<h2 class="site-description">
				<?php if (is_single()): ?>
					<span class="breadcrumb">
					<?php
					global $post;
					echo $post->post_title;
					?>
					</span>
				<?php endif; ?>
				</h2>
				*/ ?>

			</header>



			<?php if (has_nav_menu('main-nav-menu')): ?>
				<a href="#" class="button-collapse">
					<div class="mobile-button">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</a>
				<?php /*wp_nav_menu(
					array(
						'theme_location' => 'main-nav-menu',
						'menu_class' => 'side-nav',
						'menu_id' => 'mobile-demo',
						'container' => false,
						'depth' => 2,
						'walker' => new empress\Theme\wp_bootstrap_navwalker()
					)
				); */?>
				<?php wp_nav_menu(
					array(
						'theme_location' => 'main-nav-menu',
						'menu_class' => 'hide-on-med-and-down',
						'menu_id' => 'main-nav-menu',
						'container' => false,
						'depth' => 2,
						'walker' => new empress\Theme\wp_bootstrap_navwalker()
					)
				); ?>
			<?php endif; ?>
		</div>
	</nav>
</div>
