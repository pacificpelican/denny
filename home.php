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
				<section id="example-1">
  			<div id="contentSection" v-for="item in message">
    			<header>
						<h1 className="page-title screen-reader-text">
							<a v-bind:href="'/?p='+ item.id">{{ item.title.rendered }}</a>
						</h1>
					</header>
					<div class="entry-content">
					<div v-html="item.content.rendered"></div>
					</div>
  			</div>
			</section>
			</div>

		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
