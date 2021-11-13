<?php include 'header.php';

$progress='<img class="img-responsive" src="'.base_url('assets/images/200.gif').'" style="margin: auto;" />';
?>
<div class="container" style="margin-bottom: 30px;">

<h1 class="title">Cek Status Booking</h1>

<div class="row" >
<div class="container">
<!-- form -->
<?php $this->load->view('fm'); ?>
 <form class="form-horizontal">

  <div class="form-group">
    <label class="control-label col-sm-2">ID Booking</label>
    <div class="col-sm-10">
      <input type="text" name="id_books" class="form-input" id="idb" placeholder="Enter ID Booking">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >ID Costumer</label>
    <div class="col-sm-10">
      <input type="text" name="no_id" class="form-input" id="noid" placeholder="Enter ID Costumer">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">

      <button type="button" data-target="#modal" data-toggle="modal" class="btn btn-new" id="check" style="float: left;">Check Status</button>
    </div>
  </div>
</form>
</div>
</div>

<!-- form -->


</div>


<script type="text/javascript">
  $(document).ready(function(){

    function search(){

                      var idb=$("#idb").val();
                      var noid=$("#noid").val();

                      
                        $("#result").html('<?php echo $progress ?>');
                         $.ajax({
                            type:"post",
                            url:"<?php echo base_url('cekbook/find') ?>",
                            data:"idb="+idb+'&no_id='+noid,
                            success:function(data){
                              $("#result").html(data);
                              // $("#idb").val("");
                              // $("#noid").val("");  
                             }
                          });
                      
                      console.log();
                      

                     
                 }

    $("#check").click(function(){
      search();
    })


  })
</script>

<?php  include 'footer.php'; ?>
<?php $this->load->view('umum/modalcekbook'); ?>