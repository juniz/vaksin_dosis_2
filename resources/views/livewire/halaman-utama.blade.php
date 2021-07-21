{{-- <form wire:submit.prevent="submit"> --}}

    @if ($cekModal)
    <div class="fixed bottom-0 left-0 flex items-center justify-center w-full h-full bg-gray-800">
        <div class="w-10/12 bg-white rounded-lg xl:w-1/2">
          <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
              <div class="text-lg font-medium text-gray-900">DATA PESERTA</div>
              <svg wire:click='closeModal' class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
               </svg>
            </div>
            <hr>
            <div class="w-full py-4">
                <div class="flex flex-col">
                    <div class="flex flex-row">
                        <div class="items-start w-1/2">NIK</div>
                        <div class="items-center w-20">:</div>
                        <div class="items-end w-1/2">{{$nik}}</div>
                    </div>
                    <div class="flex flex-row">
                        <div class="items-start w-1/2">Nama</div>
                        <div class="items-center w-20">:</div>
                        <div class="items-start w-1/2">{{$nama}}</div>
                    </div>
                    <div class="flex flex-row">
                        <div class="items-start w-1/2">HP</div>
                        <div class="items-center w-20">:</div>
                        <div class="items-start w-1/2">{{$hp}}</div>
                    </div>
                    <div class="flex flex-row">
                        <div class="items-start w-1/2">Tgl. Lahir</div>
                        <div class="items-center w-20">:</div>
                        <div class="items-start w-1/2">{{Carbon\Carbon::parse($tglLahir)->format('d-m-Y')}}</div>
                    </div>
                    <div class="flex flex-row">
                        <div class="items-start w-1/2">Jadwal Dosis 2  </div>
                        <div class="items-center w-20">:</div>
                        <div class="items-start w-1/2">{{Carbon\Carbon::parse($tglDosis2)->format('d-m-Y')}}</div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="ml-auto">
              {{-- <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Agree
              </button> --}}
              <button wire:click='closeModal' class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-gray-500 hover:text-white hover:border-transparent">
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    @endif

    <div class="relative flex items-center justify-center min-h-screen px-4 py-12 bg-gray-500 bg-no-repeat bg-cover bg-gray-50 sm:px-6 lg:px-8" style="background-image: url( {{ asset('storage/bg.jpg') }} )">
        <div class="grid w-11/12 bg-white rounded-lg shadow-xl md:w-9/12 lg:w-1/2">
          {{-- <div class="flex justify-center py-4">
            <div class="flex p-2 bg-purple-200 border-2 border-purple-300 rounded-full md:p-4">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
          </div> --}}

          <x-alert type="success" class="p-4 text-green-100 bg-green-700" />
          <x-alert type="danger" class="p-4 text-red-100 bg-red-700" />

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
                <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Tanggal Lahir</label>
                <input wire:model.defer="tglLahir" class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="date" />
                <x-error field="tglLahir" class="text-red-500" />
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
                <button wire:click = 'submit' class='w-auto px-4 py-2 font-medium text-white bg-blue-500 rounded-lg shadow-xl hover:bg-blue-700'>Cek</button>
                <a href="{{ route('pendaftaran') }}" class='w-auto px-4 py-2 font-medium text-white bg-purple-500 rounded-lg shadow-xl hover:bg-purple-700'>Daftar</a>
            </div>

        </div>
      </div>
    {{-- </form> --}}
