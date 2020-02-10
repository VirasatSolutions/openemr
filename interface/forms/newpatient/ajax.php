<?php

require_once("../../globals.php");

$pid = $_REQUEST['pid'];
$encounter = $_REQUEST['encounter'];

$ires = sqlStatement("SELECT l.id, l.type, l.title, l.begdate FROM lists as l LEFT JOIN issue_encounter as e ON l.id = e.list_id WHERE e.encounter = $encounter AND e.pid = $pid");
$options = '';
while ($irow = sqlFetchArray($ires)) {
	$list_id = $irow['id'];
	$tcode = $irow['type'];
	$options .= "<option value='" . attr($list_id) . "' selected>" . strtoupper($tcode[0]) . ": " . strtoupper($irow['begdate']) . " " .text(substr($irow['title'], 0, 40)) . "</option>\n";
}

echo $options;
