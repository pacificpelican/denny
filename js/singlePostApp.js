//  singlePostApp Vue file
//  denny theme
//  http://danmckeown.info

//  depends on VueJS 2.5+

var $postdata = 'Vue WP App single post';

window.onload = function () {
	var app5 = new Vue({
		el: '#singlePostApp',
		data: {
			message: $postdata
		},
		mounted: function () {
			alert();
			this.getWordPressPost(2650);
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


