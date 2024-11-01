<?
$qstring=$_SERVER["QUERY_STRING"];	
if ($o!=""){
	$qstring=str_replace("&o=$o", "", $qstring);
	$query.=" ORDER BY $o ";
}

if ($d=="" || $d=="desc") {
		$qstring=str_replace("&d=$d", "", $qstring);
		$qstring.="&d=asc";
	}
	else	{
		$qstring=str_replace("&d=$d", "", $qstring);
		$qstring.="&d=desc";
	}
	$query.=" $d ";

?>