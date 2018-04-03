<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>SIMPLE CRUD APPLICATION</title>



</head>

<body>

<div>



<div class="paging"><?php echo $pagination; ?></div>

<div class="data"><?php echo $table; ?></div>

<div class="paging"><?php echo $pagination; ?></div>

<br />

<?php echo anchor('Student/add/','Add new students',array('class'=>'add')); ?>

</div>

<!-- ============================countrysate================= -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="form-group">
    <label class="sr-only" for="form-address2">Country</label>                                              
    <select name="country_details" class="form-control countries" id="country_details" >
          <option value="" selected="selected" >Select Country</option>
           <?php foreach($cou as $count): ?>
            <option value="<?php echo $count->cid; ?>"><?php echo $count->cname; ?></option>
            <?php endforeach; ?> 
    </select>
</div>
<div class="form-group">
    <label class="sr-only" for="form-address2">State</label>
    <select name="select_state" class="form-control countries" id="old_state">
           <option selected="selected">Select State</option>
    </select>
</div>


<script type="text/javascript">
    $(document).ready(function()
    {
        $('#country_details').on('change',function(){

            country_details=$(this).val();

              //alert(country_details);
             if(country_details=='')
             {
                 $('#old_state').prop('disabled',true);
             }
             else
             {
                 $('#old_state').prop('disabled',false);
                 $.ajax({
                      type: "POST",
                      url: "<?php echo base_url();?>welcome/ajaxa",
                     data: {'country_details':country_details},
                     dataType:'json',
                      success: function(data){
                 $('#old_state').html(data);
            },
          error:function(){
              alert('ok ofdaf');  
          }
});
            

         }
         });
     });

</script>


<input type="radio" name="type" value="Married">Married
<input type="radio" name="type" value="UnMarried">UnMarried

<div id="textboxes" style="display: none">
    Marriage date: <input type="text"/> 
    
    
</div>


<script type="text/javascript">
  $(function() {
    $('input[name="type"]').on('click', function() {
        if ($(this).val() == 'Married') {
            $('#textboxes').show();
        }
        else {
            $('#textboxes').hide();
        }
    });
});
</script>




</body>

</html>