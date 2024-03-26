@extends('backend.master.template')

@section('content')
<section id="content">
    <main>

        <div class="head-title" style="margin-bottom: 35px;">
            <div class="left">
                <h1 class="paragraph" style="letter-spacing: -.1px">Administrative Rank</h1>
                <div class="loc-date">
                    <ul class="header-main">
                        <li style="margin-top: 6px;"><i class="fi fi-rr-chart-pie-alt" style="color:#C30000; margin-left: 15px;"></i></li>
                        <li><i class="fa-solid fa-chevron-right" style="font-size: 10px; margin-left: 10px; color: #585563;"></i></li>
                        <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Manage</a></li>
                        <li style="margin-top: 2px"><a href="#" class="active" style="color: #FFA6A6; margin-left: 10px; color: #585563; font-size: 14px;">Data Management</a></li>
                    </ul>
                </div>
            </div>
        </div>

        @include('backend.partial.header')

        <div class="add-user-container" id="add_data">
            <div class="add-btns btn-insert" style="margin-left: 10px">
                <i class='bx bx-plus' ></i>
                <button>ADD ADMINISTRATIVE RANK</button>
            </div>

        </div>

        <div style="margin-left: 30px;" class="selection-cont">
                <div class="table-pad">
                    <div class="table-header" id="header">

                        <span class="id-count-class">
                            <span style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px;" id="entity-count">
                                {{ App\Administrative_rank::count() }}
                            </span>
                        </span>

                        <span id="teach-full-btn" style="margin-left: 0px; font-weight: 600; font-size: 14px;" class="proj-data">All Administrative Rank</span>

                    </div>
                </div>
         </div>
        <!-- TABLE -->
        <div class="table2-container" id="teach-full-time-cont">
            <div class="table-data2">
                <div class="table-pad">
                <table id="administrative_table" class="table table-striped" style="width:100%"></table>
            </div>
        </div>
    </div>
    {{-- MODAL --}}
    <div id="administrative_modal" class="insert-cont" style="display: none;">
        <div class="insert-modal">
        <div class="header-fixed">
            <div class="insert-header" style="position: relative;">
            <h4>ADMINISTRATIVE RANK</h4>
            <div><i class='bx bx-x' id="x-close-id"></i></div>
            </div>
        </div>
            <div class="insert-middle">
                    <div>
                        <label>ADMINISTRATIVE RANK</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <div>
                        <input type="text" id="administrative_rank" name="administrative_rank" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                    </div>
            </div>

            <div class="insert-btn-cont">
                <h1 style="margin-right: auto;"></h1>
                <button class="btn-del" name="sub-insert" onclick="saveRecord()">Submit</button>
            </div>
        </div>
    </div>
        @include('backend.partial.function.delete')

    </main>

</section>
@endsection

@section('scripts')
    <script>
        var table;
        var action = 'save';
        var hold_id = null;

        function updatePageCount() {
            $.ajax({
                url: '/administrative/get',
                method: 'get',
                data: {},
                success: function({data}) {
                    $('#entity-count').text(data.length ?? 0);
                }
            });
        }
        updatePageCount();

        function edit(id){
            action = 'update';
            hold_id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/administrative/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('#administrative_modal').show();

                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });
                }
            });
        }

        function saveRecord() {
            var data = {
                _token: '{{csrf_token()}}',
                administrative_rank: $('#administrative_rank').val(),
                action: action,
                id: hold_id
            };

            $('.error-message').remove();

            $.post('/administrative/save', data).done(function(response){
                clearField();
                $('#administrative_modal').hide();
                toastr.success('Record saved');
                table.clear().draw();
                updatePageCount();
            }).fail(function(response) {
                toastr.error('Record not saved');
                for (var field in response.responseJSON.errors) {
                    $('#'+field+"_error_message").remove();
                    $('.'+field).append('<span id="'+field+'_error_message" class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
                }
            });
        }

        function clearField() {
            hold_id = null;
            action = 'save';

            $('#administrative').val("");
        }

        function confirmDelete(id) {
            hold_id = id;
            action = 'delete';
            $('#confirmModal').show();
        }

        function closeModal() {
            $('#confirmModal').hide();
        }

        function deleteRecord() {
            $.get('/administrative/destroy/' + hold_id).done(function(response) {
                $('#confirmModal').hide();
                clearField();
                updatePageCount();
                table.clear().draw();
            });
        }

         $(function() {
                table = $('#administrative_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                ajax: {
                    url: '/administrative/get',
                    type: 'GET'
                },
                columns: [
                    { data: null, title: 'ACTION', render: function(data, type, row, meta) {
                        var html = '<div style="position: relative;">';
                        html += '<button data-id="1" class="btn-action"><i class="fi fi-rr-menu-dots"></i></button>';
                        html += '<div style="" class="action-cont" id="action-cont-id">';
                        html += '<div style="text-align: left;">';
                        html += '<button data-id="1" class="btn-update" onclick="edit('+row.id+')">Edit</button>';
                        html += '</div>';
                        html += '<div style="text-align: left;">';
                        html += '<button data-id="2" class="btn-delete" onclick="confirmDelete('+row.id+')">Delete</button>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        return html;
                    }},
                    { data: 'administrative_rank', title: 'Administrative Rank'},
                ]
            });

            $(document).on('click','.btn-action', function() {
                $(this).parent().find('.action-cont').toggle(300);
            })

            $('#add_data').click(function(){
                $('#administrative_modal').show();
            })

            $('#x-close-id').click(function(){
                $('#administrative_modal').hide();
            })
        });
    </script>
@endsection
