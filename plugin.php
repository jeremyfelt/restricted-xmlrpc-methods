<?php
/*
Plugin Name: Restricted XML-RPC Methods
Plugin URI: https://github.com/jeremyfelt/restricted-xmlrpc-methods/
Description: Allow only the XML-RPC methods used by specific applications. (And Pingbacks)
Version: 0.0.1
Author: jeremyfelt
Author URI: https://jeremyfelt.com
License: GPLv2 or later
*/

add_filter( 'xmlrpc_methods', 'rxm_filter_xmlrpc_methods' );

/**
 * Filter the allowed methods handled by WordPress for XML-RPC requests.
 *
 * Restricts allowed methods to those that:
 *   - Are required by the WordPress Mobile Android application (Jetpack disabled)
 *   - Receive pingbacks and pingback URL lookups
 *
 * @since 0.0.1
 *
 * @return array An array of allowed XML-RPC methods.
 */
function rxm_filter_xmlrpc_methods() {
	return array(
		// WordPress API
		'wp.getUsersBlogs'                 => 'this:wp_getUsersBlogs',        // Required method in WordPress-FluxC-Android.
		'wp.newPost'                       => 'this:wp_newPost',              // Used by Android client.
		'wp.editPost'                      => 'this:wp_editPost',             // Used by Android client.
		'wp.deletePost'                    => 'this:wp_deletePost',           // Used by Android client.
		'wp.getPost'                       => 'this:wp_getPost',              // Used by Android client.
		'wp.getPosts'                      => 'this:wp_getPosts',             // Used by Android client.
		'wp.newTerm'                       => 'this:wp_newTerm',              // Used by Android client.
		//'wp.editTerm'                      => 'this:wp_editTerm',
		//'wp.deleteTerm'                    => 'this:wp_deleteTerm',
		'wp.getTerm'                       => 'this:wp_getTerm',              // Used by Android client.
		'wp.getTerms'                      => 'this:wp_getTerms',             // Used by Android client.
		//'wp.getTaxonomy'                   => 'this:wp_getTaxonomy',
		//'wp.getTaxonomies'                 => 'this:wp_getTaxonomies',
		//'wp.getUser'                       => 'this:wp_getUser',
		//'wp.getUsers'                      => 'this:wp_getUsers',
		'wp.getProfile'                    => 'this:wp_getProfile',           // Required method in WordPress-FluxC-Android.
		//'wp.editProfile'                   => 'this:wp_editProfile',
		'wp.getPage'                       => 'this:wp_getPage',              // Required method in WordPress-FluxC-Android.
		'wp.getPages'                      => 'this:wp_getPages',             // Required method in WordPress-FluxC-Android.
		'wp.newPage'                       => 'this:wp_newPage',              // Required method in WordPress-FluxC-Android.
		'wp.deletePage'                    => 'this:wp_deletePage',           // Required method in WordPress-FluxC-Android.
		'wp.editPage'                      => 'this:wp_editPage',             // Required method in WordPress-FluxC-Android.
		//'wp.getPageList'                   => 'this:wp_getPageList',
		//'wp.getAuthors'                    => 'this:wp_getAuthors',
		'wp.getCategories'                 => 'this:mw_getCategories',        // Required method in WordPress-FluxC-Android.
		'wp.getTags'                       => 'this:wp_getTags',              // Required method in WordPress-FluxC-Android.
		'wp.newCategory'                   => 'this:wp_newCategory',          // Required method in WordPress-FluxC-Android.
		//'wp.deleteCategory'                => 'this:wp_deleteCategory',
		//'wp.suggestCategories'             => 'this:wp_suggestCategories',
		'wp.uploadFile'                    => 'this:mw_newMediaObject',       // Required method in WordPress-FluxC-Android.
		//'wp.deleteFile'                    => 'this:wp_deletePost',
		//'wp.getCommentCount'               => 'this:wp_getCommentCount',
		//'wp.getPostStatusList'             => 'this:wp_getPostStatusList',
		//'wp.getPageStatusList'             => 'this:wp_getPageStatusList',
		//'wp.getPageTemplates'              => 'this:wp_getPageTemplates',
		'wp.getOptions'                    => 'this:wp_getOptions',           // Required method in WordPress-FluxC-Android.
		//'wp.setOptions'                    => 'this:wp_setOptions',
		'wp.getComment'                    => 'this:wp_getComment',           // Required method in WordPress-FluxC-Android.
		'wp.getComments'                   => 'this:wp_getComments',          // Required method in WordPress-FluxC-Android.
		'wp.deleteComment'                 => 'this:wp_deleteComment',        // Required method in WordPress-FluxC-Android.
		'wp.editComment'                   => 'this:wp_editComment',          // Required method in WordPress-FluxC-Android.
		'wp.newComment'                    => 'this:wp_newComment',           // Required method in WordPress-FluxC-Android.
		'wp.getCommentStatusList'          => 'this:wp_getCommentStatusList', // Required method in WordPress-FluxC-Android.
		'wp.getMediaItem'                  => 'this:wp_getMediaItem',         // Used by Android client.
		'wp.getMediaLibrary'               => 'this:wp_getMediaLibrary',      // Used by Android client.
		'wp.getPostFormats'                => 'this:wp_getPostFormats',       // Used by Android client.
		//'wp.getPostType'                   => 'this:wp_getPostType',
		//'wp.getPostTypes'                  => 'this:wp_getPostTypes',
		//'wp.getRevisions'                  => 'this:wp_getRevisions',
		//'wp.restoreRevision'               => 'this:wp_restoreRevision',

		// Blogger API
		// 'blogger.getUsersBlogs'            => 'this:blogger_getUsersBlogs',
		// 'blogger.getUserInfo'              => 'this:blogger_getUserInfo',
		// 'blogger.getPost'                  => 'this:blogger_getPost',
		// 'blogger.getRecentPosts'           => 'this:blogger_getRecentPosts',
		// 'blogger.newPost'                  => 'this:blogger_newPost',
		// 'blogger.editPost'                 => 'this:blogger_editPost',
		// 'blogger.deletePost'               => 'this:blogger_deletePost',

		// MetaWeblog API (with MT extensions to structs)
		//'metaWeblog.newPost'               => 'this:mw_newPost',
		//'metaWeblog.editPost'              => 'this:mw_editPost',
		//'metaWeblog.getPost'               => 'this:mw_getPost',
		//'metaWeblog.getRecentPosts'        => 'this:mw_getRecentPosts',
		//'metaWeblog.getCategories'         => 'this:mw_getCategories',
		'metaWeblog.newMediaObject'        => 'this:mw_newMediaObject',       // Used by Android client.

		// MetaWeblog API aliases for Blogger API
		// see http://www.xmlrpc.com/stories/storyReader$2460
		//'metaWeblog.deletePost'            => 'this:blogger_deletePost',
		//'metaWeblog.getUsersBlogs'         => 'this:blogger_getUsersBlogs',

		// MovableType API
		//'mt.getCategoryList'               => 'this:mt_getCategoryList',
		//'mt.getRecentPostTitles'           => 'this:mt_getRecentPostTitles',
		//'mt.getPostCategories'             => 'this:mt_getPostCategories',
		//'mt.setPostCategories'             => 'this:mt_setPostCategories',
		//'mt.supportedMethods'              => 'this:mt_supportedMethods',
		//'mt.supportedTextFilters'          => 'this:mt_supportedTextFilters',
		//'mt.getTrackbackPings'             => 'this:mt_getTrackbackPings',
		//'mt.publishPost'                   => 'this:mt_publishPost',

		// PingBack
		'pingback.ping'                    => 'this:pingback_ping', // Think of what you can do with pingbacks!
		'pingback.extensions.getPingbacks' => 'this:pingback_extensions_getPingbacks',

		//'demo.sayHello'                    => 'this:sayHello',
		//'demo.addTwoNumbers'               => 'this:addTwoNumbers',
	);
}
