<!-- VII LEARNING AND DEVELOPMENT -->
<div class="main-table-container-div" style="margin-top: 20px;">

    <div id="" class="project-details-div">

        <table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px; position: relative;" id="learning_table_id">
            <thead style="position: absolute;">
                <th class="name-border" style="font-size: 16.6px!important; text-decoration: underline; border: none; text-transform: uppercase; padding-bottom: 15px; padding-top: 0px; letter-spacing: 0px;">VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED</th>
            </thead>
                <thead>
                    <th style="border: 0!important; padding-bottom: 30px!important;"></th>
                </thead>
            <thead>
                <th class="name-border" style="text-align: left;">
                    TITLE OF LEARNING AND DEVELOPMENT
                    <br>
                    INTERVENTIONS/TRAINING PROGRAMS
                    <br>
                 </th>
                <th class="name-border" style="text-align: left;">INCLUSIVE DATES (mm/dd/yyyy)(FROM - TO)</th>
                <th class="name-border" style="text-align: left;">NUMBER OF HOURS</th>
                <th class="name-border" style="text-align: left;">TYPE OF LD</th>
                <th class="name-border" style="text-align: left;">CONDUCTED/ SPONSORED BY(Write in full)</th>
            </thead>

            <tbody id="learning_tbl">
                <tr>
                    <td>
                        <input type="hidden" name="learning_id[]" class="learning_id_class">
                        <input type="text" name="learning_training[]" class="learning_training_class" placeholder="----" autocomplete="off" style="width: 400px">
                    </td>
                    <td>
                        <input type="date" name="learning_date_from[]" class="learning_from_class" placeholder="----" autocomplete="off" style="width: 180px; margin-right: 10px">
                        <input type="date" name="learning_date_to[]"class="learning_to_class"  placeholder="----" autocomplete="off" style="width: 180px">
                    </td>
                    <td>
                        <input type="text" name="learning_no_hrs[]" class="learning_hours_class" placeholder="----" autocomplete="off">
                    </td>
                    <td>
                        <select name="learning_ld_type[]" class="learning_id_type_class" style="height: 38px; margin-bottom: 25px;" class="educational_level_class">
                             <option value="">-SELECT-</option>
                             <option value="EXECUTIVE/MANAGERIAL">EXECUTIVE/MANAGERIAL</option>
                             <option value="QUALITY">QUALITY</option>
                             <option value="SOFT SKILLS">SOFT SKILLS</option>
                             <option value="SUPERVISORY">SUPERVISORY</option>
                             <option value="TECHNICAL OR SKILLS">TECHNICAL OR SKILLS</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="learning_sponsored[]" class="learning_sponsored_class" placeholder="----" autocomplete="off">
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td id="add-learning" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
                </tr>
            </tfoot>
        </table>

    </div>

</div>
