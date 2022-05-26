<?php

namespace MakeIT\UserRoles;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

/**
 * MakeIT\UserRoles\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $label
 * @property string|null $comment
 * @property bool $is_protected
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereIsProtected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static Builder|Role withTrashed()
 * @method static Builder|Role withoutTrashed()
 * @mixin \Eloquent
 */
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
