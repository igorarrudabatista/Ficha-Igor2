<?php
    
namespace App\Http\Controllers;

use App\Models\CATEGORIA;
use App\Models\FICHA;
use App\Models\ESCOLA;
use App\Models\ALUNO;
use App\Models\Conselho;

use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    
class Ficha_Ministerio extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ficha_ministerio-list|ficha_ministerio-create|ficha_ministerio-edit|ficha_ministerio-delete', 
                                                               ['only' => ['index','show']]);
         $this->middleware('permission:ficha_ministerio-create',          ['only' => ['create','store']]);
         $this->middleware('permission:ficha_ministerio-edit',            ['only' => ['edit','update']]);
         $this->middleware('permission:ficha_ministerio-delete',          ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        
        
        // return view('users.index',compact('users'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        
        $ficha_ministerio = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users');
        $users = User::all();
        $conselho = Conselho::all();
     // $categoria = CATEGORIA::with('ficha')->get();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
    
    $ficha_ministerio =  FICHA::whereHas('User', function($query) {
        return $query->where('id', auth()->id());
    })->get();
    


              return view(
                'ficha.index',
                [
                    'ficha'        => $ficha_ministerio,
                    'escola'       => $escola,
                    'conselho'     => $conselho,
                    'aluno'        => $aluno,
                    'users'        => $users
                ]
            );
        }
    public function index_todas_fichas()
    {
        
  
        
        $ficha_ministerio = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
        $users = User::all();
        $conselho = Conselho::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
    
    // $ficha =  FICHA::whereHas('User', function($query) {
    //     return $query->where('id', auth()->id());
    // })->get();
    


              return view(
                'ficha.todasfichas',
                [
                    'ficha'        => $ficha_ministerio,
                    'escola'       => $escola,
                    'conselho'     => $conselho,
                    'aluno'        => $aluno,
                    'users'        => $users
                ]
            );
        }
   
    public function index_atender()
    {
        
        $ficha_ministerio = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
        $users = User::all();
        $conselho = Conselho::all();
     // $categoria = CATEGORIA::with('ficha')->get();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
    
    //  $ficha =  FICHA::whereHas('User', function($query) {
    //      return $query->where('id', auth()->id());
    //  })->get();

     $ficha_ministerio =  FICHA::where('status_id', '=', auth()->id())
     ->get();
    


              return view(
                'ficha.index2',
                [
                    'ficha'        => $ficha_ministerio,
                    'escola'       => $escola,
                    'conselho'     => $conselho,
                    'aluno'        => $aluno,
                    'users'        => $users
                ]
            );
        }

  
   public function create()
   {

 
    $user = User::get();
    $categoria = CATEGORIA::all();
    $escola = ESCOLA::all();
    $aluno = ALUNO::all();

       return view('ficha.create', compact('categoria','escola','aluno','user'));
   }
    
    public function store(Request $request)
    {

        FICHA::create($request->all());


         return redirect()->route('ficha_ministerio.index')
                         ->with('success','Ficha criado com sucesso!');
     }
    

    public function show(FICHA $ficha)
    {
        return view('ficha_ministerio.show',compact('ficha_ministerio'));
    }

     public function edit(FICHA $ficha)
     {
        $user = User::get();

        $categoria = CATEGORIA::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
        
         return view('ficha_ministerio.edit',compact('ficha_ministerio','categoria','escola','aluno', 'user'));
     }
    

     
    //  public function editconselho(FICHA $ficha, $id)
    //  {
    //     $user = User::get();
    //     $ficha = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
    //     $categoria = CATEGORIA::all();
    //     $escola = ESCOLA::all();
    //     $aluno = ALUNO::all();

    //     return view('ficha.editconselho', ['record' => FICHA::find($id)], compact('ficha','categoria','escola','aluno', 'user'));

    //     //  return view('ficha.editconselho',compact('ficha','categoria','escola','aluno', 'user'));
    //  }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, FICHA $ficha_ministerio)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $ficha_ministerio->update($request->all());
    
         return redirect()->route('ficha_ministerio.index')
                          ->with('edit','Atualiazado com sucesso!');
     }
     public function update2(Request $request, FICHA $ficha_ministerio)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $ficha_ministerio->update($request->all());
    
         return redirect()->route('ficha_ministerio.index')
                          ->with('edit','Atualiazado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(FICHA $ficha_ministerio)
     {
         $ficha_ministerio->delete();
    
         return redirect()->route('ficha_ministerio.index')
                          ->with('delete','Ficha deleta com sucesso!');
     }

     public function Conselho1(Request $request, $id)    {

        $ficha_ministerio = FICHA::find($id);
        //$users = User::findOrFail($id);
      //  $conselho1 = $users;
        $ficha_ministerio -> FichaStatus = $ficha_ministerio;
        $ficha_ministerio -> save();
             
        //   toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ','success');
    
          return redirect('/ficha');
      }
    public function Conselho2(Request $request, $id) 
       {
    
   

         $user = FICHA::find($id); 
         $user -> status_id = $user->id;
         $user -> save();
             



          return redirect('/ficha');
      }
    public function Conselho3(Request $request, $id)    {
    
        $ficha = FICHA::find($id);
        $conselho3 = 'Conselho3';
        $ficha -> FichaStatus   = $conselho3;
        $ficha -> save();
             
        //   toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ','success');
    
          return redirect('/ficha');
      }
 }