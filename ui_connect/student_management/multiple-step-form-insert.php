<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="msform" enctype="multipart/form-data">
                    
              <!-- progressbar -->
              <ul id="progressbar">
                  <li class="active">Personal Detail</li>
                  <li>Education Data</li>
                  <li>Other Information</li>
                  <li>File Upload</li>
              </ul>
                    
              <!-- fieldsets -->
              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Personal Detail</h2>
                <h3 class="fs-subtitle">This is step 1</h3>
                        
                <div class="w3-row-padding w3-center w3-margin-top">
 
                  <div class="w3-third">
                    <div>
                                  <!--<h4>Student Management</h4><br>-->
                                    <!--<i class="fa fa-group w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                                    <!--<hr>-->
                                    
                      	<input type="hidden" name="s_dob" value="" size="32" />
                        <input type="hidden" name="origin_id" value="" size="32" />
                        <input type="hidden" name="type_id" value="" size="32" />
                        <input type="hidden" name="ref_id" value="" size="32" />
                        <input type="hidden" name="national_id" value="" size="32" />
                        <input type="hidden" name="title_title_id" value="" size="32" />
                         <div align="left">
                      	<label for="titleSelect"> Title : </label>
                     	 </div>
                        <!--<label for="titleSelect">TITLE :  </label>-->
                        <div align="left">
                        <select name="title_title_id" >
                          <?php
                              do {  
                          ?>
                                  <option name="title_title_id" size="32" value="<?php echo $row_titleSet['title_id']?>"><?php echo $row_titleSet['title_name']?> </option>
                          <?php
                              } while ($row_titleSet = mysql_fetch_assoc($titleSet));
                              $rows = mysql_num_rows($titleSet);
                              if($rows > 0) {
                              mysql_data_seek($titleSet, 0);
                              $row_titleSet = mysql_fetch_assoc($titleSet);
                               }
                                                        ?>
                        </select></div>
                      <div align="left">
                      	<label for="s_fname"> First Name : </label>
                      </div>
                      <input id="inputFirstname" class="" type="text" name="s_fname" value="" size="32" placeholder="KITTIPAN" />
                      <div align="left">
                      	<label for="s_lname"> Last Name : </label>
                      </div>
                      <input id="inputLastname" type="text" name="s_lname" value="" size="32" placeholder="PRASERTSANG"/>
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            <!--<h4>Report</h4><br>-->
                                            <!--<i class="fa fa-bar-chart-o w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                        <div align="left">
                      	<label for="thai_fname"> Thai First Name : </label>
                      	</div>
                        <input type="text" name="thai_fname" value="" size="32" placeholder="กิตติพันธ์" />
                        <div align="left">
                      	<label for="thai_lname"> Thai Last Name : </label>
                      	</div>
                        <input type="text" name="thai_lname" value="" size="32" placeholder="ประเสริฐสังข์"/>
                        <div align="left">
                      	<label for="statusSelect"> Student status : </label>
                      	</div>
                        <select name="status_id" style="width: 100%;">
                          <?php do {  ?>
                            <option  name="title_title_id" value="<?php echo $row_statusSet['status_id']?>"><?php echo $row_statusSet['status_desc']?></option>
                            <?php
                                } while ($row_statusSet = mysql_fetch_assoc($statusSet));
                                  $rows = mysql_num_rows($statusSet);
                                  if($rows > 0) {
                                  mysql_data_seek($statusSet, 0);
                                  $row_statusSet = mysql_fetch_assoc($statusSet);
                                  }
                            ?>
                        </select>
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                            <!--<h4>E-mail Management</h4><br>-->
                        <input type="hidden" name="contact_id" value="" size="32" /> 
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />                                       
                        <div align="left">
                      	<label for="contact_no"> Tel : </label>
                      	</div>
                        <input type="text" name="contact_no" value="" size="32" placeholder="08 4722 2174"/>
                        
                        <div align="left">
                      	<label for="email_adress"> E-mail address : </label>
                      	</div>
                        <input type="text" name="email_adress" value="" size="32" placeholder="kittipan.prasertsang@gmail.com"/>
                        
                        
                        <div align="left">
                      	<label for="remark"> Remark : </label>
                      	</div>
                        <textarea name="remark" value="" size="32" placeholder="Remark..."></textarea>
                        
                        
                                     
                         
                        

                                            <!--<i class="fa fa-envelope w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                                            <!--<hr>-->
                    </div>
                  </div>
                 
                </div>   
                <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->             
          		<!--<input type="hidden" name="MM_insert" value="form3" />-->         
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Address and Contact Data</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <p></p>
                        <div class="w3-row-padding w3-center w3-margin-top">
        				  <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Emergency Cantact Data</p></div>
                          <div class="w3-third">
                            <div>   
                               
								<input type="hidden" name="emc_id" value="" size="32" />
                        		<input type="hidden" name="contact_id" value="<?php echo $row_stu_contactSet['contact_id']+1?>" size="32" />
                                <div align="left">
                                <label for="emc_fname"> First Name : </label>
                                </div>
                                <input type="text" name="emc_fname" value="" size="32" placeholder="First Name"/>
        
                            </div>
                          </div>
               
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_lname"> Last Name : </label>                     	
                                </div>
                                <input type="text" name="emc_lname" value="" size="32" placeholder="Last Name"/>
                                
                            </div>
                          </div>
                                
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_relation"> Relationship : </label>                     
                                </div>
                                <input type="text" name="emc_relation" value="" size="32" placeholder="Relationship"/> 
                                <div align="left"> 
                                <label for="emc_contact"> Contact No : </label>                     
                                </div>
                                <input type="text" name="emc_contact" value="" size="32" placeholder="Contact No."/>      
        
                            </div>
                          </div>
                         
                        </div>
                        
                        <div class="w3-row-padding w3-center w3-margin-top">
                        <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Student Address</p></div>
                          <div class="w3-third">
                            <div>
                                <input type="hidden" name="address_Id" value="" size="32" />
                                <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />         
                                <div align="left">
                                <label for="place_name"> Place/Village : </label> 
                                </div>
                                <input type="text" name="place_name" value="" size="32"  placeholder="Sermsook"/>
                                <div align="left">
                                <label for="district"> District : </label> 
                                 </div>
                                <input type="text" name="district" value="" size="32" placeholder="Phonphisai"/>
                                <div align="left">
                                <label for="province_name"> Province : </label> 
                                </div>
                                <input type="text" name="province_name" value="" size="32" placeholder="Nong Khai"/>
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                              
                                <div align="left">
                                <label for="road_name"> Road/Street : </label>                      	
                                </div> 
                                <input type="text" name="road_name" value="" size="32" placeholder="N/A"/>
                                <div align="left">
                                <label for="city"> City : </label> 
                                </div>
                                <input type="text" name="city" value="" size="32" placeholder="N/A"/> 
                                <div align="left">
                                <label for="country_id"> Country : </label> 
                                </div>
                                <input type="text" name="country_id" value="" size="32" placeholder="Thailand"/>   
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">  
                                <label for="sub_district"> Sub-district : </label>                    
                                </div> 
                                <input type="text" name="sub_district" value="" size="32" placeholder="Jhumphol"/>
                                <div align="left">
                                <label for="zip_code"> Zip Code/Post : </label> 
                                </div>
                                <input type="text" name="zip_code" value="" size="32" placeholder="43120"/>     
                            </div>
                          </div>
                        </div>
                        









                      </dd>
                      <!--end accordion tab 1 -->

                      <dt>
                          <!-- accordion tab 2 -->
                            <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">Student's Relation Data</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
                        
                            <p class="headings"></p> 
                            <div class="w3-row-padding w3-center w3-margin-top">
                            <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Relation Data</p></div>
                              <div class="w3-third">
                                <div>   
                                    <input type="hidden" name="relation_id" value="" size="32" />
                                    <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />                                      
                                    <div align="left">
                                    <label for="relation_fname"> First Name : </label>
                                    </div>
                                    <input type="text" name="relation_fname" value="" size="32" placeholder="Bongkoch"/>
                                    <div align="left"> 
                                    <label for="relation_occupation"> Occupation : </label>                     
                                    </div>
                                    <input type="text" name="relation_occupation" value="" size="32" placeholder="Officer"/>

                                </div>
                              </div>
                              <div class="w3-third">
                                <div >                              
                                    <div align="left"> 
                                    <label for="relation_lname"> Last Name : </label>                     	
                                    </div>    
                                    <input type="text" name="relation_lname" value="" size="32" placeholder="Prasertsang"/> 
                                    <div align="left"> 
                                    <label for="relation_contact"> Contact : </label>                     
                                    </div>
                                    <input type="text" name="relation_contact" value="" size="32" placeholder="08 6223 86XX "/> 
                                </div>
                              </div>          
                              <div class="w3-third">
                                <div >                                                 
                                    <div align="left"> 
                                    <label for="relation_type"> Relation Type : </label>                     
                                    </div> 
                                    <input type="text" name="relation_type" value="" size="32" placeholder="Mother"/>     
                                </div>
                              </div>
                            </div>	    
                      </dd>
                      <!-- end accordion tab 2 -->

                      <!--<dt>
                         
                            <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 3</a>
                        </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@</p>
                        </div>
                      </dd>-->
                     

                    </dl>
                   
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->        
				


              	<input type="button" name="next" class="next action-button" value="Next" />
                        
                        
              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Education Data</h2>
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTag" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTag" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                         <input type="hidden" name="education_id" value="" size="32" />
                         <input type="hidden" name="education_name" value="" size="32" id="outputFullname" readonly />
                         <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />    
                         <div align="left">
                         <label for="degree_id"> Degree : </label>
                     	 </div>
                         <select name="degree_id" id="degreeSelect" style="width: 100%;">
                                    <?php
                        do {  
                        ?>
                                    <option value="<?php echo $row_degreeSet['degree_id']?>"><?php echo $row_degreeSet['degree_name']?></option>
                                    <?php
                        } while ($row_degreeSet = mysql_fetch_assoc($degreeSet));
                          $rows = mysql_num_rows($degreeSet);
                          if($rows > 0) {
                              mysql_data_seek($degreeSet, 0);
                              $row_degreeSet = mysql_fetch_assoc($degreeSet);
                          }
                        ?>
                        </select>
                         <!--<input type="text" name="degree_id" value="" size="32" />-->
                         
                        <div align="left">
                        <label for="major_id"> Major : </label>
                        </div>
                        <select name="major_id" id="majorSelect" style="width: 100%;">
                                    <?php
                        do {  
                        ?>
                                    <option value="<?php echo $row_majorSet['major_id']?>"><?php echo $row_majorSet['major_name']?></option>
                                    <?php
                        } while ($row_majorSet = mysql_fetch_assoc($majorSet));
                          $rows = mysql_num_rows($majorSet);
                          if($rows > 0) {
                              mysql_data_seek($majorSet, 0);
                              $row_majorSet = mysql_fetch_assoc($majorSet);
                          }
                        ?>
                        </select>
                        <!--<input type="text" name="major_id" value="" size="32" />-->
                        
                      <div align="left"> 	
                      </div>
                      
                      <div align="left">
                      </div>
                     
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">  
                        <label for="intitute_id"> Institute : </label>                    	
                      	</div>
                        <select name="intitute_id" id="insSelect" onChange="(getUniversity(this.value) , getUniversityii(this.value))" style="width: 100%; " >
                            <option value="">Select Institute Type</option>
                          <?php
                    do {  
                    ?>
                          <option value="<?php echo $row_instituteSet['intitute_id']?>"><?php echo $row_instituteSet['intitute_name']?></option>
                          <?php
                    } while ($row_instituteSet = mysql_fetch_assoc($instituteSet));
                      $rows = mysql_num_rows($instituteSet);
                      if($rows > 0) {
                          mysql_data_seek($instituteSet, 0);
                          $row_instituteSet = mysql_fetch_assoc($instituteSet);
                      }
                    ?>
                        </select>
                        <!--<input type="text" name="intitute_id" value="" size="32" />-->
                       
                        <div align="left">                      	
                      	</div>
                        
                        <div align="left">                      	
                      	</div>
                        
                  	</div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">   
                        <label for="uni_id"> University : </label>                   	
                      	</div>
                        <select name="uni_id" id="uniSelect" style="width: 100%;" >                        	
							<option value="" >Select Institute Type First</option>
						</select>
                        <!--<input type="text" name="uni_id" value="" size="32" />-->
                        
                        <div align="left">  
                        <label for="collage_id"> Collage : </label>                   	
                      	</div>
                        <select name="collage_id" id="collageSelect" style="width: 100%;">
                        	<option value="">Select Institute Type First</option>
                        </select>
                        <p id='eiei'></p>
                        <!--<input type="text" name="collage_id" value="" size="32" />-->
                        
                    </div>
                  </div>
                 
                </div>              
                                     
                             <!-- Used some part of the code from Chris Wright (http://codepen.io/chriswrightdesign/)'s Pen  -->
                             
                  <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->
          <!--<input type="hidden" name="MM_insert" value="form3" />-->         
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger"> Educational Background</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <p></p>
                      	<div class="w3-row-padding w3-center w3-margin-top">
                          <div class="w3-third">
                            <div>      
                            	
                                <input type="hidden" name="bg_id" value="" size="32" />
                                <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" /> 
                                <div align="left">
                                </div>
                                <div align="left">
                                <label for=""> Duration : </label>                      	
                                </div> <table><tr>
                                <td><input type="text" name="bg_durationS" value="" size="32" /></td>
 								<td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="bg_durationE" value="" size="32" /></td></tr></table>
                                
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                 
                                <div align="left">
                                <label for="bg_degree"> Degree : </label>                      	
                                </div> 
                                <input type="text" name="bg_degree" value="" size="32" placeholder="Senior High School"/>
                                <div align="left">
                                <label for="bg_major"> Major : </label>                      	
                                </div> 
                                <input type="text" name="bg_major" value="" size="32" placeholder="Science-mathematics"/>
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">                      
                                </div>   
                                <div align="left">
                                <label for="bg_institute_name"> Institute Name : </label>                      	
                                </div> 
                                <input type="text" name="bg_institute_name" value="" size="32" placeholder="Chumpholphonphisai School"/>
                                <div align="left">
                                <label for="bg_gpax"> GPAX : </label>                      	
                                </div> 
                                <input type="text" name="bg_gpax" value="" size="32" placeholder="4.01"/>   
                            </div>
                          </div>
                        </div>
                        
                        
                            
                      </dd>
                      <!--end accordion tab 1 -->
                      
                    </dl>
                    <!-- end description list -->
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->

<!--test
                            <input type="text" name="email" placeholder="First Name" />
                             <input type="text" name="email" placeholder="Last Name" />
                             <input type="text" name="email" placeholder="Email" />
                             
test-->
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Other Information</h2>
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTagiii" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTagiii" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>
                            
                             <!-- Used some part of the code from Chris Wright (http://codepen.io/chriswrightdesign/)'s Pen  -->
                  <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->                             
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 1</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <p></p>
                            <div class="field_wrapper w3-row-padding w3-center w3-margin-top">
                          <div class="w3-row">
                            <div class="w3-col s3 w3-container">      
                            	<input type="hidden" name="wex_id" value="" size="32" />
                                <input type="hidden" name="student_info_s_id" value="" size="32" />
                                <div align="left">
                                <label for=""> Duration : </label>
                                </div>
                                <table><tr>
                                <td><input type="text" name="wex_dateS" value="" size="32" /></td>
 								<td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="wex_dateE" value="" size="32" /></td></tr></table>
                                
                                    	<input type="text" name="field_name[]" value=""/>
        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus-square"></i></a>
                                
                            </div>
                            <div class="w3-col s9 w3-container">                  
          						
                                <div align="left">
                                <label for=""> Organization/Company : </label>                     	
                                </div> 
                                <input type="text" name="wex_organ" value="" size="32" /> 
                                
                                <div align="left">  
                                <label for=""> Detail of Duty/Position : </label>                    
                                </div> 
                                <textarea type="text" name="wex_detail" value="" size="32"></textarea>
                                <div align="right">
    							<a href="javascript:void(0);" class="add_button" title="Add field">Add more&nbsp;&nbsp;<i class="fa fa-plus-square "></i></a>
                                </div>
                            </div>
                          </div>
                          <!--<div class="w3-row">
                            <div class="w3-col s9">                 
          						
                                <div align="left">
                                <label for=""> Organization/Company : </label>                     	
                                </div> 
                                <input type="text" name="wex_organ" value="" size="32" /> 
                                
                                
                                
                            </div>
                          </div>  -->        
                          <!--<div class="w3-third">
                            <div >                                                
                                <div align="left">  
                                <label for=""> Detail of Duty/Position : </label>                    
                                </div> 
                                <table><tr> 
                                <td><input type="text" name="wex_detail" value="" size="32" /></td>
                                <td ><a ><i class="fa fa-plus-square fa-4x"></i></a></td> 
                                	<a class="btn btn-danger" href="#" ><i class="fa fa-plus-square fa-3x"></i>Pluss</a></td>
                                <td></td>   
                                </tr></table>    
                            </div>
                          </div>-->
                        </div>
                      </dd>
                      <!--end accordion tab 1 -->

                      <dt>
                          <!-- accordion tab 2 -->
                            <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 2</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">**************************************************************************</p>    
                        </div>
                      </dd>
                      <!-- end accordion tab 2 -->

                      <dt>
                          <!-- accordion tab 3 - Payment Info -->
                            <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 3</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@</p>
                        </div>
                      </dd>
                      <!-- end accordion tab 3 -->

                    </dl>
                    <!-- end description list -->
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->

<!--test
                            <input type="text" name="email" placeholder="First Name" />
                             <input type="text" name="email" placeholder="Last Name" />
                             <input type="text" name="email" placeholder="Email" />
                             
test-->
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
              </fieldset>
              
              
              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Eiei</h2>
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTagiv" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTagiv" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>
                 <div class="w3-row-padding w3-center w3-margin-top">
                 	<div class="w3-col s6" >
                    
                     <div clall="w3-col">
                      <div class="w3-panel w3-light-grey" id="demo">         
                       <table style="width: 100%;">   
                       	<p>&nbsp;</p>
                        <tr>
                         <td><input type="hidden" name="application_id" value="" size="32" />
                           <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" /></td>
                         <td><input type="hidden" name="application_name" value="" size="32" id="outputFullnameii" readonly/></td>
                        </tr>
                        <tr>
                         <td nowrap="nowrap" align="left">Starting Date </td>
                         <td><input name="application_dateS" type="text"  placeholder="trigger calendar" id="dt"/></td>
                        </tr>
                       <tr>
                        <td nowrap="nowrap" align="left">Ending Date </td>
                        <td><input type="text" name="application_dateE" value="" size="32" id="dtii" placeholder="trigger calendar"/></td>
                       </tr>
                       <tr>
                        <td><p>&nbsp;</p></td>
                       </tr>  
                      </table>                                           
                    </div>
                   </div>
                   
                   <div class="w3-col">
                    <div class="w3-panel w3-light-grey">  
                       <table style="width: 100%;">  
                       <p>&nbsp;</p>     
                        <tr valign="baseline">
                          <td><input type="hidden" name="other_name" value="" size="32" id="outputFullnamevii" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Other Documents</td>
                          <td><input type="file" name="other_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                      </table>   
                    </div>
                   </div>          
                   
               </div>

               <div class="w3-col s6">
                    <div class="w3-panel w3-light-grey">                              
                       <table style="width: 100%;">
                       <p>&nbsp;</p>
                        <tr valign="baseline">
                          <td><input type="hidden" name="resume_name" value="" size="32" id="outputFullnameiv" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Resume</td>
                          <td><input type="file" name="resume_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                        

                        <tr valign="baseline">
                          <td><input type="hidden" name="video_name" value="" size="32" id="outputFullnameiii" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Video</td>
                          <td><input type="file" name="video_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
              
                        <tr valign="baseline">
                          <td><input type="hidden" name="transcript_name" value="" size="32" id="outputFullnamev" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Transcript : </td>
                          <td><input type="file" name="transcript_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                        
                        <tr valign="baseline">
                          <td><input type="hidden" name="visa_name" value="" size="32" id="outputFullnamevi" readonly /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Visa : </td>
                          <td><input type="file" name="visa_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                       </table>  
                    </div>
               </div> 
                              
              </div>          	  
                    
                    
                           
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="action-button" value="Submit" />
                    <input type="hidden" name="MM_insert" class="submit action-button" value="msform" />
              </fieldset>
                    <input type="hidden" name="MM_insert" value="form1" />
                    

            </form>    



