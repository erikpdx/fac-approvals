<?php 

	class facs {

		function __construct() {

			global $post;
			global $ex_image;

			$this->post_id 		= isset($post->ID) ? $post->ID : '';
			$this->author_id	= isset($post->post_author) ? $post->post_author : '';
			$this->auth_email 	= isset($_GET['email']) ? $_GET['email'] : '';
			$this->client_email	= '' !== get_post_meta($post->ID, 'client_email', true) ? get_post_meta($post->ID, 'client_email', true) : '';
			$this->fac_url 		= '' !== get_permalink($this->post_id) ? get_permalink($this->post_id) : '';
			$this->status 		= isset($_GET['fac_select']) ? $_GET['fac_select'] : '';
			$this->message 		= '' !== get_field('message') ? get_field('message') : '';

			$this->strat_first 	= '' !== get_the_author_meta('first_name', $this->author_id) ? get_the_author_meta('first_name', $this->author_id) : '';
			$this->strat_last	= '' !== get_the_author_meta('last_name', $this->author_id) ? get_the_author_meta('last_name', $this->author_id) : '';
			$this->strat_phone 	= '' !== get_the_author_meta('phone', $this->author_id) ? get_the_author_meta('phone', $this->author_id) : '888-406-9774'; 
			$this->strat_email 	= '' !== get_the_author_meta('email', $this->author_id) ? get_the_author_meta('email', $this->author_id): 'clientsupport@brandefined.com'; 
			$this->support_phone= '888-406-9774'; 
			$this->support_email= 'clientsupport@brandefined.com'; 
			
			$this->clicks_likes = '' !== get_field('clicks_or_likes') ? get_field('clicks_or_likes') : '';
			$this->business 	= '' !== get_field('business') ? get_field('business') : '';
			$this->category 	= '' !== get_field('bus_category') ? get_field('bus_category') : 'Your Business Category';
			
			$this->business_url = '' !== get_field('bus_url') ? strtoupper(get_field('bus_url')) : strtoupper('yoursite.com');
			$this->profile_img	= null !== get_field('profile_img')['url'] ? get_field('profile_img')['url'] : 'http://apps.brandefined.com/wp-content/uploads/2016/07/facebook_logo-placeholder_1.png';

			$this->ex_image 	= $this->clicks_likes == 'clicks' ? 'fac-ex-clicks.jpg' : 'fac-ex-likes.jpg';
			$this->page_title	= get_permalink();
			$this->fac_number	= get_the_title();

		}
		
		function get_ads() {
			global $i;
			$this->ad_approved	= '' !== get_field('ad_approved_' . $i) ? get_field('fac_' . $i) : false;
			$this->proof_image 	= '' !== get_field('fac_' . $i)['url'] ? get_field('fac_' . $i)['url'] : '';
			$this->proof_alt 	= '' !== get_field('fac_' . $i)['alt'] ? get_field('fac_' . $i)['alt'] : 'Proof Image #' . $i;
			$this->proof_title	= '' !== get_field('title_' . $i) ? get_field('title_' . $i) : '*** Title Required ***';
			$this->subtitle		= '' !== get_field('subtitle_' . $i) ? get_field('subtitle_' . $i) : $this->business;
			$this->description 	= '' !== get_field('desc_' . $i) ? get_field('desc_' . $i) : 'Here\'s where the main description text will go.'; 
			$this->rand_likes	= number_format(rand(200,2000));
		}

		function test_type() {
			if($this->clicks_likes == 'clicks') {
				$this->clicks = true;
				$this->likes = false;
			} else {
				$this->clicks = false;
				$this->likes = true;
			}

		}
	}

?>