<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TanggalVaksin extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="text-xs font-semibold text-gray-500 uppercase md:text-sm text-light">Selection</label>
                    <select class="px-3 py-2 mt-1 border-2 border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
            </div>
        blade;
    }
}
