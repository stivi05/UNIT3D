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

namespace App\Repositories;

use App\Interfaces\WishInterface;
use App\Models\Torrent;
use App\Models\User;
use App\Models\Wish;

class WishRepository implements WishInterface
{
    /**
     * WishRepository Constructor.
     */
    public function __construct(private Wish $wish, private User $user, private Torrent $torrent)
    {
    }

    /**
     * @param null $paginate
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($paginate = null): \Illuminate\Database\Eloquent\Collection|array
    {
        return $paginate ? $this->wish->paginate($paginate) : $this->wish->all();
    }

    /**
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->wish->create($data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findById($id)
    {
        return $this->wish->find($id);
    }

    /**
     * @param $title
     *
     * @return mixed
     */
    public function findByTitle($title)
    {
        return $this->wish->where('title', '=', $title)->first();
    }

    /**
     * @param $uid
     * @param $id
     */
    public function exists($uid, $id): bool
    {
        return (bool) $this->user->find($uid)
            ->wishes()
            ->where('tmdb', '=', $id)
            ->first();
    }

    /**
     * @param $id
     */
    public function isGranted($id): bool
    {
        return (bool) $this->torrent
            ->where('tmdb', '=', $id)
            ->where('seeders', '>', 0)
            ->where('status', '=', 1)
            ->first();
    }

    /**
     * @param $id
     *
     * @return string|mixed
     */
    public function getSource($id)
    {
        if ($this->isGranted($id)) {
            $source = $this->torrent
                ->where('tmdb', '=', $id)
                ->where('seeders', '>', 0)
                ->where('status', '=', 1)
                ->first();

            return \route('torrent', ['id' => $source->id]);
        }

        return $this->findById($id)->source ?? null;
    }

    /**
     * @param $uid
     *
     * @return mixed
     */
    public function getUserWishes($uid)
    {
        return $this->user->find($uid)->wishes()->paginate(10);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->findById($id)->delete();
    }
}
