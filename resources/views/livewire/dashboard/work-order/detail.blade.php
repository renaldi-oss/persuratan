<div x-data="{ tab: 'jadwal' }">
    {{-- <div class="d-flex justify-content-center flex-wrap">
        <x-horizontal-button tab="jadwal">Jadwal Pelaksanaan</x-horizontal-button>
        <x-horizontal-button tab="purchaseRequest">Purchase Request</x-horizontal-button>
        <x-horizontal-button tab="checkList">Check List</x-horizontal-button>
        <x-horizontal-button tab="qcPass">QC Pass</x-horizontal-button>
        <x-horizontal-button tab="persuratan">Persuratan</x-horizontal-button>
    </div> --}}
    <ul class="nav nav-tabs justify-content-center flex-wrap">
        <x-horizontal-button tab="jadwal">Jadwal Pelaksanaan</x-horizontal-button>
        <x-horizontal-button tab="purchaseRequest">Purchase Request</x-horizontal-button>
        <x-horizontal-button tab="checkList">Check List</x-horizontal-button>
        <x-horizontal-button tab="qcPass">QC Pass</x-horizontal-button>
        <x-horizontal-button tab="persuratan">Persuratan</x-horizontal-button>
    </ul>
    <template x-if="tab === 'jadwal'">
        @livewire('dashboard.work-order.detail.jadwal-pelaksanaan')
    </template>
    <template x-if="tab === 'purchaseRequest'">
        @livewire('dashboard.work-order.detail.purchase-request')
    </template>
    <template x-if="tab === 'checkList'">
        @livewire('dashboard.work-order.detail.checklist')
    </template>
    <template x-if="tab === 'qcPass'">
        @livewire('dashboard.work-order.detail.qc-pass')
    </template>
    <template x-if="tab === 'persuratan'">
        @livewire('dashboard.work-order.detail.persuratan')
    </template>
    {{-- <div x-show="tab === 'jadwal'">
        @livewire('dashboard.work-order.detail.jadwal-pelaksanaan')
    </div>
    <div x-show="tab === 'purchaseRequest'">
        @livewire('dashboard.work-order.detail.purchase-request')
    </div>
    <div x-show="tab === 'checkList'">
        @livewire('dashboard.work-order.detail.checklist')
    </div>
    <div x-show="tab === 'qcPass'">
        @livewire('dashboard.work-order.detail.qc-pass')
    </div>
    <div x-show="tab === 'persuratan'">
        @livewire('dashboard.work-order.detail.persuratan')
    </div> --}}
</div>