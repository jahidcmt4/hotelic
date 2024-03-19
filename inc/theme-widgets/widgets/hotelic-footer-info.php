<?php
class tft_footer_info extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'tft_footer_info',  // Base ID
			'Hotelic Footer info'   // Name
		);
		add_action( 'widgets_init', function() {
			register_widget( 'tft_footer_info' );
		});
	}

	

	public function widget( $args, $instance ) {
	?>
    <div class="tft-footer-section widget_tft_footer_info">
      <div class="hotelic-footer-contact">
        <ul>
          <?php if( !empty( $instance['contact-number'])) : ?>
          <li> <i class="fas fa-phone-alt"></i>
            <a href="tel:<?php echo !empty( $instance['contact-number']) ? esc_html( $instance['contact-number'] ) : '' ; ?>"> <?php echo !empty($instance['contact-number']) ? esc_html( $instance['contact-number'] ) : '' ; ?> </a>
          </li>
          <?php endif; ?>
    
          <?php if( !empty($instance['email']) ): ?>
          <li> <i class="fas fa-envelope"></i>
            <a href="mailto:<?php echo !empty($instance['email']) ? esc_html( $instance['email'] ) : '' ; ?>"> <?php echo !empty($instance['email']) ? esc_html( $instance['email'] ) : '' ; ?> </a>
          </li>
          <?php endif; ?>
    
          <?php if( !empty($instance['google-map']) ): ?>
          <li> <i class="fas fa-map-marker-alt"></i>
          <a href="#">
          <?php echo !empty($instance['google-map']) ? esc_html( $instance['google-map'] ) : ''  ?>
          </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    
      <div class="hotelic-footer-social-link">
        <ul class="tft-flex">
          <?php if ( !empty($instance['facebook_url']) ) : ?>
          <li> <a class="border-rds-4" href="<?php echo !empty($instance['facebook_url']) ? esc_url( $instance['facebook_url'] ) : ''; ?>"><i
                class="fab fa-facebook-f"></i></a> </li>
          <?php endif; ?>
          <?php if ( !empty($instance['instagram_url']) ) : ?>
          <li> <a class="border-rds-4" href="<?php echo !empty($instance['instagram_url']) ? esc_url( $instance['instagram_url'] ) : ''; ?>"><i
                class="fab fa-instagram"></i></a> </li>
          <?php endif; ?>
          <?php if ( !empty($instance['twitter_url']) ) : ?>
          <li> <a class="border-rds-4" href="<?php echo !empty($instance['twitter_url']) ? esc_url( $instance['twitter_url'] ) : ''; ?>"><i
                class="fab fa-twitter"></i></a> </li>
          <?php endif; ?>
          <?php if ( !empty($instance['linkedin_url']) ) : ?>
          <li> <a class="border-rds-4" href="<?php echo !empty($instance['linkedin_url']) ? esc_url( $instance['linkedin_url'] ) : ''; ?>"><i
                class="fab fa-linkedin-in"></i></a> </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <?php
	}

	public function form( $instance ) {
		$contact_number  = ! empty( $instance['contact-number'] ) ? $instance['contact-number'] : '';
		$email           = ! empty( $instance['email'] ) ? $instance['email'] : '';
		$google_map      = ! empty( $instance['google-map'] ) ? $instance['google-map'] : '';
		$facebook_url    = ! empty( $instance['facebook_url'] ) ? $instance['facebook_url'] : '';
		$instagram_url   = ! empty( $instance['instagram_url'] ) ? $instance['instagram_url'] : '';
		$twitter_url     = ! empty( $instance['twitter_url'] ) ? $instance['twitter_url'] : '';
		$linkedin_url    = ! empty( $instance['linkedin_url'] ) ? $instance['linkedin_url'] : '';
		?>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'contact-number' ) ); ?>"><?php echo esc_html__( 'Contact number:', 'hotelic' ); ?></label>
      <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'contact-number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contact-number' ) ); ?>" value="<?php echo esc_attr( $contact_number ); ?>">
    </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php echo esc_html__( 'Email:', 'hotelic' ); ?></label>
      <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" value="<?php echo esc_attr( $email ); ?>">
    </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'map' ) ); ?>"><?php echo esc_html__( 'Google map:', 'hotelic' ); ?></label>
      <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'google-map' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google-map' ) ); ?>" value="<?php echo esc_attr( $google_map ); ?>">
    </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>"><?php echo esc_html__( 'facebook_url:', 'hotelic' ); ?></label>
      <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_url' ) ); ?>" value="<?php echo esc_attr( $facebook_url ); ?>">
    </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>"><?php echo esc_html__( 'instagram_url:', 'hotelic' ); ?></label>
      <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_url' ) ); ?>" value="<?php echo esc_attr( $instagram_url ); ?>">
    </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>"><?php echo esc_html__( 'twitter_url:', 'hotelic' ); ?></label>
      <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_url' ) ); ?>" value="<?php echo esc_attr( $twitter_url ); ?>">
    </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin_url' ) ); ?>"><?php echo esc_html__( 'linkedin_url:', 'hotelic' ); ?></label>
      <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'linkedin_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin_url' ) ); ?>" value="<?php echo esc_attr( $linkedin_url ); ?>">
    </p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance           = array();		
		$instance['contact-number'] = ( ! empty( $new_instance['contact-number'] ) ) ? esc_html($new_instance['contact-number']) : '';
		$instance['email']          = ( ! empty( $new_instance['email'] ) ) ? esc_html($new_instance['email']) : '';
		$instance['google-map']     = ( ! empty( $new_instance['google-map'] ) ) ? esc_html($new_instance['google-map']) : '';
		$instance['facebook_url']   = ( ! empty( $new_instance['facebook_url'] ) ) ? esc_url($new_instance['facebook_url']) : '';
		$instance['instagram_url']  = ( ! empty( $new_instance['instagram_url'] ) ) ? esc_url($new_instance['instagram_url']) : '';
		$instance['twitter_url']    = ( ! empty( $new_instance['twitter_url'] ) ) ? esc_url($new_instance['twitter_url']) : '';
		$instance['linkedin_url']   = ( ! empty( $new_instance['linkedin_url'] ) ) ? esc_url($new_instance['linkedin_url']) : '';		
    return $instance;
	}
}
$hotelic_footer_widget = new tft_footer_info(); 

