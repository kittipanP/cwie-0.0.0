<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta charset="UTF-8">
  <title>Multi Step Form with Progress Bar using jQuery and CSS3</title>
  
  <link rel="stylesheet" href="../../libs/css/reset.min.css">

  
      <link rel="stylesheet" href="../../libs/css/style.css">

</head>

<body>

<!-- multistep form -->
<form action="<?php echo $editFormAction; ?>" method="post" name="msform" id="msform">
    
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active">Education Data</li>
                            <li>Persornal Data</li>
                            <li>Step 3</li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
    
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                            <h2 class="fs-title">Create Eiei</h2>
                             <h3 class="fs-subtitle">This is step 1</h3>
                             <input type="text" name="email" placeholder="First Name" />
                             <input type="text" name="email" placeholder="Last Name" />
                             <input type="text" name="email" placeholder="Email" />
                             
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                            <h2 class="fs-title">Eiei</h2>
                            <h3 class="fs-subtitle">2222222222222222222222222222222</h3>
                            <input type="text" name="email" placeholder="First Name" />
                             <input type="text" name="email" placeholder="Last Name" />
                             <input type="text" name="email" placeholder="Email" />
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                            <h2 class="fs-title">Eiei</h2>
                            <h3 class="fs-subtitle">3333333333333333333</h3>
                            <input type="text" name="fname" placeholder="First Name" />
                            <input type="text" name="lname" placeholder="Last Name" />
                            <textarea name="address" placeholder="Address"></textarea>
                            <input type="text" name="country_name" value="" size="32" placeholder="Country" />

                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="submit" name="submit" class="submit action-button" value="Submit" />
                            <input type="hidden" name="MM_insert" class="submit action-button" value="msform" />
                        </fieldset>
                </form>    

  <script src='../../libs/js/jquery.min.js'></script>
<script src='../../libs/js/jquery.easing.min.js'></script>

    <script src="../../libs/js/index.js"></script>
    
    
</body>
</html>