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
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
<div>
{{-- @include('workorder.detail.index') --}}
<div class="row d-flex">
  <h1 class="ml-4">Jadwal Pelaksanaan</h1>
</div>
<div class="card card-primary p-2 m-3">
      <div class="card-body p-0">
        <!-- THE CALENDAR -->
        <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
          <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
            <div class="fc-toolbar-chunk">
              <div class="btn-group">
                <button type="button" title="Previous month" aria-pressed="false" class="fc-prev-button btn btn-primary">
                  <span class="fa fa-chevron-left"></span>
                </button>
                <button type="button" title="Next month" aria-pressed="false" class="fc-next-button btn btn-primary">
                  <span class="fa fa-chevron-right"></span>
                </button>
              </div>
              <button type="button" title="This month" disabled="" aria-pressed="false" class="fc-today-button btn btn-primary">today</button>
            </div>
            <div class="fc-toolbar-chunk">
              <h2 class="fc-toolbar-title" id="fc-dom-1">October 2023</h2>
            </div>
            <div class="fc-toolbar-chunk">
              <div class="btn-group">
                <button type="button" title="month view" aria-pressed="true" class="fc-dayGridMonth-button btn btn-primary active">month</button>
                <button type="button" title="week view" aria-pressed="false" class="fc-timeGridWeek-button btn btn-primary">week</button>
                <button type="button" title="day view" aria-pressed="false" class="fc-timeGridDay-button btn btn-primary">day</button>
              </div>
            </div>
          </div>
          <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active" style="height: 685.185px;">
            <div class="fc-daygrid fc-dayGridMonth-view fc-view">
              <table role="grid" class="fc-scrollgrid table-bordered fc-scrollgrid-liquid">
                <thead role="rowgroup">
                  <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                    <th role="presentation">
                      <div class="fc-scroller-harness">
                        <div class="fc-scroller" style="overflow: hidden;">
                          <table role="presentation" class="fc-col-header ">
                            <colgroup></colgroup>
                            <thead role="presentation">
                              <tr role="row">
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-sun">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Sunday" class="fc-col-header-cell-cushion ">Sun</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-mon">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Monday" class="fc-col-header-cell-cushion ">Mon</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-tue">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Tuesday" class="fc-col-header-cell-cushion ">Tue</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-wed">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Wednesday" class="fc-col-header-cell-cushion ">Wed</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-thu">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Thursday" class="fc-col-header-cell-cushion ">Thu</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-fri">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Friday" class="fc-col-header-cell-cushion ">Fri</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-sat">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Saturday" class="fc-col-header-cell-cushion ">Sat</a></div>
                                </th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </th>
                  </tr>
                </thead>
                <tbody role="rowgroup">
                  <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                    <td role="presentation">
                      <div class="fc-scroller-harness fc-scroller-harness-liquid">
                        <div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden auto;">
                          <div class="fc-daygrid-body fc-daygrid-body-unbalanced ">
                            <table role="presentation" class="fc-scrollgrid-sync-table" style="height: 653px;">
                              <colgroup></colgroup>
                              <tbody role="presentation">
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2023-10-01" aria-labelledby="fc-dom-2">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-2" class="fc-daygrid-day-number" aria-label="October 1, 2023">1</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;">
                                          <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past" style="border-color: rgb(245, 105, 84); background-color: rgb(245, 105, 84);">
                                            <div class="fc-event-main">
                                              <div class="fc-event-main-frame">
                                                <div class="fc-event-title-container">
                                                  <div class="fc-event-title fc-sticky">All Day Event</div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="fc-event-resizer fc-event-resizer-end"></div>
                                          </a>
                                        </div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2023-10-02" aria-labelledby="fc-dom-4">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-4" class="fc-daygrid-day-number" aria-label="October 2, 2023">2</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2023-10-03" aria-labelledby="fc-dom-6">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-6" class="fc-daygrid-day-number" aria-label="October 3, 2023">3</a></div>
                                        <div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2023-10-04" aria-labelledby="fc-dom-8">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-8" class="fc-daygrid-day-number" aria-label="October 4, 2023">4</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2023-10-05" aria-labelledby="fc-dom-10">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-10" class="fc-daygrid-day-number" aria-label="October 5, 2023">5</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2023-10-06" aria-labelledby="fc-dom-12">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-12" class="fc-daygrid-day-number" aria-label="October 6, 2023">6</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2023-10-07" aria-labelledby="fc-dom-14">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-14" class="fc-daygrid-day-number" aria-label="October 7, 2023">7</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2023-10-08" aria-labelledby="fc-dom-16">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-16" class="fc-daygrid-day-number" aria-label="October 8, 2023">8</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2023-10-09" aria-labelledby="fc-dom-18">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-18" class="fc-daygrid-day-number" aria-label="October 9, 2023">9</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2023-10-10" aria-labelledby="fc-dom-20">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-20" class="fc-daygrid-day-number" aria-label="October 10, 2023">10</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2023-10-11" aria-labelledby="fc-dom-22">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-22" class="fc-daygrid-day-number" aria-label="October 11, 2023">11</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2023-10-12" aria-labelledby="fc-dom-24">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-24" class="fc-daygrid-day-number" aria-label="October 12, 2023">12</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2023-10-13" aria-labelledby="fc-dom-26">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-26" class="fc-daygrid-day-number" aria-label="October 13, 2023">13</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2023-10-14" aria-labelledby="fc-dom-28">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-28" class="fc-daygrid-day-number" aria-label="October 14, 2023">14</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2023-10-15" aria-labelledby="fc-dom-30">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-30" class="fc-daygrid-day-number" aria-label="October 15, 2023">15</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2023-10-16" aria-labelledby="fc-dom-32">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-32" class="fc-daygrid-day-number" aria-label="October 16, 2023">16</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2023-10-17" aria-labelledby="fc-dom-34">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-34" class="fc-daygrid-day-number" aria-label="October 17, 2023">17</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2023-10-18" aria-labelledby="fc-dom-36">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-36" class="fc-daygrid-day-number" aria-label="October 18, 2023">18</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2023-10-19" aria-labelledby="fc-dom-38">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-38" class="fc-daygrid-day-number" aria-label="October 19, 2023">19</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2023-10-20" aria-labelledby="fc-dom-40">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-40" class="fc-daygrid-day-number" aria-label="October 20, 2023">20</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2023-10-21" aria-labelledby="fc-dom-42">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-42" class="fc-daygrid-day-number" aria-label="October 21, 2023">21</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2023-10-22" aria-labelledby="fc-dom-44">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-44" class="fc-daygrid-day-number" aria-label="October 22, 2023">22</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2023-10-23" aria-labelledby="fc-dom-46">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-46" class="fc-daygrid-day-number" aria-label="October 23, 2023">23</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2023-10-24" aria-labelledby="fc-dom-48">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-48" class="fc-daygrid-day-number" aria-label="October 24, 2023">24</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2023-10-25" aria-labelledby="fc-dom-50">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-50" class="fc-daygrid-day-number" aria-label="October 25, 2023">25</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="top: 0px; left: 0px; right: -263.7px;">
                                          <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-end fc-event-past" style="border-color: rgb(243, 156, 18); background-color: rgb(243, 156, 18);">
                                            <div class="fc-event-main">
                                              <div class="fc-event-main-frame">
                                                <div class="fc-event-time">12a</div>
                                                <div class="fc-event-title-container">
                                                  <div class="fc-event-title fc-sticky">Long Event</div>
                                                </div>
                                              </div>
                                            </div>
                                          </a>
                                        </div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 25px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2023-10-26" aria-labelledby="fc-dom-52">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-52" class="fc-daygrid-day-number" aria-label="October 26, 2023">26</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 25px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2023-10-27" aria-labelledby="fc-dom-54">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-54" class="fc-daygrid-day-number" aria-label="October 27, 2023">27</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 25px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2023-10-28" aria-labelledby="fc-dom-56">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-56" class="fc-daygrid-day-number" aria-label="October 28, 2023">28</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;">
                                          <a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past" href="https://www.google.com/">
                                            <div class="fc-daygrid-event-dot" style="border-color: rgb(60, 141, 188);"></div>
                                            <div class="fc-event-time">12a</div>
                                            <div class="fc-event-title">Click for Google</div>
                                          </a>
                                        </div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2023-10-29" aria-labelledby="fc-dom-58">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-58" class="fc-daygrid-day-number" aria-label="October 29, 2023">29</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-today " data-date="2023-10-30" aria-labelledby="fc-dom-60">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-60" class="fc-daygrid-day-number" aria-label="October 30, 2023">30</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;">
                                          <a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today">
                                            <div class="fc-daygrid-event-dot" style="border-color: rgb(0, 115, 183);"></div>
                                            <div class="fc-event-time">10:30a</div><div class="fc-event-title">Meeting</div>
                                          </a>
                                        </div>
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;">
                                          <a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today">
                                            <div class="fc-daygrid-event-dot" style="border-color: rgb(0, 192, 239);"></div>
                                            <div class="fc-event-time">12p</div>
                                            <div class="fc-event-title">Lunch</div>
                                          </a>
                                        </div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-10-31" aria-labelledby="fc-dom-62">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-62" class="fc-daygrid-day-number" aria-label="October 31, 2023">31</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;">
                                          <a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future">
                                            <div class="fc-daygrid-event-dot" style="border-color: rgb(0, 166, 90);"></div>
                                            <div class="fc-event-time">7p</div>
                                            <div class="fc-event-title">Birthday Party</div>
                                          </a>
                                        </div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other" data-date="2023-11-01" aria-labelledby="fc-dom-64">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-64" class="fc-daygrid-day-number" aria-label="November 1, 2023">1</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2023-11-02" aria-labelledby="fc-dom-66">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-66" class="fc-daygrid-day-number" aria-label="November 2, 2023">2</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2023-11-03" aria-labelledby="fc-dom-68">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-68" class="fc-daygrid-day-number" aria-label="November 3, 2023">3</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;">
                                        </div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2023-11-04" aria-labelledby="fc-dom-70">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-70" class="fc-daygrid-day-number" aria-label="November 4, 2023">4</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future fc-day-other" data-date="2023-11-05" aria-labelledby="fc-dom-72">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-72" class="fc-daygrid-day-number" aria-label="November 5, 2023">5</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other" data-date="2023-11-06" aria-labelledby="fc-dom-74">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-74" class="fc-daygrid-day-number" aria-label="November 6, 2023">6</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other" data-date="2023-11-07" aria-labelledby="fc-dom-76">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-76" class="fc-daygrid-day-number" aria-label="November 7, 2023">7</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other" data-date="2023-11-08" aria-labelledby="fc-dom-78">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-78" class="fc-daygrid-day-number" aria-label="November 8, 2023">8</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2023-11-09" aria-labelledby="fc-dom-80">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-80" class="fc-daygrid-day-number" aria-label="November 9, 2023">9</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2023-11-10" aria-labelledby="fc-dom-82">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-82" class="fc-daygrid-day-number" aria-label="November 10, 2023">10</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2023-11-11" aria-labelledby="fc-dom-84">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top">
                                        <a id="fc-dom-84" class="fc-daygrid-day-number" aria-label="November 11, 2023">11</a>
                                      </div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
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
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

@endsection
