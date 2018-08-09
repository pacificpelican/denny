denny theme for WordPress
----

- built with the [WordPress API](https://developer.wordpress.org/rest-api/reference/)
  - denny theme uses the WordPress API to fetch post content in single.php
  - in order to figure out which post's content to retrieve, single.php uses `get_the_ID();` so it is still part-monolitic but it should provide a useful reference for how to retrieve specific content; in a custom site the post (or page or custom content type) would likely be already known on the client side
- copyright 2018 by [Dan McKeown](http://danmckeown.info) Licesned under the GNU GPL v2 or later
- forked from [_s](https://underscores.me/) theme by Automattic

**THIS INFORMATION COMES VIA THE _S THEME**

_s
===

Hi. I'm a starter theme called `_s`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A custom header implementation in `inc/custom-header.php` just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample CSS layouts in `layouts/` for a sidebar on either side of your content.
Note: `.no-sidebar` styles are not automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Licensed under GPLv2 or later. :) Use it to make something cool.

