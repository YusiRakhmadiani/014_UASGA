<?php
require("koneksi.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Select all the rows in the markers table
$query = "SELECT * FROM studio";
$result = mysqli_query($conn,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<studio>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<studio ';
  echo 'id="' . $row['id'] . '" ';
  echo 'nama="' . parseToXML($row['nama']) . '" ';
  echo 'latitude="' . parseToXML($row['latitude']) . '" ';
  echo 'longitude="' . $row['longitude'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</studio>';

?>
