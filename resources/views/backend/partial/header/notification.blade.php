@php
    use App\Notifications\PersonnelCreated;
    use App\Notifications\PersonnelUpdated;
    use App\Notifications\PersonnelReviewed;
    use App\Support\RoleSupport;
@endphp

    <!-- BELL ICON -->

@if(Auth::user()->hasRole([RoleSupport::ROLE_SUPERADMINISTRATOR, RoleSupport::ROLE_APPROVER, RoleSupport::ROLE_ENCODER]))
    <div class="bell-cont" style="position: relative; cursor: pointer;" id="bell-btn">
        <i class="fa-solid fa-bell"></i>
        @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="id-count-class" style="position: absolute; top: -13px; right: -10px;">
                <span
                    style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px; "
                    id="noti_number">
                    {{
                        Auth::user()->unreadNotifications->count()
                    }}
                </span>
            </span>
        @endif
    </div>
@endif

<div class="notif-drop" id="notif-dropdown" style="border-bottom-right-radius: 8px; border-bottom-left-radius: 8px;">
    <div class="notif-header">
        <span>Notifications</span>
    </div>


    <div style="height: 248px; overflow-y: auto;" id="notif-id">
        @if(Auth::user()->notifications->count() === 0)
            <small class="notif-mid-cont">No notifications available</small>
        @else
            @foreach(
                Auth::user()->notifications()->limit(5)->get() as $notification
            )
                @if ($notification->type === PersonnelCreated::class)
                    <a href='javascript:' data-id="{{$notification->id}}" data-redirect="{{route('personnel.review_personnel', ['id' => $notification->data['personnel_id']])}}"
                       class="notif-mid-cont user-notifications">
                        @if (is_null($notification->read_at))<span class="badge badge-info">Unread</span>@endif
                        Personnel {{$notification->data['personnel_firstname']}} {{$notification->data['personnel_lastname']}} has been created by {{$notification->data['personnel_created_by']}} and needs review.
                        <span>
                            {{$notification->created_at}}
                        </span>
                    </a>
                @elseif ($notification->type === PersonnelUpdated::class)
                    <a href='javascript:' data-id="{{$notification->id}}" data-redirect="{{route('personnel.review_personnel', ['id' => $notification->data['personnel_id']])}}"
                       class="notif-mid-cont user-notifications">
                        @if (is_null($notification->read_at))<span class="badge badge-info">Unread</span>@endif
                        Personnel {{$notification->data['personnel_firstname']}} {{$notification->data['personnel_lastname']}} has been updated by {{$notification->data['personnel_created_by']}} and needs another review.
                        <span>
                            {{$notification->created_at}}
                        </span>
                    </a>
                @elseif ($notification->type === PersonnelReviewed::class)
                    <a href='javascript:' data-id="{{$notification->id}}" data-redirect="{{route('personnel.view', ['id' => $notification->data['personnel_id']])}}"
                       class="notif-mid-cont user-notifications">
                        @if (is_null($notification->read_at))<span class="badge badge-info">Unread</span>@endif
                        Personnel {{$notification->data['personnel_firstname']}} {{$notification->data['personnel_lastname']}} has been reviewed by {{$notification->data['personnel_reviewed_by']}} and was {{$notification->data['status']}}.
                        <span>
                            {{$notification->created_at}}
                        </span>
                    </a>
                @endif
            @endforeach
        @endif


    </div>

    <div class="notif-header"
         style="border-bottom: none; border-top: 1px solid #E9E9E9; text-align: center; padding: 8px 20px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px;">
        <a href="View_All_Notifications.php">View All Notifications</a>
    </div>

</div>

<script>
    $('.user-notifications').on('click', (e) => {
        const btn = $(e.target);
        const redirect = $(btn).attr('data-redirect');
        const id = $(btn).attr('data-id');

        $.post('/notifications/mark-as-read', {
            _token: '{{csrf_token()}}',
            id,
        }).always(function() {
            window.location.href = redirect;
        });
    });
</script>
