<?php

namespace Modules\Master\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\Parameter;
use RealRashid\SweetAlert\Facades\Alert;

class ParameterController extends Controller
{
  public function create()
  {
    $title = "Parameter";
    Fungsi::hakAkses('/master/parameter');
    $parameter = Parameter::first();
    // $parameter->biaya_pam = Fungsi::rupiah($parameter->biaya_pam);
    // $parameter->denda_ronda = Fungsi::rupiah($parameter->denda_ronda);

    return view(
      'master::parameter.edit',
      [
        'data' => $parameter,
        'title' => $title,
      ]
    );
  }
  public function store(Request $request)
  {
    $data = $request->all();

    $data['biaya_pam'] = str_replace('.', '', $data['biaya_pam']);
    $data['denda_ronda'] = str_replace('.', '', $data['denda_ronda']);

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'parameter' . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = Parameter::findOrFail($request->id);
      $data['updated_by'] = Auth::user()->username;
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('parameter.create');
    }

    $data['created_by'] = Auth::user()->username;
    Parameter::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('parameter.create');
  }
}
