<!DOCTYPE html>
<?php require('config.php'); ?>
<html>
<head>
    <meta charset="utf-8">
    <!--
         This index has been cleaned with Windex
         http://github.com/desandro/windex
         
         A mod of Indices:
         http://antisleep.com/software/indices
    -->
    
    <title><?php echo $titletext; ?></title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=0"/>

    <link rel="stylesheet" media="screen and (max-width: 480px)" href="<?php echo $windexPath; ?>/css/iphone.css" />
    <link rel="stylesheet" media="screen and (min-width: 481px)" href="<?php echo $windexPath; ?>/css/screen.css" />

</head>

<body>
    
<div id="wrap">    
    
    <div id="dirlist">
        <a href="<?php echo $downloadLink; ?>" class="btn btn--download">Download</a>
        
        <h1 id="page-title"><?php echo $h1text; ?></h1>
