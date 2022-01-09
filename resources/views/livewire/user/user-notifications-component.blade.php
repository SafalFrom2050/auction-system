<section class="notifications-section">

    <h2 class="title-text">
        <i class="far fa-bell"></i>
        NOTIFICATIONS
    </h2>


    <div class="container">

        @foreach($userNotifications as $userNotification)
        <div class="item {{ $userNotification->isMarkedAsSeen == 0 || $userNotification->unmark_flag == 1 ? '' : 'old' }}">
            <img src="https://lorempixel.com/200/200/" />
            <div class="content">
                <p><strong>{{ $userNotification->action_name }}: </strong>{{ $userNotification->description }}</p>
                <div class="additional-info">
                    <span>{{ $userNotification->created_at->diffForHumans() }}</span><i class="fas fa-circle"></i>
                    <span>Urgent</span>
                </div>
            </div>
            @if($userNotification->isMarkedAsSeen == 0 || $userNotification->unmark_flag == 1)
                <i wire:click="markAsRead({{ $userNotification->id }})"
                   wire:target="markAsRead({{ $userNotification->id }})"
                   wire:loading.class="fas"
                   wire:loading.class.remove="far"
                   class="mark far fa-check-circle">

                </i>
            @else
                <i wire:click="markAsNotRead({{ $userNotification->id }})"
                   wire:target="markAsNotRead({{ $userNotification->id }})"
                   wire:loading.class="far"
                   wire:loading.class.remove="fas"
                   class="mark fas fa-check-circle">
                </i>
            @endif
        </div>
        @endforeach
    </div>
</section>
