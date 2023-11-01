@extends('dashboard.layouts.main')

@section("style")
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
@endsection
@section("content")

{{-- Administration & finance Table --}}
<section class="content">
<div class="container-fluid">
<div class="card-body fc">
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administration & Finance</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 7px">Tanggal</th>
                                <th>Jenis Kegiatan</th>
                                <th>Instansi</th>
                                <th style="width: 10px">lokasi</th>
                                <th style="width: 10px">No PO</th>
                                <th style="width: 10px">Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>26/10/2023</td>
                                <td>Update software</td>
                                <td>PT Tekno Klop Indonesia</td>
                                <td>Malang</td>
                                <td>001</td>
                                <td>2</td>
                                <td>Rp.500.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- End Table --}}

        {{-- List Project Table --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Proyek</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 7px">Tanggal</th>
                                <th>Jenis Kegiatan</th>
                                <th>Instansi</th>
                                <th style="width: 10px">lokasi</th>
                                <th style="width: 10px">No PO</th>
                                <th style="width: 10px">Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>26/10/2023</td>
                                <td>Update software</td>
                                <td>PT Tekno Klop Indonesia</td>
                                <td>Malang</td>
                                <td>001</td>
                                <td>2</td>
                                <td>Rp.500.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
{{-- END table --}}


{{-- Draggable Events --}}
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
    <div class="sticky-top mb-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Draggable Events</h4>
            </div>
            <div class="card-body">
                <!-- the events -->
                <div id="external-events">
                    <div class="external-event bg-success">Complete</div>
                    <div class="external-event bg-warning">On-Going (Progress)</div>
                    <!-- <div class="external-event bg-info">Do homework</div> -->
                    <!-- <div class="external-event bg-primary"></div> -->
                    <!-- <div class="external-event bg-danger"></div> -->
                    <div class="checkbox">
                        <label for="drop-remove">
                            <input type="checkbox" id="drop-remove">
                            remove after drop
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-md-9">
<div class="card card-primary">
<div class="card-body p-0">
{{-- END --}}

<!-- THE CALENDAR -->
<div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
    <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
        <div class="fc-toolbar-chunk">
            <div class="btn-group"><button class="fc-prev-button btn btn-primary" type="button"
                    aria-label="prev"><span class="fa fa-chevron-left"></span></button><button
                    class="fc-next-button btn btn-primary" type="button"
                    aria-label="next"><span class="fa fa-chevron-right"></span></button></div>
            <button disabled="" class="fc-today-button btn btn-primary"
                type="button">today</button>
        </div>
        <div class="fc-toolbar-chunk">
            <h2 class="fc-toolbar-title">October 2023</h2>
        </div>
        <div class="fc-toolbar-chunk">
            <div class="btn-group"><button
                    class="fc-dayGridMonth-button btn btn-primary active"
                    type="button">month</button><button
                    class="fc-timeGridWeek-button btn btn-primary"
                    type="button">week</button><button
                    class="fc-timeGridDay-button btn btn-primary" type="button">day</button>
            </div>
        </div>
    </div>
<div class="fc-view-harness fc-view-harness-active" style="height: 568.148px;">
<div class="fc-daygrid fc-dayGridMonth-view fc-view">
    <table class="fc-scrollgrid table-bordered fc-scrollgrid-liquid">
        <thead>
            <tr class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                <td>
                    <div class="fc-scroller-harness">
                        <div class="fc-scroller" style="overflow: hidden;">
                            <table class="fc-col-header " style="width: 765px;">
                                <colgroup></colgroup>
                                <tbody>
                                    <tr>
                                        <th
                                            class="fc-col-header-cell fc-day fc-day-sun">
                                            <div class="fc-scrollgrid-sync-inner"><a
                                                    class="fc-col-header-cell-cushion ">Sun</a>
                                            </div>
                                        </th>
                                        <th
                                            class="fc-col-header-cell fc-day fc-day-mon">
                                            <div class="fc-scrollgrid-sync-inner"><a
                                                    class="fc-col-header-cell-cushion ">Mon</a>
                                            </div>
                                        </th>
                                        <th
                                            class="fc-col-header-cell fc-day fc-day-tue">
                                            <div class="fc-scrollgrid-sync-inner"><a
                                                    class="fc-col-header-cell-cushion ">Tue</a>
                                            </div>
                                        </th>
                                        <th
                                            class="fc-col-header-cell fc-day fc-day-wed">
                                            <div class="fc-scrollgrid-sync-inner"><a
                                                    class="fc-col-header-cell-cushion ">Wed</a>
                                            </div>
                                        </th>
                                        <th
                                            class="fc-col-header-cell fc-day fc-day-thu">
                                            <div class="fc-scrollgrid-sync-inner"><a
                                                    class="fc-col-header-cell-cushion ">Thu</a>
                                            </div>
                                        </th>
                                        <th
                                            class="fc-col-header-cell fc-day fc-day-fri">
                                            <div class="fc-scrollgrid-sync-inner"><a
                                                    class="fc-col-header-cell-cushion ">Fri</a>
                                            </div>
                                        </th>
                                        <th
                                            class="fc-col-header-cell fc-day fc-day-sat">
                                            <div class="fc-scrollgrid-sync-inner"><a
                                                    class="fc-col-header-cell-cushion ">Sat</a>
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
        </thead>
        <tbody>
<tr
class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
<td>
<div class="fc-scroller-harness fc-scroller-harness-liquid">
<div class="fc-scroller fc-scroller-liquid-absolute"
    style="overflow: hidden auto;">
    <div class="fc-daygrid-body fc-daygrid-body-unbalanced "
        style="width: 765px;">
        <table class="fc-scrollgrid-sync-table"
            style="width: 765px; height: 536px;">
            <colgroup></colgroup>
            <tbody>
                <tr>
                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                        data-date="2023-10-01">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">1</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                                <div
                                    class="fc-daygrid-event-harness">
                                    <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past"
                                        style="border-color: rgb(60, 207, 78); background-color: rgb(60, 207, 78);">
                                        <div
                                            class="fc-event-main">
                                            <div
                                                class="fc-event-main-frame">
                                                <div
                                                    class="fc-event-title-container">
                                                    <div
                                                        class="fc-event-title fc-sticky">
                                                        Commisioning
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="fc-event-resizer fc-event-resizer-end">
                                        </div>
                                    </a></div>
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                        data-date="2023-10-02">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">2</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                        data-date="2023-10-03">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">3</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                        data-date="2023-10-04">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">4</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                        data-date="2023-10-05">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">5</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                        data-date="2023-10-06">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">6</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                        data-date="2023-10-07">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">7</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                        data-date="2023-10-08">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">8</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                        data-date="2023-10-09">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">9</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                        data-date="2023-10-10">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">10</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                        data-date="2023-10-11">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">11</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                        data-date="2023-10-12">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">12</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                        data-date="2023-10-13">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">13</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                        data-date="2023-10-14">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">14</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                        data-date="2023-10-15">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">15</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                        data-date="2023-10-16">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">16</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                        data-date="2023-10-17">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">17</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                        data-date="2023-10-18">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">18</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                        data-date="2023-10-19">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">19</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                        data-date="2023-10-20">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">20</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                        data-date="2023-10-21">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">21</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                        data-date="2023-10-22">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">22</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                        data-date="2023-10-23">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">23</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                        data-date="2023-10-24">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">24</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                        data-date="2023-10-25">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">25</a>
                            </div>
                            <div class="fc-daygrid-day-events"
                                style="padding-bottom: 25.3906px;">
                                <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs"
                                    style="right: -218.562px;">
                                    <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-end fc-event-past"
                                        style="border-color: rgb(243, 156, 18); background-color: rgb(243, 156, 18);">
                                        <div
                                            class="fc-event-main">
                                            <div
                                                class="fc-event-main-frame">
                                                <div
                                                    class="fc-event-time">
                                                    12a</div>
                                                <div
                                                    class="fc-event-title-container">
                                                    <div
                                                        class="fc-event-title fc-sticky">
                                                        Overhoul
                                                        Motor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a></div>
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                        data-date="2023-10-26">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">26</a>
                            </div>
                            <div class="fc-daygrid-day-events"
                                style="padding-bottom: 25.3906px;">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                        data-date="2023-10-27">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">27</a>
                            </div>
                            <div class="fc-daygrid-day-events"
                                style="padding-bottom: 25.3906px;">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                        data-date="2023-10-28">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">28</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                        data-date="2023-10-29">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">29</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-today "
                        data-date="2023-10-30">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">30</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future"
                        data-date="2023-10-31">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">31</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
                        data-date="2023-11-01">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">1</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other"
                        data-date="2023-11-02">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">2</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other"
                        data-date="2023-11-03">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">3</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other"
                        data-date="2023-11-04">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">4</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future fc-day-other"
                        data-date="2023-11-05">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">5</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other"
                        data-date="2023-11-06">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">6</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other"
                        data-date="2023-11-07">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">7</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
                        data-date="2023-11-08">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">8</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other"
                        data-date="2023-11-09">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">9</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other"
                        data-date="2023-11-10">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">10</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other"
                        data-date="2023-11-11">
                        <div
                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                            <div class="fc-daygrid-day-top"><a
                                    class="fc-daygrid-day-number">11</a>
                            </div>
                            <div class="fc-daygrid-day-events">
                            </div>
                            <div class="fc-daygrid-day-bg">
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
@endsection
{{-- END Calender --}}

@push('script')
    <script src="{{ asset('./plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('./plugins/fullcalendar/main.js') }}"></script>
<script type="text/javascript">
        $(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events: [{
                        title: 'Commisioning',
                        start: new Date(y, m, 1),
                        backgroundColor: '#3CCF4E', //red
                        borderColor: '#3CCF4E', //red
                        allDay: true
                    },
                    {
                        title: 'Overhoul Motor',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor: '#f39c12' //yellow
                    },
                ],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function(e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function(e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })
        })
</script>

@endpush
