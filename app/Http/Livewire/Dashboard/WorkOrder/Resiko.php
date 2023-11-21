<?php

namespace App\Http\Livewire\Dashboard\WorkOrder;

use App\Models\WorkOrder;
use Livewire\Component;

class Resiko extends Component
{
    public $workorder;
    public $frequency;
    public $consequency;
    public $resiko;

    public function mount($WorkOrder)
    {
        $this->workorder = $WorkOrder;
        $this->frequency = 0;
        $this->consequency = 0;
        $this->resiko;
    }

    public function render()
    {
        return view('livewire.dashboard.work-order.resiko');
    }

    public function save()
    {
        $this->resiko = $this->frequency * $this->consequency;
        dd($this->resiko);
    }
}
