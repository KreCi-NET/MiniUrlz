# MiniUrlz
======================================================
Version: 1.5

http://blog.kreci.net/code/url-shortening-script/

Do not remove footer links!
For details please read the license paragraph.
------------------------------------------------------


Description:

Very simple to install and use url shortening script that will let you set up your own service in a few minutes. Front page design can be easily 
modified by editing just a one template file . "template.html" (front page HTML is totally separated from PHP!). It does not require any database to 
work. Submitted urls can be easily managed through integrated administrator panel.


Features:

    * No database required
    * Handle unlimited number of urls
    * Totally separated from PHP & easy to edit front page
    * Integrated administrator panel
    * Redirect all traffic from removed & non existing shortcuts
    * Click count & date of last click
    * Quick 1-2-3 setup (upload / CHMOD / Run SETUP.PHP)


Installation:

   1. Upload all files to your server
   2. CHMOD following files and folders to be writable & readable by PHP (if unsure set 777):
      - "store" folder with all files in it (store/*)
      - ".htaccess"
      - "conf.inc.php"
   3. Run "setup.php" in your web browser (for example http://www.yourdomain.com/setup.php) and follow instructions

If you want to access administrator panel you need to open "admin.php" in your web browser and use login & password set by "setup.php".


Updating:

If you want to update script from previous version, you should overwrite all files except "template.html" and follow "Installation" instructions.
You will not loose any previously created links. Just keep your "store" folder untouched.


Main page template customization:

If you want to customize your main page you need to edit "template.html" and "style.css". Don't forget to use {status_info} template tag.
It will be replaced with system messages (created urls or errors).


How to remove footer links from MiniUrlz main page:

As stated in the license paragraph you can not remove or hide footer links without author permission. You can get author (mine) permission to 
remove it for 10 EURO per domain. If you are interested please contact me (http://blog.kreci.net/contact-me/ - provide your domain name). You will 
receive new license file that should be uploaded to your installation. It will display your domain name instead of my footer.


License:

Script is released under Creative Commons Attribution 3.0 Unported License (http://creativecommons.org/licenses/by/3.0/). It mean that you may use, 
modify and redistribute this scripts but you may not remove or hide any links in the footer without author permission.
