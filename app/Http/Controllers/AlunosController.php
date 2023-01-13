<?php

namespace App\Http\Controllers;

use App\Models\TBGERPESSOA;
use App\Models\ALUNO;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class AlunosController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:aluno-list|aluno-create|aluno-edit|aluno-delete', ['only' => ['index','show']]);
         $this->middleware('permission:aluno-create', ['only' => ['create','store']]);
         $this->middleware('permission:aluno-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:aluno-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluno = ALUNO::latest()->paginate(5);
        return view('aluno.index',compact('aluno'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
   public function create()
   {
       return view('aluno.create');
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
    
        ALUNO::create($request->all());
    
         return redirect()->route('aluno.index')
                         ->with('success','Aluno cadastrado com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(ALUNO $aluno)
    {
        return view('aluno.show',compact('aluno'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(ALUNO $aluno)
     {
         return view('aluno.edit',compact('aluno'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, ALUNO $aluno)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $aluno->update($request->all());
    
         return redirect()->route('aluno.index')
                         ->with('edit','Aluno atualizado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(ALUNO $aluno)
     {
         $aluno->delete();
    
         return redirect()->route('aluno.index')
                         ->with('delete','Aluno deletado com sucesso!');
     }
}
