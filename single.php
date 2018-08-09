<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Denny
 */

get_header();
$currentPostID = get_the_ID();
?>
<script>
var $postdata = 'Vue WP App single post';

window.onload = function () {
	var app5 = new Vue({
		el: '#singlePostApp',
		data: {
			message: $postdata
		},
		mounted: function () {
			alert();
			let postID = "<?php echo $currentPostID ?>";
			this.getWordPressPost(postID);
		},
		methods: {
			reverseMessage: function () {
				this.message = this.message.split('').reverse().join('')
			},
			getWordPressPost(postID) {
				let dest = 'http://localhost:8888/wp-json/wp/v2/posts/' + postID.toString();
				fetch(dest, {})
					.then(function (response) {
						if (response.ok) {
							console.log("response 2 ok");
							console.log(response.json);
							for (var e in response.json) {
								console.log(e.toString());
							}
							console.log(response.text);
							return response.json();
						}
						throw new Error("Network did not respond.");
						return response.blob();
					})
					.then(function (myReturn) {
						console.log(myReturn);
				//		$postdata = myReturn.content.rendered.toString();
						app5.message = myReturn.content.rendered;
					});
			}
		}
	})
}
</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div id="singlePostApp">
				{{ message }}
			</div>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
