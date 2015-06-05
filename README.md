# flipkart affiliate api wrapper

### Information
bin directory - contains data-updater.php, PHP script which updates json database.
public directory -  shows how you can design front end for your website with example.
Most code is well commented and pretty much self explanatory.
WARNING: Use of these files is not intended for actual websites. currently error checking in my script is very minimal.

### How to use?
Use CRON or something similar to update json databases regularly. Then you can use Javascript+jQuery or PHP to parse json and show ads. Open public directory of this repo to see an example.

### I want to test that example?
Even though the simple front-end in public directory is completely written in HTML-CSS-JS you'll still need web server like Apache/nginx to run it. Because most jQuery functions don't work with "file://" protocol.

Easiest way to do this is using php or python's inbuilt http server.

    cd public

 Use php to serve content

    php -S localhost:8000

 OR using python

    python -m SimpleHTTPServer 8000

Open browser and go to http://localhost:8000

### Why store json data from API locally on server?
Flipkart currently limits API calls to 20 per second, on high traffic website this could be a huge trouble, plus storing data locally on server improves speed of serving ads.

You're free to use and redistribute as long as you follow the license terms. Feel free to fork, improve and send PR.


![screenshot](http://i.imgur.com/uXmplBq.png "screenshot")
