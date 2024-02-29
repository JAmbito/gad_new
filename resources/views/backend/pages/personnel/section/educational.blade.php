@php use App\PersonnelEducational; @endphp
<div class="main-table-container-div" style="margin-top: 20px;">
    <div id="educational-background" class="project-details-div" style="">

        <table class="table table-responsive-block"
               style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px;"
               id="educational_table_id">
            <thead>
            <th class="name-border"
                style="font-size: 16.6px!important; text-decoration: underline; border: none; text-transform: uppercase; padding-bottom: 15px; padding-top: 0px;">
                III. EDUCATIONAL BACKGROUND
            </th>
            </thead>
            <thead>
            <th class="name-border" style="text-align: left;">LEVEL</th>
            <th class="name-border" style="text-align: left;">NAME OF SCHOOL(Write in full)</th>
            <th class="name-border" style="text-align: left;">BASIC EDUCATION/DEGREE/COURSE(Write in full)</th>
            <th class="name-border" style="text-align: left;">PERIOD OF ATTENDANCE(FROM - TO)</th>
            <th class="name-border" style="text-align: left;">HIGHEST LEVEL/UNITS EARNED(if not graduated)</th>
            <th class="name-border" style="text-align: left;">YEAR GRADUATED</th>
            <th class="name-border" style="text-align: left;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED</th>
            </thead>
            <tbody id="educational_tbl">
            <tr>
                <td>
                    <input type="hidden" name="educational_id[]" placeholder="----" autocomplete="off"
                           class="education_id_class" style="width: 400px">
                    <select name="educational_level[]" style="height: 38px; margin-bottom: 25px;"
                            class="education_level_class">
                        <option value="">-SELECT LEVEL-</option>
                        @foreach(PersonnelEducational::ALL_EDUCATION_LEVELS as $educationLevels)
                            <option value="{{ $educationLevels }}">{{$educationLevels}}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <input type="text" name="educational_school_name[]" placeholder="----" autocomplete="off"
                           class="educational_school_class" style="width: 400px">
                </td>

                <td>
                    <input type="text" name="educational_course[]" placeholder="----" autocomplete="off"
                           class="educational_course_class" style="width: 400px">
                </td>

                <td>
                    <input type="text" name="educational_attendance_from[]" placeholder="----" autocomplete="off"
                           class="educational_from_class" style="width: 150px; margin-right: 10px;">
                    <input type="text" name="educational_attendance_to[]" placeholder="----" autocomplete="off"
                           class="educational_to_class" style="width: 150px">
                </td>

                <td>
                    <input type="text" name="educational_units_earned[]" placeholder="----" autocomplete="off"
                           class="educational_units_class" style="width: 400px">
                </td>

                <td>
                    <input type="text" name="educational_year_graduated[]" placeholder="----" autocomplete="off"
                           class="educational_graduated_class">
                </td>

                <td>
                    <input type="text" name="educational_scholarship[]" placeholder="----" autocomplete="off"
                           class="educational_scholarship_class">
                </td>

            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td id="add-educational" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i
                        class="fa-solid fa-plus"
                        style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span
                            style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>
</div>
