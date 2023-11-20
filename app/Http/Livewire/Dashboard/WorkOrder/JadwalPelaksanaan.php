<?php

namespace App\Http\Livewire\Dashboard\WorkOrder;

use Livewire\Component;

class JadwalPelaksanaan extends Component
{
    public $workOrder;

    public $showJadwal = false;

    protected $listeners = [
        'showJadwalPelaksanaan'
    ];

    public function mount($workOrder)
    {
        $this->workOrder = $workOrder;
    }

    public function showJadwalPelaksanaan()
    {
        $this->showJadwal = !$this->showJadwal;
    }

    public function render()
    {
        return view('livewire.dashboard.work-order.jadwal-pelaksanaan');
    }
}
