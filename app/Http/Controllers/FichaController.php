<?php
    
namespace App\Http\Controllers;

use App\Models\CATEGORIA;
use App\Models\FICHA;
use App\Models\ESCOLA;
use App\Models\ALUNO;
use Illuminate\Http\Request;
    
class FichaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ficha-list|ficha-create|ficha-edit|ficha-delete', ['only' => ['index','show']]);
         $this->middleware('permission:ficha-create', ['only' => ['create','store']]);
         $this->middleware('permission:ficha-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ficha-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $ficha = Ficha::with('categoria', 'escola', 'aluno')->get();

        $escola = ESCOLA::latest()->paginate(5);
        $categoria = CATEGORIA::latest()->paginate(5);
       // $ficha = FICHA::latest()->paginate(5);
        return view('ficha.index',compact('ficha','escola','categoria'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
   public function create()
   {

       //$categoria = CATEGORIA::all(); 
    //    $categoria = CATEGORIA::pluck('FichaCatNome');
    //    $escola = ESCOLA::pluck('EscolaNome');
    //    $aluno = ALUNO::pluck('AlunoNome');

    $categoria = CATEGORIA::all();
    $escola = ESCOLA::all();
    $aluno = ALUNO::all();

       return view('ficha.create', compact('categoria','escola','aluno'));
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
        // CATEGORIA::create($request->all());
        // ESCOLA::create($request->all());
        // ALUNO::create($request->all());
        FICHA::create($request->all());
    
         return redirect()->route('ficha.index')
                         ->with('success','Ficha criado com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(FICHA $ficha)
    {
        return view('ficha.show',compact('ficha'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(FICHA $ficha)
     {
        $categoria = CATEGORIA::all();
        $escola = ESCOLA::all();
        $aluno = ALUNO::all();
         return view('ficha.edit',compact('ficha','categoria','escola','aluno'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, FICHA $ficha)
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
        $conselho1 = 'Conselho1';
        $ficha -> FichaStatus   = $conselho1;
        $ficha -> save();
             
        //   toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ','success');
    
          return redirect('/ficha');
      }
    public function Conselho2(Request $request, $id)    {
    
        $ficha = FICHA::find($id);
        $conselho2 = 'Conselho2';
        $ficha -> FichaStatus   = $conselho2;
        $ficha -> save();
             
        //   toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ','success');
    
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