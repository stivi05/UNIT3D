<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 *
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 * @author     HDVinnie
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Helpers\StringHelper;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TorrentFile.
 *
 * @property int $id
 * @property string $name
 * @property int $size
 * @property int $torrent_id
 * @property-read \App\Models\Torrent $torrent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TorrentFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TorrentFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TorrentFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TorrentFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TorrentFile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TorrentFile whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TorrentFile whereTorrentId($value)
 * @mixin \Eloquent
 */
final class TorrentFile extends Model
{
    use Auditable;

    /**
     * Indicates If The Model Should Be Timestamped.
     *
     * @var bool
     */
    public bool $timestamps = false;

    /**
     * The Database Table Used By The Model.
     *
     * @var string
     */
    protected string $table = 'files';

    /**
     * Belongs To A Torrent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function torrent(): BelongsTo
    {
        return $this->belongsTo(Torrent::class);
    }

    /**
     * Return Size In Human Format.
     *
     * @param  null  $bytes
     * @param  int  $precision
     * @return string
     */
    public function getSize($bytes = null, int $precision = 2): string
    {
        $bytes = $this->size;

        return StringHelper::formatBytes($bytes, 2);
    }
}
