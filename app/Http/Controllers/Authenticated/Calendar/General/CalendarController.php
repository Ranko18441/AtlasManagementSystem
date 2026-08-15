<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarController extends Controller
{
    public function show(){
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request){
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getData;
            $reserveDays = array_filter(array_combine($getDate, $getPart));
            foreach($reserveDays as $key => $value){
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                $reserve_settings->decrement('limit_users');
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    // 下記にキャンセルための記述を記載した
    public function delete(Request $request)
{
    $reserve_date = $request->reserve_date;
    $reserve_time = $request->reserve_time;

    // リモ1部がきたときに1にするという処理をしている。
       if($reserve_time == "リモ1部"){
            $reserve_time = 1;
          }else if($reserve_time == "リモ2部"){
            $reserve_time = 2;
          }else if($reserve_time == "リモ3部"){
            $reserve_time = 3;
          }

    $reserveSetting = ReserveSettings::where('setting_reserve', $reserve_date)
    ->where('setting_part', $reserve_time)
    ->first ();

    $reserveSetting->increment('limit_users'); 
    // // ここで「現在ログインしているユーザーと予約枠の紐付け」を削除
 $reserveSetting->users()->detach(Auth::id());

return redirect('/calendar/user_id')
->with('flash_message', '予約をキャンセルしました。');
     }


}
