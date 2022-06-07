<?php

namespace App\Controllers;

helper('date');

use CodeIgniter\I18n\Time;
use App\Models\PatternModel;
use App\Models\ResultModel;

class Pages extends BaseController
{
    public function index()
    {
        session();
        $patternModel = new PatternModel();
        $result = $patternModel->findAll();

        $data = [
            'pattern_template' => $result,
            'validation' => \Config\Services::validation()
        ];
        return view('home', $data);
    }

    public function hasil()
    {
        $resultModel = new ResultModel();
        $result = $resultModel->findAll();
        $jumlahpenilaian = 0;
        $count = 0;
        foreach ($result as $r) {
            $jumlahpenilaian++;
            if ($r['kesimpulan'] == 'Sesuai') {
                $count++;
            }
        }

        $data = [
            'penilaian' => $result,
            'count' => $count,
            'jumlah_penilaian' => $jumlahpenilaian
        ];
        return view('hasil', $data);
    }

    public function edit()
    {
        session();
        $patternModel = new PatternModel();

        $result = $patternModel->where(['id' => $this->request->getVar('id')])->first();
        $data = [
            'result' => $result,
            'validation' => \Config\Services::validation()
        ];
        return view('edit', $data);
    }

    public function confirm_edit()
    {
        $patternModel = new PatternModel();
        if (!$this->validate([
            'pertanyaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jawaban' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ])) {
            $result = $patternModel->where(['id' => $this->request->getVar('id')])->first();
            $data = [
                'result' => $result,
                'validation' => \Config\Services::validation()
            ];
            return view('edit', $data);
        }
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("d-m-Y");
        $patternModel->save([
            'id' => $this->request->getVar('id'),
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'jawaban' => $this->request->getVar('jawaban'),
            'diubah' => $tanggal
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/pages');
    }

    public function save()
    {
        $patternModel = new PatternModel();
        if (!$this->validate([
            'pertanyaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'jawaban' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/pages')->withInput()->with('validation', $validation);
        }
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("d-m-Y");

        // dd($tanggal);
        $data = [
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'jawaban' => $this->request->getVar('jawaban'),
            'dibuat' => $tanggal,
            'diubah' => $tanggal
        ];

        $patternModel->insert($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/pages');
    }

    public function delete()
    {
        $patternModel = new PatternModel();
        $patternModel->delete($this->request->getVar('id'));
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/pages');
    }

    public function date()
    {
        $myTime = new Time('now', 'Asia/Jakarta');
        echo $myTime;
    }
}
