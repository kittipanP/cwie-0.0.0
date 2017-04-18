<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php 
		$file = 'resume-source/resume_for_coop.pdf';
		$filename = 'resume_for_coop.pdf';
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="'.$filename.'"');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');
		@readfile($file);
	?>
</body>
</html>