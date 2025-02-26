<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Invoice</title>

  <style>
    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
    }

    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }

    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
    }

    .invoice-box table tr.information table td {
      padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
    }

    .invoice-box table tr.details td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
      border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
      }

      .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
      }
    }

    /** RTL **/
    .invoice-box.rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
      text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
      text-align: left;
    }

    /* @media print {
      .invoice-box {
        max-width: unset;
        box-shadow: none;
        border: 0px;
      }
    } */
  </style>
</head>
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp

<body>
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="2">
          <table style="width: 100%; border-collapse: collapse;">
            <tr>
              <!-- Kolom Logo -->
              <td class="title" style="padding-right: 15px; text-align: center;">
                <img src="{{ GetSettings::getLogo() }}" style="width: 80%; max-width: 80px" />
              </td>

              <!-- Kolom Nama Yayasan -->
              <td style="padding-left: 15px; text-align: left;">
                <h2 style="margin: 0; font-size: 24px;">{{ GetSettings::getNamaWeb() }}</h2>
                <p style="font-size: 12px;"> {{ GetSettings::getAlamat() }}<br>
                  Email: {{ GetSettings::getEmail() }} <br>
                  Telp. : {{ GetSettings::getTelp() }}</p>
              </td>

              <!-- Kolom Invoice Info -->
              <td style="padding-left: 15px; text-align: right;">
                <p style="margin: 0; font-size: 14px;">
                  Nomor :{{ $data->no_pembayaran }}
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table>
      <tr style="text-align: center;">
        <td style="text-align: center; vertical-align: middle; ">
          <p style="margin: 0; font-size: 14px; font-weight: bold;">BUKTI PEMBAYARAN</p>
        </td>
      </tr>
    </table>
    <table>
      {{-- <tr class="information">
        <td colspan="2">
          <table>
            <tr>
              <td>&emsp;</td>
            </tr>
          </table>
        </td>
      </tr> --}}

      <tr class="heading">
        <td>Nama</td>
        <td>{{ $data->nama_warga ?? '' }}</td>
      </tr>
      <tr class="item">
        <td>Alamat</td>
        <td> {{ $data->alamat_warga ?? '' }} </td>
      </tr>
      <tr class="heading">
        <td>Kontak</td>
        <td>{{ $data->telp_warga ?? '' }}</td>
      </tr>
      <tr class="item">
        <td>Tagihan</td>
        <td> {{ $data->tagihan_nama ?? '' }} </td>
      </tr>
      @if ($data->pembayaran_tipe == 1)
        <tr class="heading">
          <td>Periode</td>
          <td>{{ $data->periode_nama ?? '' }}</td>
        </tr>
      @elseif ($data->pembayaran_tipe == 2)
        <tr class="heading">
          <td>Penggunaan Pam</td>
          <td>{{ $data->parameter_pam ?? '' }} (m³)</td>
        </tr>
      @elseif ($data->pembayaran_tipe == 3)
        <tr class="heading">
          <td>Tanggal Absen Ronda</td>
          <td>{{ $data->tgl_absen_ronda ?? '' }}</td>
        </tr>
      @endif

      <tr class="item">
        <td>Tanggal Pembayaran</td>
        <td> {{ Fungsi::format_tgl($data->created_at) ?? '' }} </td>
      </tr>
      <tr class="heading">
        <td>Nominal Pembayaran</td>
        <td> {{ Fungsi::rupiah($data->nominal_dibayar) ?? '' }} </td>
      </tr>


      {{-- <tr class="total">
        <td></td>
        <td>Total: </td>
      </tr> --}}
    </table>

    <table>
      <tr>
        <td>&emsp;</td>
      </tr>
      <tr>
        <td>&emsp;</td>
      </tr>
      <tr>
        <td>
          <p style="font-style: italic">
            <small>*</small>Dikeluarkan secara otomatis oleh sistem sebagai bukti pembayaran yang sah.
          </p>
        </td>
        <td style="text-align: left; padding-right: 20px;">
          {!! $qrCode !!}
        </td>
      </tr>
    </table>
  </div>
</body>

</html>
