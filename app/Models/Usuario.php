<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = [
        'usuario',
        'senha',
        'nome',
        'email',
        'cpf',
        'tipo',
        'status',
    ];

    protected $hidden = [
        'senha',
    ];

    public $timestamps = true;

    protected $casts = [
        'status' => 'boolean',
    ];

    // Campos que serão criptografados automaticamente
    protected $encryptable = [
        'nome',
        'cpf',
        'tipo',
        // senha NÃO criptografar, pois é hash
    ];

    // Criptografa ao salvar os campos que devem
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable) && !is_null($value)) {
            $value = Crypt::encryptString($value);
        }
        return parent::setAttribute($key, $value);
    }

    // Descriptografa ao acessar os campos que devem
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        if (in_array($key, $this->encryptable) && !is_null($value)) {
            try {
                return Crypt::decryptString($value);
            } catch (DecryptException $e) {
                // Se não conseguir descriptografar, retorna o valor original
                return $value;
            }
        }
        return $value;
    }
}
