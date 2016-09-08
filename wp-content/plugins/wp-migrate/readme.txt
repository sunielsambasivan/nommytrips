=== WP Migrate ===
Contributors: jkriddle 
Tags: migration, deployment, development
Requires at least: 2.7
Tested up to: 2.9
Version: 0.1.6
Stable tag: 0.1.6
	
A plugin that assists in migrating your WordPress database to a new location and/or domain.

== Description ==

WP-Migrate allows users to enter database information separate from the current site/blog database, and migrate the current information over. It enables you to select what (if any) information to move over, and/or update the URL throughout the database to a new domain while keeping the seralized meta information intact.

NOTICE: This is a very developer-centric plugin and should not be used by anyone that is not comfortable working with database settings and entering connection information.

This is an early version and it is recommended that you run a test-deployment before migrating any information to a production database. For example: create a new database named "mysite2", running the migration, and switching the wp-config.php file on your production server to point to that database. This way you can switch back quickly if there was an issue.

**Plugin requires the json_encode function to be available on your server.**
	
== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page. A new menu item under the Settings menu will appear named "Migrate Site".

If you would like to enable logging of all queries, give the "logs" folder write permissions.

== Changelog ==

= 0.1.6 =
* Resolve JSON formatting issue with some WP versions.

= 0.1.5 =
* Fixed conflict when site_url action is hooked into from another plugin. Thanks to Andrew Gray - http://graymerica.com/

= 0.1.4 =
* Added memory limit option

= 0.1.3 =
* Hide "Migrate" button until database connection has been tested.
* Update help content and other copy.
* Attempt to create database if does not exist.

= 0.1.2 =
* Bug fix for query syntax issue for URL updates when not migrating data

= 0.1.1 =
* Updates bug in serialized columns when not migrating data.
* Increased timeout limit (may not work for some hosts)
* Added automatic logging when "logs" folder is writable.
