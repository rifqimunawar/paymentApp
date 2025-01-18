<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Master\Models\Periode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Master\Exports\PeriodeExport;

class PeriodeController extends Controller
{
  public function index()
  {
    Fungsi::hakAkses('/master/periode');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = 'Data Periode';
    $data = Periode::latest()->get();
    return view(
      'master::/periode/index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function create()
  {
    Fungsi::hakAkses('/master/periode');

    $title = "Periode Baru";
    return view(
      'master::periode/create',
      [
        'title' => $title,
      ]
    );
  }

  public function store(Request $request)
  {
    $data = $request->all();

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'periode' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Periode::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('periode.index');
    }

    $data['created_by'] = Auth::user()->username;
    Periode::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('periode.index');
  }
  public function edit($id)
  {
    $title = "Update Data Periode";
    Fungsi::hakAkses('/master/periode');
    $periode = Periode::findOrFail($id);

    return view(
      'master::periode.edit',
      [
        'data' => $periode,
        'title' => $title,
      ]
    );
  }
  public function destroy($id)
  {
    Fungsi::hakAkses('/master/periode');

    $data = Periode::findOrFail($id);
    $data->deleted_by = Auth::user()->username;
    // if ($data->karyawans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data periode');
    //   return redirect()->route('periode.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('periode.index');
  }
  public function print()
  {
    $title = "List Data Periode ";
    $data = Periode::latest();
    return view(
      'master::periode/print',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }
  public function export()
  {
    return Excel::download(new PeriodeExport, 'periode.xlsx');
  }
  public function pdf()
  {
    $title = "List Data Periode " . Carbon::now()->format('d-M-Y');
    $today = Carbon::now()->format('d M Y');
    $data = Periode::latest();

    // ========================untuk development
    return view(
      'master::periode/pdf',
      [
        'title' => $title,
        'data' => $data,
        'today' => $today,
      ]
    );

    // ========================untuk production
    // $html = view('master::periode.pdf', [
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
