<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransportFee;
use App\Grade;
use App\Afler;
use App\Aflee;

class Schedule extends Model
{
    public function afler(){
        return $this->belongsTo('App\Afler');
    }

    public function aflee(){
        return $this->belongsTo('App\Aflee');
    }

    public function location(){
        return TransportFee::find($this->transport_fee_id);
        //return $this->belongsTo('App\TransportFee');
    }

    public function grade(){
        //return Grade::find($this->grade_id);
        return $this->belongsTo('App\Grade');
    }

    public function checkInput($input){
        $AllAflers = Afler::all();
        $checkGuru = 0;
        foreach ($AllAflers as $afler){
            if ($afler->id = $input) {
                $checkGuru++;
            }
        }

        $AllAflees = Aflee::all();
        $checkSiswa = 0;
        foreach ($AllAflees as $aflee){
            if ($aflee->id = $input) {
                $checkSiswa++;
            }
        }

        $check= [
                "checkGuru" => $checkGuru,
                "checkSiswa" => $checkSiswa
                ];
        return $check;
    }

    public function salary($sumStudent, $sumSession, $idGrade, $idLocation){
        
        $level = Grade::find($idGrade)->level;
        $ongkos = $sumSession == 0 ? 0 : TransportFee::find($idLocation)->cost;
        //$session_fee = Grade::find($idGrade)->primary_fee;
        if ($level == "10" || $level == "11" || $level == "12") {
            if ($sumStudent == 1) {
                $session_fee = 60000;
                $session_cost = 75000;
            } else {
                $session_fee = 60000 + ($sumStudent-1)*10000;
                $session_cost = 80000 + ($sumStudent-1)*20000;
            }
        } elseif ($level == "TPB or Kuliah") {
            if ($sumStudent == 1) {
                $session_fee = 75000;
                $session_cost = 90000;
            } else {
                $session_fee = 75000 + ($sumStudent-1)*15000;
                $session_cost = 94000 + ($sumStudent-1)*25000;
            }
        }elseif ($level == "SMA to PTN") {
            if ($sumStudent == 1) {
                $session_fee = 75000;
                $session_cost = 90000;
            } else {
                $session_fee = 75000 + ($sumStudent-1)*10000;
                $session_cost = 95000 + ($sumStudent-1)*20000;
            }
        } elseif ($level == "Olimp SMA") {
            if ($sumStudent == 1) {
                $session_fee = 90000;
                $session_cost = 110000;
            } else {
                $session_fee = 90000 + ($sumStudent-1)*20000;
                $session_cost = 110000 + ($sumStudent-1)*40000;
            }
        } elseif ($level == "Olimp SMP") {
            if ($sumStudent == 1) {
                $session_fee = 75000;
                $session_cost = 90000;
            } else {
                $session_fee = 75000 + ($sumStudent-1)*20000;
                $session_cost = 90000 + ($sumStudent-1)*40000;
            }
        } else {
            if ($sumStudent == 1) {
                $session_fee = 50000;
                $session_cost = 65000;
            } else {
                $session_fee = 50000 + ($sumStudent-1)*10000;
                $session_cost = 71000 + ($sumStudent-1)*20000;
            }
        }

        $fee_per_session = $session_fee;
        $cost_per_session = $session_cost;
        $total_fee = ($session_fee*$sumSession) + $ongkos ;
        $total_cost = ($session_cost*$sumSession) + $ongkos;
        $salary= [
                "fee_per_session" => $fee_per_session,
                "cost_per_session" => $cost_per_session,
                "total_fee" => $total_fee,
                "total_cost" => $total_cost
                ];
        //$schedule->fee_per_session = ($session_fee + ($request->sum_student - 1 )*10000)*$schedule->confirm_status;
        return $salary;

    }
}
