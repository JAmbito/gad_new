<!-- I. PERSONAL INFORMATION -->
<div class="main-table-container-div">

    <div id="personal-info" class="project-details-div" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 50px 55px 20px 55px; margin-bottom: 30px;">
        <div style="margin-bottom: 25px; text-align: center">
            @if($personnel_version->version > 1)
                <h4>Revision information version: v{{ $personnel_version->version }}</h4>
                <a href="{{ route('personnel.view', ['id' => $latest_personnel_version->personnel_information_id]) }}">View current version</a>
                <br/>
                <br/>
            @else
                <h4>Information version: v{{ $personnel_version->version }}</h4>
            @endif
            <label style="font-size: 16.6px; text-align: center">Note: Approving this data will set it as the current data of this personnel</label>
        </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 30px; margin-bottom: 25px;margin-top: 25px;">
                <div class="align-self-center">
                    Status: <strong style="text-transform: capitalize">{{App\Support\StatusSupport::getLabelByStatus($personnel->status)}}</strong>
                </div>
                @can(App\Support\RoleSupport::PERMISSION_REVIEW_PERSONNEL_STATUS)
                    <button class="btn btn-success" onclick="saveStatus({{ App\Support\StatusSupport::STATUS_APPROVED }}, this)">Approve</button>
                    <button class="btn btn-danger" onclick="rejectStatus({{ App\Support\StatusSupport::STATUS_REJECTED }}, this)">Reject</button>
                    <button class="btn btn-info" onclick="saveStatus({{ App\Support\StatusSupport::STATUS_ONHOLD }}, this)">Hold</button>
                @endcan
            </div>
        <div style="margin-bottom: 25px;">
            <label style="font-size: 16.6px; text-decoration: underline;">I. PERSONAL INFORMATION</label>
        </div>

        <!-- INPUTS PARENT -->
        <div style="margin-bottom: 10px; border-top: 1px solid #939393; padding-top: 22px; text-transform: uppercase">
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>Surname</label>
                    <br/>
                    <span id="lastname" style="margin-bottom: 23px;" value=""></span>
                </div>
                <div>
                    <label>First Name</label>
                    <br/>
                    <span id="firstname" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>NAME EXTENSION(JR, SR)</label>
                    <br/>

                    <span id="extension" style="margin-bottom: 23px;"></span>
                </div>

                <div>
                    <label>Middle Name</label>
                    <br/>
                    <span id="middlename" style="margin-bottom: 23px;"></span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>Birthday</label>
                    <br/>
                    <span id="birthday" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>Place Of Birth</label>
                    <br/>
                    <span id="birth_place" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>Designation</label>
                    <br/>
                    <span id="" style="margin-bottom: 23px;">{{ $designations->find($personnel->designation_id) ? $designations->find($personnel->designation_id)->designation : '-' }}</span>
                </div>
                <div>
                    <label>Department</label>
                    <br/>
                    <span id="" style="margin-bottom: 23px;">{{ $departments->find($personnel->department_id) ? $departments->find($personnel->department_id)->department : '-' }}</span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>ACADEMIC RANK</label>
                    <br/>
                    <span id="" style="margin-bottom: 23px;">{{ $academic_ranks->find($personnel->academic_rank_id) ? $academic_ranks->find($personnel->academic_rank_id)->academic_rank : '-' }}</span>
                </div>
                <div>
                    <label>ADMINISTRATIVE RANK</label>
                    <br/>
                    <span id="" style="margin-bottom: 23px;">{{ $administrative_ranks->find($personnel->administrative_rank_id) ? $administrative_ranks->find($personnel->administrative_rank_id)->administrative_rank : '-' }}</span>
                    <span id="birthday" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>EMPLOYMENT STATUS</label>
                    <br/>
                    <span id="employee_status" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>CAMPUS</label>
                    <br/>
                    <span id="" style="margin-bottom: 23px;">{{ $campuses->find($personnel->campus_id) ? $campuses->find($personnel->campus_id)->campus_name : '-' }}</span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>SEX</label>
                    <br/>
                    <span id="sex" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>Civil Status</label>
                    <br/>
                    <span id="civil_status" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>HEIGHT (cm)</label>
                    <br/>
                    <span id="height" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>CAMPUS (kg)</label>
                    <br/>
                    <span id="weight" style="margin-bottom: 23px;">{{ $campuses->find($personnel->campus_id) ? $campuses->find($personnel->campus_id)->campus_name : '-' }}</span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>BLOOD TYPE</label>
                    <br/>
                    <span id="blood" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>GSIS ID NO.</label>
                    <br/>
                    <span id="gsis" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>PAG-IBIG ID NO.</label>
                    <br/>
                    <span id="pagibig" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>PHILHEALTH NO.</label>
                    <br/>
                    <span id="philhealth" style="margin-bottom: 23px;">{{ $campuses->find($personnel->campus_id)->campus_name }}</span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>SSS NO.</label>
                    <br/>
                    <span id="sss" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>TIN NO.</label>
                    <br/>
                    <span id="tin" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>EMPLOYEE ID NO.</label>
                    <br/>
                    <span id="id_no" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>CITIZENSHIP</label>
                    <br/>
                    <span id="citizenship" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label></label>
                    <br/>
                    <span id="by_birth" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label></label>
                    <br/>
                    <span id="dual_indication" style="margin-bottom: 23px;"></span>
                </div>
            </div>

            <!-- RESIDENTIAL ADDRESS -->
            <div style="margin-bottom: 25px; margin-top: 38px;">
                <label style="font-size: 16.6px; text-decoration: underline;">RESIDENTIAL ADDRESS</label>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>HOUSE/BLOCK/LOT NO.</label>
                    <br/>
                    <span id="residential_lot_no" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>STREET</label>
                    <br/>
                    <span id="residential_street" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>SUBDIVISION</label>
                    <br/>
                    <span id="residential_subdivision" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>BARANGAY</label>
                    <br/>
                    <span id="residential_barangay" style="margin-bottom: 23px;"></span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>CITY/MUNICIPALITY</label>
                    <br/>
                    <span id="residential_city" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>PROVINCE</label>
                    <br/>
                    <span id="residential_province" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>ZIP CODE</label>
                    <br/>
                    <span id="residential_zipcode" style="margin-bottom: 23px;"></span>
                </div>
            </div>

            <!-- PERMANENT ADDRESS -->
            <div style="margin-bottom: 5px; margin-top: 20px; display: flex; align-items: center;">
                <div>
                    <label style="font-size: 16.6px; text-decoration: underline;">PERMANENT ADDRESS</label>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>HOUSE/BLOCK/LOT NO.</label>
                    <br/>
                    <span id="permanent_lot_no" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>STREET</label>
                    <br/>
                    <span id="permanent_street" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>SUBDIVISION</label>
                    <br/>
                    <span id="permanent_subdivision" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>BARANGAY</label>
                    <br/>
                    <span id="permanent_barangay" style="margin-bottom: 23px;"></span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>CITY/MUNICIPALITY</label>
                    <br/>
                    <span id="permanent_city" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>PROVINCE</label>
                    <br/>
                    <span id="permanent_province" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>ZIP CODE</label>
                    <br/>
                    <span id="permanent_zipcode" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>TELEPHONE NO.</label>
                    <br/>
                    <span id="tel_no" style="margin-bottom: 23px;"></span>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; grid-gap: 15px; margin-top: 15px">
                <div>
                    <label>MOBILE NO.</label>
                    <br/>
                    <span id="mobile_no" style="margin-bottom: 23px;"></span>
                </div>
                <div>
                    <label>E-MAIL ADDRESS</label>
                    <br/>
                    <span id="email" style="margin-bottom: 23px;"></span>
                </div>
            </div>
        </div>
    </div>
</div>
