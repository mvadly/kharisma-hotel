<div class="page-header">
    <h2>Data Villa</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
            <div id="widget1" class="panel-body collapse in">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th width="25%">Kode Villa</th>
                                <td width="3%">:</td>
                                <td><?php echo $kode_villa;?></td>
                            </tr>
                            <tr>
                                <th>Jenis Villa</th>
                                <td>:</td>
                                <td><?php echo $jenis_villa;?></td>
                            </tr>
                            <tr>
                                <th>Harga Sewa</th>
                                <td>:</td>
                                <td><?php echo $hargasewa;?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td><?php echo $status;?></td>
                            </tr>

                        </table>
                        
                    </div>
                </div>
                <button class="btn btn-default" onclick="history.back()"><span class="glyphicon glyphicon-step-backward"></span> Kembali</button>
            </div>
        </div>
    </div>
</div>