# mantis-basic-auth
BASIC AUTH for Mantis. (experimental)

* add a .htaccess file that takes care of authentication
* after authentication the $_SERVER variable contains the username 
of the authenticated user in $_SERVER['REMOTE_USER']
* this plugin looks up the username and logs the user in


# Installation
* copy directory BasicAuth into the plugins directory
* login as Administrator and go to Manage > Plugins
* install the BasicAuth plugin

# Credits
https://www.mantisbt.org/forums/viewtopic.php?f=4&t=20426
