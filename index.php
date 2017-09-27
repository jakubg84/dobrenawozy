<?php
/**
 * Basic Template
 *
 * The main template file.
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

get_header(); ?>
	<div id="content" class="content-area">
	<?php
		/**$pagename = get_query_var('pagename');**/
		/**if( ( is_front_page()) ) **/
$pagename = get_query_var('pagename');
if( ( is_front_page()) )  {?>
				
	<!-- SIDEBAR STR GŁÓWNA -->
				<div class="box-produkty">
				<h2>nasza oferta nawozów</h2>
				<?php if ( is_active_sidebar( 'home-widget-1' ) ) : ?>
				<?php dynamic_sidebar( 'home-widget-1' ); ?>
				<?php endif; ?>
				</div>
				
				<div class="box-aktualnosci">
				<h2>aktualności na naszym blogu</h2>
				<?php if ( is_active_sidebar( 'home-widget-2' ) ) : ?>
				<?php dynamic_sidebar( 'home-widget-2' ); ?>
				<?php endif; ?>
				</div>
				<div style="clear: both;"></div>
				<div class="box-instagram">
				<h2>dobre-nawozy na Instagramie</h2>
				<?php echo wdi_feed(array('id'=>'1')); ?>
				</div>
				<div style="clear: both;"></div>
				<div class="wiecej"><a href="#wiecej">więcej na instagramie ...</a></div>
				<?php } else { ?>
			
			<?php } ?>	
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php responsive_mobile_paging_nav(); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				
				
			</main><!-- #main -->
			<?php get_sidebar(); ?>
	</div><!-- #content -->
<?php get_footer(); ?>