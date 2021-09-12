<?php

namespace App\Http\Controllers;

use App\Models\ClientsCheckin;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCheckIn()
    {
        $movimentacao = ClientsCheckin::leftJoin('users', 'clients_checkins.user_id', '=', 'users.id')
        ->leftJoin('empresas', 'clients_checkins.empresa_id', '=', 'empresas.id')
        ->get(['clients_checkins.id as id','users.name as nome_cliente', 'empresas.nome as nome_empresa',]);

        return view('admin.movimentacao.listagem_checkin', compact('movimentacao'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCheckOut()
    {
        $movimentacao = ClientsCheckin::all();
        return view('admin.movimentacao.listagem_checkin', compact('movimentacao'));
    }


    /**
     * Retorna o QRCode de Checkin da empresa
     */
    public function storeCheckIn($empresa)
    {

        $empresa = Empresa::where('codigo', $empresa)->first();
        if(!$empresa){
            return view('admin.includes.error');
        }

        $dados['empresa_id'] = $empresa->id;
        $dados['user_id'] = Auth::user()->id;
        
        ClientsCheckin::create($dados);

        return view('admin.includes.checkin');
        
    }


}
