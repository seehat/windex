Windex - For a bright, shiny index
==================================

Windex uses PHP and Apache to style default directory listing index pages. It works directly with Apache's built-in directory mechanism.

Features
--------

* **Styled directory listings.** Windex comes with three lovely themes. Add your own theme by creating another CSS file and linking to in _header.php_.
* **Mobile-optimized view.** Shrink any browser to less than 480 pixels wide and you'll have a theme tailored specifically for mobile devices, perfect for the iPhone.
* **Nice default icons.**
* **Recursive download of directories.** Every directory can be downloaded in desktop view. All files and subdirectories are added to the downloaded zip-file.

Windex themes make liberal use of CSS3. Viewing experiences in legacy browsers may differ.

HEADS UP
--------

**Enabling directory indexes on a live site can be a serious security risk. Be sure to to install Windex only where you want the child files and folders to be viewable.**

Installation
------------

1. Clone the windex repo in a directory on your server and start adding files.

~~~
git clone git@github.com:seehat/windex.git listing.domain.com
~~~

2. Edit windex/config.php and change any configuration options. 

3. Try it out!  Browse to a directory that does not contain an index file.


License
-------

This software is free to use and modify.  You may not charge for or sell this software, nor any derivation of it. If you do modify it, we would love to hear about it. Give us a holler and let us know.

Windex is based on [David DeSandro´s](http://desandro.com) [windex](https://github.com/desandro/windex).