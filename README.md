# Restricted XML-RPC Methods

A WordPress plugin that restricts the allowed XML-RPC methods for a site to those required by specific applications.

Current allowed applications:

* WordPress Mobile for Android (without Jetpack)
* General pingback requests

## The method to the allowed methods

* A portion of the list is allowed because the [methods are listed as required in the WordPress-FluxC-Android package](https://github.com/wordpress-mobile/WordPress-FluxC-Android/blob/2c38f70f8a45ec12f12ebac1de1c646ea9e49b7f/fluxc/src/main/java/org/wordpress/android/fluxc/network/discovery/DiscoveryUtils.java#L72-L76).
* Another portion is allowed because parts of the WordPress Mobile for Android application didn't work until I enabled them. I found these while walking through the app with [Log XML-RPC Requests](http://github.com/jeremyfelt/log-xmlrpc-requests) enabled on a site.
* Pingbacks are allowed because I think they can still serve a purpose on the web. Opinions!
