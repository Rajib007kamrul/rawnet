<?php

add_action( 'admin_print_styles-post-new.php', 'script_and_style' );
add_action( 'admin_print_styles-post.php', 'script_and_style' );

function script_and_style() {
	wp_enqueue_style( 'rawnet_meta_css', get_template_directory_uri() . '/assets/css/custom-meta.css' );
	wp_enqueue_script( 'rawnet_meta_js', get_template_directory_uri() . '/assets/js/custom-meta.js', ['jquery'], false, true );
}

add_action( 'admin_init', 'add_meta_boxes' );

function add_meta_boxes() {
	add_meta_box( 'post_metabox', __( 'Post Information', 'visgo' ), 'rawnet_post_meta', [ 'post'] );
	add_meta_box( 'team_metabox', __( 'Team Information', 'rawnet' ), 'rawnet_team_meta', [ 'team' ] );
	add_meta_box( 'capabilities_metabox', __( 'Service Information', 'rawnet' ), 'rawnet_service_meta', [ 'service' ] );
	add_meta_box( 'partner_metabox', __( 'Partner Information', 'rawnet' ), 'rawnet_partner_meta', [ 'partner' ] );
	add_meta_box( 'portfolio_metabox', __( 'Portfolio Information', 'rawnet' ), 'rawnet_portfolio_meta', [ 'portfolio' ] );
}

function rawnet_portfolio_meta() {
	global $post;
	$heading = get_post_meta($post->ID, 'portfolio_heading', true);
?>
	<table class="form-table" id="portfolio_meta">
		<tbody>
			<tr>
				<td> <?php esc_html_e( 'Sub Content', 'rawnet' ); ?> </td>
				<td>
						<textarea name="portfolio_heading" rows="5" cols="30"> </textarea>
				 </td>
			</tr>
		</tbody>
	</table>

<?php
}

function rawnet_partner_meta() {
	global $post;

	$partner_extra_image_id = get_post_meta( $post->ID, 'partner_extra_image_id', true );
	$image  = "";

 	if( $partner_extra_image_id !== "" ) {
		$image_link = wp_get_attachment_url( $partner_extra_image_id, "full" );
		$image      = '<img src="'.$image_link.'" alt="" style="max-width:100%;"/>';
 	}
?>

<table class="form-table">
	<tbody>
		<tr>
			<td>
				<div class="partner-thumbinail-container">
					<?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
				<input type="hidden" class="partner_extra_image_id" name="partner_extra_image_id" value="<?php echo $partner_extra_image_id; ?>">
				<a href="javascript:void(0);" class="upload-work-thumbinail <?php if ( $partner_extra_image_id !== "" ){ echo 'hidden'; } ?> "> Upload Thumbnail</a>
				<a href="javascript:void(0);" class="delete-work-thumbinail <?php if ( $partner_extra_image_id === "" ) { echo 'hidden'; } ?> "> Remove Thumbnail </a>
			</td>
		</tr>
	</tbody>
</table>
<?php
}

function rawnet_service_meta() {
	global $post;
	global $wpdb;

	$capability_repeat_fields = get_post_meta( $post->ID, 'capability_repeat_fields', true );
	$brand_partner            = get_post_meta( $post->ID, 'brand_partner', true );
	$heading                  = get_post_meta( $post->ID, 'service_heading', true );
	$subheading               = get_post_meta($post->ID, 'service_subheading', true);
	$note                     = get_post_meta($post->ID, 'service_note', true);
	$service_btn_txt          = get_post_meta( $post->ID, 'service_btn_txt', true );
	$partners                 = $wpdb->get_results( " select ID,post_title  from " . $wpdb->prefix . "posts where post_type = 'partner' " );
?>
	<table id="capability-fieldset-one" class="form-table" width="100%">
		<tbody>
				<?php
					if ( !empty( $capability_repeat_fields ) ) {
						foreach ( $capability_repeat_fields as $capability_field ) {
				?>
					<tr class="capability_repeat">
						<td>
							<label>  <?php _e('Service List', ''); ?> </label>
							<input  type="text" name="capability_value_repeat[]" class="value_repeat"
									value="<?php if( isset( $capability_field ) && $capability_field != '' )
									echo esc_attr( $capability_field ); ?>"/>
						</td>
						<td class="remove-row-col"> <a class="button remove-row" href="#"> <?php esc_html_e('Remove', 'rawnet'); ?> </a> </td>
					</tr>
				<?php }
					} else {
				?>

				<tr class="capability_repeat">
					<td>
						<label> <?php esc_html_e('Service List','rawnet'); ?> </label>
						<input  type="text" name="capability_value_repeat[]" class="value_repeat" value=""/>
					</td>
					<td class="remove-row-col"> <a class="button remove-row" href="#"> <?php esc_html_e('Remove', 'rawnet'); ?> </a> </td>
				</tr>

			<?php } ?>
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<td>  <a id="add-row" class="button" href="#"> <?php esc_html_e('Add another', 'rawnet'); ?>  </a>  </td>
			</tr>
		</tfoot>
	</table>

	<table class="form-table" id="service_meta">
		<tbody>

			<tr>
				<td> <?php esc_html_e( 'Heading', 'rawnet' ); ?> </td>
				<td> <input type="text" name="service_heading" value="<?php if( isset( $heading ) && $heading != '' ) { echo esc_attr( $heading ); } ?>" ></td>
			</tr>
			<tr>
				<td> <?php esc_html_e( 'Sub Heading', 'rawnet' ); ?> </td>
				<td> <?php wp_editor ( $subheading, 'service_subheading', array ( "media_buttons" => false )  ); ?> </td>
			</tr>

			<tr>
				<td> <?php esc_html_e( 'Note', 'rawnet' ); ?> </td>
				<td> <input type="text" name="service_note" value="<?php if( isset( $note ) && $note != '' ) { echo esc_attr( $note ); } ?>" ></td>
			</tr>

			<tr>
				<td> <?php esc_html_e( 'Button Text', 'rawnet' ); ?> </td>
				<td> <input type="text" name="service_btn_txt" value="<?php if( isset( $note ) && $note != '' ) { echo esc_attr( $service_btn_txt ); } ?>" ></td>
			</tr>

			<tr>
				<td> <?php esc_html_e( 'Brand Partner', 'rawnet' ); ?> </td>
				<td>
					<select name="brand_partner">
						<option value=""> </option>
						<?php foreach ($partners as $partner) { ?>
							<option value=" <?php echo $partner->ID; ?>" <?php if(  $partner->ID == $brand_partner ) { echo 'selected'; } ?>> <?php echo $partner->post_title; ?> </option>
						<?php } ?>
					</section>
				</td>
			</tr>
		</tbody>
	</table>

<?php
}


function rawnet_post_meta() {
	global $post;
	$is_post_featured = get_post_meta( $post->ID, 'is_post_featured', true );
	if ( empty( $is_post_featured ) ) {
		$is_post_featured = 0;
	}
	?>
	<table class="form-table">
		<tbody>
			<tr>
				<td>
					<?php esc_html_e( 'Is Feature Post', 'rawnet' ); ?>
					<label>
						<input type="radio" name="is_post_featured" value="1" <?php checked( $is_post_featured, '1' ); ?>>
						<?php esc_attr_e( 'YES', 'rawnet' ); ?>
					</label>
					<label>
						<input type="radio" name="is_post_featured" value="0" <?php checked( $is_post_featured, '0' ); ?>>
						<?php esc_attr_e( 'NO', 'rawnet' ); ?>
					</label>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
}

function rawnet_team_meta() {
	global $post;
	$team_name        = get_post_meta( $post->ID, 'team_name', true );
	$team_designation = get_post_meta( $post->ID, 'team_designation', true );
?>
	<table class="form-table">
		<tr>
			<td> <?php esc_html_e ( 'Designation', 'rawnet' ); ?>  </td>
			<td> <input type="text" name="team_designation" value="<?php echo esc_attr( $team_designation ); ?>" />  </td>
		</tr>
	</table>
<?php }

function save_team_field(  $post_id, $post ) {
	$post_data =  wp_unslash( $_POST );

	if( 'team' != $post->post_type )
		return ;
	if( isset( $post_data['team_designation'] ) ) {
		$team_designation = sanitize_text_field( $post_data['team_designation'] );
		update_post_meta( $post_id, 'team_designation', $team_designation );
	}
}

add_action( 'save_post', 'save_team_field', 10, 2 );

function save_post_field( $post_id, $post ) {
	$post_data =  wp_unslash( $_POST );

	if( 'post' == $post->post_type ) {
		if( isset( $post_data['is_post_featured'] ) ) {
    		update_post_meta( $post_id, 'is_post_featured', $post_data['is_post_featured'] );
    	}
    }
}

add_action( 'save_post', 'save_post_field', 10, 2 );


add_action( 'save_post', 'save_capability_field', 10, 2 );

function save_capability_field( $post_id, $post ) {
	$post_data =  wp_unslash( $_POST );

	if( 'service' != $post->post_type )
		return ;

    if ( !empty( $post_data['capability_value_repeat'] ) ) {
		$capability_value = $post_data['capability_value_repeat'];
		update_post_meta( $post_id, 'capability_repeat_fields', $capability_value );
	}

	if ( !empty( $post_data['brand_partner'] ) ) {
		$brand_partner = $post_data['brand_partner'];
		update_post_meta( $post_id, 'brand_partner', $brand_partner );
	}

	if ( !empty( $post_data['service_heading'] ) ) {
        $service_heading = $post_data['service_heading'];
        update_post_meta( $post_id, 'service_heading', $service_heading );
    }

	if ( !empty( $post_data['service_subheading'] ) ) {
        $service_subheading = $post_data['service_subheading'];
        update_post_meta( $post_id, 'service_subheading', $service_subheading );
    }

    if ( !empty( $post_data['service_btn_txt'] ) ) {
        $service_btn_txt = $post_data['service_btn_txt'];
        update_post_meta( $post_id, 'service_btn_txt', $service_btn_txt );
    }

    if ( !empty( $post_data['service_note'] ) ) {
    	$service_note = $post_data['service_note'];
        update_post_meta( $post_id, 'service_note', $service_note );
    }
}

add_action( 'save_post', 'save_portfolio_field', 10, 2 );

function save_portfolio_field( $post_id, $post ) {
	$post_data =  wp_unslash( $_POST );
	if( 'portfolio' != $post->post_type )
		return ;

	if ( !empty( $post_data['portfolio_subheading'] ) ) {
        $portfolio_subheading = $post_data['portfolio_subheading'];
        update_post_meta( $post_id, 'portfolio_subheading', $portfolio_subheading );
    }
}

add_action( 'save_post', 'save_partner_field', 10, 2 );

function save_partner_field( $post_id, $post  ) {
	$post_data =  wp_unslash( $_POST );
	if( 'partner' != $post->post_type )
		return ;

	$partner_extra_image_id = "";

	if ( isset( $post_data[ "partner_extra_image_id"] ) ) {
        $partner_extra_image_id = $post_data["partner_extra_image_id"];
    }

    update_post_meta( $post_id, "partner_extra_image_id", $partner_extra_image_id );
}
