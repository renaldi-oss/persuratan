@extends('dashboard.layouts.main')

@section('content')

<x-breadcrumb title="Update" link="{{ route('pekerjaan.index') }}" item="Pekerjaan" subItem="Update" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('pekerjaan.update', $pekerjaan->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        @include('dashboard.Pekerjaan.form', ['tombol' => 'Update'])
    </form>
  </div>
</div>

@endsection
