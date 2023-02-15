<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CrudEvents;
use App\Models\FICHA;
class CalenderController extends Controller
{
    public function index(Request $request)
    {
        
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();


        //$data = CrudEvents::get();

        if($request->ajax()) {  
            $data = CrudEvents::get();
            return response()->json($data);
        }
        
        return view(
            'Agenda/calendar-event',
            [
         
                'userCount'    => $userCount

            ]
        );
    }
 
    public function calendarEvents(Request $request)
    {
 
        switch ($request->type) {
           case 'create':
              $event = CrudEvents::create([
                  'event_name' => $request->event_name,
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'edit':
              $event = CrudEvents::find($request->id)->update([
                  'event_name' => $request->event_name,
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = CrudEvents::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # ...
             break;
        }
    }
}