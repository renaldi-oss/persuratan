@extends('dashboard.layouts.main')

@section('content')
<div class="row d-flex ml-3">
  <h1 class="ml-4">Tambah Item Purchase Request</h1>
</div>
<div class="card ml-3 mr-3">
    <form action="" method="post">
        @csrf <!-- Laravel CSRF token -->

        <!-- First Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group ml-3 mr-3 mt-3">
                    <label for="nama">Nama Barang</label>
                    <input type="input" class="form-control" id="nama" name="nama" placeholder="Masukkan nama barang">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ml-3 mr-3 mt-3">
                    <label for="tipe">Tipe</label>
                    <select class="form-control" name="tipe">
                        <option value="primary">Primary</option>
                        <option value="additional">Additional</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Second Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group ml-3 mr-3 mt-1">
                    <label for="jumlah">Jumlah</label>
                    <input type="input" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah barang">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ml-3 mr-3 mt-1">
                    <label for="pembelian">Pembelian</label>
                    <select class="form-control" name="pembelian">
                        <option disabled>Pilih tipe toko</option>
                        <option value="offline">Offline</option>
                        <option value="online">Online</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Third Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group ml-3 mr-3 mt-1">
                    <label for="harga">Harga</label>
                    <input type="input" class="form-control" id="harga" name="harga" placeholder="Masukkan harga per item">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="ml-3 mr-3 mb-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
