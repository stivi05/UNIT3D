<?php

declare(strict_types=1);

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

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;

class UploaderController extends Controller
{
    /**
     * Display Stats.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $uploaderGroup = cache()->rememberForever('uploader_group', fn () => Group::where('is_uploader', 1)->pluck('id'));

        return view('Staff.uploader.index', [
            'uploaders' => User::with(['group'])
                ->where('group_id', '=', $uploaderGroup)
                // Count total uploads for current user
                ->withCount(['torrents as total_uploads' => fn ($query) => $query
                ])
                // Count recent uploads for current user
                ->withCount(['torrents as recent_uploads' => fn ($query) => $query
                    ->where('created_at', '>', now()->subDays(60))
                ])
                // Count total personal releases for current user
                ->withCount(['torrents as total_personal_releases' => fn ($query) => $query
                    ->where('personal_release', 1)
                ])
                // Count recent personal releases for current user
                ->withCount(['torrents as recent_personal_releases' => fn ($query) => $query
                    ->where('personal_release', 1)
                    ->where('created_at', '>', now()->subDays(60))
                ])
                ->get(),
        ]);
    }
}
