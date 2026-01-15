<?php
//about theme info
add_action( 'admin_menu', 'skt_night_club_abouttheme' );
function skt_night_club_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-night-club'), esc_html__('About Theme', 'skt-night-club'), 'edit_theme_options', 'skt_night_club_guide', 'skt_night_club_mostrar_guide');   
} 
//guidline for about theme
function skt_night_club_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-night-club'); ?>
		   </div>
          <p><?php esc_html_e('SKT Nightclub is a bold and modern WordPress theme. It is built for any club or nightspot that wants to stand out. It suits a dance club, disco, lounge, bar, or party spot that needs a stylish online home. The design is energetic and helps you show events, DJs, music nights, and bookings in a clean way. You can highlight your dance floor, party lounge, or entertainment club vibe with strong visuals and easy layouts. The theme loads fast and works well on all devices, so visitors can check your late-night bar or nightlife joint anytime. SKT Nightclub also supports simple customization, letting you change colors, images, and sections without effort. It is a great choice for promoting your venue and bringing more people in.','skt-night-club'); ?></p>
          <a href="<?php echo esc_url(SKT_NIGHT_CLUB_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="<?php esc_attr_e('Free Vs Pro', 'skt-night-club'); ?>" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_NIGHT_CLUB_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-night-club'); ?></a> | 
				<a href="<?php echo esc_url(SKT_NIGHT_CLUB_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-night-club'); ?></a> | 
				<a href="<?php echo esc_url(SKT_NIGHT_CLUB_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-night-club'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_NIGHT_CLUB_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="<?php esc_attr_e('SKT Themes', 'skt-night-club'); ?>" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>