<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faktur Check Out Pelanggan</title>
    <style>
        body{
            margin:auto;
            width: 900px;
        }
        header{

        }
        table{
            border-collapse: collapse;

        }
        
        h2{
            text-align: center;
        }
        table thead tr th{
            background: #e1e1e1;
        }
        table th{
            padding: 5px;
            font-size: 12pt;
        }
        table td{
            padding: 3px 5px;
            font-size: 11pt;
        }
        .tgl{
            float: right;
        }
        .rata{
            display:inline-grid;
        }
        div{
            margin: 10px;
        }
    </style>
</head>
<body onload="window.print()" >
<header>
<table border="0">
    <tr>
        <td><img src="<?php echo base_url()?>assets/img/logo.png"></td>
        <td width="100%" align="center">
            <h1 align="center">Faktur Check Out Tamu</h1>
            Jln. Jendral Sudirman, Ds. Tarogong Kec. Pagelaran Kab. Pandeglang<br/>
            Kode Pos: 42264 
        </td>
    </tr>
</table>

    
</header><hr/>
<div align="center">
<div class="rata">
<table>
    <tr>
        <td >Kode Sewa</td>
        <td >:</td>
        <td width="100"><?php echo $kode_sewa ?></td>
    </tr>
    <tr>
        <td>Kode Tamu</td>
        <td>:</td>
        <td><?php echo $kode_tamu ?></td>
    </tr>
    <tr>
        <td>Nama Tamu</td>
        <td>:</td>
        <td><?php echo $nama_tamu ?></td>
    </tr>
</table>

</div>
<div class="rata">
<table>
    <tr>
        <td >Kode Cottage</td>
        <td >:</td>
        <td width="100"><?php echo $kode_cottage; ?></td>
    </tr>
    <tr>
        <td>Nama Cottage</td>
        <td>:</td>
        <td><?php echo $nama_cottage; ?></td>
    </tr>
    <tr>
        <td>Harga Sewa</td>
        <td>:</td>
        <td><?php echo $hargasewa; ?></td>
    </tr>
    
</table>
</div>

<div class="rata">
<table >
    <tr>
        <td>Tanggal Check In</td>
        <td >:</td>
        <td width="100"><?php echo $tgl_masuk; ?></td>
    </tr>
    <tr>
        <td>Tanggal Check Out</td>
        <td>:</td>
        <td><?php echo $tgl_keluar; ?></td>
    </tr>
    <tr>
        <td>Lama</td>
        <td>:</td>
        <?php $lama = ((abs(strtotime($tgl_keluar)-strtotime($tgl_masuk)))/(60*60*24)); ?>
        <td><?php echo $lama ?></td>
    </tr>      

</table> 
</div>  
</div> 
<table border="1" align="center" width="100%">
    <thead>

    <tr>
        <th>No. </th>
        <th>Nama Fasilitas</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th >Total</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($fakturci as $data) { ?>
        <tr>
            <td align="center"><?php echo $i; ?></td>
            <td align="center"><?php echo $data['nama_fasilitas']; ?></td>
            <td align="right"><?php echo $data['harga']; ?></td>
            <td align="center"><?php echo $data['qty']; ?></td>
            <td align="right"><?php echo $data['harga']*$data['qty']; ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" align="center" >Total Harga Fasilitas</td>
            <td align="right">teuuiinnn</td>
        </tr>
        <tr>
        <td colspan="4" align="center">Total Harga Check In</td>
        <td  align="right"><?php echo $lama*$hargasewa; ?></td>
        </tr>
        <tr>
            <td colspan="4" align="center">Yang Telah Dibayar</td>
            <td  align="right"><?php echo $bayar; ?></td>
        </tr>
        <?php
            $lunas= ($lama*$hargasewa)-$bayar;
            ?>
        <tr>
            <td colspan="4" align="center">Sisa yang harus Dibayar</td>
            <td  align="right"><?php echo $lunas; ?></td>
        </tr>
    </tfoot>
</table>

<div class="tgl">
    <p>Dicetak Tanggal <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y').' Pukul '.date('H:i:s');?></p>


</div>
</body>
</html>