<?php
/**
 * Dispute Bills Redirects
 */
function bw_redirect_old_tags_cats()
	{
	global $post;
	if (is_tag(array( // http://http://disputebills.com/tag/{slug}
		  6  // advocate
		, 7  // charity
		, 8  // crowdfunding
		, 9  // healthcare
		, 10 // hospitals
		, 11 // medical-bills
		, 12 // medicare
		, 13 // negotiate
		, 14 // uninsured
		, 15 // bankrupcty
		, 16 // credit-report
		, 17 // negotiate-medical-bills
		, 18 // personal-finance
	)) || is_category(array( // http://http://disputebills.com/category/{slug}
		  1 // uncategorized
		, 2 // company-news
		, 3 // consumer-tips
	)) || is_author())
		{ // http://http://disputebills.com/author/{slug}
		  wp_redirect( home_url('/blog') , 301 ); // Redirect to blog ( http://disputebills.com/blog )
		  exit;
		}
	elseif ( get_permalink( get_page_by_path( 'glossary' ) ) || get_permalink( get_page_by_path( 'glossary/aacy' ) ) ) 
		{ // Redirect glossary to single aayc post
		  wp_redirect(home_url('/dispute-partners-with-the-american-association-of-caregiving-youth/') , 301);
		  exit;
		} 
	elseif (is_attachment() && isset($post->post_parent) && is_numeric($post->post_parent) && ($post->post_parent != 0)) 
		{ // Redirect attachment pages to parent posts
		  wp_redirect(get_permalink($post->post_parent) , 301);
		  exit;
		} 
	elseif ( is_403() || is_search() || is_404() ) 
		{ 
		  wp_safe_redirect(home_url() ); // Redirect the rest to homepage
		  exit;
		}
	}
add_action('template_redirect', 'bw_redirect_old_tags_cats', 1);
