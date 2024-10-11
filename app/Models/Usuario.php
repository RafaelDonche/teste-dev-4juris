<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_nome', 'empresa_id'];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'usuarios';

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public static function filtrar($request)
    {
        $usuarios = Usuario::leftjoin('empresas', 'usuarios.empresa_id', 'empresas.id')
            ->where(function ($query) use($request) {
                if (isset($request->id)) {
                    $query->where('usuarios.id', $request->id);
                }
                if (isset($request->usuario_nome)) {
                    $query->where('usuarios.usuario_nome', 'like', '%'. $request->usuario_nome .'%');
                }
                if (isset($request->empresa_id)) {
                    $query->where('usuarios.empresa_id', $request->empresa_id);
                }
                if (isset($request->empresa_nome)) {
                    $query->where('empresas.empresa_nome', 'like', '%'. $request->empresa_nome .'%');
                }
            })
            ->select('usuarios.*', 'empresas.empresa_nome')
            ->paginate(15);

        return $usuarios;
    }
}
