REM Clear current PHP handlers
%windir%\system32\inetsrv\appcmd clear config /section:system.webServer/fastCGI
%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /-[name='PHP_via_FastCGI']


REM Set up the PHP handler
%windir%\system32\inetsrv\appcmd set config /section:system.webServer/fastCGI /+[fullPath='%phpdir%\%phppath%\php-cgi.exe']
%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /+[name='PHP_via_FastCGI',path='*.php',verb='*',modules='FastCgiModule',scriptProcessor='%phpdir%\%phppath%\php-cgi.exe',resourceType='Unspecified']
%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /accessPolicy:Read,Script

REM Configure FastCGI Variables
%windir%\system32\inetsrv\appcmd set config -section:system.webServer/fastCgi /[fullPath='%phpdir%\%phppath%\php-cgi.exe'].instanceMaxRequests:10000
%windir%\system32\inetsrv\appcmd.exe set config -section:system.webServer/fastCgi /+"[fullPath='%phpdir%\%phppath%\php-cgi.exe'].environmentVariables.[name='PHP_FCGI_MAX_REQUESTS',value='10000']"
%windir%\system32\inetsrv\appcmd.exe set config -section:system.webServer/fastCgi /+"[fullPath='%phpdir%\%phppath%\php-cgi.exe'].environmentVariables.[name='PHPRC',value='%phpdir%\%phppath%\php.ini']"
