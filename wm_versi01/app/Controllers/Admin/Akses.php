<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DagingModel;
use App\Models\AyamModel;
use App\Models\IkanModel;
use App\Models\TelurModel;
use App\Models\LainyaModel;
use CodeIgniter\Validation\Rules;

class Akses extends BaseController
{
    protected $DagingModel;
    protected $AyamModel;
    protected $IkanModel;
    public function __construct()
    {
        $this->dagingModel = new DagingModel();
        $this->AyamModel = new AyamModel();
        $this->IkanModel = new IkanModel();
        $this->TelurModel = new TelurModel();
        $this->LainyaModel = new LainyaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'halaman',
            'jumlahdaging' => $this->dagingModel->countAll(),
            'jumlahayam' => $this->AyamModel->countAll(),
            'jumlahikan' => $this->IkanModel->countAll(),
            'jumlahtelur' => $this->TelurModel->countAll(),
            'jumlahlainya' => $this->LainyaModel->countAll()
        ];
        return view('admin/index', $data);
    }
    /* ==================================== Method daging==========================================
       ============================================================================================*/
    public function daging()
    {
        $page = $this->request->getVar('page') ?  $this->request->getVar('page') : 1;
        $data = [
            'title' => 'halaman',
            'daging' =>  $this->dagingModel->paginate(5),
            'pager' => $this->dagingModel->pager,
            'page' => $page
        ];
        return view('admin/menudaging/index', $data);
    }
    public function detaildaging($slug)
    {
        $data = [
            'title' => 'halaman',
            'daging' => $this->dagingModel->getDaging($slug)
        ];
        // jika menu daging tidak ada di tabel
        if (empty($data['daging'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu ' .  $slug . ' tidak di temukan');
        }
        return view('admin/menudaging/detail', $data);
    }

    public function createdaging()
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/menudaging/create', $data);
    }
    public function savedaging()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[daging.judul]',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.',
                    'is_unique' => '{field} menu daging tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            //$validation =  \Config\Services::validation();
            return redirect()->to('/akses/createdaging')->withInput();
        }
        // ambil ekseskusi gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'file.png';
        } else {
            //generete nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder seharusnya
            $fileSampul->move('assets/img/menudaging', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->dagingModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');

        return redirect()->to('/akses/daging');
    }


    public function deletedaging($id)
    {
        // cari gambar berdasarkan id
        $daging = $this->dagingModel->find($id);
        // cek file gambarnya file.png
        if ($daging['sampul'] != 'file.png') {
            // hapus gambar
            unlink('assets/img/menudaging/' . $daging['sampul']);
        }
        $this->dagingModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to('/akses/daging');
    }

    public function editdaging($slug)
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation(),
            'daging' => $this->dagingModel->getDaging($slug)
        ];
        return view('admin/menudaging/edit', $data);
    }
    public function updatedaging($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[daging.judul,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.',
                    'is_unique' => '{field} menu daging tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            return redirect()->to('/akses/daging/' . $this->request->getVar('slug'))->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');

        //cak gambar apakah mau di ubah
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            // upload gambar
            $fileSampul->move('assets/img/menudaging', $namaSampul);
            //hapus file yang lama
            unlink('assets/img/menudaging/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->dagingModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'menu daging berhasil di ubah');

        return redirect()->to('/akses/daging');
    }
    /* ==================================== Method ayam==========================================
       ============================================================================================*/
    public function ayam()
    {
        $page = $this->request->getVar('page') ?  $this->request->getVar('page') : 1;
        $data = [
            'title' => 'halaman',
            'ayam' =>  $this->AyamModel->paginate(5),
            'pager' => $this->AyamModel->pager,
            'page' => $page
        ];
        return view('admin/menuayam/index', $data);
    }
    public function detailayam($slug)
    {
        $data = [
            'title' => 'halaman',
            'ayam' => $this->AyamModel->getAyam($slug)
        ];
        // jika menu daging tidak ada di tabel
        if (empty($data['ayam'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu ' .  $slug . ' tidak di temukan');
        }
        return view('admin/menuayam/detail', $data);
    }

    public function createayam()
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/menuayam/create', $data);
    }
    public function saveayam()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[ayam.judul]',
                'errors' => [
                    'required' => '{field} menu ayam harus di isi.',
                    'is_unique' => '{field} menu ayam tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu ayam harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu ayam harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            //$validation =  \Config\Services::validation();
            return redirect()->to('/akses/createayam')->withInput();
        }
        // ambil ekseskusi gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'file.png';
        } else {
            //generete nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder seharusnya
            $fileSampul->move('assets/img/menuayam', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->AyamModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');

        return redirect()->to('/akses/ayam');
    }


    public function deleteayam($id)
    {
        // cari gambar berdasarkan id
        $ayam = $this->AyamModel->find($id);
        // cek file gambarnya file.png
        if ($ayam['sampul'] != 'file.png') {
            // hapus gambar
            unlink('assets/img/menuayam/' . $ayam['sampul']);
        }
        $this->AyamModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to('/akses/ayam');
    }

    public function editayam($slug)
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation(),
            'ayam' => $this->AyamModel->getAyam($slug)
        ];
        return view('admin/menuayam/edit', $data);
    }
    public function updateayam($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[daging.judul,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.',
                    'is_unique' => '{field} menu daging tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            return redirect()->to('/akses/ayam/' . $this->request->getVar('slug'))->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');

        //cak gambar apakah mau di ubah
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            // upload gambar
            $fileSampul->move('assets/img/menuayam', $namaSampul);
            //hapus file yang lama
            unlink('assets/img/menuayam/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->AyamModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'menu daging berhasil di ubah');

        return redirect()->to('/akses/ayam');
    }
    /* ==================================== Method ikan==========================================
       ============================================================================================*/
    public function ikan()
    {
        $page = $this->request->getVar('page') ?  $this->request->getVar('page') : 1;
        $data = [
            'title' => 'halaman',
            'ikan' =>  $this->IkanModel->paginate(5),
            'pager' => $this->IkanModel->pager,
            'page' => $page
        ];
        return view('admin/menuikan/index', $data);
    }
    public function detailikan($slug)
    {
        $data = [
            'title' => 'halaman',
            'ikan' => $this->IkanModel->getikan($slug)
        ];
        // jika menu daging tidak ada di tabel
        if (empty($data['ikan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu ' .  $slug . ' tidak di temukan');
        }
        return view('admin/menuikan/detail', $data);
    }

    public function createikan()
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/menuikan/create', $data);
    }
    public function saveikan()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[ikan.judul]',
                'errors' => [
                    'required' => '{field} menu ikan harus di isi.',
                    'is_unique' => '{field} menu ikan tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu ikan harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu ikan harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            //$validation =  \Config\Services::validation();
            return redirect()->to('/akses/createikan')->withInput();
        }
        // ambil ekseskusi gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'file.png';
        } else {
            //generete nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder seharusnya
            $fileSampul->move('assets/img/menuikan', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->IkanModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');

        return redirect()->to('/akses/ikan');
    }


    public function deleteikan($id)
    {
        // cari gambar berdasarkan id
        $ikan = $this->IkanModel->find($id);
        // cek file gambarnya file.png
        if ($ikan['sampul'] != 'file.png') {
            // hapus gambar
            unlink('assets/img/menuikan/' . $ikan['sampul']);
        }
        $this->IkanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to('/akses/ikan');
    }

    public function editikan($slug)
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation(),
            'ikan' => $this->IkanModel->getikan($slug)
        ];
        return view('admin/menuikan/edit', $data);
    }
    public function updateikan($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[daging.judul,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.',
                    'is_unique' => '{field} menu daging tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            return redirect()->to('/akses/ikan/' . $this->request->getVar('slug'))->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');

        //cak gambar apakah mau di ubah
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            // upload gambar
            $fileSampul->move('assets/img/menuikan', $namaSampul);
            //hapus file yang lama
            unlink('assets/img/menuikan/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->IkanModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'menu daging berhasil di ubah');

        return redirect()->to('/akses/ikan');
    }
    /* ==================================== Method telur==========================================
       ============================================================================================*/
    public function telur()
    {
        $page = $this->request->getVar('page') ?  $this->request->getVar('page') : 1;
        $data = [
            'title' => 'halaman',
            'telur' =>  $this->TelurModel->paginate(5),
            'pager' => $this->TelurModel->pager,
            'page' => $page
        ];
        return view('admin/menutelur/index', $data);
    }
    public function detailtelur($slug)
    {
        $data = [
            'title' => 'halaman',
            'telur' => $this->TelurModel->gettelur($slug)
        ];
        // jika menu daging tidak ada di tabel
        if (empty($data['telur'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu ' .  $slug . ' tidak di temukan');
        }
        return view('admin/menutelur/detail', $data);
    }

    public function createtelur()
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/menutelur/create', $data);
    }
    public function savetelur()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[telur.judul]',
                'errors' => [
                    'required' => '{field} menu telur harus di isi.',
                    'is_unique' => '{field} menu telur tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu telur harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu telur harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            //$validation =  \Config\Services::validation();
            return redirect()->to('/akses/createtelur')->withInput();
        }
        // ambil ekseskusi gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'file.png';
        } else {
            //generete nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder seharusnya
            $fileSampul->move('assets/img/menutelur', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->TelurModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');

        return redirect()->to('/akses/telur');
    }


    public function deletetelur($id)
    {
        // cari gambar berdasarkan id
        $telur = $this->TelurModel->find($id);
        // cek file gambarnya file.png
        if ($telur['sampul'] != 'file.png') {
            // hapus gambar
            unlink('assets/img/menutelur/' . $telur['sampul']);
        }
        $this->TelurModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to('/akses/telur');
    }

    public function edittelur($slug)
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation(),
            'telur' => $this->TelurModel->gettelur($slug)
        ];
        return view('admin/menutelur/edit', $data);
    }
    public function updatetelur($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[daging.judul,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.',
                    'is_unique' => '{field} menu daging tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            return redirect()->to('/akses/telur/' . $this->request->getVar('slug'))->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');

        //cak gambar apakah mau di ubah
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            // upload gambar
            $fileSampul->move('assets/img/menutelur', $namaSampul);
            //hapus file yang lama
            unlink('assets/img/menutelur/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->TelurModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'menu daging berhasil di ubah');

        return redirect()->to('/akses/telur');
    }
    /* ==================================== Method lainya==========================================
       ============================================================================================*/
    public function lainya()
    {
        $page = $this->request->getVar('page') ?  $this->request->getVar('page') : 1;
        $data = [
            'title' => 'halaman',
            'lainya' =>  $this->LainyaModel->paginate(5),
            'pager' => $this->LainyaModel->pager,
            'page' => $page
        ];
        return view('admin/menulainya/index', $data);
    }
    public function detaillainya($slug)
    {
        $data = [
            'title' => 'halaman',
            'lainya' => $this->LainyaModel->getlainya($slug)
        ];
        // jika menu daging tidak ada di tabel
        if (empty($data['lainya'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('menu ' .  $slug . ' tidak di temukan');
        }
        return view('admin/menulainya/detail', $data);
    }

    public function createlainya()
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/menulainya/create', $data);
    }
    public function savelainya()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[lainya.judul]',
                'errors' => [
                    'required' => '{field} menu lainya harus di isi.',
                    'is_unique' => '{field} menu lainya tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu lainya harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu lainya harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            //$validation =  \Config\Services::validation();
            return redirect()->to('/akses/createlainya')->withInput();
        }
        // ambil ekseskusi gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'file.png';
        } else {
            //generete nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder seharusnya
            $fileSampul->move('assets/img/menulainya', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->LainyaModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');

        return redirect()->to('/akses/lainya');
    }


    public function deletelainya($id)
    {
        // cari gambar berdasarkan id
        $lainya = $this->LainyaModel->find($id);
        // cek file gambarnya file.png
        if ($lainya['sampul'] != 'file.png') {
            // hapus gambar
            unlink('assets/img/menulainya/' . $lainya['sampul']);
        }
        $this->LainyaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to('/akses/lainya');
    }

    public function editlainya($slug)
    {
        //session();
        $data = [
            'title' => 'form tambha data',
            'validation' => \Config\Services::validation(),
            'lainya' => $this->LainyaModel->getlainya($slug)
        ];
        return view('admin/menulainya/edit', $data);
    }
    public function updatelainya($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[daging.judul,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.',
                    'is_unique' => '{field} menu daging tidak boleh sama'
                ]
            ],

            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} menu daging harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'ukuran terlalu besar cuk:V',
                    'is_image' => 'waahhh bukan gambar anu sesuai cuk:V',
                    'mime_in' => 'waahhh bukan gambar anu sesuai cuk:V'
                ]
            ]
        ])) {

            return redirect()->to('/akses/lainya/' . $this->request->getVar('slug'))->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');

        //cak gambar apakah mau di ubah
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            // upload gambar
            $fileSampul->move('assets/img/menulainya', $namaSampul);
            //hapus file yang lama
            unlink('assets/img/menulainya/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->LainyaModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'menu daging berhasil di ubah');

        return redirect()->to('/akses/lainya');
    }
}

    
    //--------------------------------------------------------------------
