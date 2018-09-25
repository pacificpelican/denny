<?php
/**
 * The home file
 *
 * This is a high-priority template file for the (posts-driven) home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Denny
 */

get_header();
?>

<script>
var $postdata = 'Vue WP App home page';

window.onload = function () {
	var app5 = new Vue({
		el: '#mainPageApp',
		data: {
			message: $postdata
		},
		mounted: function () {
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
							return response.json();
						}
						throw new Error("Network did not respond.");
						return response.blob();
					})
					.then(function (myReturn) {
						console.log(myReturn);
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
