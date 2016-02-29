<?php
/**
 * Redirect old tags, categories, and authors to blog ( http://disputebills.com/blog )
 */ 
if (is_tag(array( // http://http://disputebills.com/tag/{slug}
	6,  // advocate
	7,  // charity
	8,  // crowdfunding
	9,  // healthcare
	10, // hospitals
	11, // medical-bills
	12, // medicare
	13, // negotiate
	14, // uninsured
	15, // bankrupcty
	16, // credit-report
	17, // negotiate-medical-bills
	18  // personal-finance	
)) || is_category(array( // http://http://disputebills.com/category/{slug}
	1,
	4,
	5
)) || is_author()) {
	wp_redirect(home_url('/blog') , 301);
	exit;
}

// Redirect 403 error pages to homepage
if (!is_home() && is_403()) {
	wp_redirect(home_url() , 301);
	exit;
}

// Redirect searches to homepage
if (is_search()) {
	wp_redirect(home_url() , 301);
	exit;
}

// Redirect attachment pages to parent posts
global $post;
if (is_attachment() && isset($post->post_parent) && is_numeric($post->post_parent) && ($post->post_parent != 0)) {
	wp_redirect(get_permalink($post->post_parent) , 301);
}
        
