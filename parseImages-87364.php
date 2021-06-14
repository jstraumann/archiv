<?php

$url = "http://archiv.juergstraumann.ch/";
$url = "http://moirasia.datalets.ch/";
$file = "images.csv";
$fh = fopen($file,"r");

echo "<pre>\n";
$no = 0;
while ($line = fgets($fh, 4096)) {
  $id++;
  #$arrLine = explode(",", $line);
  $arrLine = str_getcsv($line, ',');
  #echo $arrLine[29] ." - ". $arrLine[30] . "\n";

  $imgid = $arrLine[28];
  $imgpath = $arrLine[29];
  $ipp = explode($imgpath, "/"); # image path part
  $thumbpath = $arrLine[30];
  #echo $thumbpath."\n";

  if (file_exists($imgpath)) {
    ; #echo "yes: ". $imgid ." - <a href=\"$url/$imgpath\">". $imgpath ."</a><br />\n";
  } else {
    echo "missing: ". $imgid ." - <a href=\"$url$imgpath\" target=\"_blank\">". $imgpath ."</a><br />\n";
    #shell_exec("ls images/".$ipp[1]."/$imgid");
    echo "<br />\n";
    $no++;
  }
  if (0 && does_url_exists($imgpath))
    echo $imgid."\n";
  #if (0 && $id > 100)
  #  exit;
}

echo "total missing = $no;</pre>\n";
exit;


function does_url_exists($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($code == 200) {
        $status = true;
    } else {
        $status = false;
    }
    curl_close($ch);
    return $status;
}

?>
