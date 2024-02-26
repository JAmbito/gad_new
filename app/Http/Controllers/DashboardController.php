<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.pages.dashboard');
    }

    public function get_records()
    {
        $total_employees = array(
            'male' => Personnel::where('sex', 'MALE')->count(),
            'female' => Personnel::where('sex', 'FEMALE')->count()
        );

        $total_employees_managment = array(
            'male' => array(
                'faculty' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('sex', 'MALE')->count(),
                'non_teaching' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('sex', 'MALE')->count(),
                'top_management' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 3)->orWhere('management_type_id', 4);
                })->where('sex', 'MALE')->count(),
                'techincal' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 5);
                })->where('sex', 'MALE')->count(),
            ),
            'female' => array(
                'faculty' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('sex', 'FEMALE')->count(),
                'non_teaching' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('sex', 'FEMALE')->count(),
                'top_management' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 3)->orWhere('management_type_id', 4);
                })->where('sex', 'FEMALE')->count(),
                'techincal' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 5);
                })->where('sex', 'FEMALE')->count(),
            ),
        );

        $total_employees_questions = array(
            'male' => array(
                'differently_able' => Personnel::with('question')->whereHas('question', function ($q) {
                    $q->where('question_40b', 'yes');
                })->where('sex', 'MALE')->count(),
                'ip_groups' => Personnel::with('question')->whereHas('question', function ($q) {
                    $q->where('question_40a', 'yes');
                })->where('sex', 'MALE')->count(),
                'solo_parents' => Personnel::with('question')->whereHas('question', function ($q) {
                    $q->where('question_40c', 'yes');
                })->where('sex', 'MALE')->count()
            ),
            'female' => array(
                'differently_able' => Personnel::with('question')->whereHas('question', function ($q) {
                    $q->where('question_40b', 'yes');
                })->where('sex', 'FEMALE')->count(),
                'ip_groups' => Personnel::with('question')->whereHas('question', function ($q) {
                    $q->where('question_40a', 'yes');
                })->where('sex', 'FEMALE')->count(),
                'solo_parents' => Personnel::with('question')->whereHas('question', function ($q) {
                    $q->where('question_40c', 'yes');
                })->where('sex', 'FEMALE')->count()
            ),
        );

        $total_employees_children = array(
            'male' => Personnel::withCount('children')->whereHas('children', function ($q) {
                $q->where(Db::raw("DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), children_birthday)), '%Y') + 0"), '<', 7);
            })->where('sex', 'MALE')->count(),
            'female' => Personnel::withCount('children')->whereHas('children', function ($q) {
                $q->where(Db::raw("DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), children_birthday)), '%Y') + 0"), '<', 7);
            })->where('sex', 'FEMALE')->count()
        );

        $total_employees_children_d = array(
            'male' => Personnel::withCount('children')->whereHas('children', function ($q) {
                $q->where('children_disability', '!=', '')->where('children_disability', '!=', null);
            })->where('sex', 'MALE')->count(),
            'female' => Personnel::withCount('children')->whereHas('children', function ($q) {
                $q->where('children_disability', '!=', '')->where('children_disability', '!=', null);
            })->where('sex', 'FEMALE')->count()
        );

        $total_employees_status = array(
            'male' => array(
                'permanent' => Personnel::where('employee_status', 'PERMANENT')->where('sex', 'MALE')->count(),
                'casual' => Personnel::where('employee_status', 'CASUAL')->where('sex', 'MALE')->count(),
                'job_order' => Personnel::where('employee_status', 'JOB ORDER')->where('sex', 'MALE')->count(),
            ),
            'female' => array(
                'permanent' => Personnel::where('employee_status', 'PERMANENT')->where('sex', 'FEMALE')->count(),
                'casual' => Personnel::where('employee_status', 'CASUAL')->where('sex', 'FEMALE')->count(),
                'job_order' => Personnel::where('employee_status', 'JOB ORDER')->where('sex', 'FEMALE')->count(),
            ),
        );

        $total_employees_civil = array(
            'male' => array(
                'single' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('civil_status', 'SINGLE')->where('sex', 'MALE')->count(),
                'married' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('civil_status', 'MARRIED')->where('sex', 'MALE')->count(),
                'widowed' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('civil_status', 'WIDOWED')->where('sex', 'MALE')->count(),
                'separated' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('civil_status', 'SEPARATED')->where('sex', 'MALE')->count(),
            ),
            'female' => array(
                'single' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('civil_status', 'SINGLE')->where('sex', 'FEMALE')->count(),
                'married' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('civil_status', 'MARRIED')->where('sex', 'FEMALE')->count(),
                'widowed' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('civil_status', 'WIDOWED')->where('sex', 'FEMALE')->count(),
                'separated' => Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->where('civil_status', 'SEPARATED')->where('sex', 'FEMALE')->count(),
            ),
        );


        $total_faculty_education = array(
            'male' => array(
                'doctorate' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'DOCTORATE DEGREE');
                })->where('sex', 'MALE')->count(),
                'masters' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'MASTERS DEGREE');
                })->where('sex', 'MALE')->count(),
                'college' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'BACHELORS DEGREE');
                })->where('sex', 'MALE')->count()
            ),
            'female' => array(
                'doctorate' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'DOCTORATE DEGREE');
                })->where('sex', 'FEMALE')->count(),
                'masters' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'MASTERS DEGREE');
                })->where('sex', 'FEMALE')->count(),
                'college' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 1);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'BACHELORS DEGREE');
                })->where('sex', 'FEMALE')->count()
            ),
        );

        $total_non_teaching_status = array(
            'male' => array(
                'single'=>Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('civil_status', 'SINGLE')->where('sex', 'MALE')->count(),
                'married'=>Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('civil_status', 'MARRIED')->where('sex', 'MALE')->count(),
                'widowed'=>Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('civil_status', 'WIDOWED')->where('sex', 'MALE')->count(),
                'separated'=>Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('civil_status', 'SEPARATED')->where('sex', 'MALE')->count(),
            ),
            'female' => array(
                'single'=>Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('civil_status', 'SINGLE')->where('sex', 'FEMALE')->count(),
                'married'=>Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('civil_status', 'MARRIED')->where('sex', 'FEMALE')->count(),
                'widowed'=>Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('civil_status', 'WIDOWED')->where('sex', 'FEMALE')->count(),
                'separated'=>Personnel::with('designation')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->where('civil_status', 'SEPARATED')->where('sex', 'FEMALE')->count(),
            ),
        );

        $total_non_teaching_education = array(
            'male' => array(
                'doctorate' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'DOCTORATE DEGREE');
                })->where('sex', 'MALE')->count(),
                'masters' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'MASTERS DEGREE');
                })->where('sex', 'MALE')->count(),
                'college' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'BACHELORS DEGREE');
                })->where('sex', 'MALE')->count(),
                'post_secondary' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'VOCATIONAL');
                })->where('sex', 'MALE')->count(),
                'secondary' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'SECONDARY');
                })->where('sex', 'MALE')->count(),
                'elementary' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'ELEMENTARY');
                })->where('sex', 'MALE')->count()
            ),
            'female' => array(
                'doctorate' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'DOCTORATE DEGREE');
                })->where('sex', 'FEMALE')->count(),
                'masters' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'MASTERS DEGREE');
                })->where('sex', 'FEMALE')->count(),
                'college' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'BACHELORS DEGREE');
                })->where('sex', 'FEMALE')->count(),
                'post_secondary' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'VOCATIONAL');
                })->where('sex', 'FEMALE')->count(),
                'secondary' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'SECONDARY');
                })->where('sex', 'FEMALE')->count(),
                'elementary' => Personnel::with('designation', 'educational')->whereHas('designation', function ($q) {
                    $q->where('management_type_id', 2);
                })->whereHas('educational', function ($q) {
                    $q->where('education_level', 'ELEMENTARY');
                })->where('sex', 'FEMALE')->count()
            ),
        );

        return response()->json(compact('total_employees', 'total_employees_managment', 'total_employees_questions', 'total_employees_children', 'total_employees_children_d', 'total_employees_status', 'total_employees_civil', 'total_faculty_education', 'total_non_teaching_status', 'total_non_teaching_education'));
    }
}
