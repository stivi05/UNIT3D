<div x-data="usersScope()" x-init="listenForWhisper">
    @if(!empty($users))
        @foreach($users as $user)
            <div>
                <a href="#">{{ $user['username'] }}</a>

                <span x-show="isTyping({{ $user['id'] }})">
                    Typing...
                </span>
            </div>
        @endforeach
    @endif
</div>

<script nonce="{{ HDVinnie\SecureHeaders\SecureHeaders::nonce() }}" crossorigin="anonymous">
    function usersScope () {
        return {
            typing: [],

            isTyping (userId) {
                return this.typing[userId] || false
            },

            listenForWhisper () {
                Echo.private('chat.{{ $chatroomId }}')
                    .listenForWhisper('typing', (e) => {
                        this.typing[e.id] = e.typing
                    })
            }
        }
    }
</script>