<?php

namespace Modules\Tagihan\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Modules\Tagihan\Models\Pam;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Exports\UmumExport;
use Modules\Master\Models\Warga;
use RealRashid\SweetAlert\Facades\Alert;

class PamController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/tagihan/pam');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Tagihan Pam';
    $data = Warga::latest()->get();
    return view(
      'tagihan::/pam/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/tagihan/pam');

    $title = "Tagihan Pam Baru";
    return view(
      'tagihan::pam/create',
      [
        'title' => $title,
      ]
    );
  }

  public function store(Request $request)
  {
    $wargaId = $request->warga_id;
    $dataTerakhir = Pam::where('warga_id', $wargaId)->latest('tanggal_input')->first();
    $parameterTerakhir = $dataTerakhir ? $dataTerakhir->parameter_sekarang : 0;
    $parameter = $request->parameter_sekarang - $parameterTerakhir;
    $nominal = $parameter * $request->tarif_per_unit;

    if (!empty($request->id)) {
      $updateData = Pam::findOrFail($request->id);
      $updateData->update([
        'parameter_terakhir' => $parameterTerakhir,
        'parameter_sekarang' => $request->parameter_sekarang,
        'parameter' => $parameter,
        'tanggal_input' => now(),
        'tarif_per_unit' => $request->tarif_per_unit,
        'nominal' => $nominal,
        'updated_by' => Auth::user()->username,
      ]);
      Alert::success('Success', 'Data berhasil diupdate');
    } else {
      Pam::create([
        'warga_id' => $wargaId,
        'parameter_terakhir' => $parameterTerakhir,
        'parameter_sekarang' => $request->parameter_sekarang,
        'parameter' => $parameter,
        'tanggal_input' => now(),
        'tarif_per_unit' => $request->tarif_per_unit,
        'nominal' => $nominal,
        'created_by' => Auth::user()->username,
      ]);
      Alert::success('Success', 'Data berhasil disimpan');
    }
    return redirect()->route('pam.index');
  }

  public function edit($id)
  {
    $title = "Update Data Pam";
    Fungsi::hakAkses('/tagihan/pam');
    $pam = Pam::findOrFail($id);

    return view(
      'tagihan::pam.edit',
      [
        'data' => $pam,
        'title' => $title,
      ]
    );
  }

  public function view($id)
  {
    $title = "Detail Tagihan Pam Swadaya";
    Fungsi::hakAkses('/tagihan/pam');
    $warga = Warga::findOrFail($id)->with('tagihanPam')->first();

    // dd($warga);
    return view(
      'tagihan::pam.view',
      [
        'data' => $warga,
        'title' => $title,
      ]
    );
  }

  public function print()
  {
    $title = "List Data Pam";
    $data = Pam::latest();
    return view(
      'tagihan::pam/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new UmumExport, 'pam.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Tagihan Pam " . Carbon::now()->format('d-M-Y');
    $today = Carbon::now()->format('d M Y');
    $data = Pam::latest();

    // ========================untuk development
    return view(
      'tagihan::pam/pdf',
      [
        'title' => $title,
        'data' => $data,
        'today' => $today,
      ]
    );

    // ========================untuk production
    // $html = view('tagihan::pam.pdf', [
    //   'title' => $title,
    //   'data' => $data,
    //   'today' => $today,
    // ])->render();

    // $mpdf = new \Mpdf\Mpdf();
    // $mpdf->WriteHTML($html);
    // $fileName = Carbon::now()->format('Y_m_d') . '_data_karyawan.pdf';
    // $mpdf->Output($fileName, 'D');
    // $mpdf->Output();
  }
}
