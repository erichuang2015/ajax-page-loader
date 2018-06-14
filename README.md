# AJAX Page Loader / ***WordPress Plugin***

**Requires at least WordPress:** Unknown - 4.7.5

**Tested up to WordPress:** 4.9.6

**License:** Unlicensed

## Description

"A lightweight AJAX page loader intended for developers."

### Features:
* AJAX page loading
	* AJAX search
	* Exclude class
	* Exclude URL pattern
* AJAX comment loading
* AJAX login
	* AJAX lost password
	* AJAX reset password
	* AJAX registration
* Evaluate scripts throughout each AJAX event
	* Access to AJAX XHR and Complete functions
	* Access to pre-AJAX functions

This plugin was designed to let a developer add AJAX to a site, then let the plugin manage it's integration with themes and other plugins.

There is unminified source as well as example scripts under '/source' for help and ideas.

## Installation

1. Upload the 'ajax-page-loader' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' page.
3. Configure the plugin through the 'Ajax Page Loader' page under 'Settings'.

## Changelog
### 0.0.1
* Initial Release
### 0.0.2
* Removed jQuery framework dependency, plugin is now 100% pure Javascript.
* Tested to work with various circa IE11 browsers.
* Refactored code quite a bit, used some better coding practices, smaller file size.
* Started testing with WooCommerce.. I plan on coding full compatability for version 0.0.3
