# mantis-basic-auth
BASIC AUTH for Mantis.

* add a .htaccess file that takes care of authentication.
* after successfull authentication $_SERVER['REMOTE_USER'] should contain the username of the authenticated user.
* this plugin checks if the username exists in the mantis user DB and logs the user in.
* since the remote users often do not exist in the local mantis db you can configure this plugin to auto create remote users. (see example config)
* The username provided by the SSO service can be modified using $g_sso_user_regex. (e.g.: for stripping domain)';

# Installation
* copy directory BasicAuth into the plugins directory.
* login as Administrator and go to Manage > Plugins, activate BasicAuth plugin.

# Example config_inc.php
```php
$g_login_method                = BASIC_AUTH;
$g_sso_auto_create_remote_user = ON; // auto create remote user if it doesn't exist in mantis DB
$g_sso_user_regex              = '/^(.*)@DOMAIN\.LOCAL$/i';
$g_logout_redirect_page        = $g_default_home_page; // "bypass" mantis login
$g_allow_signup                = OFF;
```

# Credits
https://www.mantisbt.org/forums/viewtopic.php?f=4&t=20426
