<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\AcademicRank;
use App\Administrative_rank;
use App\Designation;
use App\Department;
use App\Campus;
use App\PersonnelFamily;
use App\PersonnelQuestionaire;
use App\PersonnelReference;
use App\PersonnelGovernmentIssued;
use App\PersonnelChildren;
use App\PersonnelEducational;
use App\PersonnelService;
use App\PersonnelWork;
use App\PersonnelVoluntaryWork;
use App\PersonnelLearning;
use App\PersonnelHobbies;
use App\PersonnelNonAcademic;
use App\PersonnelMembership;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class PersonnelController extends Controller
{
    public function create()
    {
        $campus = Auth::user()->campus();
        if ($campus) {
            $campuses = Campus::where('id', $campus->first()->id)->orderBy('id')->get();
        } else {
            $campuses = Campus::orderBy('id')->get();
        }
        $academic_ranks = AcademicRank::orderBy('id')->get();
        $administrative_ranks = Administrative_rank::orderBy('id')->get();
        $designations = Designation::orderBy('id')->get();
        $departments = Department::orderBy('id')->get();
        return view('backend.pages.personnel.personnel_create', compact('academic_ranks', 'administrative_ranks', 'designations', 'departments', 'campuses'));
    }

    public function index()
    {
        $personnels = Personnel::orderBy('id')->get();
        $academic_ranks = AcademicRank::orderBy('id')->get();
        $administrative_ranks = Administrative_rank::orderBy('id')->get();
        $designations = Designation::orderBy('id')->get();
        $departments = Department::orderBy('id')->get();
        $campuses = Campus::orderBy('id')->get();
        return view('backend.pages.personnel.personnel', compact('personnels', 'academic_ranks', 'administrative_ranks', 'designations', 'departments', 'campuses'));
    }

    public function store(Request $request)
    {
        $personnel = $request->validate([
            'personnel_id' => ['max:250'],
            'firstname' => ['required', 'max:250'],
            'middlename' => [ 'max:250'],
            'lastname' => ['required', 'max:250'],
            'extension' => ['max:250'],
            'birthday' => ['max:250'],
            'birth_place' => ['max:250'],
            'designation_id' => ['max:250'],
            'department_id' => ['max:250'],
            'academic_rank_id' => ['max:250'],
            'administrative_rank_id' => ['max:250'],
            'employee_status' => ['max:250'],
            'campus_id' => ['max:250'],
            'sex' => ['max:250'],
            'civil_status' => ['max:250'],
            'height' => ['max:250'],
            'weight' => ['max:250'],
            'blood' => ['max:250'],
            'gsis' => ['max:250'],
            'pagibig' => ['max:250'],
            'philhealth' => ['max:250'],
            'sss' => ['max:250'],
            'tin' => ['max:250'],
            'id_no' => ['max:250'],
            'citizenship' => ['max:250'],
            'by_birth' => ['max:250'],
            'dual_indication' => ['max:250'],
            'residential_lot_no' => ['max:250'],
            'residential_street' => ['max:250'],
            'residential_subdivision' => ['max:250'],
            'residential_barangay' => ['max:250'],
            'residential_city' => ['max:250'],
            'residential_province' => ['max:250'],
            'residential_zipcode' => ['max:250'],
            'permanent_lot_no' => ['max:250'],
            'permanent_street' => ['max:250'],
            'permanent_subdivision' => ['max:250'],
            'permanent_barangay' => ['max:250'],
            'permanent_city' => ['max:250'],
            'permanent_province' => ['max:250'],
            'permanent_zipcode' => ['max:250'],
            'tel_no' => ['max:250'],
            'mobile_no' => ['max:250'],
            'email' => ['max:250'],
            // FAMILY
            'spouse_firstname' => ['max:250'],
            'spouse_middlename' => ['max:250'],
            'spouse_lastname' => ['max:250'],
            'spouse_extension' => ['max:250'],
            'spouse_occupation' => ['max:250'],
            'spouse_business_name' => ['max:250'],
            'spouse_business_address' => ['max:250'],
            'spouse_tel_no' => ['max:250'],
            'father_firstname' => ['max:250'],
            'father_middlename' => ['max:250'],
            'father_lastname' => ['max:250'],
            'father_extension' => ['max:250'],
            'mother_maiden_name' => ['max:250'],
            'mother_firstname' => ['max:250'],
            'mother_middlename' => ['max:250'],
            'mother_lastname' => ['max:250'],
            'mother_extension' => ['max:250'],
            'personnel_id',
            'question_34a',
            'question_34b',
            'question_34b_detail',
            'question_35a',
            'question_35a_detail',
            'question_35b',
            'question_35b_detail',
            'question_36a',
            'question_36a_detail',
            'question_37a',
            'question_37a_detail',
            'question_38a',
            'question_38a_detail',
            'question_38b',
            'question_38b_detail',
            'question_39a',
            'question_39a_detail',
            'question_40a',
            'question_40a_detail',
            'question_40b',
            'question_40b_detail',
            'question_40c',
            'question_40c_detail',
            'reference_name',
            'reference_address',
            'reference_tel_no',
            'government_issued_id',
            'government_issued_passport',
            'government_date_issuance',
            'government_place_issuance',
            'government_issued_image',
            'government_issued_appointment',
            'children_records',
            'educational_records',
            'service_records',
            'work_records',
            'voluntary_records',
            'learning_records',
            'hobby_records',
            'academic_records',
            'membership_records',
        ]);

        if (!isset($request->personnel_id)) {
            $request->request->add(['created_by' => Auth::user()->id]);
            $personnel = Personnel::create($request->except(['action', 'id']));
            $this->savePersonnel($request, $personnel->id);
            $this->setLog("Personnel Added", "Inserted", '"'.$request->firstname." ".$request->lastname."\" was added at Personnel Record");
        } else {
            $personnel = Personnel::find($request->personnel_id);
            $personnel->update(array_merge($request->except(['action', 'id']), ['status' => 0]));
            $this->savePersonnel($request, $personnel->id);
            $this->setLog("Personnel Updated", "Updated", "Personnel Record was updated");
        }

        return response()->json(compact('personnel'));
    }

    private function savePersonnel($request, $personnelId)
    {
        $request->request->add(['personnel_id' => $personnelId]);

        if (PersonnelFamily::where('personnel_id', $personnelId)->exists()) {
            PersonnelFamily::where('personnel_id', $personnelId)->firstOrFail()->update($request->except(['action', 'id']));
        } else {
            PersonnelFamily::create($request->except(['action', 'id']));
        }

        if (PersonnelQuestionaire::where('personnel_id', $personnelId)->exists()) {
            PersonnelQuestionaire::where('personnel_id', $personnelId)->firstOrFail()->update($request->except(['action', 'id']));
        } else {
            PersonnelQuestionaire::create($request->except(['action', 'id']));
        }

        if (PersonnelReference::where('personnel_id', $personnelId)->exists()) {
            PersonnelReference::where('personnel_id', $personnelId)->firstOrFail()->update($request->except(['action', 'id']));
        } else {
            PersonnelReference::create($request->except(['action', 'id']));
        }

        if (PersonnelGovernmentIssued::where('personnel_id', $personnelId)->exists()) {
            PersonnelGovernmentIssued::where('personnel_id', $personnelId)->firstOrFail()->update($request->except(['action', 'id']));
        } else {
            PersonnelGovernmentIssued::create($request->except(['action', 'id']));
        }

        foreach ($request->children_records as $key => $children) {
            if (empty($children['children_id'])) {
                $children_data = new PersonnelChildren();
                $children_data->personnel_id = $personnelId;
                $children_data->children_name = $children['children'];
                $children_data->children_sex = $children['sex'];
                $children_data->children_birthday = $children['birthdate'];
                $children_data->children_disability =  $children['disability'];
                $children_data->save();
            } else {
                $children_data = PersonnelChildren::where('id', $children['children_id'])->firstOrFail();
                $children_data->personnel_id = $personnelId;
                $children_data->children_name = $children['children'];
                $children_data->children_sex = $children['sex'];
                $children_data->children_birthday = $children['birthdate'];
                $children_data->children_disability =  $children['disability'];
                $children_data->update();
            }
        }

        foreach ($request->educational_records as $key => $educational) {
            if (empty($educational['education_id'])) {
                $educational_data = new PersonnelEducational();
                $educational_data->personnel_id = $personnelId;
                $educational_data->education_level = $educational['education_level'];
                $educational_data->educational_school_name = $educational['educational_school_name'];
                $educational_data->educational_course = $educational['educational_course'];
                $educational_data->educational_from =  $educational['educational_from'];
                $educational_data->educational_to =  $educational['educational_to'];
                $educational_data->educational_units_earned =  $educational['educational_units_earned'];
                $educational_data->educational_year_graduated =  $educational['educational_year_graduated'];
                $educational_data->educational_scholarship_class =  $educational['educational_scholarship_class'];
                $educational_data->save();
            } else {
                $educational_data = PersonnelEducational::where('id', $educational['education_id'])->firstOrFail();
                $educational_data->personnel_id = $personnelId;
                $educational_data->education_level = $educational['education_level'];
                $educational_data->educational_school_name = $educational['educational_school_name'];
                $educational_data->educational_course = $educational['educational_course'];
                $educational_data->educational_from =  $educational['educational_from'];
                $educational_data->educational_to =  $educational['educational_to'];
                $educational_data->educational_units_earned =  $educational['educational_units_earned'];
                $educational_data->educational_year_graduated =  $educational['educational_year_graduated'];
                $educational_data->educational_scholarship_class =  $educational['educational_scholarship_class'];
                $educational_data->update();
            }
        }

        foreach ($request->service_records as $key => $service) {
            if (empty($service['service_id'])) {
                $service_data = new PersonnelService();
                $service_data->personnel_id = $personnelId;
                $service_data->service_career = $service['service_career'];
                $service_data->service_rating = $service['service_rating'];
                $service_data->service_exam_date =  $service['service_exam_date'];
                $service_data->service_exam_place =  $service['service_exam_place'];
                $service_data->service_license =  $service['service_license'];
                $service_data->service_license_date =  $service['service_license_date'];
                $service_data->save();
            } else {
                $service_data = PersonnelService::where('id', $service['service_id'])->firstOrFail();
                $service_data->personnel_id = $personnelId;
                $service_data->service_career = $service['service_career'];
                $service_data->service_rating = $service['service_rating'];
                $service_data->service_exam_date =  $service['service_exam_date'];
                $service_data->service_exam_place =  $service['service_exam_place'];
                $service_data->service_license =  $service['service_license'];
                $service_data->service_license_date =  $service['service_license_date'];
                $service_data->update();
            }
        }

        foreach ($request->work_records as $key => $work) {
            if (empty($work['work_id'])) {
                $work_data = new PersonnelWork();
                $work_data->personnel_id = $personnelId;
                $work_data->work_from = $work['work_from'];
                $work_data->work_to = $work['work_to'];
                $work_data->work_position =  $work['work_position'];
                $work_data->work_agency =  $work['work_agency'];
                $work_data->work_salary =  $work['work_salary'];
                $work_data->work_pay_grade =  $work['work_pay_grade'];
                $work_data->work_appointment =  $work['work_appointment'];
                $work_data->work_gov_service =  $work['work_gov_service'];
                $work_data->save();
            } else {
                $work_data = PersonnelWork::where('id', $work['work_id'])->firstOrFail();
                $work_data->personnel_id = $personnelId;
                $work_data->work_from = $work['work_from'];
                $work_data->work_to = $work['work_to'];
                $work_data->work_position =  $work['work_position'];
                $work_data->work_agency =  $work['work_agency'];
                $work_data->work_salary =  $work['work_salary'];
                $work_data->work_pay_grade =  $work['work_pay_grade'];
                $work_data->work_appointment =  $work['work_appointment'];
                $work_data->work_gov_service =  $work['work_gov_service'];
                $work_data->update();
            }
        }

        foreach ($request->voluntary_records as $key => $voluntary) {
            if (empty($voluntary['voluntary_id'])) {
                $voluntary_data = new PersonnelVoluntaryWork();
                $voluntary_data->personnel_id = $personnelId;
                $voluntary_data->voluntary_name = $voluntary['voluntary_name'];
                $voluntary_data->voluntary_address = $voluntary['voluntary_address'];
                $voluntary_data->voluntary_from =  $voluntary['voluntary_from'];
                $voluntary_data->voluntary_to =  $voluntary['voluntary_to'];
                $voluntary_data->voluntary_hours =  $voluntary['voluntary_hours'];
                $voluntary_data->voluntary_position =  $voluntary['voluntary_position'];
                $voluntary_data->save();
            } else {
                $voluntary_data = PersonnelVoluntaryWork::where('id', $voluntary['voluntary_id'])->firstOrFail();
                $voluntary_data->personnel_id = $personnelId;
                $voluntary_data->voluntary_name = $voluntary['voluntary_name'];
                $voluntary_data->voluntary_address = $voluntary['voluntary_address'];
                $voluntary_data->voluntary_from =  $voluntary['voluntary_from'];
                $voluntary_data->voluntary_to =  $voluntary['voluntary_to'];
                $voluntary_data->voluntary_hours =  $voluntary['voluntary_hours'];
                $voluntary_data->voluntary_position =  $voluntary['voluntary_position'];
                $voluntary_data->update();
            }
        }

        foreach ($request->learning_records as $key => $learning) {
            if (empty($learning['learning_id'])) {
                $learning_data = new PersonnelLearning();
                $learning_data->personnel_id = $personnelId;
                $learning_data->learning_training = $learning['learning_training'];
                $learning_data->learning_from = $learning['learning_from'];
                $learning_data->learning_to =  $learning['learning_to'];
                $learning_data->learning_hours =  $learning['learning_hours'];
                $learning_data->learning_id_type =  $learning['learning_id_type'];
                $learning_data->learning_sponsored =  $learning['learning_sponsored'];
                $learning_data->save();
            } else {
                $learning_data = PersonnelLearning::where('id', $learning['learning_id'])->firstOrFail();
                $learning_data->personnel_id = $personnelId;
                $learning_data->learning_training = $learning['learning_training'];
                $learning_data->learning_from = $learning['learning_from'];
                $learning_data->learning_to =  $learning['learning_to'];
                $learning_data->learning_hours =  $learning['learning_hours'];
                $learning_data->learning_id_type =  $learning['learning_id_type'];
                $learning_data->learning_sponsored =  $learning['learning_sponsored'];
                $learning_data->update();
            }
        }

        foreach ($request->hobby_records as $key => $hobby) {
            if (empty($hobby['hobby_id'])) {
                $hobby_data = new PersonnelHobbies();
                $hobby_data->personnel_id = $personnelId;
                $hobby_data->hobby = $hobby['hobby'] ?? '';
                $hobby_data->save();
            } else {
                $hobby_data = PersonnelHobbies::where('id', $hobby['hobby_id'])->firstOrFail();
                $hobby_data->personnel_id = $personnelId;
                $hobby_data->hobby = $hobby['hobby'] ?? '';
                $hobby_data->update();
            }
        }

        foreach ($request->academic_records as $key => $academic) {
            if (empty($academic['academic_id'])) {
                $academic_data = new PersonnelNonAcademic();
                $academic_data->personnel_id = $personnelId;
                $academic_data->others_non_academic = $academic['others_non_academic'];
                $academic_data->save();
            } else {
                $academic_data = PersonnelNonAcademic::where('id', $academic['academic_id'])->firstOrFail();
                $academic_data->personnel_id = $personnelId;
                $academic_data->others_non_academic = $academic['others_non_academic'];
                $academic_data->update();
            }
        }

        foreach ($request->membership_records as $key => $membership) {
            if (empty($membership['membership_id'])) {
                $membership_data = new PersonnelMembership();
                $membership_data->personnel_id = $personnelId;
                $membership_data->membership = $membership['membership'] ?? '';
                $membership_data->save();
            } else {
                $membership_data = PersonnelMembership::where('id', $membership['membership_id'])->firstOrFail();
                $membership_data->personnel_id = $personnelId;
                $membership_data->membership = $membership['membership'] ?? '';
                $membership_data->update();
            }
        }
    }

    public function get()
    {
        if (request()->ajax()) {
            $campus = Auth::user()->campus();
            if ($campus) {
                $personnels = Personnel::where('campus_id', $campus->first()->id)->orderBy('id', 'desc')->with('reviewed_by', 'created_by', 'academic_rank', 'administrative_rank', 'designation', 'department', 'campus')->get();
            } else {
                $personnels = Personnel::orderBy('id', 'desc')->with('reviewed_by', 'created_by', 'academic_rank', 'administrative_rank', 'designation', 'department', 'campus')->get();
            }
            return datatables()->of(
                $personnels
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $personnel = Personnel::where('id', $id)->orderBy('id')->firstOrFail();
        $academic_ranks = AcademicRank::orderBy('id')->get();
        $administrative_ranks = Administrative_rank::orderBy('id')->get();
        $designations = Designation::orderBy('id')->get();
        $departments = Department::orderBy('id')->get();

        $campus = Auth::user()->campus();
        if ($campus) {
            $campuses = Campus::where('id', $campus->first()->id)->orderBy('id')->get();
        } else {
            $campuses = Campus::orderBy('id')->get();
        }
        return view('backend.pages.personnel.personnel_edit', compact('personnel', 'academic_ranks', 'administrative_ranks', 'designations', 'departments', 'campuses'));
    }

    public function edit_personnel($id)
    {
        $personnel = Personnel::where('id', $id)->with(
            'family',
            'question',
            'reference',
            'government',
            'children',
            'educational',
            'service',
            'work',
            'voluntary',
            'learning',
            'hobby',
            'academic',
            'membership'
        )->orderBy('id')->firstOrFail();
        return response()->json(compact('personnel'));
    }

    public function view($id)
    {
        $personnel = Personnel::where('id', $id)->orderBy('id')->firstOrFail();
        $academic_ranks = AcademicRank::orderBy('id')->get();
        $administrative_ranks = Administrative_rank::orderBy('id')->get();
        $designations = Designation::orderBy('id')->get();
        $departments = Department::orderBy('id')->get();

        $campus = Auth::user()->campus();
        if ($campus) {
            $campuses = Campus::where('id', $campus->first()->id)->orderBy('id')->get();
        } else {
            $campuses = Campus::orderBy('id')->get();
        }
        return view('backend.pages.personnel.personnel_view', compact('personnel', 'academic_ranks', 'administrative_ranks', 'designations', 'departments', 'campuses'));
    }

    public function destroy($id)
    {
        $destroy = Personnel::find($id);
        $destroy->delete();
        $this->setLog("Personnel Deleted", "Deleted", 'Record id "'.$id."\" was deleted at Personnel Record");
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }

    public function get_record($id)
    {
        $personnel = Personnel::where('id', $id)->firstOrFail();
        return response()->json(compact('personnel'));
    }

    public function save_status(Request $request)
    {
        $personnel = Personnel::where('id', $request->id)->update(['status' => $request->status, 'reviewed_by' => Auth::user()->id]);
        $this->setLog("Personnel Status Updated", "Update", 'Personnel Status was updated to "'.$request->status."\" at Personnel Record");
        return 'Record Saved';
    }
}
