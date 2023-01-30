<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\AboutModel;

class AboutController extends Controller
{
    /*
    *   Retornar à página principal para exibir o formulário da seção Sobre e os elementos-teste resgatados do banco de dados
    */
    public function index()
    {
        return view('main', ['view' => 'about', 'fields' => self::show(1)]);
    }

    /*
    *   Resgatar o primeiro elemento do banco de dados que possuir o valor 'id' correspondente
    */
    public function show($id)
    {
        return AboutModel::findOrFail($id);
    }

    /*
    * Salvar as modificações nos campos de texto no banco de dados
    * Retornar mensagem informando se o processo foi bem-sucedido
    */

    public function updateText(Request $request)
    {
        $about = self::show($request->id);
        $nome = $request->nome;
        $about->$nome = $request->valor;
        $about->save();

        return response()->json(['mensagem' => "Modificação salva com sucesso"], 200);
    }

    /*
    * Salvar as imagens enviadas pelo usuário no banco de dados
    * Retornar mensagem informando se o processo foi bem-sucedido
    */

    public function updateImg(Request $request)
    {
        $about = self::show($request->id);

        $tipo_imagem = $request->tipo_imagem;
        $novo_nome = self::uploadImg($request, $tipo_imagem);

        $about->$tipo_imagem = $novo_nome;
        $about->save();

        return response()->json(['mensagem' => "Imagem salva com sucesso"], 200);
    }

    /*
    * Atribuir novo nome e mover as imagens para seus respectivos diretórios
    * Retornar valor 'novo_nome' ao método 'updateImg' para salvá-lo no banco de dados em caso bem sucedido
    */

    public function uploadImg(Request $request, string $tipo_imagem)
    {
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            
            $request->validate([
                'img' => 'required|image|mimes:jpeg,png,jpg,webm,svg|max:2048',
            ]);

            $img = $request->img;
            $novo_nome = "";

            if ($tipo_imagem == "imgPrincipal") {
                $novo_nome = Storage::disk('local')->put('public/img/main', $img, 'public');
            } else if ($tipo_imagem == "imgCard") {
                $novo_nome = Storage::disk('local')->put('public/img/card', $img, 'public');
            }

            return basename($novo_nome);
        }
    }
}
