 <!-- I. PERSONAL INFORMATION -->
 <div class="main-table-container-div">

    <div id="" class="project-details-div" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 50px 55px 20px 55px; margin-bottom: 30px;">

        <div style="margin-bottom: 25px;">
            <label style="font-size: 16.6px; text-decoration: underline;">I. PERSONAL INFORMATION</label>
        </div>

        <div style="margin-bottom: 40px">
            <span style="color: #fff; font-size: 12px!important; font-weight: 500; margin-left: 0px; background-color: #F5B041; border: 0px!important; padding: 5px 15px; border-radius: 25px; text-transform: uppercase;">NOTE : All required fields would be indicated with a label ( REQUIRED ).</span>
        </div>

        <!-- INPUTS PARENT -->
        <div style="margin-bottom: 10px; border-top: 1px solid #939393; padding-top: 22px">

            <div>
                <label>Surname</label><span class="additional-span">( REQUIRED )</span>
            </div>
            <div>
                <input id="lastname" name="lastname" placeholder="----" required style="margin-bottom: 23px;" value="">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>First Name</label><span class="additional-span">( REQUIRED )</span>
                    <input id="firstname" name="firstname" placeholder="----" required style="margin-bottom: 23px;" value="">
                </div>
                <div>
                    <label>NAME EXTENSION(JR, SR)</label>
                    <input id="extension" name="extension" placeholder="----" style="margin-bottom: 23px;" value="">
                </div>
            </div>

            <div>
                <label>Middle Name</label><span class="additional-span">( REQUIRED )</span>
            </div>
            <div>
                <input id="middlename" name="middlename" placeholder="----" required style="margin-bottom: 23px;" value="">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>Birthday</label><span class="additional-span">( REQUIRED )</span>
                    <input type="date" id="birthday" name="birthday" placeholder="----" required style="margin-bottom: 23px;" value="">
                </div>
                <div>
                    <label>Place Of Birth</label><span class="additional-span">( REQUIRED )</span>
                    <input id="birth_place" name="birth_place" placeholder="----" required style="margin-bottom: 23px;" value="">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-bottom: 25px;">
                <div>
                    <div style="margin-bottom: 12px">
                        <label>Designation</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="designation_id" name="designation_id"  style="height: 38px; margin-bottom: 25px;" required>
                     <option style="display: none;" value="">-SELECT Designation-</option>
                     @foreach ($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                     @endforeach
                    </select>
                </div>
                <div>
                    <div style="margin-bottom: 12px">
                        <label>Department</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="department_id" name="department_id"  style="height: 38px; margin-bottom: 25px;" required>
                     <option style="display: none;" value="">-SELECT Department-</option>
                     @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department }}</option>
                     @endforeach
                    </select>
                </div>
            </div>


            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-bottom: 25px;">
                <div>
                    <div style="margin-bottom: 12px">
                        <label>ACADEMIC RANK</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="academic_rank_id" name="academic_rank_id"  style="height: 38px; margin-bottom: 25px;" required>
                     <option style="display: none;" value="">-SELECT RANK-</option>
                     @foreach ($academic_ranks as $academic_rank)
                        <option value="{{ $academic_rank->id }}">{{ $academic_rank->academic_rank }}</option>
                     @endforeach
                    </select>
                </div>
                <div>
                    <div style="margin-bottom: 12px">
                        <label>ADMINISTRATIVE RANK</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="administrative_rank_id" name="administrative_rank_id"  style="height: 38px; margin-bottom: 25px;" required>
                     <option style="display: none;" value="">-SELECT RANK-</option>
                     @foreach ($administrative_ranks as $administrative_rank)
                        <option value="{{ $administrative_rank->id }}">{{ $administrative_rank->administrative_rank }}</option>
                     @endforeach
                    </select>
                </div>
            </div>


            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-bottom: 25px;">
                <div>
                    <div style="margin-bottom: 12px">
                        <label>EMPLOYEE STATUS</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="employee_status" name="employee_status"  style="height: 38px; margin-bottom: 25px;" required>
                         <option style="display: none;" value="">-SELECT STATUS-</option>
                         <option value="CASUAL">CASUAL</option>
                         <option value="JOB ORDER">JOB ORDER</option>
                         <option value="PERMANENT">PERMANENT</option>
                         <option value="PART TIME">PART TIME</option>
                         <option value="TEMPORARY">TEMPORARY</option>
                    </select>
                </div>
                <div>
                    <div style="margin-bottom: 12px">
                        <label>CAMPUS</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="campus_id" name="campus_id"  style="height: 38px; margin-bottom: 25px;" required>
                     <option style="display: none;" value="">-SELECT CAMPUS-</option>
                     @foreach ($campuses as $campus)
                        <option value="{{ $campus->id }}">{{ $campus->campus_name }}</option>
                     @endforeach
                    </select>
                </div>
            </div>


            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px; margin-bottom: 25px;">
                <div>
                    <div style="margin-bottom: 12px">
                        <label>Sex</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="sex" name="sex"  style="height: 38px; margin-bottom: 25px;" required>
                         <option style="display: none;" value="">-SELECT SEX-</option>
                         <option value="MALE">MALE</option>
                         <option value="FEMALE">FEMALE</option>
                    </select>
                </div>
                <div>
                    <div style="margin-bottom: 12px">
                        <label>Civil Status</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="civil_status" name="civil_status"  style="height: 38px; margin-bottom: 25px;" required>
                          <option style="display: none;" value="">-SELECT STATUS-</option>
                         <option value="SINGLE">SINGLE</option>
                         <option value="MARRIED">MARRIED</option>
                         <option value="WIDOWED">WIDOWED</option>
                         <option value="SEPARATED">SEPARATED</option>
                         <option value="OTHER">OTHER'S</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>HEIGHT (m)</label>
                    <input type="text" id="height" name="height" placeholder="----"  style="margin-bottom: 23px;" value="">
                </div>
                <div>
                    <label>WEIGHT (kg)</label>
                    <input id="weight" name="weight" placeholder="----"  style="margin-bottom: 23px;" value="">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr;  margin-bottom: 25px;">
                <div>
                    <div style="margin-bottom: 12px">
                        <label>BLOOD TYPE</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="blood" name="blood"  style="height: 38px; margin-bottom: 25px;" required>
                         <option style="display: none;" value="">-SELECT BLOOD TYPE-</option>
                         <option value="A+">A+</option>
                         <option value="O+">O+</option>
                         <option value="B+">B+</option>
                         <option value="AB+">AB+</option>
                         <option value="A-">A-</option>
                         <option value="O-">O-</option>
                         <option value="B-">B-</option>
                         <option value="AB-">AB-</option>
                         <option value="UNKNOWN">UNKNOWN</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>GSIS ID NO.</label>
                    <input type="text" id="gsis" name="gsis" placeholder="----"  style="margin-bottom: 23px;" value="">
                </div>
                <div>
                    <label>PAG-IBIG ID NO.</label>
                    <input id="pagibig" name="pagibig" placeholder="----"  style="margin-bottom: 23px;" value="">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>PHILHEALTH NO.</label>
                    <input type="text" id="philhealth" name="philhealth" placeholder="----"  style="margin-bottom: 23px;" value="">
                </div>
                <div>
                    <label>SSS NO.</label>
                    <input id="sss" name="sss" placeholder="----"  style="margin-bottom: 23px;" value="">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>TIN NO.</label>
                    <input type="text" id="tin" name="tin" placeholder="----"  style="margin-bottom: 23px;" value="">
                </div>
                <div>
                    <label>EMPLOYEE ID NO.</label>
                    <input id="id_no" name="id_no" placeholder="----"  style="margin-bottom: 23px;" value="">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                <div>
                    <div style="margin-bottom: 12px">
                        <label>CITIZENSHIP</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <select id="citizenship" name="citizenship"  style="height: 38px; margin-bottom: 25px;" required>
                         <option style="display: none;" value="">-SELECT CITIZENSHIP-</option>
                         <option value="FILIPINO">FILIPINO</option>
                         <option value="DUAL CITIZENSHIP">DUAL CITIZENSHIP</option>
                    </select>
                </div>
                <div>
                    <div style="margin-bottom: 12px">
                        <label style="opacity: 0;">1</label>
                    </div>
                    <select id="by_birth" name="by_birth"  style="height: 38px; margin-bottom: 25px;" required>
                         <option style="display: none;" value="">-SELECT-</option>
                         <option value="BY BIRTH">BY BIRTH</option>
                         <option value="BY NATURALIZATION">BY NATURALIZATION</option>
                    </select>
                </div>
                <div>
                    <div style="margin-bottom: 12px">
                        <label style="opacity: 0;">1</label>
                    </div>
                    <input id="dual_indication" name="dual_indication" placeholder="If holder of dual citizenship, please indicate the details"  style="margin-bottom: 23px;" value="">
                </div>
            </div>


            <!-- RESIDENTIAL ADDRESS -->
            <div style="margin-bottom: 25px; margin-top: 38px;">
                   <label style="font-size: 16.6px; text-decoration: underline;">RESIDENTIAL ADDRESS</label>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label for="personal_residential_lot_no_id">HOUSE/BLOCK/LOT NO.</label><span class="additional-span">( REQUIRED )</span>
                    <input type="text" name="residential_lot_no" id="residential_lot_no" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
                <div>
                    <label for="personal_residential_street_id">STREET</label><span class="additional-span">( REQUIRED )</span>
                    <input name="residential_street" id="residential_street" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label for="personal_residential_subdivision_id">SUBDIVISION</label><span class="additional-span">( REQUIRED )</span>
                    <input type="text" name="residential_subdivision" id="residential_subdivision" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
                <div>
                    <label for="personal_residential_barangay_id">BARANGAY</label><span class="additional-span">( REQUIRED )</span>
                    <input name="residential_barangay" id="residential_barangay" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label for="personal_residential_city_id">CITY/MUNICIPALITY</label><span class="additional-span">( REQUIRED )</span>
                    <input type="text" name="residential_city" id="residential_city" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
                <div>
                    <label for="personal_residential_province_id">PROVINCE</label><span class="additional-span">( REQUIRED )</span>
                    <input name="residential_province" id="residential_province" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr">
                <div>
                    <label for="personal_residential_zipcode_id">ZIP CODE</label><span class="additional-span">( REQUIRED )</span>
                    <input type="text" name="residential_zipcode" id="residential_zipcode" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
            </div>


            <!-- PERMANENT ADDRESS -->
            <div style="margin-bottom: 5px; margin-top: 10px; display: flex; align-items: center;">
                <div>
                    <label style="font-size: 16.6px; text-decoration: underline;">PERMANENT ADDRESS</label>
                </div>
                <div style="margin-top: 12px; margin-left: 15px; display: flex; align-items: center;">
                    <div>
                        <input type="checkbox" id="same-address-checkbox" style="width: 12px!important; cursor: pointer;">
                    </div>
                    <div style="margin-top: -15px">
                        <span class="additional-span" style="text-transform: uppercase; color: #AEAEAE">(Same as Residetial Address)</span>
                    </div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>HOUSE/BLOCK/LOT NO.</label><span class="additional-span">( REQUIRED )</span>
                    <input type="text" name="permanent_lot_no" id="permanent_lot_no" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
                <div>
                    <label>STREET</label><span class="additional-span">( REQUIRED )</span>
                    <input name="permanent_street" id="permanent_street" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>SUBDIVISION</label><span class="additional-span">( REQUIRED )</span>
                    <input type="text" name="permanent_subdivision" id="permanent_subdivision" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
                <div>
                    <label>BARANGAY</label><span class="additional-span">( REQUIRED )</span>
                    <input name="permanent_barangay" id="permanent_barangay" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                        <label>CITY/MUNICIPALITY</label><span class="additional-span">( REQUIRED )</span>
                    <input type="text" name="permanent_city" id="permanent_city" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
                <div>
                        <label>PROVINCE</label><span class="additional-span">( REQUIRED )</span>
                    <input name="permanent_province" id="permanent_province" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr">
                <div>
                    <label>ZIP CODE</label><span class="additional-span">( REQUIRED )</span>
                    <input type="text" name="permanent_zipcode" id="permanent_zipcode" placeholder="----"  style="margin-bottom: 23px;" value="" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                <div>
                    <label>TELEPHONE NO.</label><span class="additional-span">( REQUIRED )</span>
                    <input id="tel_no" name="tel_no" placeholder="----" required style="margin-bottom: 23px;" value="">
                </div>
                <div>
                    <label>MOBILE NO.</label><span class="additional-span">( REQUIRED )</span>
                    <input id="mobile_no" name="mobile_no" placeholder="----" required style="margin-bottom: 23px;" value="">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr">
                <div>
                    <label>E-MAIL ADDRESS (if any)</label><span class="additional-span">( REQUIRED )</span>
                    <input type="email" id="email" name="email" placeholder="----"  style="margin-bottom: 23px; text-transform: none;" value="" required>
                </div>
            </div>
        </div>
    </div>
</div>
