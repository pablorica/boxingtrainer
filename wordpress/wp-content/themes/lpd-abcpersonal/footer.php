<?php 
$twitter_url = get_field('twitter_url', 'option');
$facebook_url = get_field('facebook_url', 'option');
$instagram_url = get_field('instagram_url', 'option');
$tiktok_url = get_field('tiktok_url', 'option');
$youtube_link = get_field('youtube_link', 'option');							
?>
	<footer id="footer-new" class="footer-new">
		<div class="top-footer-wrap">
			<div class="container">
				<div class="row g-0">
					<?php 
					if($facebook_url){
					?>
						<div class="col-12 col-sm">
							<div class="link-social-elm">
								<a target="_blank" title="Facebook" href="<?php  echo $facebook_url ?>">
									FACEBOOK
								</a>
							</div><?php // .link-social-elm ?>
						</div><?php // .col ?>
					<?php 
					} // end if ?>
					<?php 
					if($instagram_url){
					?>
						<div class="col-12 col-sm">
							<div class="link-social-elm">
								<a target="_blank" title="Instagram" href="<?php echo $instagram_url?>">
									instagram
								</a>
							</div><?php // .link-social-elm ?>
						</div><?php // .col ?>
					<?php 
					} // end if ?>
					<?php 
					if($twitter_url){
					?>
						<div class="col-12 col-sm">
							<div class="link-social-elm">
								<a target="_blank" title="Twitter" href="<?php echo $twitter_url ?>">
									X (Twitter)
								</a>
							</div><?php // .link-social-elm ?>
						</div><?php // .col ?>
					<?php 
					} // end if ?>
					<?php 
					if($tiktok_url){
					?>
						<div class="col-12 col-sm">
							<div class="link-social-elm">
								<a target="_blank" title="Tiktok" href="<?php echo $tiktok_url ?>">
									tiktok
								</a>
							</div><?php // .link-social-elm ?>
						</div><?php // .col ?>
					<?php 
					} // end if ?>
					<?php 
					if($youtube_link){
					?>
						<div class="col-12 col-sm">
							<div class="link-social-elm">
								<a target="_blank" title="Youtube" href="<?php echo $youtube_link ?>">
									youtube
								</a>
							</div><?php // .link-social-elm ?>
						</div><?php // .col ?>
					<?php 
					} // end if ?>
				</div><?php // .row ?>
			</div><?php // .container ?>
		</div><?php // .top-footer-wrap ?>
		<?php 
		$footer_column_title_1 = get_field('footer_column_title_1', 'option');
		$footer_column_title_2 = get_field('footer_column_title_2', 'option');
		$footer_column_title_3 = get_field('footer_column_title_3', 'option');
		$footer_column_title_4 = get_field('footer_column_title_4', 'option');

		$footer_column_text_1 = get_field('footer_column_text_1', 'option');
		$footer_column_text_3 = get_field('footer_column_text_3', 'option');
		$footer_column_text_4 = get_field('footer_column_text_4', 'option');
		$footer_hello_link = get_field('footer_hello_link', 'option');
		?>
		<div class="bottom-footer-wrap">
			<div class="container">
				<div class="row g-0">
					<div class="col-12 col-40">
						<div class="footer-column-wrap">
							<div class="in-footer-wrap">
								<?php 
								if($footer_column_title_1) {
									?>
									<h3><?php echo $footer_column_title_1 ?></h3>
									<?php 
								}
								if($footer_column_text_1) {
									?>
									<div class="content-wrap">
										<?php echo wpautop($footer_column_text_1) ?>
									</div><?php // .content-wrap ?>
									<?php 
								}
								?>	
							</div><?php // .in-footer-wrap ?>
						</div><?php // .footer-column-wrap ?>
					</div><?php // .col ?>
					<div class="col-12 col-40">
						<div class="footer-column-wrap">
							<div class="in-footer-wrap">
								<?php 
								if($footer_column_title_2) {
									?>
									<h3><?php echo $footer_column_title_2 ?></h3>
									<?php 
								}
								if($footer_column_text_1) {
									?>
									<div class="menu-wrap">
										<?php 
										wp_nav_menu( array(
											'theme_location' => 'footer-menu'			
										));
										?>
									</div><?php // .menu-wrap ?>
									<?php 
								}
								?>	
							</div><?php // .in-footer-wrap ?>
						</div><?php // .footer-column-wrap ?>
					</div><?php // .col ?>
					<div class="col-12 col-20">
						<div class="footer-column-wrap">
							<div class="in-footer-wrap">
								<div class="upper-wrap">
									<?php 
									if($footer_column_title_3) {
										?>
										<h3><?php echo $footer_column_title_3 ?></h3>
										<?php 
									}
									if($footer_column_text_3) {
										?>
										<div class="content-wrap">
											<?php echo wpautop($footer_column_text_3) ?>
										</div><?php // .content-wrap ?>
										<?php 
									}
									?>	
								</div><?php // .upper-wrap ?>
								<div class="below-wrap">
									<?php 
									if($footer_column_title_4) {
										?>
										<h3><?php echo $footer_column_title_4 ?></h3>
										<?php 
									}
									if($footer_column_text_4) {
										?>
										<div class="content-wrap">
											<?php echo wpautop($footer_column_text_4) ?>
										</div><?php // .content-wrap ?>
										<?php 
									}
									?>	
								</div><?php // .below-wrap ?>
							</div><?php // .in-footer-wrap ?>
							<div class="hello-wrap">
								<?php 
								if($footer_hello_link) { 
									?>
									<a href="<?php echo $footer_hello_link ?>" title="Hello" >
										<img loading="lazy" width="500px" height="179px" src="<?php echo get_template_directory_uri() ?>/assets/images/hello-logo.png" alt="Hello Logo" />
									</a>
									<?php 
								}
								?>
							</div><?php // .hello-wrap ?>
						</div><?php // .footer-column-wrap ?>
					</div><?php // .col ?>
				</div><?php // .row ?>
			</div><?php // .container ?>
		</div><?php // .bottom-footer-wrap ?>

	</footer>
		
</div><!-- wsmenucontainer END-->

<?php wp_footer(); ?>
</body>

</html>
