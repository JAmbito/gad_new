 <!-- VI VOLUNTARY WORK -->
 <div class="main-table-container-div" style="margin-top: 20px;">

    <div id="voluntary-work" class="project-details-div">

        <table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px; position: relative;" id="voluntary_work_table_id">

            <thead style="position: absolute;">
                <th class="name-border" style="font-size: 16.6px!important; text-decoration: underline; border: none; text-transform: uppercase; padding-bottom: 15px; padding-top: 0px; letter-spacing: 0px;">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</th>
            </thead>

            <thead>
                <th style="border: 0!important; padding-bottom: 30px!important;"></th>
            </thead>

            <thead>
                <th class="name-border" style="text-align: left;">NAME(Write in full)</th>
                <th class="name-border" style="text-align: left;">ADDRESS OF ORGANIZATION</th>
                <th class="name-border" style="text-align: left;">INCLUSIVE DATES (mm/dd/yyyy)(FROM - TO)</th>
                <th class="name-border" style="text-align: left;">NUMBER OF HOURS</th>
                <th class="name-border" style="text-align: left;">POSITION / NATURE OF WORK</th>
            </thead>

            <tbody id="voluntary_tbl">
                <tr>
                    <td>
                        <input type="hidden" name="voluntary_id[]" class="voluntary_id_class">
                        <input type="text" name="voluntary_name[]" class="voluntary_name_class" placeholder="----" autocomplete="off" style="width: 400px">
                    </td>
                    <td>
                        <input type="text" name="voluntary_address[]" class="voluntary_address_class" placeholder="----" autocomplete="off" >
                    </td>
                    <td>
                        <input type="date" name="voluntary_date_from[]" class="voluntary_from_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
                        <input type="date" name="voluntary_date_to[]" class="voluntary_to_class" placeholder="----" autocomplete="off" style="width: 180px">
                    </td>
                    <td>
                        <input type="text" name="voluntary_no_of_hrs[]" class="voluntary_hours_class" placeholder="----" autocomplete="off">
                    </td>
                    <td>
                        <input type="text" name="voluntary_position[]" class="voluntary_position_class" placeholder="----" autocomplete="off">
                    </td>

                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td id="add-voluntary-work" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
                </tr>
            </tfoot>

        </table>
    </div>
</div>
