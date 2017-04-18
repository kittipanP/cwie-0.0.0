<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="file:///C|/xampp/htdocs/DwTest.Com/libs/css/w3.css">
<link rel="stylesheet" href="file:///C|/xampp/htdocs/DwTest.Com/libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='file:///C|/xampp/htdocs/DwTest.Com/libs/css/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Index</title>
</head>

<style>
html,body,h1,h2,h3,h4,h5 {
}
</style>

<body>

	
<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="#" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-black" title="Stusent Management"><img src="file:///C|/xampp/htdocs/DwTest.Com/img/Navbar/seo-report.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-black" title="Report"><img src="file:///C|/xampp/htdocs/DwTest.Com/img/Navbar/newspaper.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-black" title="E-mail Management"><img src="file:///C|/xampp/htdocs/DwTest.Com/img/Navbar/notificationII.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></a></li>
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="#" class="w3-padding-large w3-hover-black" title="Notifications"><img src="file:///C|/xampp/htdocs/DwTest.Com/img/Navbar/bell.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"><span class="w3-badge w3-right w3-small w3-green">3</span></a>     
    <div class="w3-dropdown-content w3-white w3-card-4">
      <a href="#">Kittipan will finish coop on Feb 24, 2017</a>
      <a href="#">Extend VISA</a>
      <a href="#">Danny eiei</a>
    </div>
  </li>
  <li class="w3-hide-small w3-right"><a href="#" class="w3-padding-large w3-hover-white" title="My Account"><img src="file:///C|/xampp/htdocs/DwTest.Com/img/Avatar/boy.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></a></li>
 </ul>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><!-- Page Container --></li>
  </ul>
</div>

<p class="cen">&nbsp;</p>
<p class="cen">&nbsp;</p>
<p class="cen">Add New Student</p>
<p class="cen">&nbsp;</p>
<table width="577" height="68" border="1" align="center">
  <tr>
    <td class="cen">นน</td>
    <td>countryName</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Contries['countryID']; ?></td>
      <td><?php echo $row_Contries['countryName']; ?></td>
    </tr>
    <?php } while ($row_Contries = mysql_fetch_assoc($Contries)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>By <a href="http://www.facebook.com/Bon.KP" target="_blank">บอนไง จะใครล่ะ ^^</a></p>
</footer>

</body>
</html>