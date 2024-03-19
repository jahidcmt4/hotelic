<?php 

//Register Meta box
function hotelic_page_meta_boxes() {
	add_meta_box( 'hotelic-page-meta', 'Page Settings', 'hotelic_page_meta_boxes_fields', 'page', 'normal' );
}
add_action( 'add_meta_boxes', 'hotelic_page_meta_boxes' );

//Meta callback function
function hotelic_page_meta_boxes_fields( $post ) {
    ?>
        <div class="hotelic-page-metabox-fields-wrapper">
            <div class="hotelic-page-metabox-item">
                <div class="hotelic-page-metabox-title">
                    <label for="hotelic-pmb-background-img"><?php echo esc_html__('Background Image', 'hotelic')?></label>
                </div>
                <div class="hotelic-page-metabox-field">
                    <?php 
                    $hotelic_page_banner = get_post_meta( $post->ID, 'hotelic-pmb-background-img', true );
                    ?>
                    <div class="hotelic-media-upload-wrapper">
                        <input type="text" class="hotelic-media-url-preview" value="<?php echo !empty($hotelic_page_banner) ? esc_url($hotelic_page_banner) : ''; ?>" disabled>
                        <input type="hidden" class="hotelic-media-url" value="<?php echo !empty($hotelic_page_banner) ? esc_url($hotelic_page_banner) : ''; ?>" name="hotelic-pmb-background-img">
                        <a href="#" class="hotelic-media-btn upload-btn"><?php echo esc_html__('Upload', 'hotelic')?></a>
                        <a href="#" class="hotelic-media-btn remove-btn"><?php echo esc_html__('Remove', 'hotelic')?></a>
                    </div>
                </div>
            </div>
            <div class="hotelic-page-metabox-item">
                <div class="hotelic-page-metabox-title">
                    <label for="hotelic-pmb-subtitle"><?php echo esc_html__('Subtitle ( When banner enabled )', 'hotelic')?></label>
                </div>
                <div class="hotelic-page-metabox-field">
                    <textarea name="hotelic-pmb-subtitle" id="hotelic-pmb-subtitle"><?php echo !empty( get_post_meta( $post->ID, 'hotelic-pmb-subtitle', true ) ) ? esc_html( get_post_meta( $post->ID, 'hotelic-pmb-subtitle', true ) ) : ''; ?></textarea>
                </div>
            </div>
            
            <div class="hotelic-page-metabox-item">
                <?php
                    if( !empty( get_post_meta( $post->ID, 'hotelic-pmb-disable-sidebar', true ) ) && get_post_meta( $post->ID, 'hotelic-pmb-disable-sidebar', true ) == 1){
                        $hotelic_pmb_sidebar = 'checked';
                    }else{
                        $hotelic_pmb_sidebar = '';
                    }
                ?>
                <div class="hotelic-page-metabox-title">
                    <label for="hotelic-pmb-disable-sidebar"><?php echo esc_html__('Disable Sidebar', 'hotelic')?></label>
                </div>
                <div class="hotelic-page-metabox-field">
                    <input type="checkbox" name="hotelic-pmb-disable-sidebar" id="hotelic-pmb-disable-sidebar" <?php echo !empty( $hotelic_pmb_sidebar ) ? esc_attr( $hotelic_pmb_sidebar ) : ''; ?>>
                </div>
            </div>

            <div class="hotelic-page-metabox-item">
                <?php
                    if( !empty( get_post_meta( $post->ID, 'hotelic-pmb-banner', true ) ) && get_post_meta( $post->ID, 'hotelic-pmb-banner', true ) == 1){
                        $hotelic_pmb_banner = 'checked';
                    }else{
                        $hotelic_pmb_banner = '';
                    }
                ?>
                <div class="hotelic-page-metabox-title">
                    <label for="hotelic-pmb-banner"><?php echo esc_html__('Disable Banner', 'hotelic')?></label>
                </div>
                <div class="hotelic-page-metabox-field">
                    <input type="checkbox" name="hotelic-pmb-banner" id="hotelic-pmb-banner" <?php echo !empty( $hotelic_pmb_banner ) ? esc_attr( $hotelic_pmb_banner ) : ''; ?>>
                </div>
            </div>
            
            <div class="hotelic-page-metabox-item">
                <?php
                    if( !empty( get_post_meta( $post->ID, 'hotelic-pmb-transfar-header', true ) ) && get_post_meta( $post->ID, 'hotelic-pmb-transfar-header', true ) == 1){
                        $hotelic_pmb_transfar_header = 'checked';
                    }else{
                        $hotelic_pmb_transfar_header = '';
                    }
                ?>
                <div class="hotelic-page-metabox-title">
                    <label for="hotelic-pmb-transfar-header"><?php echo esc_html__('Disable Transparent Header', 'hotelic')?></label>
                </div>
                <div class="hotelic-page-metabox-field">
                    <input type="checkbox" name="hotelic-pmb-transfar-header" id="hotelic-pmb-transfar-header" <?php echo !empty( $hotelic_pmb_transfar_header ) ? esc_attr( $hotelic_pmb_transfar_header ) : ''; ?>>
                    <?php wp_nonce_field( 'hotelic_metabox_nonce_action', 'hotelic_metabox_nonce' ); ?>
                </div>
            </div>
        </div>
    <?php
}

//save meta value with save post hook


function hotelic_page_meta_boxes_data_save( $post_id ) {
    // Check nonce security
    if ( ! empty( $_POST['hotelic_metabox_nonce'] ) && ! wp_verify_nonce( $_POST['hotelic_metabox_nonce'], 'hotelic_metabox_nonce_action' ) ) {
        return;
    }

	if ( isset( $_POST['hotelic-pmb-background-img'] ) ) {
		update_post_meta( $post_id, 'hotelic-pmb-background-img', esc_url_raw(wp_unslash( $_POST['hotelic-pmb-background-img'] )) );
	}
	if ( isset( $_POST['hotelic-pmb-subtitle'] ) ) {
		update_post_meta( $post_id, 'hotelic-pmb-subtitle', sanitize_text_field(wp_unslash( $_POST['hotelic-pmb-subtitle'] )) );
	}

	if ( isset( $_POST['hotelic-pmb-disable-sidebar'] ) ) {
		update_post_meta( $post_id, 'hotelic-pmb-disable-sidebar', 1 );
	}else{
		update_post_meta( $post_id, 'hotelic-pmb-disable-sidebar', 0 );
    }

	if ( isset( $_POST['hotelic-pmb-banner'] ) ) {
		update_post_meta( $post_id, 'hotelic-pmb-banner', 1 );
	}else{
		update_post_meta( $post_id, 'hotelic-pmb-banner', 0 );
    }

	if ( isset( $_POST['hotelic-pmb-transfar-header'] ) ) {
		update_post_meta( $post_id, 'hotelic-pmb-transfar-header', 1 );
	}else{
        update_post_meta( $post_id, 'hotelic-pmb-transfar-header', 0 );
    }

}
add_action( 'save_post', 'hotelic_page_meta_boxes_data_save' ); 