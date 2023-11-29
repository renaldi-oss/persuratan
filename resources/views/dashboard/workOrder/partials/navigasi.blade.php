<div x-data="{ 
    tab: '{{ session('active_tab', 'material') }}',
    async setActiveTab(tab) {
        this.tab = tab;
        await axios.post('{{ route('workorder.navigasi') }}', {
            tab: tab
        }, {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).catch(function (error) {
            console.log(error);
        });
    } }" 
    x-init="() => { $watch('tab', (tab) => { setActiveTab(tab) }) }">
    
    <ul class="nav nav-tabs justify-content-center flex-wrap">
        <x-horizontal-button tab="material" @click="setActiveTab('material')">Material</x-horizontal-button>
        <x-horizontal-button tab="jadwal" @click="setActiveTab('jadwal')">Jadwal Pelaksanaan</x-horizontal-button>
        {{-- <x-horizontal-button tab="purchaseRequest" @click="setActiveTab('purchaseRequest')">Purchase Request</x-horizontal-button> --}}
        <x-horizontal-button tab="qcPass" @click="setActiveTab('qcPass')">QC Pass</x-horizontal-button>
        <x-horizontal-button tab="checkList" @click="setActiveTab('checkList')">Check List</x-horizontal-button>
        <x-horizontal-button tab="persuratan" @click="setActiveTab('persuratan')">Persuratan</x-horizontal-button>
    </ul>
    <div x-show="tab === 'material'" x-transition>
        @include('dashboard.WorkOrder.Material.index')
    </div>
    <div x-show="tab === 'jadwal'" x-transition>
        @include('dashboard.WorkOrder.JadwalPelaksanaan.index')
    </div>
    {{-- <div x-show="tab === 'purchaseRequest'" x-transition>
        @include('dashboard.WorkOrder.PurchaseRequest.index')
    </div> --}}
    <div x-show="tab === 'checkList'" x-transition>
        @include('dashboard.WorkOrder.CheckList.index')
    </div>
    <div x-show="tab === 'qcPass'" x-transition>
        @include('dashboard.WorkOrder.QcPass.index')
    </div>
    <div x-show="tab === 'persuratan'" x-transition>
        @include('dashboard.WorkOrder.Persuratan.index')
    </div>
</div>
