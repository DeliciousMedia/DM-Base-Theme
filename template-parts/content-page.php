<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header is-layout-constrained">
		<div class="alignwide">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div><!-- .alignwide -->
	</header><!-- .entry-header -->

	<div class="entry-content is-layout-constrained">
		<?php _s_post_thumbnail(); ?>

		<?php
		the_content();

		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			]
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
