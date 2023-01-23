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
        $about->imgPrincipal = $this->imageUpload($request, "imgPrincipal");

        $about->textoBotao = $request->textoBotao;
        $about->linkBotao = $request->linkBotao;
        $about->corBotao = $request->corBotao;

        $about->textoCard = $request->textoCard;
        $about->imgCard = $this->imageUpload($request, "imgCard");

        $about->save();

        return redirect("/about");

    }

    public function imageUpload(Request $request, string $atributoNome){
        if($request->hasFile($atributoNome) && $request->file($atributoNome)->isValid()){

            $imagem = $request->$atributoNome;
            $extensao = $imagem->extension();

            //Nome relativo do arquivo
            $arquivoNome = md5( $imagem->getClientOriginalName() . strtotime("now") . "." . $extensao );

            if ($atributoNome == "imgPrincipal"){
                $imagem->move(public_path("img/main_img", $arquivoNome));
            } elseif ($atributoNome == "imgCard"){
                $imagem->move(public_path("img/card_img", $arquivoNome));
            }

            return $arquivoNome;

        }
    }

}
