<?php
#####################################################
#################### the config #####################
#####################################################

# set to your Fritz!Box IP address or DNS name (defaults to fritz.box), for remote config mode, use the dyndns-name like example.dyndns.org
$fritzbox_ip = 'fritz.box';

# if needed, enable remote config here
#$enable_remote_config   = true;
#$remote_config_user     = 'test';
#$remote_config_password = 'test123';

# set to your Fritz!Box password (defaults to no password)
$password    = "";

# set the logging mechanism (defaults to console logging)
$logging     = 'console'; // output to the console
#$logging     = 'silent';  // do not output anything, be careful with this logging mode
#$logging     = 'tam.log'; // the path to a writeable logfile

# the newline character for the logfile (does not need to be changed in most cases)
$newline = (PHP_OS == 'WINNT') ? "\r\n" : "\n";


############## module specific config ###############

# set the path for the call list for the foncalls module
$foncallslist_path = dirname(__FILE__) . '/foncallsdaten.xml';
