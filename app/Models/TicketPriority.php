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

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TicketPriority.
 *
 * @property        int                                                  $id
 * @property        string                                               $name
 * @property        int                                                  $position
 * @property        \Illuminate\Support\Carbon|null                      $created_at
 * @property        \Illuminate\Support\Carbon|null                      $updated_at
 * @method   static \Database\Factories\TicketPriorityFactory            factory($count = null, $state = [])
 * @method   static \Illuminate\Database\Eloquent\Builder|TicketPriority newModelQuery()
 * @method   static \Illuminate\Database\Eloquent\Builder|TicketPriority newQuery()
 * @method   static \Illuminate\Database\Eloquent\Builder|TicketPriority query()
 * @mixin \Eloquent
 */
class TicketPriority extends Model
{
    use Auditable;
    use HasFactory;
}
