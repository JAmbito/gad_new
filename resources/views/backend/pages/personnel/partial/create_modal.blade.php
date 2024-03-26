<div id="personnel_modal" class="insert-cont" style="display: none;">
    <div class="insert-modal">
        <div class="header-fixed">
            <div class="insert-header" style="position: relative;">
                <h4>Create NEW PERSONNEL</h4>
                <div><i class='bx bx-x' id="x-close-id"></i></div>
            </div>
        </div>
        <div class="insert-middle">
            <div>
                <label>FIRST NAME</label><span class="additional-span">( REQUIRED )</span>
            </div>
            <div>
                <input type="text" id="firstname" name="firstname" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
            </div>
            <div>
                <label>MIDDLE NAME</label><span class="additional-span"></span>
            </div>
            <div>
                <input type="text" id="middlename" name="middlename" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
            </div>
            <div>
                <label>LAST NAME</label><span class="additional-span">( REQUIRED )</span>
            </div>
            <div>
                <input type="text" id="lastname" name="lastname" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
            </div>
            <div>
                <label>EXTENSION</label><span class="additional-span"></span>
            </div>
            <div>
                <input type="text" id="extension" name="extension" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
            </div>
            <div>
                <div style="margin-bottom: 13px">
                    <label>ACADEMIC RANK</label><span class="additional-span">( REQUIRED )</span>
                </div>
                <div>
                    <select id="academic_rank_id" name="academic_rank_id" class="province_class" style="margin-bottom: 23px;">
                        <option style="display: none;" value="">--SELECT ACADEMIC RANK--</option>
                        @foreach ($academic_ranks as $academic_rank)
                            <option value="{{ $academic_rank->id }}">{{ $academic_rank->academic_rank }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <div style="margin-bottom: 13px">
                    <label>ADMINISTRATIVE RANK</label><span class="additional-span">( REQUIRED )</span>
                </div>
                <div>
                    <select id="administrative_rank_id" name="administrative_rank_id" class="province_class" style="margin-bottom: 23px;">
                        @foreach ($administrative_ranks as $administrative_rank)
                            <option value="{{ $administrative_rank->id }}">{{ $administrative_rank->administrative_rank }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <div style="margin-bottom: 13px">
                    <label>POSITION</label><span class="additional-span">( REQUIRED )</span>
                </div>
                <div>
                    <select id="designation_id" name="designation_id" class="province_class" style="margin-bottom: 23px;">
                        <option style="display: none;" value="">--SELECT POSITION--</option>
                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <div style="margin-bottom: 13px">
                    <label>DEPARTMENT</label><span class="additional-span">( REQUIRED )</span>
                </div>
                <div>
                    <select id="department_id" name="department_id" class="province_class" style="margin-bottom: 23px;">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <div style="margin-bottom: 13px">
                    <label>CAMPUS</label><span class="additional-span">( REQUIRED )</span>
                </div>
                <div>
                    <select id="campus_id" name="campus_id" class="province_class" style="margin-bottom: 23px;">
                        <option style="display: none;" value="">--SELECT CAMPUS--</option>
                        @foreach ($campuses as $campus)
                            <option value="{{ $campus->id }}">{{ $campus->campus_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        </div>

        <div class="insert-btn-cont">
            <h1 style="margin-right: auto;"></h1>
            <button class="btn-del" name="sub-insert" onclick="saveRecord()">Submit</button>
        </div>
    </div>
</div>
