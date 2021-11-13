
<?php $profil=$this->model->profil()->row_array(); ?>
<footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4><?php echo $profil['company_name'] ?></h4>
                    <p><?php echo $profil['address'] ?><br>
                       Telp/Fax: <?php echo $profil['telp'] ?>, <?php echo $profil['fax'] ?></p>
                </div>              
                 
                 <div class="col-sm-3">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li class="active"><a href="<?php echo site_url('') ?>">Home</a></li>
                        <li><a href="<?php echo site_url('rnt') ?>">Rooms & Tariff</a></li>
                        <li><a href="<?php echo site_url('contact') ?>">Contact</a></li>
                    </ul>
                </div>
                 <div class="col-sm-4 subscribe">
                    
                    <div class="social">
                    <a href="#"><i class="fa fa-facebook-square" data-toggle="tooltip" data-placement="top" data-original-title="facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"  data-toggle="tooltip" data-placement="top" data-original-title="instragram"></i></a>
                    <a href="#"><i class="fa fa-twitter-square" data-toggle="tooltip" data-placement="top" data-original-title="twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest-square" data-toggle="tooltip" data-placement="top" data-original-title="pinterest"></i></a>
                    <a href="#"><i class="fa fa-tumblr-square" data-toggle="tooltip" data-placement="top" data-original-title="tumblr"></i></a>
                    <a href="#"><i class="fa fa-youtube-square" data-toggle="tooltip" data-placement="top" data-original-title="youtube"></i></a>
                    </div>
                    <div>
                        <div id="google_translate_element"></div><script>
                            function googleTranslateElementInit() {
                              new google.translate.TranslateElement({
                                pageLanguage: 'id',
                                multilanguagePage: true,
                                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                              }, 'google_translate_element');
                            }
                            </script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                    </div>

                </div>

            </div>
            <!--/.row--> 
        </div>
        <!--/.container-->    
    
    <!--/.footer-bottom--> 
</footer>

<div class="text-center copyright">&copy;2017 By Muhammad Fadly</div>

<a href="#home" class="toTop scroll"><i class="fa fa-angle-up"></i></a>




<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>





<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.responsive.js');?>"></script>

<!-- <script src="<?php echo base_url()?>assets/wizzard/js/jquery-1.11.1.min.js"></script> -->

<script src="<?php echo base_url()?>assets/wizzard/js/jquery.backstretch.min.js"></script>
<!-- <script src="<?php echo base_url()?>assets/wizzard/s/retina-1.1.0.min.js"></script> -->
<script src="<?php echo base_url()?>assets/wizzard/js/scripts.js"></script>

<!-- wow script -->

<script src="<?php echo base_url()?>assets/umum/assets/wow/wow.min.js"></script>

<!-- uniform -->
<script src="<?php echo base_url()?>assets/umum/assets/uniform/js/jquery.uniform.js"></script>


<!-- boostrap -->
<script src="<?php echo base_url()?>assets/umum/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="<?php echo base_url()?>assets/umum/assets/mobile/touchSwipe.min.js"></script>

<!-- jquery mobile -->
<script src="<?php echo base_url()?>assets/umum/assets/respond/respond.js"></script>

<!-- gallery -->
<script src="<?php echo base_url()?>assets/umum/assets/gallery/jquery.blueimp-gallery.min.js"></script>


<!-- custom script -->
<script src="<?php echo base_url()?>assets/umum/assets/script.js"></script>
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>















</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        
        $('.nav a[href~="' + location.href + '"]').parents('li').addClass('active');
    
        $('#table').DataTable({
            responsive: true,
            paging: true,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control" style="width: 100%" name=""><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });
        $('#tbl').DataTable({
            "iDisplayLength": 3,
            "lengthChange": false
        });
    });
        $(function(){
        $('#pesan-flash').delay(4000).fadeOut();
        $('#pesan-error-flash').delay(5000).fadeOut();
    });
    $('[data-toggle="tooltip"]').tooltip();
</script>
<!-- iCheck -->





