sosHell
=======

This is example code for a tiny php remote administration shell.  
The code is provided for education only.

## Screenshot ##

![sosHell](http://xxor.de/pics/sosHell.png)


## How to use ##

There are different methods to use the code.

### Standalone ###

1. Change $sosHellKey to the sha1 hash of your password. (`echo -n "password" | sha1sum`)
2. Upload sosHell.php to your web server.
3. Open [http://127.0.0.1/sosHell.php?key=password](http://127.0.0.1/sosHell.php?key=password) in your browser.

### Embedded ###

1. Change $sosHellKey to the sha1 hash of your password. (`echo -n "password" | sha1sum`)
2. Import the code from sosHell.php in your favorite php file.
(`cat  sosHell.php >> index.php`)
3. Open [http://127.0.0.1/index.php?key=password](http://127.0.0.1/index.php?key=password) in your browser.
