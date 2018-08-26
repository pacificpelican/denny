<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Denny
 */

get_header();
?>

<script>
var $postdata = 'Vue WP App single post';

window.onload = function () {
	var app5 = new Vue({
		el: '#mainPageApp',
		data: {
			message: $postdata
		},
		mounted: function () {
		//	alert();
			
			this.getWordPressPosts();
		},
		methods: {
			reverseMessage: function () {
				this.message = this.message.split('').reverse().join('')
			},
			getWordPressPosts() {
				let dest = '/wp-json/wp/v2/posts';
				fetch(dest, {})
					.then(function (response) {
						if (response.ok) {
							console.log("response 2 ok");
							// console.log(response.json);
							// for (var e in response.json) {
							// 	console.log(e.toString());
							// }
							// console.log(response.text);
							return response.json();
						}
						throw new Error("Network did not respond.");
						return response.blob();
					})
					.then(function (myReturn) {
						console.log(myReturn);
				//		$postdata = myReturn.content.rendered.toString();
						app5.message = myReturn;
					});
			}
		}
	})
}
</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div id="mainPageApp">
				
				<ul id="example-1">
  			<li v-for="item in message">
    			{{ item.id }}
  			</li>
			</ul>
			</div>
			

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
