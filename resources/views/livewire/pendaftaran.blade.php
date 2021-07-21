<form wire:submit.prevent="submit" id="form-submit">

<div class="relative flex items-center justify-center min-h-screen px-4 py-12 bg-gray-500 bg-no-repeat bg-cover bg-gray-50 sm:px-6 lg:px-8" style="background-image: url( {{ asset('storage/bg.jpg') }} )">
    <div class="grid w-11/12 bg-white rounded-lg shadow-xl md:w-9/12 lg:w-1/2">
        <x-alert type="success" class="p-4 text-green-100 bg-green-700" />
        <x-alert type="danger" class="p-4 text-red-100 bg-red-700" />
      {{-- <div class="flex justify-center py-4">
        <div class="flex p-2 bg-purple-200 border-2 border-purple-300 rounded-full md:p-4">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
        </div>
      </div> --}}

      <div class="flex justify-center">
        <div class="flex">
          <h1 class="pt-4 text-xl font-bold text-gray-600 md:text-2xl">Form Vaksin Dosis 2</h1>
        </div>
      </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">NIK</label>
            <input wire:model.defer="nik" class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" />
            <x-error field="nik" class="text-red-500" />
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Nama</label>
            <input wire:model.defer="nama" class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"  />
            <x-error field="nama" class="text-red-500" />
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">No. Handphone</label>
            <input wire:model.defer="hp" class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"  />
            <x-error field="hp" class="text-red-500" />
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Lahir</label>
            <input wire:model.defer="tglLahir" class="w-auto px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" />
            <x-error field="tglLahir" class="text-red-500" />
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Vaksin Dosis 1</label>
            <input wire:model.defer="tglDosis1" class="w-auto px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" max="<?php echo date("Y-m-d"); ?>" />
            <x-error field="TglDosis1" class="text-red-500" />
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Kegiatan Vaksin Dosis 2</label>
            <select wire:model.defer="tglDosis2Value" class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <option value="">--</option>
                @foreach ($tglDosis2 as $tglKegiatan)
                    <option value="{{Carbon\Carbon::parse($tglKegiatan->tgl_kegiatan)->format('Y-m-d')}}">{{Carbon\Carbon::parse($tglKegiatan->tgl_kegiatan)->isoFormat('dddd, D MMMM Y')}}</option>
                @endforeach
            </select>
            <x-error field="tglDosis2Value" class="text-red-500" />
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="mb-1 text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Upload Kartu Vaksin</label>
            <input wire:model="file" type='file' class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />
            <x-error field="file" class="text-red-500" />
            @if ($file)
                <img src="{{ $file->temporaryUrl() }}" class="px-3 py-2" style="width:500px; height:100px">
            @endif
        </div>

        {{-- <div class="form-group">
            <label for="captcha">Captcha</label>
              {!! NoCaptcha::renderJs() !!}
              {!! NoCaptcha::display() !!}
              @error('g-recaptcha-response')
                  <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
              @enderror
          </div> --}}

        <div class='flex items-center justify-center gap-4 pt-5 pb-5 md:gap-8'>
            <a href="{{ route('/') }}" class='w-auto px-4 py-2 font-medium text-white bg-gray-500 rounded-lg shadow-xl hover:bg-gray-700'>Kembali</a>
            <button type="submit"
              data-sitekey="{{env('CAPTCHA_SITE_KEY')}}"
              data-callback='handle'
              data-action='submit'
               class="w-auto px-4 py-2 font-medium text-white bg-purple-500 rounded-lg shadow-xl g-recaptcha hover:bg-purple-700">
               Daftar
            </button>
        </div>

    </div>
  </div>
</form>
<script src="https://www.google.com/recaptcha/api.js?render={{env('CAPTCHA_SITE_KEY')}}"></script>
<script>
    function handle() {
        grecaptcha.ready(function () {
            grecaptcha.execute('{{env('CAPTCHA_SITE_KEY')}}', {action: 'submit'})
                .then(function (token) {
                    @this.set('captcha', token);
                });
        })
    }
</script>


