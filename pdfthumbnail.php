<?php
phpinfo();

/*$im = new Imagick(); 
$im->setResolution( 300, 300 ); 
$im->readImage( "http://mwra.knoxtest.com/wp-content/uploads/2016/09/2016-09-Exec-Packet.pdf" );
print_r($im);
//This function prints a text array as an html list.
/*function alist ($array) {  
  $alist = "<ul>";
  for ($i = 0; $i < sizeof($array); $i++) {
    $alist .= "<li>$array[$i]";
  }
  $alist .= "</ul>";
  return $alist;
}
//Try to get ImageMagick "convert" program version number.
exec("convert -version", $out, $rcode);
//Print the return code: 0 if OK, nonzero if error. 
echo "Version return code is $rcode <br>"; 
//Print the output of "convert -version"    
echo alist($out); 

 /*error_reporting(1);
 genPdfThumbnail('http://mwra.knoxtest.com/wp-content/uploads/2016/09/2016-09-Exec-Packet.pdf','my.jpg');
function genPdfThumbnail($source, $target)
    {
        //$source = realpath($source);
        $target = dirname($source).DIRECTORY_SEPARATOR.$target;
        $im     = new Imagick($source."[0]"); // 0-first page, 1-second page
        $im->setImageColorspace(255); // prevent image colors from inverting
        $im->setimageformat("jpeg");
        $im->thumbnailimage(160, 120); // width and height
        $im->writeimage($target);
        $im->clear();
        $im->destroy();
    }*/

?>