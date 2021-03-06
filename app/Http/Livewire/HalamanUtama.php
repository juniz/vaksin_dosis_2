<?php

namespace App\Http\Livewire;
use App\Models\Peserta;
use Livewire\Component;

class HalamanUtama extends Component
{
    public $nik;
    public $nama;
    public $hp;
    public $tglLahir;
    public $tglDosis2;
    public $sttsValidasi;
    public $cekModal = 0;

    protected $rules = [
        'nik' => 'required|min:16|max:16',
        'tglLahir' => 'date',
    ];

    protected $messages = [
        'nik.required' => 'NIK tidak boleh kosong',
        'nik.min:16' => 'NIK tidak boleh kurang dari 16 digit',
        'nik.max:16' => 'NIK tidak boleh lebih dari 16 digit',
        'tglLahir.date' => 'Tanggal lahir harus harus berupa tanggal',
    ];


    public function openModal()
    {
        $this->cekModal = true;
    }

    public function closeModal()
    {
        $this->cekModal = false;
    }

    public function submit()
    {
        $this->validate();

        $peserta = Peserta::where('nik',$this->nik)->where('tgl_lahir',$this->tglLahir)->first();
        if($peserta){
            $this->nama = $peserta->nama;
            $this->hp = $peserta->telp;
            $this->tglDosis2 = $peserta->tgl_dosis_2;
            $this->sttsValidasi = $peserta->status;
            $this->openModal();
        }else{
            session()->flash('danger', 'NIK dengan no '.$this->nik.' belum terdaftar vaksin dosis 2 RS Bhayangkara Nganjuk.');
        }

    }

    public function mount()
    {
        $this->tglLahir ?? $this->tglLahir = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.halaman-utama');
    }
}
