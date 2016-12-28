<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetails
 * @package App\Models
 * @version December 28, 2016, 3:46 pm CET
 */
class OrderDetails extends Model
{
    use SoftDeletes;

    public $table = 'order_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'orders_id',
        'ads_id',
        'startdate',
        'enddate',
        'menu_id',
        'guests',
        'personnel'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'orders_id' => 'integer',
        'ads_id' => 'integer',
        'menu_id' => 'integer',
        'guests' => 'integer',
        'personnel' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ad()
    {
        return $this->belongsTo(\App\Models\Ads::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Orders::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function menucard()
    {
        return $this->belongsTo(\App\Models\Menucards::class);
    }
}
