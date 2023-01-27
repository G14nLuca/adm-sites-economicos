<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\AboutModel;

class AboutController extends Controller
{
    public function index()
    {
        return view('main', ['view' => 'about', 'fields' => self::show(1)]);
    }

    public function show($id)
    {
        return AboutModel::findOrFail($id);
    }

    public function updateText(Request $request)
    {
        $about = self::show($request->id);
        $nome = $request->nome;
        $about->$nome = $request->valor;
        $about->save();
    }

    public function updateImg(Request $request)
    {
        $about = self::show($request->id);

        $tipoImg = $request->tipoImg;
        $novoNome = self::uploadImg($request);

        $about->$tipoImg = $novoNome;
        $about->save();

        return response()->json(['novoNome' => $novoNome], 200);
    }
    public function uploadImg(Request $request)
    {
        if ($request->hasFile('img') && $request->file('img')->isValid()) {

            $img = $request->img;
            $novoNome = "";
            $tipoImg = $request->tipoImg;

            if ($tipoImg == "imgPrincipal") {
                $novoNome = Storage::disk('local')->put('public/img/main', $img, 'public');
            } else if ($tipoImg == "imgCard") {
                $novoNome = Storage::disk('local')->put('public/img/card', $img, 'public');
            }

            return  basename($novoNome);
        }
    }
}
