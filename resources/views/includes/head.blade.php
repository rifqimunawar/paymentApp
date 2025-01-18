@php
  $getWebName = App\Helpers\GetSettings::getNamaWeb();
  $getLogo = App\Helpers\GetSettings::getLogo();
@endphp
<meta charset="utf-8" />
<title>{{ $getWebName }} | @yield('title')</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />

<link rel="icon" type="image/x-icon" href="{{ $getLogo }}">
<meta content="" name="description" />
<meta content="" name="author" />

<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/default/app.min.css') }}" rel="stylesheet" />
<!-- ================== END BASE CSS STYLE ================== -->

<!-- ================== BEGIN page-css ================== -->
<link href="{{ asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
  rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/spectrum-colorpicker2/dist/spectrum.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select-picker/dist/picker.min.css') }}" rel="stylesheet" />

@stack('css')
