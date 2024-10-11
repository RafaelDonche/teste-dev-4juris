<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_nome', 'usuario_id'];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'clientes';

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public static function filtrar($request)
    {
        $clientes = Cliente::leftjoin('usuarios', 'clientes.usuario_id', 'usuarios.id')
            ->where(function ($query) use($request) {
                if (isset($request->id)) {
                    $query->where('clientes.id', $request->id);
                }
                if (isset($request->cliente_nome)) {
                    $query->where('clientes.cliente_nome', 'like', '%'. $request->cliente_nome .'%');
                }
                if (isset($request->usuario_id)) {
                    $query->where('clientes.usuario_id', $request->usuario_id);
                }
                if (isset($request->usuario_nome)) {
                    $query->where('usuarios.usuario_nome', 'like', '%'. $request->usuario_nome .'%');
                }
            })
            ->select('clientes.*', 'usuarios.usuario_nome')
            ->paginate(15);

        return $clientes;
    }
}
