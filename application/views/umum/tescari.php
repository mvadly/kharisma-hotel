<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script>
$(document).ready(function(){
	function search(){

                      var kc=$("#kc").val();

                      if(kc!=""){
                        $("#result").html("Loading......");
                         $.ajax({
                            type:"post",
                            url:'<?php echo base_url('ketersediaan/cari') ?>',
                            data:"kc="+kc,
                            success:function(data){
                                $("#result").html(data);
                                $("#kc").val("");
                             }
                          });
                      }
                      console.log();
                      

                     
                 }

      $("#button").click(function(){
                     search();
                  });


       
        
      

    });
</script>
  </head>
  <body>
        <div id="container">
             <input type="text" id="kc" placeholder="Kode Cottage"/>
             <input type="button" id="button" value="Cari" />
             <ul id="result"></ul>
        </div>
  </body>
</html>