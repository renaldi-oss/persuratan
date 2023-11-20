@extends('dashboard.layouts.main')

@section('content')
<x-breadcrumb title="Detail Work Order" link="{{ route('workorder.index') }}" item="Work Order" subItem="Detail" />
        <div class="row ml-3 mr-3">
            <div class="col-12">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <tbody>
                      <tr>
                        <td class="col-2 p-2">No WO</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->no_wo . '/WO/KET/TKI/I/VI/2023' }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Tanggal</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->due_date }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Client</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->instansi->nama }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Nama Pekerjaan</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->nama }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Lokasi</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->lokasi }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Deskripsi Pekerjaan</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->deskripsi }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Tanggal Kontrak</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->created_at }}</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">Scan PO</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">Placeholder</td>
                      </tr>
                      <tr>
                        <td class="col-2 p-2">No Kontrak</td>
                        <td class="col-1 p-2">:</td>
                        <td class="col-9 p-2">{{ $pekerjaans->no_surat }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
<div class="d-flex justify-content-evenly">
    <div class="col-12">
      <table style="width: 100%">
          <tr>
              <td style="width: 15%">
              <a href="jadwal" >
                  @csrf
                  <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Jadwal Pelaksanaan</button>
              </a>
              </td>
              <td style="width: 15%">
              <a href="purchaseRequest" >
                  @csrf
                  <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Purchase Request</button>
              </a>
              </td>
              <td style="width: 15%">
              <a href="checklist" >
                  @csrf
                  <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Check List</button>
              </a>
              </td>
              <td style="width: 15%">
              <a href="qcPass" >
                  @csrf
                  <button type="submit" class="btn btn-block btn-primary btn-lg p-2">QC Pass</button>
              </a>
              </td>
              <td style="width: 15%">
              <a href="persuratan" >
                  @csrf
                  <button type="submit" class="btn btn-block btn-primary btn-lg p-2">Persuratan</button>
              </a>
              </td>
          </tr>
      </table>
    </div>
  </div>
<div class="row d-flex">
  <h1 class="ml-4">Purchase Request</h1>
  <div class="card-body justify-content-end">
    <a href="add-pr-item">
      <button type="submit" class="btn btn-block btn-primary btn-sm col-2 align-right">
        <i class="fas fa-solid fa-plus"></i>&nbsp;Tambah
      </button>
    </a>
  </div>
</div>
<div class="row ml-3 mr-3">
  <div class="col-12">
    <div class="card">
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Item barang</th>
                  <th>Jumlah</th>
                  <th>Pembelian(Lokal/Online)</th>
                  <th>Harga Estimasi</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>router</td>
              <td>4</td>
              <td>lokal</td>
              <td>1.000.000</td>
              <td>
                  <a href="" class="btn btn-info btn-xs"><i class="fas fa-solid fa-pen"></i>&nbsp;</a>
                  <a href="" class="btn btn-danger btn-xs"><i class="fas fa-solid fa-trash"></i>&nbsp;</a>
              </td>
            </tr>
            <tr style="background-color: cornflowerblue">
              <td></td>
              <td></td>
              <td></td>
              <td style="font-weight: bold">Total</td>
              <td style="font-weight: bold">1.000.000</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection
