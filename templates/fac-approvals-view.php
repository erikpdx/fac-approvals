<?php 

get_header();

include plugin_dir_path( __FILE__ ) . '../class-view.php';
$fac_logo_dir = plugin_dir_url( __FILE__ );
$fac = new facs;

// AUTHENTICATION VIEW
if ( $fac->auth_email !==  $fac->client_email && $fac->auth_email !== 'brandefined-user-12345' && empty($fac->status) )  { ?>

	<div class="fac-grid fac-security fac-submit">
		<h1>For your security, please enter the email address you have on file with Brandefined.</h1>
		<form action="<?= $fac->fac_url ?>" method="GET">

			<label for="fac-security-email">Your Email Address:</label><br>
				<input id="fac-security-email" type="text" name="email">
				<?php if ( isset($_REQUEST['email']) && $fac->auth_email !== '' ) { // Show validation error?>
				<div class="fac-login-error">
					<h4>The email you entered doesn't match our records.</h4>
					<h5>HINT: What email did we send this link to?</h5>
				</div>
				<?php } ?>
			
				<input class="fac-security-button" type="submit" value="See My Ads!">
		
		<h3>Having trouble?</h3>
		<p>Send an email to clientsupport@brandefined.com, or call us at 888-406-9774.</p>
		</form>
	</div>

<?php 

} else {


?>
	<!-- APPROVAL PAGE VIEW -->
	<header class="fac-app-header">
		<div class="fac-container">
			<div class="fac-col-left"><img class="fac-logo" src="<?= $fac_logo_dir ?>logo.png" width="272" /></div>
			<div class="fac-col-right fac-push-right">
				<ul class="fac-creative-info">
					<li>Your Creative Strategist: <strong><?= $fac->strat_first . ' ' . $fac->strat_last ?></strong></li>
					<li>Phone Support: <strong><?= $fac->support_phone ?></strong></li>
					<li><strong><?= $fac->support_email ?></strong></li>
				</ul>
			</div>
		</div>
	</header>


	<div class="fac-hero">
		<div class="fac-container">
			<div class="fac-col-left">
				<h1>Your Facebook Ads Are Ready!</h1>
				<p>To start your ads, simply review the ad images below and click the "Approved" button.</p>
				<p>If you see something that needs to be changed, enter your comments in the text fields and we'll make the changes before making the ads live. Please note, image changes will require further approval before going live.</p>
				<p><strong>Here's an example showing the components of a Facebook ad:</strong></p>
			</div>
			<div class="fac-col-right">
				<img src="<?= $fac_logo_dir . $fac->ex_image ?>" alt="Example Proof" />		
			</div>
		</div>
	</div>

	<?php if($fac->message) { ?>
	<div class="fac-note">
		<div class="fac-container">
			<div class="fac-col-full">
				<h3>A message from <?= $fac->strat_first ?>, your Creative Strategist:</h3>
				<?= $fac->message ?>
			</div>
		</div>
	</div>
	<?php } ?>




	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php $i = 1; ?>

	<div id="fac-form-wrap">
		<?= do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>

		<?php while ( !empty(get_field('fac_'. $i)) ) {	?>

		<?php $fac->get_ads(); ?>
		<?php $fac->test_type(); ?>

		<div style="opacity:0;" class="fac-form fac-form-<?= $i ?>">
			<div class="fac-container">
				<div class="fac-col-left">		
					<h3 class="proof-title">Proof #<?= $i ?></h3>
					<div class="fb-container">    

						<?php if($fac->likes) { // Show for Likes only ?>
					    <h4 class="fb-post-type">Suggested Page</h4>	
					    <?php } // End Likes only ?>

					    <header class="fb-business-info">
					    		<img src="<?= $fac->profile_img ?>" alt="Avatar" class="fb-avatar" />
					    	<div class="fb-header fb-header-top tip" data-tip="Your business name and profile image are pulled in from your Facebook account.">
					        	<h2 class="fb-business"><?= $fac->business ?></h2>
					        	<p class="fb-subtitle fb-business-sub">Sponsored</p>
					      	</div>

					      	<?php if($fac->clicks) { // Show for Clicks only ?>
					      	<div class="footer-right footer-right-clicks hide-likes">   
						    	<button onclick="return false;" class="fb-like-btn fb-like-btn-clicks tip" data-tip="This is how people who see your ad can Like your page."><img src="https://static.xx.fbcdn.net/rsrc.php/v2/y1/r/5DstMezGrDI.png" height="12" width="12" />Like Page</button>
							</div>
							<?php } // End Clicks only ?>

					    </header>	
					    <p class="fb-title tip" data-tip="This is your main headline. Facebook limits this section to 90 characters."><?= $fac->proof_title ?></p>				    
					    <div class="fb-footer-container">				      	
					      	<span class="tip" data-tip="Here's your custom graphic!">
					      		<img class="fb-design" src="<?= $fac->proof_image ?>" alt="<?= $fac->proof_alt ?>" />
					      	</span>
					    	
					  
					    		<?php if($fac->likes) { // Show for Likes only ?>
					    		<div class="fb-footer">
							        <div class="footer-left fb-header-bottom tip" data-tip="This info is all pulled in from your Facebook account. The category and number of likes are for illustration purposes only.">
							          	<h4 class="fb-header"><?= $fac->business ?></h4>
							          	<p class="fb-subtitle"><?= $fac->category ?></p>
							          	<p class="fb-subtitle"><?= $fac->rand_likes ?> people like this.</p>
							        </div>
							        <?php } // End Likes only?>

							        <?php if($fac->clicks) { // Show for Clicks only ?>
							        <div class="fb-full-content">
							        	<h4 class="fb-header-clicks tip" data-tip="This is your subtitle section. Keep it short in order to keep all the text visible on different devices."><?= $fac->subtitle ?></h4>
							          	<p class="fb-subtitle tip" data-tip="This is the link description area. We use this to describe what the user will get if they click your link. There's a 200 character limit for this section."><?= $fac->description ?></p>
							        </div>       
							        <div class="fb-footer">
								        <div class="footer-left fb-header-bottom">
								          	<p class="fb-site-url-clicks tip" data-tip="Your website address will display here."><?= $fac->business_url ?></p>
								        </div>

								        <div class="footer-right">   
								          	<button onclick="return false;" class="fb-like-btn tip" data-tip="When users click this button they'll be taken to your website.">Learn More</button>
								        </div>
							    	</div>
							        <?php } // End Clicks only ?>

							        <?php if($fac->likes) { // Show for Likes only ?>
							        <div class="footer-right">   
						          		<button onclick="return false;" class="fb-like-btn tip" data-tip="This is how people who see your ad can Like your page.">
						          			<img src="https://static.xx.fbcdn.net/rsrc.php/v2/y1/r/5DstMezGrDI.png" height="12" width="12" />
						          			Like Page
						          		</button>
							        </div>
							    </div>
						        <?php } // End Likes only ?>
					    						
						</div>
					</div>
				</div>					
				<div class="fac-col-right">
					<div class="fac-form-fields fac-form-fields-<?= $i ?>">
						<span></span>
					</div>
				</div>
			</div>
		</div>
		
		<?php 

		$i++; // Increment through the available proofs
		
		} ?>


		<!-- Ending the Loop -->
		<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no data available.' ); ?></p>
		<?php endif; ?>  
	</div>



	<div class="fac-submit fac-form">
		<div class="fac-container">
			<div class="fac-col-full">
				<h3><strong>Be sure to push the button below to send us your feedback!</strong> You'll receive a confirmation email within a few minutes.</h3>
			</div>
		</div>
	</div>

<!-- FOOTER -->

<?php } ?>

<?php get_footer(); ?>