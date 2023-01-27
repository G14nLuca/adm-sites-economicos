<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutSection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'titulo' => $this->titulo,
            'subtitulo' => $this->subtitulo,
            'textoPrincipal' => $this->textoPrincipal,
            'textoBotao' => $this->textoBotao,
            'linkBotao' => $this->linkBotao,
            'textoCard' => $this->textoCard,
            'corBotao' => $this->corBotao,
            'imgPrincipal' => $this->imgPrincipal,
            'imgCard' => $this->imgCard
        ];
    }
}
