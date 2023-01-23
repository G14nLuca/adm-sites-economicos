<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutSection;

class AboutController extends Controller
{
    public function index(){

        $fields = AboutSection::where('id',1)->first();

        return view('main', ['view' => 'about', 'fields' => $fields]);
    }

    public function store(Request $request){
        
        $about = new AboutSection();
        $about->nome = $request->nome;
        $about->titulo = $request->titulo;
        $about->subtitulo = $request->subtitulo;
        $about->textoPrincipal = $request->textoPrincipal;
        $about->textoBotao = $request->textoBotao;
        $about->linkBotao = $request->linkBotao;
        $about->corBotao = $request->corBotao;
        $about->textoCard = $request->textoCard;

        $about->save();

        return redirect("/about");

    }
}
