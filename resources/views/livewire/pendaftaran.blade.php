<form wire:submit.prevent="submit">
<x-alert type="success" class="p-4 text-green-100 bg-green-700" />
<x-alert type="danger" class="p-4 text-red-100 bg-red-700" />

<div class="relative flex items-center justify-center min-h-screen px-4 py-12 bg-gray-500 bg-no-repeat bg-cover bg-gray-50 sm:px-6 lg:px-8" style="background-image: url( {{ asset('storage/bg.jpg') }} )">
    <div class="grid w-11/12 bg-white rounded-lg shadow-xl md:w-9/12 lg:w-1/2">
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
            <input wire:model.defer="tglLahir" class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" />
            <x-error field="tglLahir" class="text-red-500" />
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Vaksin Dosis 1</label>
            <input wire:model.defer="tglDosis1" class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" max="<?php echo date("Y-m-d"); ?>" />
            <x-error field="TglDosis1" class="text-red-500" />
        </div>

        {{-- <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Vaksin Dosis 2</label>
            <input wire:model.defer="tglDosis2" class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" />
            <x-error field="tglDosis2" class="text-red-500" />
        </div> --}}

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
            {{-- <div class='flex items-center justify-center w-full'>
                <label class='flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-purple-300 group'>
                    <div class='flex flex-col items-center justify-center'>
                        @if ($file)
                            <img src="{{ $file->temporaryUrl() }}" style="width:500px; height:100px">
                        @else
                            <svg class="w-10 h-10 text-purple-400 mt-7 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='pt-1 text-sm tracking-wider text-gray-400 lowercase group-hover:text-purple-600'>Select a photo</p>
                        @endif
                    </div>
                </label>
            </div> --}}
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
            <button type="submit" class='w-auto px-4 py-2 font-medium text-white bg-purple-500 rounded-lg shadow-xl hover:bg-purple-700'>Daftar</button>
        </div>

    </div>
  </div>
</form>


