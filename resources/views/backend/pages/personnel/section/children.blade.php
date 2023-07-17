<!-- ADD CHILDREN FAMILY BACKGROUND -->
<table class="table table-responsive-block" style="width: 100%; border: 1px solid #939393; border-radius: 6px; padding: 25px 30px 10px 30px; margin-bottom: 30px;" id="family_children_table_id">
    <thead>
        <th class="name-border" style="text-align: left;">NAME OF CHILDREN (Write full name and list all)</th>
        <th class="name-border" style="text-align: left;">SEX</th>
        <th class="name-border" style="text-align: left;">DATE OF BIRTH</th>
        <th class="name-border" style="text-align: left;">DISABILITY</th>
    </thead>

    <tbody id="children_tbl">
        <tr>
            <td>
                <input type="hidden" name="children_id[]" placeholder="----" autocomplete="off" class="children_id_class" style="width: 500px">
                <input type="text" name="children_name[]" placeholder="----" autocomplete="off" class="children_name_class" style="width: 500px">
            </td>
            <td>
                <select name="children_sex[]"  style="height: 38px; margin-bottom: 25px;" class="children_sex_class">
                     <option style="display: none;" value="">-SELECT SEX-</option>
                     <option value="MALE">MALE</option>
                     <option value="FEMALE">FEMALE</option>
                </select>
            </td>
            <td>
                <input type="date" name="children_birthday[]" placeholder="----" autocomplete="off" class="children_bday_class">
            </td>
            <td>
                <select name="children_disability[]"  style="height: 38px; margin-bottom: 25px;" class="children_disability_class">
                     <option value="NONE">NONE</option>
                     <option value="COGNITIVE">COGNITIVE</option>
                     <option value="HEARING">HEARING</option>
                     <option value="MOTOR">MOTOR</option>
                     <option value="VISUAL">VISUAL</option>
                     <option value="OTHER'S">OTHER'S</option>
                </select>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td id="add-children" style="text-align: left; cursor: pointer; min-width: 30px!important;"><i class="fa-solid fa-plus" style="background-color: #65B2FF; color: #fff; border-radius: 4px; padding: 12px 18px 12px 12px; font-size: 12px;"><span style="font-family: 'sora'; font-weight: 400; font-size: 11px">&nbsp;&nbsp;ADD MORE</span></i></td>
        </tr>
    </tfoot>
</table>
