<?php
    
namespace App\Http\Controllers;
    
use App\Models\ESCOLA;
use App\Models\FICHA;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\User;


class AgendaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:escola-list|escola-create|escola-edit|escola-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:escola-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:escola-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:escola-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __invoke()
     {

        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
         $events = [];
  
         //$appointments = Agenda::with(['users'])->get();
         $appointments = Agenda::where('users', '=', auth()->id())->get();
  
         foreach ($appointments as $appointment) {
             $events[] = [
                 'title'    => $appointment->users->name ?? ' ('.$appointment->comments.')',
                 'start'    => $appointment->start_time,
                 'end'      => $appointment->finish_time,
             ];
         }
  
         return view('Agenda.index', compact('events', 'userCount'));
     }



    public function index()
    {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        $escola = ESCOLA::get();


        //$ficha = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
   //  $ficha =  FICHA::get();
          $ficha =  FICHA::where('status_id', '=', 'Auth()user()->id');
          $user =   Auth::user()->id;

          if ($ficha ) {
           $true = 1;

          }
          
        //   $ficha =  FICHA::where('status_id', '=', auth()->id())
        //     ->get();

          
    


          return view(
            'escola.index',
            [
                'ficha'        => $ficha,
                'escola'       => $escola,
                'user'         => $user,
                'true'         => $true,
                'userCount'    => $userCount
                
                
            ]
        );

      //  return view('escola.index',compact('escola','ficha','user'));
           
    }
    
    
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
   public function create()
   {
    $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();
       return view('escola.create', compact('userCount'));
   }
    
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
    public function store(Request $request)
    {
        // request()->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
    
        ESCOLA::create($request->all());
    
         return redirect()->route('escola.index')
                         ->with('success','Escola cadastrada com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(ESCOLA $escola)
    {
        return view('escola.show',compact('escola'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(ESCOLA $escola)
     {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
         return view('escola.edit',compact('escola','userCount'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, ESCOLA $escola)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $escola->update($request->all());
    
         return redirect()->route('escola.index')
                         ->with('edit','Escola atualizada com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(ESCOLA $escola)
     {
         $escola->delete();
         
         toast('Your Post as been submited!','success');

         return redirect()->route('escola.index')
                         ->with('delete','Escola deletada com sucesso!');
     }
 }