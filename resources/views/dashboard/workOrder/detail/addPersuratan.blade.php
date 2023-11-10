@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex ml-3">
  <h1 class="ml-4">Tambah Item Persuratan</h1>
</div>
<div class="card ml-3 mr-3">
    <div class="form-group ml-3 mr-3 mt-3">
        <label for="kodeSurat">Kode Surat</label>
        <div class="form-group">
            <select class="form-control">
                <option>PEN</option>
                <option>DO</option>
                <option>BAC</option>
                <option>BAP</option>
                <option>DOK</option>
                <option>BAST</option>
                <option>BAPM</option>
                <option>BAPP</option>
                <option>PMB</option>
                <option>INV</option>
                <option>PINV</option>
                <option>KWT</option>
                <option>SR</option>
                <option>PO</option>
                <option>ST</option>
                <option>GAR</option>
                <option>STP</option>
                <option>PML</option>
            </select>
        </div>
    </div>
    <div class="form-group ml-3 mr-3 mt-3">
        <label for="jumlah">Tipe Surat</label>
        <div class="form-group">
            <select class="form-control">
                <option>proyek</option>
                <option>DELIVERY ORDER</option>
                <option>BERITA ACARA UJI COBA</option>
                <option>BERITA ACARA PELATIHAN</option>
                <option>DOKUMENTASI</option>
                <option>BERITA ACARA SERAH TERIMA</option>
                <option>BERITA ACARA PEMELIHARAAN</option>
                <option>BERITA ACARA PROGRES PEKERJAAN</option>
                <option>PERMOHONAN PEMBAYARAN</option>
                <option>INVOICE</option>
                <option>PERFORMA INVOICE</option>
                <option>KWITANSI</option>
                <option>SERVICE REPORT</option>
                <option>PO KELUAR</option>
                <option>SURAT TUGAS</option>
                <option>SURAT GARANSI</option>
                <option>SURAT TUGAS PENGERJAAN</option>
                <option>PEMELIHARAAN PERALATAN</option>
            </select>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-primary ml-3 mb-3">Submit</button>
    </div>
</div>
@endsection