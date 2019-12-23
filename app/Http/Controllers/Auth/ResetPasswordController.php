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

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\UserActivation;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;

final class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var string
     */
    protected string $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function resetPassword($user, $password): void
    {
        $validating_group = cache()->rememberForever('validating_group', fn() => Group::where('slug', '=', 'validating')->pluck('id'));
        $member_group = cache()->rememberForever('member_group', fn() => Group::where('slug', '=', 'user')->pluck('id'));
        $user->password = bcrypt($password);
        $user->remember_token = Str::random(60);

        if ($user->group_id === $validating_group[0]) {
            $user->group_id = $member_group[0];
        }

        $user->active = true;
        $user->save();

        UserActivation::where('user_id', '=', $user->id)->delete();

        $this->guard()->login($user);
    }
}
