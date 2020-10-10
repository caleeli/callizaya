<?php

namespace App;

use App\Traits\ModelValidation;
use Illuminate\Database\Eloquent\Model as ModelBase;
use JDD\Api\Traits\AjaxFilterTrait;

class Model extends ModelBase
{
    use ModelValidation;
    use AjaxFilterTrait;

    protected $guarded = [];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
