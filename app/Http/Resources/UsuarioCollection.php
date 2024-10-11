<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use stdClass;

class UsuarioCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $usuarios = [];

        foreach ($this->collection as $item) {
            $empresa = new stdClass();
            $empresa->id = $item->empresa_id;
            $empresa->nome = $item->empresa_nome;

            array_push($usuarios, [
                'id' => $item->id,
                'nome' => $item->usuario_nome,
                'empresa' => $empresa,
                'cadastrado em' => date('d/m/Y H:i:s', strtotime($item->created_at)),
                'atualizado em' => date('d/m/Y H:i:s', strtotime($item->updated_at))
            ]);
        }

        return [
            'data' => $usuarios
        ];
    }
}
