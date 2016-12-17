PHP Developer Notes

Version 7.1 
=================================================
Environment
	Operating System:  Windows 10 Enterprise 
	Hardware: Dell Latitude Laptop

Installation
	Step 1:  (Optional)- Created GitHub playground for tracking source code
	Step 2:  Created local workspace under c:\Projects\jobi-k\japi.php
	Step 3:  Download PHP 7.1.0 x64 non-thread-safe release (php-7.1.0-nts-Win32-VC14-x64) from windows.php.net
	Step 4:  Unzipped download to C:\Projects\Php\php-7.1.0-nts-Win32-VC14-x64\
	Step 5:  Enabled Microsoft Internet Information Server Feature Version 10
		 Make sure to enable CGI as part of the installation.  By default it is not installed. 

Configuration of IIS
	Step 1:	Add environment variables
		set phpdir=C:\Projects\Php
		set phppath=php-7.1.0-nts-Win32-VC14-x64
	Step 2: Clear any current PHP handlers (since this is a new installation there should not be any)
		%windir%\system32\inetsrv\appcmd clear config /section:system.webServer/fastCGI
		%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /-[name='PHP_via_FastCGI']
	Step 3: Set up the PHP handler
		%windir%\system32\inetsrv\appcmd set config /section:system.webServer/fastCGI /+[fullPath='%phpdir%\%phppath%\php-cgi.exe']
		%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /+[name='PHP_via_FastCGI',path='*.php',verb='*',modules='FastCgiModule',scriptProcessor='%phpdir%\%phppath%\php-cgi.exe',resourceType='Unspecified']
		%windir%\system32\inetsrv\appcmd set config /section:system.webServer/handlers /accessPolicy:Read,Script
	Step 4: Configure FastCGI Variable
		%windir%\system32\inetsrv\appcmd set config -section:system.webServer/fastCgi /[fullPath='%phpdir%\%phppath%\php-cgi.exe'].instanceMaxRequests:10000
		%windir%\system32\inetsrv\appcmd.exe set config -section:system.webServer/fastCgi /+"[fullPath='%phpdir%\%phppath%\php-cgi.exe'].environmentVariables.[name='PHP_FCGI_MAX_REQUESTS',value='10000']"
		%windir%\system32\inetsrv\appcmd.exe set config -section:system.webServer/fastCgi /+"[fullPath='%phpdir%\%phppath%\php-cgi.exe'].environmentVariables.[name='PHPRC',value='%phpdir%\%phppath%\php.ini']"


	NOTE:  (Optional) Create a batch file for executed steps 2-4.  Will need to run as admin