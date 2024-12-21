<?php

namespace Modules\Profile\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
  public function index()
  {
    // Fungsi::hakAkses('/settings/role');
    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    $title = Auth::user()->name;
    $data = Auth::user();
    return view(
      'profile::index',
      [
        'title' => $title,
        'data' => $data,
      ]
    );
  }

  public function store(Request $request)
  {
    $data = $request->all();

    if ($request->filled('password')) {
      $data['password'] = bcrypt($request->password);
    } else {
      if (!empty($request->id)) {
        $user = User::findOrFail($request->id);
        $data['password'] = $user->password;
      }
    }

    if ($request->hasFile('img')) {
      $extension = $request->img->getClientOriginalExtension();
      $newFileName = 'profile_' . $request->username . '_' . now()->timestamp . '.' . $extension;
      $request->file('img')->move(public_path('/img'), $newFileName);
      $data['img'] = $newFileName;
    }

    if (!empty($request->id)) {
      $updateData = User::findOrFail($request->id);
      $updateData->update($data);
      Alert::success('Success', 'Data berhasil diupdate');
      return redirect()->route('profile.index');
    }

    User::create($data);
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('profile.index');
  }
}
