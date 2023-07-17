@extends('backend.master.template')

@section('content')
<section id="content">
    <main>

        <div class="head-title" style="margin-bottom: 35px;">
            <div class="left">
                <h1 class="paragraph" style="letter-spacing: -.1px">Activity Logs</h1>
                <div class="loc-date">
                    <ul class="header-main">
                        <li style="margin-top: 6px;"><i class="fi fi-rr-chart-pie-alt" style="color:#C30000; margin-left: 15px;"></i></li>
                        <li><i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-left: 10px; color: #585563;"></i></li>
                        <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Users</a></li></li>
                        <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Activity Logs</a></li>
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
                                {{ App\Personnel::count() }}
                            </span>
                        </span>

                        <span id="teach-full-btn" style="margin-left: 0px; font-weight: 600; font-size: 14px;" class="proj-data">Activity Logs</span>

                    </div>
                </div>
        </div>
        <!-- TABLE -->
        <div class="table2-container" id="teach-full-time-cont">
            <div class="table-data2">
                <div class="table-pad">
                <table id="logs_table" class="table table-striped" style="width:100%"></table>
            </div>
        </div>
    </div>
    {{-- MODAL --}}
    
    </main>

</section>
@endsection

@section('scripts')
    <script>
        var table;
        var action = 'save';
        var hold_id = null;

        $(function() {
            table = $('#logs_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                columnDefs: [
                    { orderable: false, targets: 0 }
                ],
                scrollX:true,
                ajax: {
                    url: '/activity_logs/get',
                    type: 'GET'
                },
                columns: [
                    { data: 'details', title: 'Logs', render: function(data, type, row, meta) {
                        var html = "";

                        html += "<span class='title'>" + row.title + "</span>";
                        html += "<span class='date'>" + row.created_at + "</span>";
                        html += "<span class='details'>" + row.details + " by <b>" + row.user.name + "</b></span>";

                        return html;
                    }}
                ]
            });
            toastr.options = {
                "debug": false,
                "positionClass": "toast-bottom-full-width",
                "onclick": null,
                "fadeIn": 300,
                "fadeOut": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000
            }

            $(document).on('click','.btn-action', function() {
                $(this).parent().find('.action-cont').toggle(300);
            })

            $('#add_data').click(function(){
                $('#user_modal').show();
                $('.error-message').remove();
                action = 'save';
                hold_id = null;
            })

        });
    </script>
@endsection



<style>
    span.title {
        font-size: 15px !important;
        color: #0275d7 !important;
        font-weight: bold !important;
        font-family: system-ui !important;
    }
    span.date {
        font-size: 12px !important;
        color: gray !important;
        float: right !important;
        font-family: system-ui !important;
    }
    span.details {
        display: block !important;
        font-size: 14px !important;
        font-family: system-ui !important;
    }
    </style>
