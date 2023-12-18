@extends('dashboard.layouts.main')

@section('content')

<x-breadcrumb title="Create" link="{{ route('workorder.index') }}" item="Pekerjaan" subItem="Create" />

<div class="card m-3">
  <div class="card-body">
    <form id="Form" action="{{ route('quality-control.store') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="work_order_id" value="{{ $work_order_id }}">
        @include('dashboard.WorkOrder.QualityControl.form', ['tombol' => 'Create'])
    </form>
  </div>
</div>

@endsection
