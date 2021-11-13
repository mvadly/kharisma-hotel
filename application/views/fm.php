<?php
$data=$this->session->flashdata('error');
if($data!=""){ ?>
    <div id="pesan-flash">
        <div class='alert alert-danger alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong> Error! </strong> <?=$data;?>
        </div>
    </div>
<?php } ?>
<?php
$data2=$this->session->flashdata('sukses');
if($data2!=""){ ?>
    <div id="pesan-error-flash">
        <div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong> Succes! </strong> <?=$data2;?>
        </div>
    </div>
<?php } ?>
<?php
$data3=$this->session->flashdata('warning');
if($data3!=""){ ?>
    <div id="pesan-error-flash">
        <div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong> Warning! </strong> <?=$data3;?>
        </div>
    </div>
<?php } ?>