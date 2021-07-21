<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Peserta;
use App\Models\TglKegiatan;

class Pendaftaran extends Component
{
    use WithFileUploads;

    public $nik;
    public $nama;
    public $hp;
    public $tglLahir;
    public $tglDosis1;
    public $tglDosis2;
    public $tglDosis2Value;
    public $file;
    public $tommorow;
    public $modalCek = 0;

    protected $rules = [
        'nama' => 'required',
        'nik' => 'required|min:16|max:16',
        'hp' => 'required|min:11|max:13',
        'file' => 'image|mimes:jpeg,png,jpg|max:1024',
        'tglDosis2Value' => 'date',
        'tglLahir' => 'date',
        'tglDosis1' => 'date',
        'g-recaptcha-response' => 'required|captcha',
    ];

    public function submit()
    {
        $this->validate();
        // $cek = Peserta::where('nik', '=', $this->nik)->firstOrFail();

        // if($cek){
        //     session()->flash('danger', 'NIK dengan no '.$this->nik.' telah terdaftar di RS Bhayangkara Nganjuk');
        //     //return redirect()->to('/');
        // }else{
            $namaFile = $this->nik.'.'.$this->file->extension();

        Peserta::create([
            'nama' => $this->nama,
            'nik' => $this->nik,
            'telp' => $this->hp,
            'tgl_lahir' => $this->tglLahir,
            'tgl_dosis_1' => $this->tglDosis1,
            'tgl_dosis_2' => $this->tglDosis2Value,
            'sertifikat' => $namaFile,
            'status' => 0
        ]);

        // if($peserta){
        //     $this->file->storeAs('images', $namaFile);
        //     session()->flash('success', 'Berhasil mendaftar vaksin dosis 2 RS Bhayangkara Nganjuk.');

        // }
        //     session()->flash('danger', 'Gagal mendaftar vaksin dosis 2 RS Bhayangkara Nganjuk.');


        //}
    }

    public function openModal()
    {
        $this->modalCek = true;
    }

    public function mount()
    {
        $this->tglLahir ?? $this->tglLahir = date('Y-m-d');
        $this->tglDosis1 ?? $this->tglDosis1 = date('Y-m-d');
        $this->tglDosis2 = TglKegiatan::all();
    }

    public function render()
    {
        //$this->tommorow = date('Y-m-d', strtotime(' +1 day '));
        return view('livewire.pendaftaran');
    }
}
