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

namespace App\Console\Commands;

use App\Models\Invite;
use Carbon\Carbon;
use Illuminate\Console\Command;

final class AutoRecycleInvites extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected string $signature = 'auto:recycle_invites';

    /**
     * The console command description.
     *
     * @var string
     */
    protected string $description = 'Recycle Invites That Are Expired.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(): void
    {
        $current = Carbon::now();
        $invites = Invite::whereNull('accepted_by')->whereNull('accepted_at')->where('expires_on', '<', $current)->get();

        foreach ($invites as $invite) {
            $invite->delete();
        }
    }
}
