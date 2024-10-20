<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(string $id)
    {
        $profile = User::find($id);
        $roles = DB::table('roles')->get();

        return view('pages.profile-index', compact('profile', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $profile = User::find($id);

		$rules = [
			"name" => ["required", "string", "min:1"],
            "email" => [
                "required",
				"email",
				"string",
				"min:1",
            ],
		];

		if ($profile->email != $request->email) {
			$rules["email"] = [
				"unique:users,email",
			];
		}

		$validation = $request->validate($rules);
		$update = $profile->update($validation);

		if (!$update) {
			return redirect()
				->route("profile.index", $id)
				->with([
					"error" => "Gagal mengubah data profil!",
				]);
		}

		return redirect()
			->route("profile.index", $id)
			->with([
				"success" => "Berhasil mengubah data profil!",
			]);
    }
}
