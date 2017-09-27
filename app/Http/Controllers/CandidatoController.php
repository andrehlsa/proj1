<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $cand;
    
    public function __construct(Candidato $cand)
    {
        $this->Candidato = $cand;
    }
    
    public function index()
    {
        $title = 'Lista de Candidatos';
        
        $candidatos = $this->Candidato->all();
        
        return view('candidato', compact('candidatos', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Candidato';
        return view('create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataform = $request->except('_token');
        $this->validate($request, $this->Candidato->rules);
        
        $insert = $this->Candidato->create($dataform);
        
        if ($insert)
            return redirect()->route('candidato.index');
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cand = $this->Candidato->find($id)->delete();
        
       return redirect()->route('candidato.index');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cand = $this->Candidato->find($id);
        $title = 'Editar Candidato';
        
        return view('create', compact('title', 'cand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataform = $request->except('_token');
        
        $this->validate($request, $this->Candidato->rules);
        
        $cand = $this->Candidato->find($id);
        
        $update = $cand->update($dataform);
        
        if ($update)
            return redirect()->route('candidato.index');
        else
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function teste()
    {
        /*$testeinsere = $this->Candidato->create([
            'nome' => 'Andre',
            'foto' => '',
            'datanasc' => now(),
            'numero' => 45,
            'partido' => 'PSDB'
        ]);
        
        if ($testeinsere) 
            return 'Inserido com sucesso!';
        else 
            return 'Erro ao inserir!';*/
        
        /*$testeupdate = $this->Candidato->where('codcandidato', 4)->update([
            'nome' => 'Andrezao',
            'foto' => 'lindo',
            'datanasc' => now(),
            'numero' => 45,
            'partido' => 'PSDB'
        ]);
        
        if ($testeupdate) 
            return 'Alterado com sucesso!';
        else 
            return 'Erro ao alterar!';*/
        
        $testedelete = $this->Candidato->where('codcandidato', 4)->delete();
        
        if ($testedelete) 
            return 'Excluido com sucesso!';
        else 
            return 'Erro ao Excluir!';
    }
}
