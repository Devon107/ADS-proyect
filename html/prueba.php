<?php
  $file = '../static/file.pdf';
  $filename = 'file.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
  
  shortcut.add("F1",function() {
	alert("Hi there!");
  });

?>