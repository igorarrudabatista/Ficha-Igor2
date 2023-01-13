<?php
    
namespace App\Http\Controllers;
    
use App\Models\ESCOLA;
use Illuminate\Http\Request;
    
class EscolaController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:escola-list|escola-create|escola-edit|escola-delete', ['only' => ['index','show']]);
         $this->middleware('permission:escola-create', ['only' => ['create','store']]);
         $this->middleware('permission:escola-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:escola-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        $escola = ESCOLA::latest()->paginate(5);
        return view('escola.index',compact('escola'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
   public function create()
   {
       return view('escola.create');
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
         return view('escola.edit',compact('escola'));
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
    
         return redirect()->route('escola.index')
                         ->with('delete','Escola deletada com sucesso!');
     }
 }