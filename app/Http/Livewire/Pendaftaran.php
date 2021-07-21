<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Lukeraymonddowning\Honey\Traits\WithRecaptcha;
use Livewire\Component;
use App\Models\Peserta;
use App\Models\TglKegiatan;
use Illuminate\Support\Facades\Http;

class Pendaftaran extends Component
{
    use WithFileUploads;
    use WithRecaptcha;
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
    public $captcha = 0;

    protected $rules = [
        'nama' => 'required',
        'nik' => 'required|min:16|max:16',
        'hp' => 'required|min:11|max:13',
        'file' => 'image|mimes:jpeg,png,jpg|max:1024',
        'tglDosis2Value' => 'date',
        'tglLahir' => 'date',
        'tglDosis1' => 'date',
        //'g-recaptcha-response' => 'required|captcha',
    ];

    protected $messages = [
        'nama.required' => 'Nama tidak boleh kosong',
        'nik.required' => 'NIK tidak boleh kosong',
        'nik.min:16' => 'NIK tidak boleh kurang dari 16 digit',
        'nik.max:16' => 'NIK tidak boleh lebih dari 16 digit',
        'hp.required' => 'No HP tidak boleh kosong',
        'hp.min:11' => 'No HP tidak boleh kurang dari 11 digit',
        'hp.max:13' => 'No HP tidak boleh lebih dari 13 digit',
        'tglDosis2Value.date' => 'Vaksin dosis 2 harus diisi',
        'tglLahir.date' => 'Tanggal lahir harus harus berupa tanggal',
        'tglDosis1.date' => 'Tanggal Dosis 1 harus harus berupa tanggal',
        'file.image' => 'Kartu vaksin harus berupa file gambar',
        'file.mimes:jpeg,png,jpg' => 'Kartu vaksin harus format jpeg, png dan jpg',
        'file.max:1024' => 'Kartu vaksin harus berukuran kurang dari 1 mb',
    ];

    // public function updatedCaptcha($token)
    // {
    //     $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('CAPTCHA_SECRET_KEY') . '&response=' . $token);
    //     $this->captcha = $response->json()['score'];
    //     //dd($token);

    //     if ($this->captcha > .3) {
    //         $this->submit();
    //     } else {
    //         return session()->flash('danger', 'Google thinks you are a bot, please refresh and try again');
    //     }
    // }

    public function submit()
    {
        $this->validate();
        $cek = Peserta::where('nik', '=', $this->nik)->first();

        if($cek){
            session()->flash('danger', 'NIK dengan no '.$cek->nik.' telah terdaftar di RS Bhayangkara Nganjuk');
            return redirect()->to('pendaftaran');
        }else{
            $namaFile = $this->nik.'.'.$this->file->extension();

        $peserta = Peserta::create([
            'nama' => $this->nama,
            'nik' => $this->nik,
            'telp' => $this->hp,
            'tgl_lahir' => $this->tglLahir,
            'tgl_dosis_1' => $this->tglDosis1,
            'tgl_dosis_2' => $this->tglDosis2Value,
            'sertifikat' => $namaFile,
            'status' => 0
        ]);

        if($peserta){
            $this->file->storeAs('images', $namaFile);
            session()->flash('success', 'Berhasil mendaftar vaksin dosis 2 RS Bhayangkara Nganjuk.');
            return redirect()->to('pendaftaran');
        }else{
            session()->flash('danger', 'Gagal mendaftar vaksin dosis 2 RS Bhayangkara Nganjuk.');
            return redirect()->to('pendaftaran');
        }
        }
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
