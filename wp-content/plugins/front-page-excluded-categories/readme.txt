=== Front Page Excluded Categories ===
Contributors: seanosteen
Donate link: http://seanosteen.com/
Tags: category, del.icio.us, post
Requires at least: 2.1
Tested up to: 2.3
Stable tag: 1.1.1

A basic plugin that *excludes* posts from one or more categories from appearing on the front page. 

== Description ==

A basic plugin that *excludes* posts in one or more categories from appearing on the front page. This is especially useful if you use an automated posting system, like the del.icio.us bookmark blog posting feature, that updates your blog regularly. In such a case, you can assign these posts to an excluded category so they don't appear on the front page, but do appear in a category page.


== Installation ==

1. Download the zip or tar file and unzip the 'front_page_excluded_cats.php' file into the `/wp-content/plugins/` directory.
1. Open the php file in a text editor and add the category id values you wish to exclude to the $cats_to_exlude string.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. View your front page and confirm that your excluded categories are now absent.


== Known Issues ==

April 11, 2007: Based on the [MySQL documentation page](http://dev.mysql.com/doc/refman/4.1/en/any-in-some-subqueries.html) MySQL 4.0 and earlier does not support subqueries. Version 1.0.2 was rewritten to use a SQL JOIN and a DISTINCT clause to exclude the catergories instead of using subqueries. Thank you to [Jason York](http://www.yorkspace.com) for stumbling on this little gem and for providing the workaround.


== Change History ==

1.1.1 - Fixed a bug where new posts, after you have upgraded your database schema do not get filter appropriately.

1.1.0 - Updated the join and where filters to take advantage of the schema changes in Wordpress 2.3

1.0.3 - Got rid of the extra carriage returns at the end of the file. They were apparently causing "Cannot modify header information - headers already sent" errors.

1.0.2 - With Jason York's help, we re-wrote the plugin to use SQL JOIN and a DISTINCT clause so that the
        Plugin is both compatible with MySQL 4.0 and does not create duplicates.

1.0.1 - Updated the readme.txt file to address a MySQL 4.0 incompatibility. No code change at this time.

1.0 - Initial Release.
