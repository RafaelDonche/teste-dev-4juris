<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use stdClass;

class ClienteCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $clientes = [];

        foreach ($this->collection as $item) {
            $usuario = new stdClass();
            $usuario->id = $item->usuario_id;
            $usuario->nome = $item->usuario_nome;

            array_push($clientes, [
                'id' => $item->id,
                'nome' => $item->cliente_nome,
                'usuario' => $usuario,
                'cadastrado em' => date('d/m/Y H:i:s', strtotime($item->created_at)),
                'atualizado em' => date('d/m/Y H:i:s', strtotime($item->updated_at))
            ]);
        }

        return [
            'data' => $clientes
        ];
    }
}
