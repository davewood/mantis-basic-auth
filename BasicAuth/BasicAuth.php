<?php

class BasicAuthPlugin extends MantisPlugin {
    function register() {
        $this->name        = 'BasicAuth Plugin';
        $this->description = 'Looks for REMOTE_USER in SERVER environment and autologins user.';
        $this->version     = '0.01';
        $this->requires    = array( 'MantisCore' => '1.2.0' );
        $this->author      = 'David Schmidt';
        $this->contact     = 'david.schmidt -at- univie.ac.at';
        $this->url         = '';
    }

    function init() {
        plugin_event_hook( 'EVENT_CORE_READY', 'autologin' );
    }

    function autologin() {
        if (auth_is_user_authenticated()) {
            return;
        }

        $t_login_method = config_get( 'login_method' );
        if ( $t_login_method != BASIC_AUTH ) {
            trigger_error( "Invalid login method. ($t_login_method)", ERROR );
        }

        $t_user_id = user_get_id_by_name($_SERVER['REMOTE_USER']);
        if ( !$t_user_id ) {
            trigger_error( 'Invalid user.', ERROR );
        }

        user_increment_login_count( $t_user_id );
        user_reset_failed_login_count_to_zero( $t_user_id );
        user_reset_lost_password_in_progress_count_to_zero( $t_user_id );
        auth_set_cookies($t_user_id, true);
        auth_set_tokens($t_user_id);
    }
}
