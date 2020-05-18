<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\sumbang;
class JenisController
{
    public function index()
    {
        $hasil = sumbang::getName();
        $data = sumbang::getSumbangan();
        View::render("home/rekap.html", [
            'judul' => 'List Sumbangan COVID-19',
            'jenis' => $hasil,
            'data' => $data,
            'nav' => FALSE,
            'name' => 'all'
        ]);

    }
    public function filter($params)
    {

        if(!$params[0]) return;
        $id = $params[0];
        $hasil = sumbang::getName();
        $data = sumbang::getFilterSumbangan($id);
        View::render("home/rekap.html", [
            'judul' => 'List Sumbangan ' . $id . ' COVID-19',
            'jenis' => $hasil,
            'data' => $data,
            'nav' => FALSE,
            'name' => $id
        ]);

    }
}