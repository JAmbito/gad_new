@extends('backend.master.template')

@php
    use App\Notifications\PersonnelCreated;
    use App\Notifications\PersonnelUpdated;
    use App\Notifications\PersonnelReviewed;
    use App\Support\RoleSupport;
@endphp

@section('content')
    <section id="content">
        <main>

            <div class="head-title" style="margin-bottom: 35px;">
                <div class="left">
                    <h1 class="paragraph" style="letter-spacing: -.1px">Notifications</h1>
                        <ul class="header-main">
                            <li style="margin-top: 6px;"><i class="fi fi-rr-bell" style="color:#C30000; margin-left: 15px;"></i></li>
                            <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Notifications</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            @include('backend.partial.header')

            <div style="margin-left: 30px;" class="selection-cont">
                <div class="table-pad">
                    <div class="table-header" id="header">

                        <span class="id-count-class">
                            <span style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px;">
                                {{ $notifications_count }}
                            </span>
                        </span>

                        <span id="teach-full-btn" style="margin-left: 0px; font-weight: 600; font-size: 14px;" class="proj-data">All Notifications (Showing maximum 50 only)</span>

                    </div>
                </div>
            </div>
            <!-- TABLE -->
            <div class="table2-container" id="teach-full-time-cont">
                <div style="height: 62vh;margin-top: 20px; overflow-y: auto;" >
                    @if(Auth::user()->notifications->count() === 0)
                        <small class="notif-mid-cont">No notifications available</small>
                    @else
                        @foreach(
                            Auth::user()->notifications()->limit(50)->get() as $notification
                        )
                            @if ($notification->type === PersonnelCreated::class)
                                <div class="col-12 dash-card"  style="margin-top: 10px">
                                    <a href='javascript:' data-id="{{$notification->id}}" data-redirect="{{route('personnel.review_personnel', ['id' => $notification->data['personnel_id']])}}"
                                       class="notif-mid-cont user-notifications">
                                        @if (is_null($notification->read_at))<span class="badge badge-info">Unread</span>@endif
                                        Personnel {{$notification->data['personnel_firstname']}} {{$notification->data['personnel_lastname']}} has been created by {{$notification->data['personnel_created_by']}} and needs review.
                                            <br/>
                                            <small style="color: gray">
                                                {{$notification->created_at}}
                                            </small>
                                    </a>
                                </div>

                            @elseif ($notification->type === PersonnelUpdated::class)
                                <div class="col-12 dash-card"  style="margin-top: 10px">
                                    <a href='javascript:' data-id="{{$notification->id}}" data-redirect="{{route('personnel.review_personnel', ['id' => $notification->data['personnel_id']])}}"
                                       class="notif-mid-cont user-notifications">
                                        @if (is_null($notification->read_at))<span class="badge badge-info">Unread</span>@endif
                                        Personnel {{$notification->data['personnel_firstname']}} {{$notification->data['personnel_lastname']}} has been updated by {{$notification->data['personnel_created_by']}} and needs another review.
                                        <br/>
                                        <small style="color: gray">
                                            {{$notification->created_at}}
                                        </small>
                                    </a>
                                </div>
                            @elseif ($notification->type === PersonnelReviewed::class)
                                <div class="col-12 dash-card" style="margin-top: 10px">

                                    <a href='javascript:' data-id="{{$notification->id}}" data-redirect="{{route('personnel.view', ['id' => $notification->data['personnel_id']])}}"
                                       class="notif-mid-cont user-notifications">
                                        @if (is_null($notification->read_at))<span class="badge badge-info">Unread</span>@endif
                                        Personnel {{$notification->data['personnel_firstname']}} {{$notification->data['personnel_lastname']}} has been reviewed by {{$notification->data['personnel_reviewed_by']}} and was {{$notification->data['status']}}.
                                        @if($notification->data['status'] === 'rejected')
                                            <br/>
                                            <span style="color: black">
                                                Reason: {{$notification->data['personnel_reject_reason'] ?? 'None'}}
                                            </span>
                                        @endif
                                            <br/>
                                        <small style="color: gray">
                                            {{$notification->created_at}}
                                        </small>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif


                </div>
            </div>

        </main>

    </section>
@endsection

@section('scripts')
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
@endsection
@section('styles')
    <style>
        .dashboard-container .row {
            display: flex !important;
        }

        .dash-card {
            padding: 15px 20px;
            background: #fff;
            margin-right: 30px;
            border-radius: 10px;
        }

        .dash-title {
            padding: 5px 10px;
            font-size: 18px;
            text-align: center;
            background: #f54b55;
            color: #fff;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .dash-title.dash-error {
            background: #f54b55;
        }

        .dash-title.dash-success {
            background: #34DA54;
        }

        .dash-title.dash-warning {
            background: orange;
        }

        .dash-title.dash-info {
            background: #4573dc;
        }

        .dash-title.dash-dark {
            background: black;
        }

        .dash-value table {
            width: 100%;
            text-align: center;
        }

        .dash-value th {
            font-size: 20px;
        }

        th.male_text {
            color: #4573dc;
        }

        th.female_text {
            color: #dc456c;
        }
        .dash-value tbody td {
            font-size: 40px;
        }
        table.employee_status_tbl {
            width: 100%;
            background: #fff;
            border-spacing: 0;
        }
        table.employee_status_tbl th {
            padding: 10px;
            background: #f54b55;
            color: #fff;
            border: 0px;
        }
        table.employee_status_tbl tbody td {
            padding: 10px;
            font-size: 15px;
        }
        td.emp_status {
            background: #f88d8d;
            color: #ffff;
        }
    </style>
@endsection
