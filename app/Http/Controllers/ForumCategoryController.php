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

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use Illuminate\Http\Request;

/**
 * @see \Tests\Feature\Http\Controllers\ForumCategoryControllerTest
 */
class ForumCategoryController extends Controller
{
    /**
     * Show The Forum Category.
     */
    public function show(Request $request, int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    {
        return view('forum.category_topic.index', [
            'category' => ForumCategory::query()
                ->whereHas('forums', fn ($query) => $query->whereRelation('permissions', [
                    ['read_topic', '=', 1],
                    ['group_id', '=', $request->user()->group_id],
                ]))
                ->findOrFail($id),
        ]);
    }
}
