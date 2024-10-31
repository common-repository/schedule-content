=== Schedule Content ===
Contributors: qaisarferoz
Tags: shortcode, post, page, event
Requires at least: 3.0.1
Tested up to: 3.9.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display the content of specific page/post on specific date and time using shortcode

== Description ==

If you want to change the content on your page depending on the date/time, you can use the short codes created by this plugin on your page to schedule in advance what content (from other existing pages) to display. The URL stays the same, but displays other pages content.

So say you are changing your sales page depending on the date/time to remove/add bonus offers or change price, you can create each sales offer on its own page, and then schedule which offer/page to display using the short codes provided.

You reference the page via its slug so you could have your page "mydomain.com/sales" show the content of /sales1 starting tomorrow, which could be replaced by /sales2 on X date/time which could then be later replaced by /sales3 on Y date/time indefinitely - but all the while the URL shows "mydomain.com/sales.

Note, if you view page source, you will find the url of the page of the content you are showing.

There is also a setting for a default page just in case you mess up the date/time settings.

It works off the time you have in your WP General Settings.

**Confirmed to work with OptimizePress 2.0 also btw.**
This was created for a client to show a different interview with its own audio & graphics every two days - so that whenever the link was clicked on it would show the current interview.

= Shorcodes  =
The plugin provide two shorcodes to schedule content.

**1. show_now**

This shorcode add a page/post to the schedule.

It accepts three parameters:

**start**	:	Start date and time

**stop**	:	Stop date and time

**path**	:	path of the page/post to show during above times. See FAQ section for detail of this parameter.

**2. show_now_default**

This shortcode sets a default page/post that is served when there is no page/post schedule at the time of visit.

It is important that you put this shortcode at the end of schedule. See example below.

= Example: =

To schedule two pages **the-morning-star** and  **the-night-star** use following shortcode in a page/post:

[show_now **start**=*"5/14/14 04.00"* **stop**=*"5/14/14 15.00"* **path** = *the-morning-star*]

[show_now **start**=*"5/14/14 16.00"* **stop**=*"5/15/14 04.00"* **path** = *the-night-star*]

[show_now_default **path** = *the-evening-star*]

The page with path **the-evening-star** will be served to visitor in case there is no page/post scheduled at the time of visit.

== Installation ==

1. Upload folder 'schedule-content' to the **'/wp-content/plugins/'** directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. See Usage section in plugin description for shortcode example.


== Frequently Asked Questions ==

= What Timezone the plugin use? =

This plugin uses the time zone setting in WP **(Setting->General)**.

= What is path parameter in the shortcode? =

-> Path for a page without parent is its slug.

-> Path for a child page is something like **parent-page/child-page**.

== Screenshots ==

No Screenshots yet.

== Upgrade Notice ==

No need to upgrade now.

== Changelog ==

= 1.0 =
* First Stable Version
