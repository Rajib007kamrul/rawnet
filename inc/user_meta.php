<?php

add_action( 'show_user_profile', 'user_profile_fields' );
add_action( 'edit_user_profile', 'user_profile_fields' );


function user_profile_fields( $user ) { ?>

 <table class="form-table">
    <tr>
        <th><label for="designation"><?php esc_html_e( 'Designation', 'rawnet' ); ?></label></th>
        <td>
            <input type="text" name="designation" id="designation" value="<?php echo esc_attr( get_the_author_meta( 'designation', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php esc_html_e('Please enter your designation.', 'rawnet'); ?></span>
        </td>
    </tr>
</table>
<?php }

add_action( 'personal_options_update', 'save_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_user_profile_fields' );

function save_user_profile_fields( $user_id ) {
    $post_data = wp_unslash( $_POST );
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'designation', $post_data['designation'] );
}