<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Config
 * @package App\Models
 * @version May 19, 2021, 3:40 pm WIB
 *
 * @property string $key
 * @property string $value
 */
class Config extends Model
{

    public $table = 'configs';

    public $fillable = [
        'key',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key'=>['required', 'unique:configs,key', 'regex:/^[A-Z0-9_]*$/']
    ];


}
