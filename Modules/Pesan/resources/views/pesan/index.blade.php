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
          <!-- BEGIN btn-toolbar -->
          <div class="btn-toolbar align-items-center">
            <div class="form-check me-2">
              <input type="checkbox" class="form-check-input" data-checked="email-checkbox" id="emailSelectAll"
                data-change="email-select-all" />
              <label class="form-check-label" for="emailSelectAll"></label>
            </div>
            <div class="dropdown me-2">
              <button class="btn btn-white btn-sm" data-bs-toggle="dropdown">
                View All <span class="caret ms-3px"></span>
              </button>
              <div class="dropdown-menu">
                <a href="javascript:;" class="dropdown-item"><i class="fa fa-circle fs-9px fa-fw me-2"></i> All</a>
                <a href="javascript:;" class="dropdown-item"><i class="fa fa-circle fs-9px fa-fw me-2 text-muted"></i>
                  Unread</a>
                <a href="javascript:;" class="dropdown-item"><i class="fa fa-circle fs-9px fa-fw me-2 text-blue"></i>
                  Contacts</a>
                <a href="javascript:;" class="dropdown-item"><i class="fa fa-circle fs-9px fa-fw me-2 text-success"></i>
                  Groups</a>
                <a href="javascript:;" class="dropdown-item"><i class="fa fa-circle fs-9px fa-fw me-2 text-warning"></i>
                  Newsletters</a>
                <a href="javascript:;" class="dropdown-item"><i class="fa fa-circle fs-9px fa-fw me-2 text-danger"></i>
                  Social updates</a>
                <a href="javascript:;" class="dropdown-item"><i class="fa fa-circle fs-9px fa-fw me-2 text-indigo"></i>
                  Everything else</a>
              </div>
            </div>
            <button class="btn btn-sm btn-white me-2"><i class="fa fa-redo"></i></button>
            <div class="w-100 d-sm-none d-block mb-2 hide" data-email-action="divider"></div>
            <!-- BEGIN btn-group -->
            <div class="btn-group">
              <button class="btn btn-sm btn-white hide" data-email-action="delete"><i class="fa fa-times me-1"></i>
                <span class="hidden-xs">Delete</span></button>
              <button class="btn btn-sm btn-white hide" data-email-action="archive"><i class="fa fa-folder me-1"></i>
                <span class="hidden-xs">Archive</span></button>
              <button class="btn btn-sm btn-white hide" data-email-action="archive"><i class="fa fa-trash me-1"></i>
                <span class="hidden-xs">Junk</span></button>
            </div>
            <!-- END btn-group -->
            <!-- BEGIN btn-group -->
            <div class="btn-group ms-auto">
              <button class="btn btn-white btn-sm">
                <i class="fa fa-chevron-left"></i>
              </button>
              <button class="btn btn-white btn-sm">
                <i class="fa fa-chevron-right"></i>
              </button>
            </div>
            <!-- END btn-group -->
          </div>
          <!-- END btn-toolbar -->
        </div>
        <div class="mailbox-content-body">
          <div data-scrollbar="true" data-height="100%" data-skip-mobile="true">
            <!-- BEGIN list-email -->
            <ul class="list-group list-group-lg no-radius list-email">
              @foreach ($data as $item)
                <li class="list-group-item unread">
                  <div class="email-checkbox">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" data-checked="email-checkbox"
                        id="emailCheckbox1">
                      <label class="form-check-label" for="emailCheckbox1"></label>
                    </div>
                  </div>
                  <a href="{{ route('pesan.show', $item->id) }}" class="email-user bg-blue">
                    <span class="text-white">F</span>
                  </a>
                  <div class="email-info">
                    <a href="{{ route('pesan.show', $item->id) }}">
                      <span class="email-sender">{{ $item->title }}</span>
                      <span class="email-title">{{ Str::limit(strip_tags($item->message), 50) }}</span>
                      <span class="email-desc">&emsp;</span>
                      <span
                        class="email-time">{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->diffForHumans() : '-' }}
                      </span>
                    </a>
                  </div>
                </li>
              @endforeach

            </ul>
            <!-- END list-email -->
          </div>
        </div>
        <div class="mailbox-content-footer d-flex align-items-center">
          <div class="text-dark fw-bold">{{ $data->count() }}</div>
          <div class="btn-group ms-auto">
            <button class="btn btn-white btn-sm">
              <i class="fa fa-fw fa-chevron-left"></i>
            </button>
            <button class="btn btn-white btn-sm">
              <i class="fa fa-fw fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- END mailbox-content -->
    </div>

  </div>
  <script src="{{ asset('assets/js/demo/email-inbox.demo.js') }}"></script>
@endsection
