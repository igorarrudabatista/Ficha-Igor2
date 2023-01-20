<?php
    
namespace App\Http\Controllers;

use App\Models\CATEGORIA;
use App\Models\FICHA;
use App\Models\ESCOLA;
use App\Models\ALUNO;
use App\Models\Conselho;
use App\Models\Ficha_Conselhos;

use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    
class Ficha_Conselho extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ficha_conselho-list|ficha_conselho-create|ficha_conselho-edit|ficha_conselho-delete', 
                                                                        ['only' => ['index','show']]);
         $this->middleware('permission:ficha_conselho-create',          ['only' => ['create','store']]);
         $this->middleware('permission:ficha_conselho-edit',            ['only' => ['edit','update']]);
         $this->middleware('permission:ficha_conselho-delete',          ['only' => ['destroy']]);
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
        
        $ficha_conselho = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users');
        $users = User::all();
        $conselho = Conselho::all();
     // $categoria = CATEGORIA::with('ficha')->get();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
    
    $ficha_conselho =  FICHA::whereHas('User', function($query) {
        return $query->where('id', auth()->id());
    })->get();
    


              return view(
                'ficha.index',
                [
                    'ficha'        => $ficha_conselho,
                    'escola'       => $escola,
                    'conselho'     => $conselho,
                    'aluno'        => $aluno,
                    'users'        => $users
                ]
            );
        }
    public function index_todas_fichas()
    {
        
  
        
        $ficha_conselho = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
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
                    'ficha'        => $ficha_conselho,
                    'escola'       => $escola,
                    'conselho'     => $conselho,
                    'aluno'        => $aluno,
                    'users'        => $users
                ]
            );
        }
   
    public function index_atender()
    {
        
        $ficha_conselho = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
        $users = User::all();
        $conselho = Conselho::all();
     // $categoria = CATEGORIA::with('ficha')->get();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
    
    //  $ficha =  FICHA::whereHas('User', function($query) {
    //      return $query->where('id', auth()->id());
    //  })->get();

     $ficha_conselho =  FICHA::where('status_id', '=', auth()->id())
     ->get();
    


              return view(
                'ficha.index2',
                [
                    'ficha'        => $ficha_conselho,
                    'escola'       => $escola,
                    'conselho'     => $conselho,
                    'aluno'        => $aluno,
                    'users'        => $users
                ]
            );
        }

  
   public function create()
   {

 
    // $user = User::get();
    // $categoria = CATEGORIA::all();
    // $escola = ESCOLA::all();
    // $aluno = ALUNO::all();

       return view('ficha_conselho.create');
   }
  

    public function store(Request $request, $id)
    {
      $a = $id;

       dd($a);

        $ficha_conselho =  new Ficha_Conselhos();
        $ficha_conselho -> ficha_id                  = $request->id;
        $ficha_conselho -> data_encaminhamento       = $request->data_encaminhamento;
        $ficha_conselho -> Nome_Responsavel          = $request->Nome_Responsavel;
        $ficha_conselho -> CPF_Responsavel           = $request->CPF_Responsavel;
       
       $ficha_conselho ->save();


         return redirect()->route('ficha_conselho.index')
                         ->with('success','Ficha criado com sucesso!');
     }
    

    public function show(Ficha_Conselho $ficha_conselho)
    {
        return view('ficha_conselho.show',compact('ficha_conselho'));
    }

     public function edit(Ficha_Conselho $ficha_conselho)
     {
        $user = User::get();
        $categoria = CATEGORIA::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
        
         return view('ficha_conselho.edit',compact('categoria','escola','aluno', 'user'));
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
     public function update(Request $request, Ficha_Conselhos $ficha_conselho)
     {
    
         $ficha_conselho->update($request->all());
    
         return redirect()->route('ficha_conselho.index')
                          ->with('edit','Atualiazado com sucesso!');
     }




     public function update2(Request $request, FICHA $ficha_conselho)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $ficha_conselho->update($request->all());
    
         return redirect()->route('ficha_conselho.index')
                          ->with('edit','Atualiazado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(FICHA $ficha)
     {
         $ficha->delete();
    
         return redirect()->route('ficha.index')
                          ->with('delete','Ficha deleta com sucesso!');
     }

     public function Conselho1(Request $request, $id)    {

        $ficha = FICHA::find($id);
        //$users = User::findOrFail($id);
      //  $conselho1 = $users;
        $ficha -> FichaStatus = $ficha;
        $ficha -> save();
             
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