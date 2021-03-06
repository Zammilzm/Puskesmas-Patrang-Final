<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pelayanan;

use App\rujukan;

use DB;

use Carbon\Carbon;

class rujukanController extends Controller
{
	public function rujukan()
	{
		$rujukanpasien = rujukan::all();
		return view('perujukanpasien', compact('rujukanpasien'));
	}

	public function formrujukan()
	{
		$pelayanans = pelayanan::whereNotExists(function($query){
			$query->select(DB::raw(1))
			->from('rujukans')
			->whereRaw('rujukans.id_pelayanan = pelayanans.id_pelayanan');
		})->where('rujukan','=','1')->get();
		return view('formperujukanpasien', compact('pelayanans'));
	}

	public function addrujukan(Request $request)
	{
		$input = ([
			'id_pelayanan' => $request->id_pelayanan,
			'tanggal_rujukan' => $request->tanggal_rujukan,
			'keterangan' => $request->keterangan,
			'tempat_rujukan' => $request->tempat_rujukan,
			]);
		rujukan::create($input);
		return redirect('rujukan');
	}
	public function editrujukan($id_rujukan)
	{
		$datarujukans = rujukan::find($id_rujukan);
		$pelayanans = pelayanan::all();

		return view('editPerujukan', compact('datarujukans', 'pelayanans'));
	}

	public function updaterujukan(Request $request, rujukan $rujukan, $id_rujukan)
	{
		$input = ([

			'tanggal_rujukan' => $request->tanggal_rujukan,
			'keterangan' => $request->keterangan,
			'tempat_rujukan' => $request->tempat_rujukan,
                'updated_at' => Carbon::now() //carbon buat inisialisasi tanggal dan waktu skrang
                ]);

		$data = $rujukan::where('id_rujukan',$id_rujukan)->update($input);
		return redirect('rujukan');
	}

}