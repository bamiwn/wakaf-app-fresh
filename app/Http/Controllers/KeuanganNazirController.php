<?php

namespace App\Http\Controllers;

use App\Models\Proporsi;
use App\Models\Efisiensi;
use App\Models\Increment;
use App\Models\KeuanganNazir;
use App\Models\HasilPengelolaan;
use Illuminate\Http\Request;

class KeuanganNazirController extends Controller
{
    public function funding($pwp, $jp, $pwt)
    {
        return ($pwp / $jp) + ($pwt / $jp);
    }

    public function managing($hppaw, $jp, $tbo, $bnhp, $rpaw, $investasi, $ta)
    {
        return ($hppaw / $jp) + ($tbo / $hppaw) + ($bnhp / $hppaw) + ($rpaw / $hppaw) + ($investasi / $ta);
    }

    public function donating($dp, $hppaw)
    {
        return $dp / $hppaw;
    }

    public function efisiensi($pwp, $pwt, $tbo, $dp, $hppaw)
    {
        return (($pwp + $pwt) / $tbo) + ($dp / $tbo) + ($hppaw / $tbo);
    }

    public function hasilPengelolaan($hppaw, $investasi)
    {
        return $hppaw / $investasi * 100;
    }

    public function kinerjaNazir($perhitungan, $x, $y)
    {
        if($perhitungan > 0 && $perhitungan < $x) {
            $kinerjaPerhitungan = 'Kurang Baik';
        } else if ($perhitungan > $x && $perhitungan < $y) {
            $kinerjaPerhitungan = 'Baik';
        } else {
            $kinerjaPerhitungan = 'Sangat Baik';
        }

        return $kinerjaPerhitungan;
    }

    public function index()
    {
        return view('/nazir/keuangan-nazir/index', [
            'keuanganNazir' => KeuanganNazir::all()
        ]);
    }

    public function create()
    {
        return view('/nazir/keuangan-nazir/create', [
            'fkkn' => Increment::max('increment')
        ]);
    }

    public function store(Request $request)
    {
        // TANGKAP NILAI
        $fkuser    = $request->input('FK_USER');
        $fkkn      = $request->input('FK_KN');
        $pwp       = (int) preg_replace("/[^0-9]/", "", $request->input('PWP'));
        $pwt       = (int) preg_replace("/[^0-9]/", "", $request->input('PWT'));
        $jp        = (int) preg_replace("/[^0-9]/", "", $request->input('JP'));
        $ta        = (int) preg_replace("/[^0-9]/", "", $request->input('TA'));
        $tbo       = (int) preg_replace("/[^0-9]/", "", $request->input('TBO'));
        $kan       = (int) preg_replace("/[^0-9]/", "", $request->input('KAN'));
        $hppaw     = (int) preg_replace("/[^0-9]/", "", $request->input('HPPAW'));
        $dp        = (int) preg_replace("/[^0-9]/", "", $request->input('DP'));
        $dri       = (int) preg_replace("/[^0-9]/", "", $request->input('DRI'));
        $investasi = (int) preg_replace("/[^0-9]/", "", $request->input('INVESTASI'));
        $ksk       = (int) preg_replace("/[^0-9]/", "", $request->input('KSK'));
        $tp        = (int) preg_replace("/[^0-9]/", "", $request->input('TP'));
        $bnhp      = (int) preg_replace("/[^0-9]/", "", $request->input('BNHP'));
        $rpaw      = (int) preg_replace("/[^0-9]/", "", $request->input('RPAW'));


        $funding      = $this->funding($pwp, $jp, $pwt); 
        $managing     = $this->managing($hppaw, $jp, $tbo, $bnhp, $rpaw, $investasi, $ta);
        $donating     = $this->donating($dp, $hppaw);
        $proporsi     = $funding + $managing + $donating;
        $proporsiNew  = round($proporsi, 2);
        $efisiensiNew = round($this->efisiensi($pwp, $pwt, $tbo, $dp, $hppaw), 2);
        $hpNew        = round($this->hasilPengelolaan($hppaw, $investasi), 2);

        $kinerjaProporsi  = $this->kinerjaNazir($proporsiNew, 1, 2);
        $kinerjaEfisiensi = $this->kinerjaNazir($efisiensiNew, 10, 20);
        $kinerjaHp        = $this->kinerjaNazir($hpNew, 4.5, 10);


        KeuanganNazir::create([
            'user_id'   => $fkuser,
            'pwp'       => $pwp, 
            'pwt'       => $pwt, 
            'jp'        => $jp,  
            'ta'        => $ta,  
            'tbo'       => $tbo, 
            'kan'       => $kan, 
            'hppaw'     => $hppaw, 
            'dp'        => $dp,
            'dri'       => $dri,
            'investasi' => $investasi,  
            'ksk'       => $ksk, 
            'tp'        => $tp, 
            'bnhp'      => $bnhp,
            'rpaw'      => $rpaw
        ]);

        Proporsi::create([
            'user_id'           => $fkuser,
            'keuangan_nazir_id' => $fkkn,
            'nilai_total'       => $proporsiNew,
            'kinerja'           => $kinerjaProporsi
        ]);

        Efisiensi::create([
            'user_id'           => $fkuser,
            'keuangan_nazir_id' => $fkkn,
            'nilai_total'       => $efisiensiNew,
            'kinerja'           => $kinerjaEfisiensi
        ]);

        HasilPengelolaan::create([
            'user_id'           => $fkuser,
            'keuangan_nazir_id' => $fkkn,
            'nilai_total'       => $hpNew,
            'kinerja'           => $kinerjaHp
        ]);

        Increment::create(['increment' => $fkkn]);

        return redirect('/nazir/keuangan-nazir');
    }


    public function show(KeuanganNazir $keuangan_nazir){}

    public function edit($id)
    {
        $keuangan_nazir = KeuanganNazir::find($id);
        return view('nazir/keuangan-nazir/edit', [
            'keuangan_nazir' => $keuangan_nazir,
            'title'          => 'Edit Keuangan'
        ]);
    }

    public function update(Request $request, $id)
    {
        $keuangan_nazir = KeuanganNazir::find($id);
        // TANGKAP NILAI  SESUAI ID
        $keuangan_nazir->pwp       = $request->PWP;
        $keuangan_nazir->pwt       = $request->PWT;
        $keuangan_nazir->jp        = $request->JP;
        $keuangan_nazir->ta        = $request->TA;
        $keuangan_nazir->tbo       = $request->TBO;
        $keuangan_nazir->kan       = $request->KAN;
        $keuangan_nazir->hppaw     = $request->HPPAW;
        $keuangan_nazir->dp        = $request->DP;
        $keuangan_nazir->dri       = $request->DRI;
        $keuangan_nazir->investasi = $request->INVESTASI;
        $keuangan_nazir->ksk       = $request->KSK;
        $keuangan_nazir->tp        = $request->TP;
        $keuangan_nazir->bnhp      = $request->BNHP;
        $keuangan_nazir->rpaw      = $request->RPAW;

        
        $funding      = $this->funding($request->PWP, $request->JP, $request->PWT); 
        $managing     = $this->managing($request->HPPAW, $request->JP, $request->TBO, $request->BNHP, $request->RPAW, $request->INVESTASI, $request->TA);
        $donating     = $this->donating($request->DP, $request->HPPAW);
        $proporsi     = $funding + $managing + $donating;
        $proporsiNew  = round($proporsi, 2);
        $efisiensiNew = round($this->efisiensi($request->PWP, $request->PWT, $request->TBO, $request->DP, $request->HPPAW), 2);
        $hpNew        = round($this->hasilPengelolaan($request->HPPAW, $request->INVESTASI), 2);

        $kinerjaProporsi  = $this->kinerjaNazir($proporsiNew, 1, 2);
        $kinerjaEfisiensi = $this->kinerjaNazir($efisiensiNew, 10, 20);
        $kinerjaHp        = $this->kinerjaNazir($hpNew, 4.5, 10);

        // TANGKAP DATA MASUKIN TABEL PROPORSI, EFISIENSI, DAN HP
        $proporsi              = Proporsi::find($id);
        $proporsi->nilai_total = $proporsiNew;
        $proporsi->kinerja     = $kinerjaProporsi;

        $efisiensi              = Efisiensi::find($id);
        $efisiensi->nilai_total = $efisiensiNew;
        $efisiensi->kinerja     = $kinerjaEfisiensi;

        $hasil_pengelolaan              = HasilPengelolaan::find($id);
        $hasil_pengelolaan->nilai_total = $hpNew;
        $hasil_pengelolaan->kinerja     = $kinerjaHp;

        $keuangan_nazir->save();
        $proporsi->save();
        $efisiensi->save();
        $hasil_pengelolaan->save();
        $editState = "Data Keuangan ke-" . $id . " Berhasil Diedit!";
        return redirect('/nazir/keuangan-nazir')->with('doneEdit', $editState);
    }

    public function destroy(Request $request, $id)
    {
        $keuangan_nazir    = KeuanganNazir::find($id);
        $proporsi          = Proporsi::find($id);
        $efisiensi         = Efisiensi::find($id);
        $hasil_pengelolaan = HasilPengelolaan::find($id);
        $keuangan_nazir->delete();
        $proporsi->delete();
        $efisiensi->delete();
        $hasil_pengelolaan->delete();
        $deleteState = "Data Keuangan ke-" . $id . " Berhasil dihapus!";
        return redirect('/nazir/keuangan-nazir')->with('doneDelete', $deleteState);
    }

    public function hitung($id)
    {
        $keuangan_nazir = KeuanganNazir::find($id);
        // TANGKAP NILAI  SESUAI ID
        $pwp       = $keuangan_nazir->pwp;
        $pwt       = $keuangan_nazir->pwt;
        $jp        = $keuangan_nazir->jp;
        $ta        = $keuangan_nazir->ta;
        $tbo       = $keuangan_nazir->tbo;
        $kan       = $keuangan_nazir->kan;
        $hppaw     = $keuangan_nazir->hppaw;
        $dp        = $keuangan_nazir->dp;
        $dri       = $keuangan_nazir->dri;
        $investasi = $keuangan_nazir->investasi;
        $ksk       = $keuangan_nazir->ksk;
        $tp        = $keuangan_nazir->tp;
        $bnhp      = $keuangan_nazir->bnhp;
        $rpaw      = $keuangan_nazir->rpaw;


        // ======= DIHITUNG ==================================== 
        $funding1 = ($pwp / $jp);
        $funding2 = ($pwt / $jp);
        $totalFunding = $funding1 + $funding2;

        $managing1 = ($hppaw / $jp); 
        $managing2 = ($tbo / $hppaw);
        $managing3 = ($bnhp / $hppaw);
        $managing4 = ($rpaw / $hppaw);
        $managing5 = ($investasi / $ta);
        $totalManaging = $managing1 + $managing2 + $managing3 + $managing4 + $managing5;

        $totalDonating = $dp / $hppaw;

        $proporsiOld = $totalFunding + $totalManaging + $totalDonating;
        $proporsiNew = round($proporsiOld, 2);

        // ==============================================================================  
        $efisiensi1 = (($pwp + $pwt) / $tbo);
        $efisiensi2 = ($dp / $tbo);
        $efisiensi3 = ($hppaw / $tbo);
        $totalEfisiensi = $efisiensi1 + $efisiensi2 + $efisiensi3;
        $efisiensiNew   = round($totalEfisiensi, 2);

        // ==============================================================================
        $hpOld = $hppaw / $investasi * 100;
        $hpNew = round($hpOld, 2);

        return view('nazir/keuangan-nazir/hitung', [
            'id' => $id,
            'pwp' => $pwp,
            'pwt' => $pwt,
            'jp' => $jp, 
            'ta' => $ta, 
            'tbo' => $tbo,
            'kan' => $kan,
            'hppaw' => $hppaw,
            'dp' => $dp, 
            'dri' => $dri,
            'investasi' => $investasi,
            'ksk' => $ksk,
            'tp' => $tp, 
            'bnhp' => $bnhp,
            'rpaw' => $rpaw,
            'funding1' => $funding1,
            'funding2' => $funding2,
            'totalFunding' => $totalFunding,
            'managing1' => $managing1,
            'managing2' => $managing2,
            'managing3' => $managing3,
            'managing4' => $managing4,
            'managing5' => $managing5,
            'totalManaging' => $totalManaging,
            'totalDonating' => $totalDonating,
            'proporsi' => $proporsiNew,
            'efisiensi1' => $efisiensi1,
            'efisiensi2' => $efisiensi2,
            'efisiensi3' => $efisiensi3,
            'efisiensi' => $efisiensiNew,
            'hasilPengelolaan' => $hpNew,
        ]);
    }
}
