# mantis-basic-auth
BASIC AUTH for Mantis.

* add a .htaccess file that takes care of authentication.
* after successfull authentication $_SERVER['REMOTE_USER'] should 
contain the username of the authenticated user.
* this plugin checks if the username exists in the mantis user DB 
and logs the user in.

# Installation
* copy directory BasicAuth into the plugins directory
* login as Administrator and go to Manage > Plugins
* install the BasicAuth plugin

# Example config_inc.php
```php
$g_login_method = BASIC_AUTH;
$g_allow_signup = OFF;
```

# Credits
https://www.mantisbt.org/forums/viewtopic.php?f=4&t=20426
