<?php

    //=======================================================================
    // A few configuration values.  Change these as you see fit.
    //=======================================================================

    // Windex path
    $windexPath = '/windex';
    define ("WINDEXPATHABSOLUTE", dirname(__FILE__));
    $tmpPath = WINDEXPATHABSOLUTE . "/" . "tmp";

    // titleFormat
    //   How to format the <title> and <h1> text.  %DIR is replaced with the directory path.
    // for instance:
    //   $titleFormat = "Now Viewing: %DIR";
    $titleFormat = "Index of %DIR";

    // showReadme
    //   If true, the contents of a README file will appear after
    //   the directory listing.  
    $showReadme = true;

    //=======================================================================
    // End of config
    //=======================================================================    
    
    // URI of current directory-
    $uri = urldecode($_SERVER['REQUEST_URI']);
    $uri = preg_replace("/\?.*$/", "", $uri);
    $uri = preg_replace("/\/ *$/", "", $uri);
    

    //=======================================================================
    // Header
    //=======================================================================
    
    
    $titletext = str_replace("%DIR", $uri, $titleFormat). '/';

    // generate title path, with links to each parent folder
    $folders = explode('/',$uri);
    $folderCount = count($folders);
    $pathMarkup = '';
    foreach ($folders as $i => $folder) {
        $link = '';
        $backCount = $folderCount - $i -1;
        for ($j=0; $j < $backCount; $j++) { 
            $link .= '../';
        }
        $pathMarkup .= '<a href="'.$link.'">'.$folder.'/</a>';
    }    
    
    $pathMarkup = '<strong>'.$pathMarkup.'</strong>';
    
    $h1text = str_replace("%DIR", $pathMarkup, $titleFormat);

    $downloadLink = "/windex/zipdownload.php?path=" . $uri;


    function zipDir($source, $destination)
    {
        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }

        // remove previous export
        if (file_exists ($destination)) unlink ($destination);

        $zip = new ZipArchive();
        if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
            return false;
        }

        $source = str_replace('\\', '/', realpath($source));

        if (is_dir($source) === true)
        {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

            foreach ($files as $file)
            {
                $file = str_replace('\\', '/', $file);

                // Ignore "." and ".." folders
                if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                    continue;

                $file = realpath($file);

                // Don't add windex to zip
                if (strpos($file, WINDEXPATHABSOLUTE) !== false) {
                    continue;
                }

                if (is_dir($file) === true)
                {
                    $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                }
                else if (is_file($file) === true)
                {
                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                }
            }
        }
        else if (is_file($source) === true)
        {
            $zip->addFromString(basename($source), file_get_contents($source));
        }

        return $zip->close();
    }


    function file_transfer($uri, $headers) {
      if (ob_get_level()) {
        ob_end_clean();
      }

      foreach ($headers as $name => $value) {
        header ($name . ": " . $value);
      }

      // Transfer file in 1024 byte chunks to save memory usage.
      if ($fd = fopen($uri, 'rb')) {
        while (!feof($fd)) {
          print fread($fd, 1024);
        }
        fclose($fd);
      }
      else {
        exit;
      }
      exit;
    }
    

?>