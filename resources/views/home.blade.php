<x-html title="Vaksin Dosis 2" class="bg-red-500">
    <x-slot name="head">
        <link rel="icon" href="favicon.ico" />
        <link href="{{asset('css/app.css')}}"type="text/css" rel="stylesheet" >
        @livewireStyles
    </x-slot>

    <livewire:halaman-utama />
    @livewireScripts
</x-html>
