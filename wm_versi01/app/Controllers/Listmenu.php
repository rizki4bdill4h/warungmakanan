<?php

namespace App\Controllers;


class listmenu extends BaseController
{
    public function menudaging()
    {
        $data = [
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'judul' => 'menudaging | warungnasi kita',
            'daging' => $this->dagingModel->getdaging()
        ];

        return view('listmenu/menudaging/index', $data);
    }
    public function detaildaging($slug)
    {
        $data = [
            'judul' => 'detail menudaging',
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'daging' => $this->dagingModel->getDaging($slug),
            'lainya' => $this->dagingModel->getdaging()
        ];
        //jika daging tidak ada di table
        if (empty($data['daging'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu daging ' . $slug . ' tidak di temukan.');
        }
        return view('listmenu/menudaging/detail', $data);
    }





    public function menuayam()
    {
        $data = [
            'judul' => 'menuayam | warungnasi kita',
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'ayam' => $this->AyamModel->getAyam()
        ];
        return view('listmenu/menuayam/index', $data);
    }
    public function detailayam($slug)
    {
        $data = [
            'judul' => 'detail menuayam',
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'ayam' => $this->AyamModel->getAyam($slug),
            'lainya' => $this->AyamModel->getAyam()
        ];
        //jika ayam tidak ada di table
        if (empty($data['ayam'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu ayam ' . $slug . ' tidak di temukan.');
        }
        return view('listmenu/menuayam/detail', $data);
    }






    public function menuikan()
    {
        $data = [
            'judul' => 'menuikan | warungnasi kita',
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'ikan' => $this->IkanModel->getIkan()
        ];
        return view('listmenu/menuikan/index', $data);
    }
    public function detailikan($slug)
    {
        $data = [
            'judul' => 'detail menuikan',
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'ikan' => $this->IkanModel->getIkan($slug),
            'lainya' => $this->IkanModel->getIkan()
        ];
        //jika ikan tidak ada di table
        if (empty($data['ikan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu ikan ' . $slug . ' tidak di temukan.');
        }
        return view('listmenu/menuikan/detail', $data);
    }


    public function menutelur()
    {
        $data = [
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'judul' => 'menutelor | warungnasi kita',
            'telur' => $this->TelurModel->getTelur()
        ];
        return view('listmenu/menutelur/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'judul' => 'detail menutelor',
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'telur' => $this->TelurModel->getTelur($slug),
            'lainya' => $this->TelurModel->getTelur()
        ];
        //jika telor tidak ada di table
        if (empty($data['telur'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu telur ' . $slug . ' tidak di temukan.');
        }
        return view('listmenu/menutelur/detail', $data);
    }


    public function menulainya()
    {
        $data = [
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'judul' => 'menusayur | warungnasi kita',
            'lainya' => $this->LainyaModel->getLainya()
        ];
        return view('listmenu/menulainya/index', $data);
    }
    public function detaillainya($slug)
    {
        $data = [
            'judul' => 'detail menuLainya',
            'descript' => 'ini adalah halaman utama',
            'keyword' => 'warungmakan, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,',
            'lain' => $this->LainyaModel->getLainya($slug),
            'lainya' => $this->LainyaModel->getLainya()
        ];
        //jika Lainya tidak ada di table
        if (empty($data['lainya'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu Lainya ' . $slug . ' tidak di temukan.');
        }
        return view('listmenu/menulainya/detail', $data);
    }
}
