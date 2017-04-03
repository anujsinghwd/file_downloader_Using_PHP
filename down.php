<?php
ini_set('max_execution_time','9999999999999999999999999'); 
$url = $_POST['plac'];
$fol = $_POST['kee'];
$i=1;
//$url = 'http://www.ishatours.net/wp-content/uploads/2010/08/';
/*$filename = substr(strrchr($url, "/"), -3);
echo $filename; // "index.html"*/
mkdir($fol);
$html = @file_get_contents($url);
$img = new DOMDocument();
libxml_use_internal_errors(TRUE);
if (!empty($html)) {
	$img->loadHTML($html);
	libxml_clear_errors();
	$img_xpath = new DOMXPath($img);

	$file = $img_xpath->query('//li//a');

	foreach ($file as $value) {
		$im1 = $value->getAttribute('href');
		if (strpos($im1, '.jpg')) {
			$content = file_get_contents($url.$im1);
			//Store in the filesystem.
			//$src = "http://www.varuste.net/tiedostot/l_ylabanneri.jpg";
			//$image = imagecreatefromstring(file_get_contents($url.$im1));
			$fp = fopen("./".$fol."/".$im1."".$i.".jpg", "w");
			$i++;
			fwrite($fp, $content);
			fclose($fp);		
		}
		else if (strpos($im1, '.gif')) {
			$content = file_get_contents($url.$im1);
			//Store in the filesystem.
			//$src = "http://www.varuste.net/tiedostot/l_ylabanneri.jpg";
			//$image = imagecreatefromstring(file_get_contents($url.$im1));
			$fp = fopen("./".$fol."/".$im1."".$i.".gif", "w");
			$i++;
			fwrite($fp, $content);
			fclose($fp);		
		}	

		else if (strpos($im1, '.png')) {
			$content = file_get_contents($url.$im1);
			//Store in the filesystem.
			//$src = "http://www.varuste.net/tiedostot/l_ylabanneri.jpg";
			//$image = imagecreatefromstring(file_get_contents($url.$im1));
			$fp = fopen("./".$fol."/".$im1."".$i.".png", "w");
			$i++;
			fwrite($fp, $content);
			fclose($fp);		
		}

		else if (strpos($im1, '.pdf')) {
			$content = file_get_contents($url.$im1);
			//Store in the filesystem.
			//$src = "http://www.varuste.net/tiedostot/l_ylabanneri.jpg";
			//$image = imagecreatefromstring(file_get_contents($url.$im1));
			$fp = fopen("./".$fol."/".$im1."".$i.".pdf", "w");
			$i++;
			fwrite($fp, $content);
			fclose($fp);		
		}	
	}
}
echo "Done";

?>