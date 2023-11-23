<div x-data="{ tab: 'material' }">
    {{-- <div class="d-flex justify-content-center flex-wrap">
        <x-horizontal-button tab="jadwal">Jadwal Pelaksanaan</x-horizontal-button>
        <x-horizontal-button tab="purchaseRequest">Purchase Request</x-horizontal-button>
        <x-horizontal-button tab="checkList">Check List</x-horizontal-button>
        <x-horizontal-button tab="qcPass">QC Pass</x-horizontal-button>
        <x-horizontal-button tab="persuratan">Persuratan</x-horizontal-button>
    </div> --}}
    <ul class="nav nav-tabs justify-content-center flex-wrap">
        <x-horizontal-button tab="material">Material</x-horizontal-button>
        <x-horizontal-button tab="jadwal">Jadwal Pelaksanaan</x-horizontal-button>
        <x-horizontal-button tab="purchaseRequest">Purchase Request</x-horizontal-button>
        <x-horizontal-button tab="checkList">Check List</x-horizontal-button>
        <x-horizontal-button tab="qcPass">QC Pass</x-horizontal-button>
        <x-horizontal-button tab="persuratan">Persuratan</x-horizontal-button>
    </ul>
    <template x-if="tab === 'material'">
        @include('dashboard.WorkOrder.Material.index')
    </template>
    <template x-if="tab === 'jadwal'">
        @include('dashboard.WorkOrder.JadwalPelaksanaan.index')
    </template>
    <template x-if="tab === 'purchaseRequest'">
        @include('dashboard.WorkOrder.PurchaseRequest.index')
    </template>
    <template x-if="tab === 'checkList'">
        @include('dashboard.WorkOrder.CheckList.index')
    </template>
    <template x-if="tab === 'qcPass'">
       @include('dashboard.WorkOrder.QcPass.index')
    </template>
    <template x-if="tab === 'persuratan'">
        @include('dashboard.WorkOrder.Persuratan.index')
    </template>


    {{-- <div x-show="tab === 'jadwal'">
       
    </div>
    <div x-show="tab === 'purchaseRequest'">
        
    </div>
    <div x-show="tab === 'checkList'">
        
    </div>
    <div x-show="tab === 'qcPass'">
        
    </div>
    <div x-show="tab === 'persuratan'">
        
    </div> --}}
</div>