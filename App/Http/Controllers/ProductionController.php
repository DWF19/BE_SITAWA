<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductionResource;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductionController extends Controller {
    /**
     * index
     *
     * @return void
     */
    public function index() {
        //get all Production
        $production = Production::all();

        //return collection of Production as a resource
        return new ProductionResource(true, 'List Data Production', $production);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request) {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'kecamatan' => 'required|string',
            'bulan' => 'required|string',
            'tahun' => 'required|string',
            'jumlah_padi_akhir_bulan_lalu' => 'nullable|string',
            'jumlah_padi_panen' => 'nullable|string',
            'jumlah_padi_tanam' => 'nullable|string',
            'jumlah_padi_rusak' => 'nullable|string',
            'jumlah_padi_akhir_bulan' => 'nullable|string',
            'jenis_padi_akhir_bulan_lalu_hibrida' => 'nullable|string',
            'jen    is_padi_panen_hibrida' => 'nullable|string',
            'jenis_padi_tanam_hibrida' => 'nullable|string',
            'jenis_padi_rusak_hibrida' => 'nullable|string',
            'jenis_padi_akhir_bulan_hibrida' => 'nullable|string',
            'jenis_padi_akhir_bulan_lalu_non_hibrida' => 'nullable|string',
            'jenis_padi_panen_non_hibrida' => 'nullable|string',
            'jenis_padi_tanam_non_hibrida' => 'nullable|string',
            'jenis_padi_rusak_non_hibrida' => 'nullable|string',
            'jenis_padi_akhir_bulan_non_hibrida' => 'nullable|string',
            'jenis_padi_akhir_bulan_lalu_inbrida' => 'nullable|string',
            'jenis_padi_panen_inbrida' => 'nullable|string',
            'jenis_padi_tanam_inbrida' => 'nullable|string',
            'jenis_padi_rusak_inbrida' => 'nullable|string',
            'jenis_padi_akhir_bulan_inbrida' => 'nullable|string',
            'jenis_padi_akhir_bulan_lalu_non_inbrida' => 'nullable|string',
            'jenis_padi_panen_non_inbrida' => 'nullable|string',
            'jenis_padi_tanam_non_inbrida' => 'nullable|string',
            'jenis_padi_rusak_non_inbrida' => 'nullable|string',
            'jenis_padi_akhir_bulan_non_inbrida' => 'nullable|string',
            'sawah_irigasi_akhir_bulan_lalu' => 'nullable|string',
            'sawah_irigasi_panen' => 'nullable|string',
            'sawah_irigasi_tanam' => 'nullable|string',
            'sawah_irigasi_rusak' => 'nullable|string',
            'sawah_irigasi_akhir_bulan' => 'nullable|string',
            'sawah_tadah_hujan_akhir_bulan_lalu' => 'nullable|string',
            'sawah_tadah_hujan_panen' => 'nullable|string',
            'sawah_tadah_hujan_tanam' => 'nullable|string',
            'sawah_tadah_hujan_rusak' => 'nullable|string',
            'sawah_tadah_hujan_akhir_bulan' => 'nullable|string',
            'sawah_pasang_surut_akhir_bulan_lalu' => 'nullable|string',
            'sawah_pasang_surut_panen' => 'nullable|string',
            'sawah_pasang_surut_tanam' => 'nullable|string',
            'sawah_pasang_surut_rusak' => 'nullable|string',
            'sawah_pasang_surut_akhir_bulan' => 'nullable|string',
            'sawah_lebak_akhir_bulan_lalu' => 'nullable|string',
            'sawah_lebak_panen' => 'nullable|string',
            'sawah_lebak_tanam' => 'nullable|string',
            'sawah_lebak_rusak' => 'nullable|string',
            'sawah_lebak_akhir_bulan' => 'nullable|string',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create Production
        $production = Production::create([
            'user_id' => $request->user_id,
            'kecamatan' => $request->kecamatan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_padi_akhir_bulan_lalu' => $request->jumlah_padi_akhir_bulan_lalu,
            'jumlah_padi_panen' => $request->jumlah_padi_panen,
            'jumlah_padi_tanam' => $request->jumlah_padi_tanam,
            'jumlah_padi_rusak' => $request->jumlah_padi_rusak,
            'jumlah_padi_akhir_bulan' => $request->jumlah_padi_akhir_bulan,
            'jenis_padi_akhir_bulan_lalu_hibrida' => $request->jenis_padi_akhir_bulan_lalu_hibrida,
            'jenis_padi_panen_hibrida' => $request->jenis_padi_panen_hibrida,
            'jenis_padi_tanam_hibrida' => $request->jenis_padi_tanam_hibrida,
            'jenis_padi_rusak_hibrida' => $request->jenis_padi_rusak_hibrida,
            'jenis_padi_akhir_bulan_hibrida' => $request->jenis_padi_akhir_bulan_hibrida,
            'jenis_padi_akhir_bulan_lalu_non_hibrida' => $request->jenis_padi_akhir_bulan_lalu_non_hibrida,
            'jenis_padi_panen_non_hibrida' => $request->jenis_padi_panen_non_hibrida,
            'jenis_padi_tanam_non_hibrida' => $request->jenis_padi_tanam_non_hibrida,
            'jenis_padi_rusak_non_hibrida' => $request->jenis_padi_rusak_non_hibrida,
            'jenis_padi_akhir_bulan_non_hibrida' => $request->jenis_padi_akhir_bulan_non_hibrida,
            'jenis_padi_akhir_bulan_lalu_inbrida' => $request->jenis_padi_akhir_bulan_lalu_inbrida,
            'jenis_padi_panen_inbrida' => $request->jenis_padi_panen_inbrida,
            'jenis_padi_tanam_inbrida' => $request->jenis_padi_tanam_inbrida,
            'jenis_padi_rusak_inbrida' => $request->jenis_padi_rusak_inbrida,
            'jenis_padi_akhir_bulan_inbrida' => $request->jenis_padi_akhir_bulan_inbrida,
            'jenis_padi_akhir_bulan_lalu_non_inbrida' => $request->jenis_padi_akhir_bulan_lalu_non_inbrida,
            'jenis_padi_panen_non_inbrida' => $request->jenis_padi_panen_non_inbrida,
            'jenis_padi_tanam_non_inbrida' => $request->jenis_padi_tanam_non_inbrida,
            'jenis_padi_rusak_non_inbrida' => $request->jenis_padi_rusak_non_inbrida,
            'jenis_padi_akhir_bulan_non_inbrida' => $request->jenis_padi_akhir_bulan_non_inbrida,
            'sawah_irigasi_akhir_bulan_lalu' => $request->sawah_irigasi_akhir_bulan_lalu,
            'sawah_irigasi_panen' => $request->sawah_irigasi_panen,
            'sawah_irigasi_tanam' => $request->sawah_irigasi_tanam,
            'sawah_irigasi_rusak' => $request->sawah_irigasi_rusak,
            'sawah_irigasi_akhir_bulan' => $request->sawah_irigasi_akhir_bulan,
            'sawah_tadah_hujan_akhir_bulan_lalu' => $request->sawah_tadah_hujan_akhir_bulan_lalu,
            'sawah_tadah_hujan_panen' => $request->sawah_tadah_hujan_panen,
            'sawah_tadah_hujan_tanam' => $request->sawah_tadah_hujan_tanam,
            'sawah_tadah_hujan_rusak' => $request->sawah_tadah_hujan_rusak,
            'sawah_tadah_hujan_akhir_bulan' => $request->sawah_tadah_hujan_akhir_bulan,
            'sawah_pasang_surut_akhir_bulan_lalu' => $request->sawah_pasang_surut_akhir_bulan_lalu,
            'sawah_pasang_surut_panen' => $request->sawah_pasang_surut_panen,
            'sawah_pasang_surut_tanam' => $request->sawah_pasang_surut_tanam,
            'sawah_pasang_surut_rusak' => $request->sawah_pasang_surut_rusak,
            'sawah_pasang_surut_akhir_bulan' => $request->sawah_pasang_surut_akhir_bulan,
            'sawah_lebak_akhir_bulan_lalu' => $request->sawah_lebak_akhir_bulan_lalu,
            'sawah_lebak_panen' => $request->sawah_lebak_panen,
            'sawah_lebak_tanam' => $request->sawah_lebak_tanam,
            'sawah_lebak_rusak' => $request->sawah_lebak_rusak,
            'sawah_lebak_akhir_bulan' => $request->sawah_lebak_akhir_bulan,
        ]);

        //return response
        return new ProductionResource(true, 'Data Production Berhasil Ditambahkan!', $production);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id) {
        $production = Production::find($id);

        //return single Production as a resource
        return new ProductionResource(true, 'Detail Data Production!', $production);
    }

    public function showByUserId($user_id) {
        $production = Production::where('user_id', $user_id)->get();

        return new ProductionResource(true, 'Detail Data Production!', $production);
    }
    public function destroy($id)
    {

        //find produ$production by ID
        $production = Production::find($id);

        //delete produ$production
        $production->delete();

        //return response
        return new ProductionResource(true, 'Data produ$production Berhasil Dihapus!', null);
    }
}
