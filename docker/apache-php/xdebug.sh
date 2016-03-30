apt-get -y install php5-xdebug

XDEBUG_SO="$(command find '/usr/lib/php5/' -name 'xdebug.so' | command head -n 1)"
echo "; configuration for php XDebug module
; priority=20
zend_extension=${XDEBUG_SO}" > "/etc/php5/mods-available/xdebug.ini"

