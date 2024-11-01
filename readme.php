<div class='wrap'>
<h2>About Lots of Locales (LoL) Store Locator Plugin</h2><br>
<?php

//print "<span style='font-size:14px; font-family:Helvetica'>";
ob_start();
include('readme.txt');
$txt=ob_get_contents();
ob_clean();
//print ereg_replace("(http://.*\..*\..{2,3}\n)", "<a href='\\1' target='_blank'>\\1</a>", $txt);
//$txt=ereg_replace("(http://www.viadat.com)", "<a href='\\1' target='_blank'>\\1</a>", $txt);

$txt=ereg_replace("\=\=\= ", "<h3>", $txt);
$txt=ereg_replace(" \=\=\=", "</h3>", $txt);
$txt=ereg_replace("\=\= ", "<strong>", $txt);
$txt=ereg_replace(" \=\=", "</strong>", $txt);
$txt=ereg_replace("\= ", "<u>", $txt);
$txt=ereg_replace(" \=", "</u>", $txt);
$txt=do_hyperlink($txt);

print nl2br($txt);
//print "</span>";

?>
</div>