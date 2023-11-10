@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex ml-3">
  <h1 class="ml-4">Tambah Item Purchase Request</h1>
</div>
<div class="card ml-3 mr-3">
    <div class="form-group ml-3 mr-3 mt-3">
        <label for="namaBarang">Nama Barang</label>
        <input type="input" class="form-control" id="namaBarang">
    </div>
    <div class="form-group ml-3 mr-3 mt-3">
        <label for="jumlah">Jumlah</label>
        <input type="input" class="form-control" id="jumlah">
    </div>
    <div class="form-group ml-3 mr-3 mt-3">
        <label>Pembelian</label>
            <div class="form-group">
                <select class="form-control">
                    <option>offline</option>
                    <option>online</option>
                </select>
            </div>
    </div>
    <div class="form-group ml-3 mr-3 mt-3">
        <label for="harga">Harga</label>
        <input type="input" class="form-control" id="harga">
    </div>
    <div>
        <button type="button" class="btn btn-primary ml-3 mb-3">Submit</button>
    </div>
</div>
@endsection