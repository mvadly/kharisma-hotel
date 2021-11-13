<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Model extends CI_Model{

    public function HapusCICO($where=''){
        return $this->db->query('truncate table data_cekin'.$where); 
    }
    public function HapusBOOK($where=''){
        return $this->db->query('truncate table bookings'.$where); 
    }
    public function KosongCT($where=''){
        return $this->db->query('update rooms set status="0" where 1'.$where); 
    }

    public function profil(){
        return $this->db->query("SELECT * FROM profil"); 
    }

    public function GetPromotion($where=''){
        return $this->db->query("SELECT * FROM promosi ".$where); 
    }

    public function GetDetailCI($where=''){
        return $this->db->query("SELECT * FROM bookings JOIN detail_f JOIN data_fasilitas ON bookings.detail_f=detail_f.id_detail_f AND data_fasilitas.id_fasilitas=detail_f.id_fasilitas ".$where); 
    }


    public function GetFakturCiKH($where=''){
        return $this->db->query('select * from data_cekin join data_tamu join data_kamar_hotel join detail_cekin join data_fasilitas on data_cekin.kode_sewa=detail_cekin.kode_sewa and detail_cekin.id_fasilitas=data_fasilitas.id_fasilitas and data_cekin.kode_tamu=data_tamu.kode_tamu and data_cekin.kode_kamar=data_kamar_hotel.kode_kamar '.$where); 
    }




    public function GetFasilitas($where = ''){
        return $this->db->query('select * from data_fasilitas '.$where);
    }


    // Model Cottage
    public function GetDataCT($where = ''){
        return $this->db->query('select * from rooms '.$where);
    }

    public function GetDataCTJ($where = ''){
        return $this->db->query('select * from rooms  '.$where);
    }
    public function GetDataGambar($where = ''){
        return $this->db->query('select * from data_gambar '.$where);
    }

    public function GetGC($where = ''){
        return $this->db->query('select * from data_gambar join rooms on data_gambar.id_gambar=rooms.id_gambar '.$where);
    }

    public function GetGF($where = ''){
        return $this->db->query('select * from data_gambar join data_fasilitas on data_gambar.id_gambar=data_fasilitas.id_gambar '.$where);
    }


    public function GetDataCICT($where = ''){
        return $this->db->query('select * from data_cekin join rooms join data_tamu on data_cekin.kode_rooms=rooms.kode_rooms and data_cekin.kode_tamu=data_tamu.kode_tamu '.$where);
    }
    public function GetDataBCT($where = ''){
        return $this->db->query('select * from bookings join rooms join data_tamu on bookings.kode_rooms=rooms.kode_rooms and bookings.kode_tamu=data_tamu.kode_tamu  '.$where);
    }
    public function GetCheckBCT($where = ''){
        return $this->db->query('select * from bookings '.$where);
    }

    public function GetTipe(){
        return $this->db->query('select * from tipe_book order by nominal asc ');
    }

    public function GetBCTJoin($where = ''){
        return $this->db->query('SELECT * from 
            bookings join data_tamu join rooms join tipe_book 
            on bookings.kode_tamu=data_tamu.kode_tamu 
            AND bookings.kode_rooms=rooms.kode_rooms 
            AND bookings.tipe=tipe_book.tipe_bayar '.$where);
    }

    public function GetSumSalesM(){
        return $this->db->query("SELECT  SUM(hargasewa*(datediff(tgl_keluar,tgl_masuk))) as total FROM bookings join rooms on bookings.kode_rooms=rooms.kode_rooms where status_ci='done' AND month(tgl_masuk)= '".date('m')."' AND year(tgl_masuk)= '".date('Y')."'");
    }
    public function GetSumSalesD(){
        return $this->db->query("SELECT  SUM(hargasewa*(datediff(tgl_keluar,tgl_masuk))) as total FROM bookings join rooms on bookings.kode_rooms=rooms.kode_rooms where status_ci='done' AND tgl_keluar= '".date('Y-m-d')."'");
    }

    public function GetTFSum(){
        return $this->db->query("SELECT SUM(qty*totalf) as total FROM 
            bookings 
            join detail_f 
            join data_fasilitas 
            on 
            bookings.detail_f = detail_f.id_detail_f 
            and 
            data_fasilitas.id_fasilitas=detail_f.id_fasilitas  
            where status_ci='done' AND month(tgl_masuk)= '".date('m')."' AND year(tgl_masuk)= '".date('Y')."'");
    }
    public function GetTFSumD(){
        return $this->db->query("SELECT SUM(qty*totalf) as total FROM 
            bookings 
            join detail_f 
            join data_fasilitas 
            on 
            bookings.detail_f = detail_f.id_detail_f 
            and 
            data_fasilitas.id_fasilitas=detail_f.id_fasilitas  
            where status_ci='done' AND tgl_keluar= '".date('Y-m-d')."'");
    }

    // Model Hotel
    public function GetDataBH($where = ''){
        return $this->db->query('select * from bookings join data_kamar_hotel join data_tamu on bookings.kode_tamu=data_tamu.kode_tamu and  data_kamar_hotel.kode_kamar=bookings.kode_kamar '.$where);
    }
    public function GetDataKH($where = ''){
        return $this->db->query('select * from data_kamar_hotel '.$where);
    }
    public function GetDataCIKH($where = ''){
        return $this->db->query('select * from data_cekin join data_kamar_hotel join data_tamu on  data_cekin.kode_tamu=data_tamu.kode_tamu and data_cekin.kode_kamar=data_kamar_hotel.kode_kamar '.$where);
    }

    public function GetTBH($where = ''){
        return $this->db->query('select * from bookings join data_tamu  join data_kamar_hotel on bookings.kode_tamu=data_tamu.kode_tamu &&  bookings.kode_kamar=data_kamar_hotel.kode_kamar '.$where);
    }





    public function GetDataCSedia($where = ''){
        return $this->db->query('select * from rooms join data_gambar on rooms.id_gambar=data_gambar.id_gambar '.$where);
    }

    //Model
    public function GetDataTamu($where = ''){
        return $this->db->query('select * from data_tamu '.$where);
    }
    public function GetDataVilla($where = ''){
        return $this->db->query('select * from data_villa  '.$where);
    }
    public function GetDataCekin($where = ''){
        return $this->db->query('select * from data_cekin '.$where);
    }
    public function GetDataTB($where = ''){
        return $this->db->query('select * from bookings '.$where);
    }
    public function GetDataVB($where = ''){
        return $this->db->query('select * from data_villa_booking '.$where);
    }
    public function GetDataCB($where = ''){
        return $this->db->query('select * from data_cekin_booking '.$where);
    }


    public function GetTBC($where = ''){
        return $this->db->query('select * from bookings join data_tamu join rooms on bookings.kode_tamu=data_tamu.kode_tamu && bookings.kode_rooms=rooms.kode_rooms '.$where);
    }



    public function GetTCnow($where = ''){
        
        $t=date('Y-m-d');
        return $this->db->query('select *, data_tamu.kode_tamu, rooms.kode_rooms from data_cekin LEFT JOIN data_tamu 
                  ON data_cekin.kode_tamu = data_tamu.kode_tamu LEFT JOIN rooms ON data_cekin.kode_rooms = rooms.kode_rooms '.$where);
    }


    public function GetTCI($where = 'status'){
        $data = $this->db->query('select * from data_cekin where '.$where.'= "Check In"');
        return $data;
    }
    public function GetTCO($where = ''){
        $data = $this->db->query('select * from data_cekout order by tgl_cekout desc'.$where);
        return $data;
    }
    public function GetVT($where = 'status'){
        $data = $this->db->query('select * from data_villa join data_gambar on data_villa.id_gambar= data_gambar.id_gambar  where '.$where.'= "kosong" order by kode_villa asc');
        return $data;
    }


    public function GetUser($where = ''){
        return $this->db->query('select * from user '.$where);
    }

    public function Simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    public function Update($table,$data,$where){
        return $this->db->update($table,$data,$where);
    }

    public function Hapus($table,$where){
        return $this->db->delete($table,$where);
    }



}
?>