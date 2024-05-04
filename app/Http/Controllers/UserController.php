<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\Companies;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->company->parent_id == null) {
            $ids_comp = [Auth::user()->company_id];
            $childs = Companies::where('parent_id', Auth::user()->company_id)
                ->get();

            foreach ($childs as $key => $val) {
                $ids_comp[] = $val->id;
            }

            $data['user'] = User::whereIn('company_id', $ids_comp)
                ->with('role', 'company')
                ->get();
        } else {
            $data['user'] = User::where('company_id', Auth::user()->company_id)
                ->with('role', 'company')->get();
        }

        return view('user/index', $data);
    }

    public function create()
    {
        $data['roles'] = Role::all();
        $data['companies'] = Companies::all();

        return view('user/create', $data);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        } else {
            try {
                $new_user = User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'role_id' => $request->get('role_id'),
                    'company_id' => $request->get('company_id'),
                    'password' => Hash::make($request['password']),
                ]);

                return redirect(route('user.index'));
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        $data['roles'] = Role::all();
        $data['companies'] = Companies::all();

        if (!$data['user'])
            return abort(404);

        return view('user/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        } else {
            try {
                $user = User::find($id);

                if (!$user)
                    return abort(404);

                $user->update([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'role_id' => $request->get('role_id'),
                    'company_id' => $request->get('company_id'),
                ]);

                return redirect(route('user.index'));
            } catch (\Exception $e) {
                return abort(422);
            }
        }
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user)
            return abort(404);

        if ($user->delete())
            return redirect(route('user.index'));
        else
            return abort(500);
    }
}
