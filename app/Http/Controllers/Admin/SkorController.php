<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klasmen;
use App\Models\SkorPertandingan;
use Illuminate\Http\Request;

class SkorController extends Controller
{
    public function indexPage()
    {
        $data['list'] = SkorPertandingan::with(['homeclub','awayclub'])->get();
        return view('admin.pages.skor.index', $data);
    }

    public function addPage()
    {
        $data['list'] = SkorPertandingan::with(['homeclub', 'awayclub'])->get();
        return view('admin.pages.skor.add', $data);
    }

    public function add(Request $request)
    {
        $tes=[];
        foreach ($request->input('match') as $matchId => $scores) {
            $update_score = SkorPertandingan::find($matchId);
            if ($update_score) {
                foreach ($scores as $k => $value_score) {

                    if($k == 'home_club_'.$update_score->home_club_id){
                        $update_score->home_score=$value_score;
                    }
                    if ($k == 'away_club_' . $update_score->away_club_id) {
                        $update_score->away_score = $value_score;
                    }

                    $_exp_club=explode("_",$k);

                    $result=null;
                    $homeWin = $update_score->home_score > $update_score->away_score;
                    $awayWin = $update_score->away_score > $update_score->home_score;
                    $draw = $update_score->home_score === $update_score->away_score;
                    // Update standings for home club
                    $homeClubStandings = Klasmen::where('club_id', $update_score->home_club_id)->first();
                    if (!$homeClubStandings) {
                        $homeClubStandings = new Klasmen();
                    }
                    $homeClubStandings->club_id = $update_score->home_club_id;
                    $homeClubStandings->total_win += $homeWin;
                    $homeClubStandings->total_lost += $awayWin;
                    $homeClubStandings->total_draw += $draw;
                    $homeClubStandings->save();

                    // Update standings for away club
                    $awayClubStandings = Klasmen::where('club_id', $update_score->away_club_id)->first();
                    if(!$awayClubStandings){
                        $awayClubStandings = new Klasmen();
                    }
                    $awayClubStandings->club_id=$update_score->away_club_id;
                    $awayClubStandings->total_win += $awayWin;
                    $awayClubStandings->total_lost += $homeWin;
                    $awayClubStandings->total_draw += $draw;
                    $awayClubStandings->save();

                    // $_check_home_club_klasmen=Klasmen::where('club_id',$update_score->home_club_id)->first();
                    // if(!$_check_home_club_klasmen){
                    //     $_check_home_club_klasmen=new Klasmen();
                    //     // $_check_home_club_klasmen->total_match=1;

                    // }else{
                    //     $_check_home_club_klasmen->total_match = $_check_home_club_klasmen->total_match+1;
                    // }

                    // if ($update_score->home_score > $update_score->away_score) {
                    //     $_check_home_club_klasmen->total_win=$_check_home_club_klasmen->total_win + 1;
                    // }
                    // $_check_home_club_klasmen->club_id=$update_score->home_club_id;
                    // $_check_home_club_klasmen->save();

                    // $_check_away_club_klasmen = Klasmen::where('club_id', $update_score->away_club_id)->first();
                    // if (!$_check_away_club_klasmen) {
                    //     $_check_away_club_klasmen = new Klasmen();
                    //     // $_check_home_club_klasmen->total_match=1;

                    // } else {
                    //     $_check_away_club_klasmen->total_match = $_check_away_club_klasmen->total_match + 1;
                    // }

                    // if ($update_score->home_score > $update_score->away_score) {
                    //     $_check_away_club_klasmen->total_win = $_check_away_club_klasmen->total_win + 1;
                    // }
                    // $_check_away_club_klasmen->club_id = $update_score->home_club_id;
                    // $_check_away_club_klasmen->save();
                }
            }
            $update_score->save();
        }
        return response()->json($tes);

        return redirect('/skor')->with(['success' => 'Skor berhasil diupdate']);
    }
}
