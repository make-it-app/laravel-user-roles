<?php

namespace MakeIT\UserRoles;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table      = 'roles';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'comment',
    ];
    /**
     * @var string[]
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    /**
     * @var string[]
     */
    protected $casts    = [
        'deleted_at' => 'datetime:Y-m-d',
    ];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany( User::class );
    }

}
