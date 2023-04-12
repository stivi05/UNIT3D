<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     Roardom <roardom@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Show user posts.
     */
    public function index(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $posts = $user->posts()
            ->withCount(['likes', 'dislikes'])
            ->with(['topic', 'user'])
            ->latest()
            ->paginate(25);

        return view('user.post.index', [
            'posts' => $posts,
            'user'  => $user,
        ]);
    }
}
