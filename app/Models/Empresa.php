<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['empresa_nome'];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'empresas';

    public static function filtrar($request)
    {
        $empresas = Empresa::where(function ($query) use($request) {
                if (isset($request->id)) {
                    return $query->where('id', $request->id);
                }
                if (isset($request->empresa_nome)) {
                    return $query->where('empresa_nome', 'like', '%'. $request->empresa_nome .'%');
                }
            })
            ->paginate(15);

        return $empresas;
    }
}
