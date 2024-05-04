<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        return view('role/index', [
            'role' => Role::all()
        ]);
    }

    public function create()
    {
        return view('role/create');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        } else {
            try {
                $new_role = Role::create([
                    'nama' => $request->get('nama'),
                    'slug' => Str::slug($request->get('nama'), "-"),
                ]);

                return redirect(route('role.index'));
            } catch (\Exception $e) {
                return abort(422);
            }
        }
    }

    public function edit($id)
    {
        $data['role'] = Role::find($id);

        if (!$data['role'])
            return abort(404);

        return view('role/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        } else {
            try {
                $role = Role::find($id);

                if (!$role)
                    return abort(404);

                $role->update([
                    'nama' => $request->get('nama'),
                    'slug' => Str::slug($request->get('nama'), "-"),
                ]);

                return redirect(route('role.index'));
            } catch (\Exception $e) {
                return abort(422);
            }
        }
    }

    public function delete($id)
    {
        $role = Role::find($id);

        if (!$role)
            return abort(404);

        if ($role->delete())
            return redirect(route('role.index'));
        else
            return abort(500);
    }
}
