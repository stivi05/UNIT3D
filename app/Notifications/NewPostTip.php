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
 * @author     HDVinnie, singularity43
 */

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

final class NewPostTip extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string
     */
    public string $type;

    /**
     * @var string
     */
    public string $tipper;

    /**
     * @var \App\Models\Post
     */
    public Post $post;

    public $amount;

    /**
     * Create a new notification instance.
     *
     * @param  string  $type
     * @param  string  $tipper
     * @param $amount
     * @param  Post  $post
     */
    public function __construct(string $type, string $tipper, $amount, Post $post)
    {
        $this->type = $type;
        $this->post = $post;
        $this->tipper = $tipper;
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return string[]
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return string[]
     */
    public function toArray($notifiable): array
    {
        $appurl = config('app.url');

        return [
            'title' => $this->tipper.' Has Tipped You '.$this->amount.' BON For A Forum Post',
            'body'  => $this->tipper.' has tipped one of your Forum posts in '.$this->post->topic->name,
            'url'   => sprintf('/forums/topics/%s?page=%s#post-%s', $this->post->topic->id, $this->post->getPageNumber(), $this->post->id),
        ];
    }
}
