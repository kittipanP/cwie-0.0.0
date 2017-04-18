<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

	<div class="input_fields_wrap">
		<button class="add_field_button">Add More Fields</button>
        <div>
          <p>
            <input type="text" name="mytext[]">
          </p>
          <p>&nbsp;</p>
          <table align="center">
            <tr valign="baseline">
            
            
              <td></td>
              <td></td>
            </tr>
            <tr valign="baseline">
              <td></td>
            </tr>
            <tr valign="baseline">
              <td></td>
            </tr>
            <tr valign="baseline">
              <td></td>
            </tr>
            <tr valign="baseline">
              <td></td>
            </tr>
          </table>
          <p>&nbsp; </p>
        </div>
	</div>
    
    <script>
		$(document).ready(function(){
			var max_fields	= 10;
			var wrapper		= $(".input_fields_wrap");
			var add_button	= $(".add_field_button");
			
			var x = 1;
			$(add_button).click(function(e){
				e.preventDefault();
				if(x < max_fields){
					x++;
					$(wrapper).append('<div><input type="text" name="mytext[]" /><a href="#" class="remove_field">Remove</a></div>');
						
				}	
			});	
			
			$(wrapper).on("click",".remove_field",function(e){
				e.preventDefault(); $(this).parent('div').remove();	
			})
		});
	</script>
    
    
                        <div class="w3-row-padding w3-center w3-margin-top">
                          <div class="w3-third">
                            <div>         
                                <div align="left">
                                </div>
			   <table>   
               	<tr>
                 <td><input type="text" name="application_id" value="" size="32" /></td>
                 <td><input type="text" name="s_id" value="" size="32" /></td>
                 <td><input type="text" name="application_name" value="" size="32" /></td>
                </tr>
                <tr>
                 <td nowrap="nowrap" align="right">Application_name:</td>
                 <td> <input type="text" name="application_dateS" value="" size="32" /></td>
                </tr>
               <tr>
                <td nowrap="nowrap" align="right">Application_name:</td>
               	<td><input type="text" name="application_dateE" value="" size="32" /></td>
               </tr>
              </table>                                
                                
                            </div>
                          </div>
                          <div class="w3-twothird">
                            <div >                              
                                <div align="left">                      	
                                </div>     
                            </div>
                          </div>          
                          
                        </div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <?php include 'ui_connect/student_management/Pretty-Event-Calendar-&-Datepicker-Plugin-For-jQuery-Calendar-js/calendar.php'?>
               
                        
                    
                    
                    
                   
                       
                        
                        
                        
                        
                        
                        
                    
                        
</body>
</html>