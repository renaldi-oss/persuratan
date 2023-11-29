@extends('dashboard.layouts.main')

@section('content')

<x-breadcrumb title="Update" link="{{ route('kodeSurat.index') }}" item="kode surat" subItem="Update" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('kodeSurat.update', $kodeSurat->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        @include('dashboard.kodeSurat.form', ['tombol' => 'Update'])
    </form>
  </div>
</div>

@endsection
