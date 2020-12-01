<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$daging = $this->dagingModel->findAll();
		$ayam = $this->AyamModel->findAll();
		$ikan = $this->IkanModel->findAll();
		$telor = $this->TelurModel->findAll();
		$lainya = $this->LainyaModel->findAll();

		$data = [
			'descript' => 'warung makanan dan ketring terbersih dengan harga terjangkau  di daerah di jabodetabek siap antarkan sampai rumah anda dengan ongkir se-ikhlasnya ',
			'keyword' => 'warungmakan,warungmakanan, makanan murah, ketring, ketring murah, ketring laris, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,makanan',
			'judul' => 'warungmakanan | rasa ningrat harga merakyat',
			'daging' => $daging,
			'ayam' => $ayam,
			'ikan' => $ikan,
			'telor' => $telor,
			'lainya' => $lainya
		];
		return view('index', $data);
	}

	public function listmenu()
	{
		$jumlahdaging = $this->dagingModel->countAll();
		$jumlahayam = $this->AyamModel->countAll();
		$jumlahikan = $this->IkanModel->countAll();
		$jumlahtelur = $this->TelurModel->countAll();
		$jumlahlainya = $this->LainyaModel->countAll();

		$data = [
			'descript' => 'warung makanan dan ketring terbersih dengan harga terjangkau  di daerah di jabodetabek siap antarkan sampai rumah anda dengan ongkir se-ikhlasnya ',
			'keyword' => 'warungmakan,warungmakanan, makanan murah, ketring, ketring murah, ketring laris, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,makanan',
			'judul' => 'warungmakanan | rasa ningrat harga merakyat',
			'jumlahdaging' => $jumlahdaging,
			'jumlahayam' => $jumlahayam,
			'jumlahikan' => $jumlahikan,
			'jumlahtelur' => $jumlahtelur,
			'jumlahlainya' => $jumlahlainya
		];
		return view('listmenu/index', $data);
	}

	public function blog()
	{
		$data = [
			'descript' => 'warung makanan dan ketring terbersih dengan harga terjangkau  di daerah di jabodetabek siap antarkan sampai rumah anda dengan ongkir se-ikhlasnya ',
			'keyword' => 'warungmakan,warungmakanan, makanan murah, ketring, ketring murah, ketring laris, catring murah, catring terdekat, catring enak, catring halal,ketring murah,ketring,makanan',
			'judul' => 'warungmakanan | rasa ningrat harga merakyat'
		];
		return view('blog', $data);
	}

	//--------------------------------------------------------------------

}
