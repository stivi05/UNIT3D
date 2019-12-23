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
 * @author     Poppabear
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class ChatUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'username'       => $this->username,
            'chat_status'    => $this->whenLoaded('chatStatus'),
            'chat_status_id' => $this->chat_status_id,
            'chatroom_id'    => $this->chatroom_id,
            'group'          => $this->whenLoaded('group'),
            'echoes'         => $this->whenLoaded('echoes'),
            'group_id'       => $this->group_id,
            'title'          => $this->title,
            'image'          => $this->image,
        ];
    }
}
