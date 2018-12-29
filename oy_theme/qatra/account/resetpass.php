<?php headers() ?>
<title> Password Forgot | <?php echo PAGETITLE ?></title>
<div class="tab-content profile-tab-content" style="padding-top:40px;" ><div class="tab-pane fade active in" id="jobs">

                                 <form ajaxform action="<?php echo HOME ?>/?user=recoverpassword" method="post"  id="recoverpassword">
<table class="jobs_TBL table">

 <tr >
<td colspan="2"><span class="style6"><strong>    <h1> &nbsp;&nbsp Password Recovery Request
</h1></strong></span></td>
</tr>
                  
<tr  class="blue_head">
<td   colspan="2">

Recovery your password

</td>
</tr>

<tr>
<td class="w300">Email Login: </td>

<td ><input type="text" id="email" requireds name="email" class="validate"  /> </td>

</tr>


<tr>
<td >Acount type: </td>

<td >

<select name="type">
<option value="1"> Employer </option>
<option value="2"> Job Seeker </option>
</select>




</td>

</tr>



<tr>

<td>Action:</td>

<td >
<button type="submit" class="btn btn-default">Submit Form</button>
<span id="result_mess" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp;
				</span>

  </td>



</tr>



<tr>



<td colspan="2" >
<?Php ads(); ?>

  </td>



</tr>


</table>

</form>


    </td>
    <?php showsidebar() ?>
  </tr>

<?php footer() ?>