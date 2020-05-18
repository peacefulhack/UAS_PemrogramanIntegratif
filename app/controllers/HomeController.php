<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\sumbang;

class HomeController {
    public function index()
    {
        $hasil = sumbang::getName();
        View::render("home/index.html", [
            'judul' => 'Sumbangan COVID-19',
            'jenis' => $hasil,
            'nav' => TRUE
        ]);

    }
    public function tambah()
    {   $pesan = "";
        $jsumbang = $_POST['jenisSumbangan'];
        $jumlah = $_POST['jumlah'];
        if(!isset($_POST['submit'])) return;
        //INI TERAKHIR
        
        
        foreach($jumlah as $jm){
            if($jm == "" || $jm == 0 ) $pesan = "Tolong isi Jumlah Sumbangan anda";
        }
        //INI PERTAMA
        foreach($jsumbang as $js){
            if($js == "") $pesan = "Tolong Jenis Sumbangan anda";
        }
        if($_POST['name'] == "") $pesan = "Tolong isi nama anda";
        if($pesan != ""){
            $hasil = sumbang::getName();
            View::render("home/index.html", [
            'judul' => 'Sumbangan COVID-19',
            'jenis' => $hasil,
            'alert' => $pesan
        ]);
        return;
        }
        $userid = sumbang::setUser( $_POST['name'], $_POST['gender'] );

        $iter = 0;
        
        foreach($jsumbang as $js){
            $jsid = sumbang::isThere($js);
            if( $jsid >= 1){
                $done = sumbang::setSumbangan($userid,$jsid,$jumlah[$iter]);
            }
            else{
                $jsid = sumbang::setJS($js);
                $done = sumbang::setSumbangan($userid, $jsid[0], $jumlah[$iter]);
            }
            $iter++;
        }
        $hasil = sumbang::getName();
        View::render("home/index.html", [
            'judul' => 'Sumbangan COVID-19',
            'jenis' => $hasil,
            'pesan' => 'Data berhasil di masukkan!',
            'nav' => TRUE
        ]);

    }
}