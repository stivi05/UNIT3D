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

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\ForumCategory;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

/**
 * @see \Tests\Todo\Feature\Http\Controllers\Staff\ForumControllerTest
 */
class ForumController extends Controller
{
    /**
     * Show All Forums.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $categories = ForumCategory::query()
            ->with([
                'forums' => fn ($query) => $query->authorized(canReadTopic: true)->orderBy('position')->withCount('topics', 'posts'),
            ])
            ->orderBy('position')
            ->get()
            ->filter(fn ($category) => $category->forums->isNotEmpty());

        $latestPosts = Post::query()
            ->with([
                'user' => fn ($query) => $query->withTrashed(),
                'topic',
            ])
            ->joinSub(
                Post::query()
                    ->selectRaw('MAX(posts.id) AS id, forum_id')
                    ->join('topics', 'posts.topic_id', '=', 'topics.id')
                    ->groupBy('forum_id'),
                'latest_posts',
                fn ($join) => $join->on('posts.id', '=', 'latest_posts.id')
            )
            ->get();

        $categories->transform(function ($category) use ($latestPosts) {
            $category->forums->transform(fn ($forum) => $forum->setRelation('latestPost', $latestPosts->firstWhere('forum_id', '=', $forum->id)));

            return $category;
        });

        return view('forum.index', [
            'categories' => $categories,
            'num_posts'  => Post::count(),
            'num_forums' => Forum::count(),
            'num_topics' => Topic::count(),
        ]);
    }

    /**
     * Show Forums And Topics Inside.
     */
    public function show(Request $request, int $id): \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        return view('forum.forum_topic.index', [
            'forum' => Forum::query()
                ->with('category')
                ->authorized(canReadTopic: true)
                ->findOrFail($id),
        ]);
    }
}
