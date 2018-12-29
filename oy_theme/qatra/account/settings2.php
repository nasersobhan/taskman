<?php get_header();  ?>
<?php  ob_start();?>




$(function(){
			cascadeForm = $('.form-horizontal');
			cat_parent = cascadeForm.find('#inf_hcountry');
			cat_child = cascadeForm.find('#inf_hcity');
			 
			cascadeCity(cat_parent, cat_child);
		
        	cat_parentc = cascadeForm.find('#inf_ccountry');
			cat_childc = cascadeForm.find('#inf_ccity');
			 
			cascadeCity(cat_parentc, cat_childc);

          
        
           
        $('#inf_dob').pikaday({ 
          firstDay: 1,
        minDate: new Date('<?php echo date('Y-m-').(date('d')+1) ?>'),
        maxDate: new Date('<?php echo (date('Y')+1).'-12-31' ?>'),
        yearRange: [2014,2016], format: 'YYYY-MM-DD'
          
          
           });

   
           
		});

var options = {
    backdrop : false
}
$(window).on('popstate', function() {
    $(".modal-backdrop").remove();
});



$(function(){
$('#avatar-modal').appendTo("body").modal('show');
   $('#avatar-modal').modal(options);   $(".modal-backdrop").remove();
});


<?php 
$contents = ob_get_contents();
ob_end_clean();
addlinejs($contents);?>



<div class="row">
    <div class="col-md-9">

        
     
        
        
        <div class="row">
            <div class="col-md-4" style="margin:0; padding: 1;">
                
                
                <div class="nav nav-tabs" id="tabsx" role="tablist">
  <a  href="#home" aria-controls="home" role="tab" data-toggle="tab" class="list-group-item tab-pane"> Change Passssword  </a>
  <a  href="#email" aria-controls="email" role="tab" data-toggle="tab" class="list-group-item tab-pane">Change Email</a>
 <a  href="#info" aria-controls="info" role="tab" data-toggle="tab" class="list-group-item tab-pane">User Info</a>
 <!--  <a  href="#sec" aria-controls="sec" role="tab" data-toggle="tab" class="list-group-item tab-pane">Security</a>-->
  <a  href="#history" aria-controls="history" role="tab" data-toggle="tab" class="list-group-item tab-pane">Access History</a>
</div>
                
                
      
        
                
            </div>
            <div class="col-md-8" style="margin:0; padding: 0;">
                
                
                
        
        
        <div class="panel panel-default" >
    
   

 
        

   
  <div class="panel-body">                
 

      
      
      
        <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        
        
         <div class="page-header ">
						<h3>
                                                  Change Password
						</h3>
					</div>
        
        
    
<form class="form-horizontal" ajaxform  action="<?php echo get_link('account','pwd','change') ?>" name="chng_pass" id="chng_pass" method="post" role="form" >

   <div class="form-group">
     <?php get_message() ?>
    
  </div>
  
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Current Password: </label>
    <div class="col-sm-7">
        <input type="password" class="form-control" required id="inputEmail3" name="oldpass">
    </div>
  </div>
 
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">New Password: </label>
    <div class="col-sm-7">
        <input type="password" class="form-control" required id="inputEmail3" name="newpass">
    </div>
  </div>
 
     <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Retype New Password: </label>
    <div class="col-sm-7">
        <input type="password" class="form-control" required id="inputEmail3" name="renewpass">
    </div>
  </div>
 
       
  
   <div class="form-group">
    
    <div class="col-sm-12 col-md-offset-4">
    		<button type="submit" id="submit_btn" class="btn btn-success">Save changes</button>&nbsp; &nbsp; &nbsp;
        
       </div>
  </div>
</form>


 </div>
            
    <div role="tabpanel" class="tab-pane" id="email">
       <div class="page-header "><h3>Email Accounts</h3></div>

    
    <form class="form-horizontal" ajaxform  action="<?php echo get_link('account','eml','change') ?>" name="chng_email" id="chng_email" method="post" role="form" >

   <div class="form-group">
     <?php get_message() ?>
    
  </div>
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">New Email: </label>
    <div class="col-sm-7">
        <input type="email" class="form-control" required id="inputEmail3" name="neweml">
    </div>
  </div>
 
     <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Retype New Email: </label>
    <div class="col-sm-7">
        <input type="email" class="form-control" required id="inputEmail3" name="reneweml">
    </div>
  </div>
 
        
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Current Password: </label>
    <div class="col-sm-7">
        <input type="password" class="form-control" required id="inputEmail3" name="oldpass">
    </div>
  </div>
 

       
  
   <div class="form-group">
    
    <div class="col-sm-12 col-md-offset-4">
    		<button type="submit" id="submit_btn" class="btn btn-success">Save changes</button>&nbsp; &nbsp; &nbsp;
        
       </div>
  </div>
</form>
    
    
    
    </div>
    <div role="tabpanel" class="tab-pane" id="info">
    
    
    
    
    
     <form class="form-horizontal" ajaxform  action="<?php echo get_link('account','info','change') ?>" name="chng_info" id="chng_info" method="post" role="form" >

   <div class="form-group">
     <?php get_message() ?>
    
  </div>
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">My Name: </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" value="<?php echo user_info('name') ?>" required id="inputEmail3" name="myname">
    </div>
  </div>
 
     <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">My Phone/Mobile: </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" value="<?php echo user_info('phone') ?>" required id="inputEmail3" name="myphone">
    </div>
  </div>
 
        


       
  
   <div class="form-group">
    
    <div class="col-sm-12 col-md-offset-4">
    		<button type="submit" id="submit_btn" class="btn btn-success">Save changes</button>&nbsp; &nbsp; &nbsp;
        
       </div>
  </div>
</form>
    
    
    
    
    
    
    
    
    </div>
    <div role="tabpanel" class="tab-pane" id="sec">sec</div>
     <div role="tabpanel" class="tab-pane" id="history">
      
         <div class="page-header "><h3>Access History</h3></div>
        
     
     
         <table class="table table-condensed">
             <tr>
             <td> TYPE </td>
             <td> Time(Server time) </td>
             <td> OS </td>
             <td> Browser </td>
             <td> IP </td>
             </tr>
          <?php 
                
                
                     $tbl_pre = TBL_PIX; $uid = user_uid();
             get_rows("SELECT * FROM {$tbl_pre}historyuser_oy WHERE his_uid={$uid}  order by his_id DESC LIMIT 20");
              if(posts_av()) {while(posts_av()) :get_record();
              
                ?>
             
             
             <tr class="<?php if(get_his_pass()=='loggedin') echo 'success'; else echo 'info'; ?>">
              <td> <?php his_pass() ?> </td>
             <td> <?php his_time() ?> </td>
             <td>  <?php his_ossystem() ?> </td>
             <td> <?php his_browser() ?> </td>
             <td> <?php his_ip() ?> </td>
             </tr>
             
          
                <?php
              endwhile; }
              end_rows();
             
                
                 ?> 
     
     </table>
     </div>
  </div>


  


  
   </div>   </div>  
                
                
                
                
                
            </div>  
            
            
            
            
        </div>
        
        
        
        
        
        
    
    
    
    
    
    
    
    
    </div>
  
      
      
      
      
 
    


    
    




  <div class="col-md-3">
<?php get_sidebar(); ?>
        </div>
     


<?php get_footer() ?>










