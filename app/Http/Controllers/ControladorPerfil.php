<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Perfil;
use App\Models\Grupo;
use App\Models\sorteio;
use App\Models\User;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id)
    {
        $dados = Perfil::where('grupo_id', '=', $id)->with('User')->get();
        if(isset($dados))
            return view('listaPerfils', compact('dados'));
        return redirect('/grupo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $verifica = Perfil::where('user_id', '=', Auth::id())->where('grupo_id', '=', $id)->first();
        if(isset($verifica)){
            return redirect('/grupo')->with('danger', 'Você já está inscrito neste sorteio!!');
        }else{
            $dados = Grupo::find($id);
            if(isset($dados))
                return view('novaInscricao', compact('dados'));
            return redirect('/grupo');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $dados = new Perfil();
        $dados->dicaPresente = $request->input('dicaPresente');
        $dados->user_id = Auth::id();
        $dados->grupo_id = $id;
        $dados->save();
        return redirect('/grupo')->with('success', 'Inscrição realizada com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Perfil::find($id);
        if(isset($dados))
            return view('editarPresente', compact('dados'));
        return redirect('/grupo');
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
        $dados = Perfil::find($id);
        if(isset($dados)){
            $dados->dicaPresente = $request->input('dicaPresente');
            $dados->save();
            return redirect('/grupo')->with('success', 'atualização realizada com sucesso!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = Perfil::find($id);
        if(isset($dados))
            $dados->delete();
        return redirect('/grupo');
    }

    public function verAmigo($id){
        $dados = Sorteio::where('grupo_id', '=', $id)->where('perfil_id', '=', Auth::id())->first();
        $perfil = Perfil::find($dados->perfilSorteado_id);
        $amigo = User::find($perfil->user_id);
        
        return view('verAmigo', compact('amigo'));
    }
}