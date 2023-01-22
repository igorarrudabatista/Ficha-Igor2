<?php
    
namespace App\Http\Controllers;

use App\Models\CATEGORIA;
use App\Models\FICHA;
use App\Models\ESCOLA;
use App\Models\ALUNO;
use App\Models\Conselho;
use Spatie\Permission\Models\Role;

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
         $this->middleware('permission:ficha-list|ficha-create|ficha-edit|ficha-delete', 
                                                               ['only' => ['index','show']]);
         $this->middleware('permission:ficha-create',          ['only' => ['create','store']]);
         $this->middleware('permission:ficha-edit',            ['only' => ['edit','update']]);
         $this->middleware('permission:ficha-delete',          ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        
        $ficha = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users');
        $users = User::all();
        $conselho = Conselho::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
        
        
                   // $ficha =  FICHA::whereHas('User', function($query) {
            //     return $query->where('id', auth()->id());
            // })->get();

            //    $ficha  =   User::whereHas("roles", function($q){ $q->where("name", "Escola"); })->get();


        // User::whereHas('role', function(Builder $query) {
        //     return $query->name === 'Conselho';
        //  });


              return view(
                'ficha_conselho.index',
                [
                    'ficha'        => $ficha,
                    'escola'       => $escola,
                    'conselho'     => $conselho,
                    'aluno'        => $aluno,
                    'users'        => $users
                ]
            );
        }
    public function index_todas_fichas()
    {
        
  
        
        $ficha = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
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
                    'ficha'        => $ficha,
                    'escola'       => $escola,
                    'conselho'     => $conselho,
                    'aluno'        => $aluno,
                    'users'        => $users
                ]
            );
        }
   
    public function index_atender()
    {
        
        $ficha = Ficha::with('categoria', 'escola', 'aluno', 'user', 'users')->get();
        $users = User::all();
        $conselho = Conselho::all();
     // $categoria = CATEGORIA::with('ficha')->get();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
    
    //  $ficha =  FICHA::whereHas('User', function($query) {
    //      return $query->where('id', auth()->id());
    //  })->get();

     $ficha =  FICHA::where('status_id', '=', auth()->id())
     ->get();
    


              return view(
                'ficha.index2',
                [
                    'ficha'        => $ficha,
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

       return view('ficha_conselho.create', compact('categoria','escola','aluno','user'));
   }
    
    public function store(Request $request)
    {

        // FICHA::create($request->all());
        $ficha_conselho =  new FICHA;

        
        $ficha_conselho -> Data_comunica_tutelar       = $request->Data_comunica_tutelar;
        $ficha_conselho -> Nome_tutelar       = $request->Nome_tutelar;
        $ficha_conselho -> CPF_tutelar       = $request->CPF_tutelar;

        $ficha_conselho->save();

         return redirect()->route('ficha_conselho.index')
                         ->with('success','Ficha criado com sucesso!');
     }
    

    public function show(FICHA $ficha)
    {
        return view('ficha_conselho.show',compact('ficha'));
    }



    public function edit(FICHA $ficha_conselho)
     {
        $user = User::pluck('name','id');
        $perfis = Role::all()->pluck('name');
        $perfil =Role::whereNotIn('name', ['Admin', 'Conselho'])->pluck('name');

        $perfil_escola= User::role('Escola')->pluck('name', 'id');
        $perfil_MP= User::role('Ministério Público')->pluck('name','id');
        $categoria = CATEGORIA::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();

        
        
         return view('ficha_conselho.edit',compact('perfil_escola','perfil_MP','perfil','perfis','ficha_conselho','categoria','escola','aluno', 'user'));
     }
    

     
     public function update(Request $request, FICHA $ficha_conselho)
     {
      
         $ficha_conselho->update($request->all());
    
         return redirect()->route('ficha.index')
                          ->with('edit','Atualiazado com sucesso!');
     }
     public function update2(Request $request, FICHA $ficha)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $ficha->update($request->all());
    
         return redirect()->route('ficha.index')
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