<?php 

include_once "config.php";

$cur_dir = dirname(dirname(__FILE__));
$downloadFile = $tmpPath . "/download.zip";

if (zipDir ($cur_dir . $_GET['path'], $downloadFile)) {
  file_transfer($downloadFile, array(
    'Content-type' => 'application/zip', 
    'Content-Disposition' => "attachment; filename=export.zip", 
    'cache-control' => 'must-revalidate')
  );
}
else {
  echo "Fehler beim Herunterladen.";
}

?>