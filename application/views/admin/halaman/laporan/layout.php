<?php $profil=$this->model->profil()->row_array(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan <?php echo $title ?></title>
    <style>
        body{
            margin:auto;
            width: 900px;
        }
        header{

        }
        table{
            text-transform: capitalize;
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
        <td><img src="<?php echo base_url()?>assets/img/<?php echo $profil['logo'] ?>" width="150" height="150"></td>
        <td width="100%" align="center">
            <h1 align="center">Laporan <?php echo $title ?></h1>
            <span style="font-weight: bolder;"><?php echo $profil['company_name'] ?></span><br>
            <?php echo $profil['address'] ?><br/>
            Telp/Fax: <?php echo $profil['telp'] ?>, <?php echo $profil['fax'] ?>
        </td>
    </tr>
</table>
    
</header><hr/>

<?php $this->load->view($print) ?>

<div class="tgl">
    <p>Dicetak Tanggal <?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y').' Pukul '.date('H:i:s');?></p>
 

</div>
</body>
</html>