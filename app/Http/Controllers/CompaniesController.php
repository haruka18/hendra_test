<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Companies;

class CompaniesController extends Controller
{
    public function index()
    {
        return view('companies/index', [
            'companies' => Companies::all()
        ]);
    }

    public function create()
    {
        $data['companies'] = Companies::all();

        return view('companies/create', $data);
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
                $new_companies = Companies::create([
                    'nama' => $request->get('nama'),
                    'parent_id' => $request->get('parent_id'),
                ]);

                return redirect(route('companies.index'));
            } catch (\Exception $e) {
                return abort(422);
            }
        }
    }

    public function edit($id)
    {
        $data['companies'] = Companies::find($id);
        $data['parents'] = Companies::where('id', '!=', $id)->get();

        if (!$data['companies'])
            return abort(404);

        return view('companies/edit', $data);
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
                $companies = Companies::find($id);

                if (!$companies)
                    return abort(404);

                $companies->update([
                    'nama' => $request->get('nama'),
                    'parent_id' => $request->get('parent_id'),
                ]);

                return redirect(route('companies.index'));
            } catch (\Exception $e) {
                return abort(422);
            }
        }
    }

    public function delete($id)
    {
        $companies = Companies::find($id);

        if (!$companies)
            return abort(404);

        if ($companies->delete())
            return redirect(route('companies.index'));
        else
            return abort(500);
    }
}
