<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmpresaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $empresas = [];

        foreach ($this->collection as $item) {
            array_push($empresas, [
                'id' => $item->id,
                'nome' => $item->empresa_nome,
                'cadastradoEm' => date('d/m/Y H:i:s', strtotime($item->created_at)),
                'atualizadoEm' => date('d/m/Y H:i:s', strtotime($item->updated_at))
            ]);
        }

        return [
            'data' => $empresas
        ];
    }
}
