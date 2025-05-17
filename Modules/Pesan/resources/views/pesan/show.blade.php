@extends('pesan::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
  use Illuminate\Support\Carbon;

@endphp
@section('module-content')
  <!-- BEGIN panel -->
  <div class="panel panel-inverse">
    <!-- BEGIN panel-heading -->
    <div class="panel-heading">
      <h4 class="panel-title">{{ $title }}</h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
            class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
            class="fa fa-redo"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
            class="fa fa-minus"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
            class="fa fa-times"></i></a>
      </div>
    </div>
    <div
      style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
      {{-- <a href="{{ route('umum.create') }}" class="btn btn-primary btn-sm">Tambah &ensp;<i class="fa fa-plus-square"
          aria-hidden="true" style="font-size: 12px"></i></a> --}}
      <div style="display: flex; gap: 10px;">
        {{-- <a href="{{ route('umum.export') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-excel" style="font-size: 12px"></i> Export XLS
        </a> --}}

        {{-- <a href="javascript:void(0)" class="btn btn-warning btn-sm"
                onclick="printPage('{{ route('role.print') }}', )">
                <i class="fa fa-print" aria-hidden="true"></i> Print
            </a>

            <a href="{{ route('role.print') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-print" style="font-size: 12px"></i> Print
            </a> --}}

        {{-- <a href="{{ route('umum.pdf') }}" class="btn btn-warning btn-sm">
          <i class="fa fa-file-pdf" style="font-size: 12px"></i> Export PDF
        </a> --}}

      </div>
    </div>

    <div class="mailbox">
      <!-- BEGIN mailbox-sidebar -->
      <div class="mailbox-sidebar">
        <div class="mailbox-sidebar-header d-flex justify-content-center">
          <a href="#emailNav" data-bs-toggle="collapse" class="btn btn-dark btn-sm me-auto d-block d-lg-none">
            <i class="fa fa-cog"></i>
          </a>
          <a href="#" class="btn btn-dark ps-40px pe-40px btn-sm">
            Compose
          </a>
        </div>
        <div class="mailbox-sidebar-content collapse d-lg-block" id="emailNav">
          <!-- BEGIN scrollbar -->
          <div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
            <div class="nav-title"><b>FOLDERS</b></div>
            <ul class="nav nav-inbox">
              <li class="active"><a href="/pesan"><i class="fa fa-hdd fa-lg fa-fw me-2"></i> Inbox <span
                    class="badge bg-gray-600 fs-10px rounded-pill ms-auto fw-bolder pt-4px pb-5px px-8px">{{ $data->count() }}</span></a>
              </li>
              <li><a href="#"><i class="fa fa-flag fa-lg fa-fw me-2"></i> Important</a></li>
              <li><a href="#"><i class="fa fa-envelope fa-lg fa-fw me-2"></i> Sent</a></li>
              <li><a href="#"><i class="fa fa-save fa-lg fa-fw me-2"></i> Drafts</a></li>
              <li><a href="#"><i class="fa fa-trash-alt fa-lg fa-fw me-2"></i> Trash</a></li>
            </ul>
            <div class="nav-title"><b>LABEL</b></div>
            <ul class="nav nav-inbox">
              <li><a href="javascript:;"><i class="fa fa-fw fa-lg fs-12px me-2 fa-circle text-dark"></i> Admin</a>
              </li>
              <li><a href="javascript:;"><i class="fa fa-fw fa-lg fs-12px me-2 fa-circle text-blue"></i> Designer &
                  Employer</a></li>
              <li><a href="javascript:;"><i class="fa fa-fw fa-lg fs-12px me-2 fa-circle text-success"></i> Staff</a>
              </li>
              <li><a href="javascript:;"><i class="fa fa-fw fa-lg fs-12px me-2 fa-circle text-warning"></i>
                  Sponsorer</a></li>
              <li><a href="javascript:;"><i class="fa fa-fw fa-lg fs-12px me-2 fa-circle text-danger"></i> Client</a>
              </li>
            </ul>
          </div>
          <!-- END scrollbar -->
        </div>
      </div>
      <!-- END mailbox-sidebar -->
      <!-- BEGIN mailbox-content -->
      <div class="mailbox-content">
        <div class="mailbox-content-header">
          <div class="btn-toolbar">
            <div class="btn-group me-2">
              <a href="javascript:;" class="btn btn-white btn-sm"><i class="fa fa-fw fa-reply"></i> <span
                  class="d-none d-lg-inline">Reply</span></a>
            </div>
            <div class="btn-group me-2">
              <a href="javascript:;" class="btn btn-white btn-sm"><i class="fa fa-fw fa-trash"></i> <span
                  class="d-none d-lg-inline">Delete</span></a>
              <a href="javascript:;" class="btn btn-white btn-sm"><i class="fa fa-fw fa-archive"></i> <span
                  class="d-none d-lg-inline">Archive</span></a>
            </div>
            <div class="btn-group ms-auto me-2">
              <a href="#" class="btn btn-white btn-sm disabled"><i class="fa fa-fw fa-arrow-up"></i></a>
              <a href="#" class="btn btn-white btn-sm"><i class="fa fa-fw fa-arrow-down"></i></a>
            </div>
            <div class="btn-group">
              <a href="#" class="btn btn-white btn-sm"><i class="fa fa-fw fa-times"></i></a>
            </div>
          </div>
        </div>
        <div class="mailbox-content-body">
          <!-- BEGIN scrollbar -->
          <div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
            <div class="p-3">
              <h3 class="mb-3">{{ $data_detail->title }}</h3>
              <div class="d-flex mb-3">
                <a href="javascript:;">
                  <img class="rounded-pill" width="48" alt="" src="../assets/img/user/user-12.jpg" />
                </a>
                <div class="ps-3">
                  <div class="email-from text-dark fs-14px mb-3px fw-bold">
                    from {{ GetSettings::getEmail() }}
                  </div>
                  <div class="mb-3px"><i class="fa fa-clock fa-fw"></i>
                    {{ Fungsi::format_tgl($data_detail->created_at) }}</div>
                  <div class="email-to">
                    To: {{ $data_detail->email }}
                  </div>
                </div>
              </div>
              <hr class="bg-gray-500" />

              <p class="text-dark">

                <br>{!! $data_detail->message !!} <br>

              </p>
            </div>
          </div>
          <!-- END scrollbar -->
        </div>
        <div class="mailbox-content-footer d-flex align-items-center justify-content-end">
          <div class="btn-group me-2">
            <a href="#" class="btn btn-white btn-sm disabled"><i class="fa fa-fw fa-arrow-up"></i></a>
            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-fw fa-arrow-down"></i></a>
          </div>
          <div class="btn-group">
            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-fw fa-times"></i></a>
          </div>
        </div>
      </div>
      <!-- END mailbox-content -->
    </div>

  </div>
  <script src="{{ asset('assets/js/demo/email-inbox.demo.js') }}"></script>
@endsection
