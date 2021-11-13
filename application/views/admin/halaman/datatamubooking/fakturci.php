<?php $profil=$this->model->profil()->row_array(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faktur Check In</title>
    <style>
        body{
            margin:auto;
            width: 900px;
        }
        header{

        }
        table{
            border-collapse: collapse;
            text-transform: capitalize;

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
        <td><img src="<?php echo base_url('assets/img/'.$profil['logo'])?>" width="150" height="150"></td>
        <td width="100%" align="center">
            <h1 align="center">Faktur Check In</h1>
            <span style="font-weight: bolder;">PT. Carita Krakatau International</span><br>
            Jl. Raya Carita Labuan Km 9 Kab. Pandeglang, Banten Indonesia<br/>
            Telp/Fax: (0253) 802307, 802308
        </td>
    </tr>
</table>

    
</header><hr/>
<div align="center">
<div class="rata">
<table>
    <tr>
        <td >ID Booking</td>
        <td >:</td>
        <td width="100"><?php echo $id_books ?></td>
    </tr>
    <tr>
        <td>Kode Tamu</td>
        <td>:</td>
        <td><?php echo $kode_tamu ?></td>
    </tr>
    <tr>
        <td>Nama Tamu</td>
        <td>:</td>
        <td><?php echo ucfirst(strtolower($nama_tamu)) ?></td>
    </tr>
</table>

</div>
<div class="rata">
<table>
    <tr>
        <td >Kode Rooms</td>
        <td >:</td>
        <td width="100"><?php echo $kode_rooms; ?></td>

    </tr>
    <tr>
        <td>Jumlah Kamar</td>
        <td>:</td>
        <td><?php echo $jml_kamar; ?></td>
    </tr>
    <tr>
        <td>Lantai</td>
        <td>:</td>
        <td><?php echo $lantai; ?></td>
    </tr>
    <tr>
        <td>Harga Sewa</td>
        <td>:</td>
        <td><?php echo number_format($hargasewa+$nominal); ?></td>
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
        <td>Tipe Booking</td>
        <td>:</td>
        <td><?php echo $tipe; ?></td>
    </tr>
    <tr>
        <td>Lama</td>
        <td>:</td>
        <?php $lama = ((abs(strtotime($tgl_keluar)-strtotime($tgl_masuk)))/(60*60*24)); ?>
        <td><?php echo $lama ?> Hari</td>
    </tr>   
    <tr>
        <td>Total Sewa Rooms</td>
        <td>:</td>
        <td><?php echo number_format($lama*($hargasewa+$nominal)) ?></td>
    </tr>


</table> 
</div>  
</div> 

<hr/>
<div class="tgl">
    <p>Dicetak Tanggal <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y').' Pukul '.date('H:i:s');?></p>


</div>
</body>
</html>