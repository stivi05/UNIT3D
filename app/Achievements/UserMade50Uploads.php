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

namespace App\Achievements;

use Gstt\Achievements\Achievement;

final class UserMade50Uploads extends Achievement
{
    /*
     * The achievement name
     */
    /**
     * @var string
     */
    public string $name = '50Uploads';

    /*
     * A small description for the achievement
     */
    /**
     * @var string
     */
    public string $description = 'You have made 50 torrent uploads!';

    /*
     * The amount of "points" this user need to obtain in order to complete this achievement
     */
    /**
     * @var int
     */
    public int $points = 50;
}
