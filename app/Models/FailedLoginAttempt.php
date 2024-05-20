<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     HDVinnie <hdinnovations@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FailedLoginAttempt.
 *
 * @property int                             $id
 * @property int|null                        $user_id
 * @property string                          $username
 * @property string                          $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @method static \Database\Factories\FailedLoginAttemptFactory            factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|FailedLoginAttempt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedLoginAttempt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedLoginAttempt query()
 * @mixin \Eloquent
 */
class FailedLoginAttempt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'username',
        'ip_address',
    ];

    /**
     * Belongs To A User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, self>
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
