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

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use App\Models\Article;

final class ArticleController extends Controller
{
    /**
     * Display All Articles.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): Factory
    {
        $articles = Article::latest()->paginate(6);

        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show A Article.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id): Factory
    {
        $article = Article::with(['user', 'comments'])->findOrFail($id);

        return view('article.show', ['article' => $article]);
    }
}
