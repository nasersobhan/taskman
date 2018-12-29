<?php get_header(); ?>
<div class="row">
    <div class="col-md-9">
 
        
        <div class="panel panel-default">
            <div class="panel-body">
        <div class="page-header ">
						<h1>
                                                 Update Profile
						</h1>
					</div>
                    
                    
           
     <?php if(have_post()) { while(have_post()) : the_post();   ?>

  
 

     
     <form ID="POST" action="<?php echo get_link('account','user','profile'); ?>" ajaxform >



<table   class="jobs_TBL table">
         





<tr class="blue_head">
<td  colspan="2">
General Informations
</td>
</tr>

<tr>
<td style="">Full name: </td>
<td style=""><input type="text" id="inf_name" value="<?php inf_name() ?>"  name="inf_name" /> <input type="text" id="inf_sname" value="<?php inf_sname() ?>"  name="inf_sname" /></td>
</tr>

<tr>
<td style="">Gender: </td>
<td style=""><select id="sex" name="sex">
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</td>
</tr>


<tr>
<td style="">Date of Birth: </td>
<td style=""><input type="date" id="dob" value="<?php inf_dob() ?>" name="dob"  />
</td>
</tr>

<tr>
<td style="">Home town: </td>
<td style=""><input type="text" id="pob" value="<?php echo POB ?>" name="pob" class="validate[required]"  />
</td>
</tr>


<tr>
<td style="">Current Location: </td>
<td style=""></td>
</tr>





<tr class="blue_head">
<td  colspan="2">
Education And Field
</td>
</tr>



<tr>
<td style="">Functional Area: </td>
<td style=""></td>
</tr>

<tr>
<td style="">Degree: </td>
<td style="">
<select id="deg" name="deg">
<option value="High School">High School</option>
<option value="Diploma">Diploma</option>
<option value="Bachelor">Bachelor</option>
<option value="Master">Master</option>
<option value="Ph.D">Ph.D</option>
</select>


 </td>
</tr>


<tr>
<td style="">Key Skills: </td>
<td style=""><input type="text" id="logo"  value="<?php echo KEY ?>"  name="key"   /> </td>
</tr>



<tr class="blue_head">
<td  colspan="2">
Work
</td>
</tr>



<tr>
<td style="">Functional Area: </td>
<td style=""></td>
</tr>

<tr>
<td style="">Degree: </td>
<td style="">
<select id="deg" name="deg">
<option value="High School">High School</option>
<option value="Diploma">Diploma</option>
<option value="Bachelor">Bachelor</option>
<option value="Master">Master</option>
<option value="Ph.D">Ph.D</option>
</select>


 </td>
</tr>


<tr>
<td style="">Key Skills: </td>
<td style=""><input type="text" id="logo"  value="<?php echo KEY ?>"  name="key"   /> </td>
</tr>



<tr class="blue_head">
<td  colspan="2">
Contact Information
</td>
</tr>


<tr>
<td style="">Alternate Email: </td>
<td style=""><input type="text" id="email" value="<?php echo EMAIL ?>" class="validate[required,custom[email]]"  name="email"   /> </td>
</tr>


<tr>
<td style="">Phone : </td>
<td style=""><input type="text" id="phone" value="<?php echo PHONE ?>" class="validate[required,custom[phone]]" name="phone"   /> </td>
</tr>

<tr>
<td style="">Mobile : </td>
<td style=""><input type="text" id="mobi" value="<?php echo MOBI ?>" class="validate[required,custom[phone]]" name="mobi"  /> </td>
</tr>


<tr>
<td style="">Address: </td>
<td style=""><input type="text" id="address"  name="address" value="<?php echo ADD ?>" /> </td>
</tr>

<tr>

<td style="">Action:</td>

<td style="">

<input type="submit" id="submit" style="width:100px; height:25px"  name="Send" value="Update" >
<div id="result_mess"></div>

  </td>



</tr>


</table>

</form>
    
     
   


 
      <?php endwhile; } ?> 

            </div></div></div>

  <div class="col-md-3">
<?php get_sidebar(); ?>
        </div>

 
    
      </div>  
    

<?php get_footer() ?>
