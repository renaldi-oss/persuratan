@extends('dashboard.layouts.main')

@section('content')

<x-breadcrumb title="Create" link="{{ route('pekerjaan.index') }}" item="Pekerjaan" subItem="Create" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('pekerjaan.store') }}" method="POST">
        {{ csrf_field() }}
        @include('dashboard.Pekerjaan.form', ['tombol' => 'Create'])
    </form>
  </div>
</div>

@endsection
