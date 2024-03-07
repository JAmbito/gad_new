@extends('backend.master.template')

@section('content')
<section id="content">
    <main>

        <div class="head-title" style="margin-bottom: 35px;">
            <div class="left">
                <h1 class="paragraph" style="letter-spacing: -.1px">Campus</h1>
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
                <button>ADD CAMPUS</button>
            </div>

        </div>

        <div style="margin-left: 30px;" class="selection-cont">
                <div class="table-pad">
                    <div class="table-header" id="header">

                        <span class="id-count-class">
                            <span style="padding: 2px 7px; border-radius: 50px; background-color: #C30000!important; color: #fff!important; border-bottom: none; font-size: 12px;">
                                {{ App\Campus::count() }}
                            </span>
                        </span>

                        <span id="teach-full-btn" style="margin-left: 0px; font-weight: 600; font-size: 14px;" class="proj-data">All Campus</span>

                    </div>
                </div>
         </div>
        <!-- TABLE -->
        <div class="table2-container" id="teach-full-time-cont">
            <div class="table-data2">
                <div class="table-pad">
                <table id="campus_table" class="table table-striped" style="width:100%"></table>
            </div>
        </div>
    </div>
    {{-- MODAL --}}
    <div id="campus_modal" class="insert-cont" style="display: none;">
        <div class="insert-modal">
        <div class="header-fixed">
            <div class="insert-header" style="position: relative;">
            <h4>CAMPUS</h4>
            <div><i class='bx bx-x' id="x-close-id"></i></div>
            </div>
        </div>
            <div class="insert-middle">
                <form id="campusForm" method="POST" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                 <div>
                      <label>Upload Image</label><span class="additional-span">( REQUIRED )</span>
                  </div>
                  <div>
                    <input type="file" id="image" name="image" style="margin-bottom: 23px; padding-top: 13px; background-color: #fff!important">
                 </div>
                  <div>
                      <label>Campus Name</label><span class="additional-span">( REQUIRED )</span>
                  </div>
                  <div>
                    <input type="text" id="campus_name" name="campus_name" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                 </div>
                 <div>
                      <label>DETAILED ADDRESS</label><span class="additional-span">( REQUIRED )</span>
                  </div>
                  <div>
                    <input type="text" id="detailed_address" name="detailed_address" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                 </div>

                 <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                    <div>
                        <div style="margin-bottom: 13px">
                            <label>Province</label><span class="additional-span">( REQUIRED )</span>
                        </div>
                        <div>
                            <select id="province" name="province" class="province_class" style="margin-bottom: 23px;">
                                <option style="display: none;" value="">--SELECT PROVINCE--</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->province_id }}">{{ $province->name }}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>

                    <div>
                        <div style="margin-bottom: 13px">
                            <label>City</label><span class="additional-span">( REQUIRED )</span>
                        </div>
                        <div>
                            <select id="city" name="city" class="city_class" style="margin-bottom: 23px;">
                                <option style="display: none;" value="">--SELECT CITY--</option>
                              </select>
                        </div>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                    <div>
                        <div style="margin-bottom: 13px">
                            <label>Barangay</label><span class="additional-span">( NOT REQUIRED )</span>
                        </div>
                        <div>
                            <select id="barangay" name="barangay" class="barangay_class" style="margin-bottom: 23px;">
                                <option style="display: none;" value="N/A">--SELECT BARANGAY--</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div style="margin-bottom: 13px">
                              <label>ZIP CODE</label><span class="additional-span">( REQUIRED )</span>
                          </div>
                          <div>
                            <input type="text" id="zip_code" name="zip_code" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                         </div>
                     </div>
                </div>

                <div>
                    <div>
                          <label>Email</label><span class="additional-span">( REQUIRED )</span>
                      </div>
                      <div>
                        <input type="email" id="email" name="email" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                     </div>
                 </div>

                 <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                     <div>
                        <div>
                              <label>Telephone No</label><span class="additional-span">( REQUIRED )</span>
                          </div>
                          <div>
                            <input type="number" id="tel_no" name="tel_no" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                         </div>
                     </div>

                     <div>
                        <div>
                              <label>Mobile No</label><span class="additional-span">( REQUIRED )</span>
                          </div>
                          <div>
                            <input type="number" id="mobile_no" name="mobile_no" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                         </div>
                     </div>
                 </div>


            </div>

            <div class="insert-btn-cont">
                <h1 style="margin-right: auto;"></h1>
                <input type="reset" value="Reset" class="reset-inp">
                <button type="submit" class="btn-del" name="sub-insert">Submit</button>
            </div>
        </form>

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

        function edit(id){
            action = 'update';
            hold_id = id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/campus/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('#campus_modal').show();

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
                campus_name: $('#campus_name').val(),
                detailed_address: $('#detailed_address').val(),
                province: $('#province').val(),
                city: $('#city').val(),
                barangay: $('#barangay').val(),
                zip_code: $('#zip_code').val(),
                email: $('#email').val(),
                tel_no: $('#tel_no').val(),
                mobile_no: $('#mobile_no').val(),
                image: $('#image').val(),
                action: action,
                id: hold_id
            };

            $('.error-message').remove();

            $.post('/campus/save', data).done(function(response){
                clearField();
                $('#campus_modal').hide();
                toastr.success('Record saved');
                table.clear().draw();
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

            $('#campus').val("");
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
            $.get('/campus/destroy/' + hold_id).done(function(response) {
                $('#confirmModal').hide();
                clearField();
                table.clear().draw();
            });
        }

        function city(id)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/campus/city/' + id,
                method: 'get',
                success: function(data) {
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $("#city").append('<option value=' + v.city_id + '>' + v.name + '</option>');
                        });
                    });
                }
            });
        }

        function barangay(id)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/campus/barangay/' + id,
                method: 'get',
                success: function(data) {
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $("#barangay").append('<option value=' + v.city_id + '>' + v.name + '</option>');
                        });
                    });
                }
            });
        }

         $(function() {
                table = $('#campus_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 20,
                ajax: {
                    url: '/campus/get',
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
                    { data: 'campus_name', title: 'Campus Name'},
                    { data: 'detailed_address', title: 'Address'},
                    { data: 'email', title: 'Email'},
                    { data: 'tel_no', title: 'Tel No.'},
                    { data: 'mobile_no', title: 'Mobile No.'},
                ]
            });

            $('#campusForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('action', action);
                formData.append('id', hold_id);

                $.ajax({
                    type:'POST',
                    url: "/campus/save",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (data) => {
                        this.reset();
                        clearField();
                        table.clear().draw();
                        $('#campus_modal').hide();
                        toastr.success('Record saved');
                    },
                    error: function(data){
                        toastr.error('Record not saved');
                    }
                });

            });

            $(document).on('click','.btn-action', function() {
                $(this).parent().find('.action-cont').toggle(300);
            })

            $('#add_data').click(function(){
                $('#campus_modal').show();
            })

            $('#x-close-id').click(function(){
                $('#campus_modal').hide();
            })

            $('#province').change(function(){
                city(this.value);
            })


            $('#city').change(function(){
                barangay(this.value);
            })
        });
    </script>
@endsection
