<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\DataTables\PostsDataTable;
use DataTables;
class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:view-users');
        // $this->middleware('permission:add-users', ['only' => ['create','store']]);
        // $this->middleware('permission:edit-users', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete-users', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.candidates.index');
    }


    public function ajax()
    {
        $model = Candidate::with('issb');

        return DataTables::eloquent($model)
        ->orderColumn('id', '-id $1')

        // ->editColumn('thumb', function(Candidate $post) {
        //     return asset($post->thumb);
        // })
        // ->addColumn('comments', function(Candidate $post) {
        //     return count($post->comments);
        // })
        ->addColumn('action', function(Candidate $candidate) {
            return route('candidate.show', $candidate->id);
        })
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.admin.candidates.create');
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'board_no' => ['required'],
            'chest_no' => ['required'],
        ]);


        // $params = [
        //     'user_id' => auth()->user()->id,
        //     'board_no' => $request->board_no,
        //     'chest_no' => $request->chest_no,
        // ];

        // $client = new Client(['base_uri' => 'https://reqres.in/api/']);
        // $response = $client->post('users', [
        //     RequestOptions::JSON => $params,

        // ],
        //     ['Content-Type' => 'application/json']);

        // if ($response->getBody()) {
        //     $dummyContents = json_decode($response->getBody(), true);
        //     // JSON string: { ... }
        // }
        $contents = [
            "status"=>"success",
            "data" =>[
               "id"=>17959,
               "status"=>8,
               "board_id"=>129,
               "group_id"=>2,
               "fingerprint_id"=>2976,
               "ppdtgroup"=>1,
               "chestno"=>12,
               "iqtest"=>115,
               "iqtest_remark"=>null,
               "ppdtdp"=>"E",
               "ppdtpsy"=>"F",
               "ppdtgto"=>"F",
               "ppdtrecomndation"=>"Full Board",
               "ppdt_file"=>"",
               "dp"=>"F",
               "dpmarks_file"=>null,
               "boardc"=>"F(E)",
               "boardcremark"=>"Humble",
               "boardclimitb"=>0,
               "boardclimitt"=>0,
               "boardcprofilemark"=>0,
               "boardmark_file"=>"",
               "psy"=>"F",
               "gto"=>"E",
               "pat"=>"70/50",
               "gtolimitb"=>0,
               "gtolimitt"=>3,
               "gtomark_file"=>null,
               "dplimitb"=>1,
               "dplimitt"=>4,
               "psylimitb"=>2,
               "psylimitt"=>5,
               "psymarks_file"=>null,
               "pregto"=>"F",
               "predp"=>"E",
               "prepsy"=>"F",
               "gtoprofilemark"=>79,
               "dpprofilemark"=>75,
               "psyprofilemark"=>73,
               "dpdecission"=>null,
               "ppdtgtoremark"=>"",
               "gtoremark"=>null,
               "dpremark"=>null,
               "psyremark"=>"",
               "rollno"=>"84010227",
               "photo"=>"063217Pic-300x300.jpg",
               "password"=>"9308stu3548",
               "national_id"=>"N/A",
               "division"=>"Army",
               "year"=>"2020",
               "batch"=>"RC-84",
               "name"=>"M. Mahmud-Ul-Hasan Emon",
               "name_bangla"=>"এম. মাহমুদ-উল-হাসান ইমন",
               "permanent_address"=>"HOUSE NO: 224, ROAD NO: 09, WORD NO: 04, VITAPARA, VILLAGE: BORO HAYAT KHA, POST: ITAKUMARI, UNION: ITAKUMARI, THANA: PIRGACHA, DISTRICT: RANGPUR, DIVISION: RANGPUR",
               "present_address"=>"HOUSE NO: 119/8 (ROJONIGONDHA), ROAD NO: N/A, WORD NO: 13, UPOSOHAR, RANGPUR CANTONMENT, POST: UPOSOHAR, THANA: RANGPUR SADAR, DISTRICT: RANGPUR, DIVISION: RANGPUR",
               "dob"=>"2001-10-16",
               "email"=>"mmuhemon@gmail.com",
               "phone"=>"01521573849",
               "place_of_birth"=>"VILLAGE: POBITROJHAR, THANA: PIRGACHA DISTRICT: RANGPUR",
               "district"=>"Rangpur",
               "gender"=>"Male",
               "is_bd_by_birth"=>"Yes",
               "father_nationality"=>"Bangladeshi",
               "fathers_nationality_type"=>"By Birth",
               "mothers_nationality_type"=>"By Birth",
               "mother_nationality"=>"Bangladeshi",
               "is_bangladeshi_parent"=>null,
               "is_bangladeshi_parent_birth"=>null,
               "is_bangladeshi_parent_immigrant"=>null,
               "is_bangladeshi_parent_migrant"=>null,
               "coming_date_bd"=>"0000-00-00",
               "which_country_from"=>"N/A",
               "indian_state"=>null,
               "citizenship_law"=>null,
               "traveling_date_india"=>"0000-00-00",
               "religion"=>"Islam",
               "sect"=>"SUNNI",
               "bank"=>null,
               "identification_symbol"=>"SESAME IN RIGHT THUMB",
               "height"=>"166",
               "weight"=>"53",
               "marital_status"=>"Unmarried",
               "children"=>0,
               "grand_father"=>"MD. ABDUS SAMAD, FARMER",
               "grand_mother_paternal"=>"MOST. SAMEDA BEGUM, HOUSEWIFE",
               "grand_father_maternal"=>"LATE MD. FOZOL HAQ, N/A",
               "grand_mother_maternal"=>"MOST. AHATON NESA, HOUSEWIFE",
               "father"=>"SHAH MD. ABDUS SATTAR",
               "mother"=>"MOST. MONOWARA SATTAR SHIKHA",
               "father_dead_flag"=>"Yes",
               "father_divorced_flag"=>"No",
               "step_mother_name"=>"N/A",
               "step_mother_occupation"=>"N/A",
               "father_divorced_when"=>"0000-00-00",
               "father_divorced_cause"=>null,
               "father_married_monce_flag"=>"No",
               "father_married_monce_cause"=>null,
               "father_edu_quali"=>"S.S.C",
               "mother_dead_flag"=>"No",
               "mother_divorced_flag"=>"No",
               "step_father_name"=>"N/A",
               "step_father_occupation"=>"N/A",
               "mother_divorced_when"=>"0000-00-00",
               "mother_divorced_cause"=>null,
               "mother_married_monce_flag"=>"No",
               "mother_married_monce_cause"=>null,
               "mother_edu_quali"=>"S.S.C",
               "parent_divorced_flag"=>null,
               "parent_divorced_when"=>"0000-00-00",
               "parent_divorced_cause"=>null,
               "father_address"=>"HOUSE NO: 119/8 (ROJONIGONDHA), ROAD NO: N/A, WORD NO: 13, UPOSOHAR, RANGPUR CANTONMENT, POST: UPOSOHAR, THANA: RANGPUR SADAR, DISTRICT: RANGPUR, DIVISION: RANGPUR",
               "father_occu"=>"SENIOR WORRENT OFFICER, BANGLADESH ARMY, 8 E BANGL",
               "mother_occu"=>"HOUSEWIFE",
               "parent_source_income"=>"12000",
               "parent_monthly_income"=>"AFTER MY FATHER'S DEATH MY FAMILY IS DEPENDING ON HIS PENSION PROVIDED BY BANGLADESH ARMY",
               "total_yearly_income"=>0,
               "gurdian_name"=>"N/A",
               "gurdian_relation"=>"N/A",
               "gurdian_mobile_no"=>"N/A",
               "gardian_occupation_detail"=>"N/A",
               "gardian_address"=>"N/A",
               "gurdian_designation"=>"N/A",
               "parent_income_tax"=>null,
               "total_monthly_income"=>0,
               "land_revenue"=>null,
               "brother_address"=>null,
               "uncle_address"=>"B.A.hons||S.S.C||CLASS 8||CLASS 8||CLASS 8||H.S.C||H.S.C||S.S.C||MSc (CHEMISTRY)",
               "brother_inlaw_address"=>null,
               "present_last_service_relative"=>"N/A",
               "gazetted_officer_1"=>"N/A",
               "gazetted_officer_relation_1"=>"N/A",
               "gazetted_officer_occupation_1"=>"N/A",
               "gazetted_officer_2"=>"N/A",
               "gazetted_officer_relation_2"=>"N/Q",
               "gazetted_officer_occupation_2"=>"N/A",
               "academic_rollno"=>null,
               "exam_name1"=>"S.S.C/Equivalent",
               "exam_name2"=>"H.S.C/Equivalent",
               "exam_name3"=>"Bachelor",
               "exam_name4"=>null,
               "exam_name5"=>null,
               "branch_grp1"=>"Science",
               "branch_grp2"=>"Science",
               "branch_grp3"=>null,
               "branch_grp4"=>null,
               "branch_grp5"=>null,
               "std_lang1"=>"Bangla",
               "std_lang2"=>"Bangla",
               "std_lang3"=>"Bangla",
               "std_lang4"=>"Bangla",
               "std_lang5"=>"Bangla",
               "school_name1"=>"CANTONMENT PUBLIC SCHOOL AND COLLEGE, RANGPUR",
               "school_name2"=>"CANTONMENT PUBLIC SCHOOL AND COLLEGE",
               "college_id"=>5582,
               "school_name3"=>null,
               "school_name4"=>null,
               "school_name5"=>null,
               "passing_year1"=>"2017",
               "institute_name2"=>"2019",
               "passing_year3"=>null,
               "passing_year4"=>null,
               "passing_year5"=>null,
               "board1"=>"dinajpur",
               "board2"=>"dinajpur",
               "board3"=>null,
               "board4"=>null,
               "board5"=>null,
               "roll1"=>null,
               "roll2"=>null,
               "roll3"=>null,
               "roll4"=>null,
               "roll5"=>null,
               "hsc_rollno"=>"N/A",
               "gpa1"=>"5",
               "gpa2"=>"5",
               "gpa3"=>null,
               "gpa4"=>null,
               "gpa5"=>null,
               "institute_name1"=>"CANTONMENT PUBLIC SCHOOL AND COLLEGE RANGPUR\\*/CANTONMENT PUBLIC SCHOOL AND COLLEGE RANGPUR",
               "institute_name2"=>"CANTONMENT PUBLIC SCHOOL AND COLLEGE RANGPUR\\*/N/A",
               "game_name1"=>"CHESS\\*/CRICKET",
               "game_name2"=>"READING BOOKS\\*/RUBIK'S CUBE",
               "award1"=>"N/A\\*/N/A",
               "award2"=>"SAGOTO PURUSKAR, BISSOSATHITTO KENDRO SCHOOL CHATTRO-CHATTRIDER BOI PORA KORMOSUCHI, 2012\\*/N/A",
               "course_no"=>"Army",
               "roll_no"=>"8285005",
               "month_result"=>"Feb",
               "year_result"=>"2019",
               "issb_result"=>null,
               "return_detail"=>null,
               "batch_result"=>null,
               "result_type"=>null,
               "final_result"=>"Rejected",
               "admitted_to"=>null,
               "admitted_desig_result"=>null,
               "fowsdari"=>"No",
               "casedetail"=>"N/A",
               "govjob"=>"N/A",
               "job_designation"=>"N/A",
               "job_monthly_salary"=>"N/A",
               "job_detail"=>"N/A",
               "suspended_job"=>"No",
               "suspention_detail"=>"N/A",
               "army_enrollment"=>"N/A",
               "army_regiment"=>"N/A",
               "army_regiment_designation"=>null,
               "army_current_employment"=>"N/A",
               "army_present_designation"=>"N/A",
               "army_leave_cause"=>"N/A",
               "army_resignation_letter"=>null,
               "disease_flag"=>"N/A",
               "disease_date_detail"=>"N/A",
               "applicant_physical_structure"=>"Thin-Built",
               "applicant_color"=>"Mid-toned",
               "applicant_profession"=>null,
               "applicant_income"=>null,
               "applicant_language"=>"BANGLA",
               "applicant_other_language"=>"English (Read),English (Write),English (Speak)",
               "favourite_subjects"=>"MATH, PHYSICS",
               "favourite_places_in"=>"POTENGA SEA BEACH, NATIONAL MUSEUM, BANGABANDHU SHEIKH MUJIBUR RAHMAN NOVO THEATRE",
               "favourite_places_out"=>"N/A",
               "coaching_flag"=>"N/A",
               "coaching_when"=>"N/A",
               "coaching_where"=>"N/A",
               "study_break_flag"=>"N/A",
               "study_break_start"=>"N/A",
               "study_break_end"=>"N/A",
               "study_break_last_exam"=>"N/A",
               "expelled_exam_flag"=>"N/A",
               "expelled_exam_when"=>"N/A",
               "expelled_exam_where"=>"N/A",
               "issb_coaching_address"=>"N/A",
               "brother_name"=>null,
               "brother_occupation"=>null,
               "sister_name"=>"MISS. AHONAF TASNIM SILVY||TABASSUM NUR-E-JANNAT",
               "sister_occupation"=>"STUDENT||N/A",
               "sister_address"=>"J.S.C||N/A",
               "uncle_name"=>"MD. SAIFUL ISLAM||MD. SAHIN ALOM||MD. RAMJAN ALI||MD. ATAIR RAHMAN||MD. MOTIAR RAHMAN||MD. EASIN MIA||MD. ELIYAS MIA||MD. ISRAFIL ISLAM||MD. USUF AL",
               "uncle_occupation"=>"TEXTILE STAFF, RUPA GARMENTS||PRIVATE JOB, SQUARE PHARMACEUTICAL||IMEGRANT TO SINGAPORE||BUSINESS||FARMER||IMEGRANT TO SINGAPORE||BUSINESS||PAINTER IN OWN SHOP||N/A",
               "aunt_name"=>"MOST. SUFIA BEGUM||MOST. SAJIA BEGUM||MOST. FOZILA BEGUM||MOST. MORIAM BEGUM||MOST. ANOWARA BEGUM",
               "aunt_occupation"=>"HOUSEWIFE||HOUSEWIFE||HEAD TEACHER  IN DOKKHIN TARAPUR SOTONTRO EBTEDAYI MADRASA||HOUSEWIFE||HOUSEWIFE",
               "aunt_address"=>"N/A||N/A||FAJIL (MADRASA)||CLASS 8||H.S.C",
               "brother_type"=>null,
               "brother_age"=>null,
               "brother_sibling_order"=>null,
               "brother_wife_name"=>null,
               "brother_wife_age"=>null,
               "brother_wife_education"=>null,
               "brother_wife_occupation"=>null,
               "sister_type"=>"Sister||Sister",
               "sister_age"=>"13||4",
               "sister_sibling_order"=>"2||3",
               "sister_hus_name"=>"N/A||N/A",
               "sister_hus_age"=>"N/A||N/A",
               "sister_hus_education"=>"N/A||N/A",
               "sister_hus_occupation"=>"N/A||N/A",
               "uncle_type"=>"Paternal Uncle||Paternal Uncle||Paternal Uncle||Maternal Uncle||Maternal Uncle||Maternal Uncle||Maternal Uncle||Maternal Uncle||Maternal Uncle",
               "uncle_age"=>"41||39||36||56||48||39||37||32||31",
               "uncle_sibling_order"=>"||||||||||||||||",
               "uncle_wife_name"=>"MOST. TANJINA BEGUM||MOST. MORIAM BEGUM BEUTY||MOST. SELINA BEGOM||MOST. TAHURA BEGUM||MOST. AMINA BEGUM||MISS. NAZMA AKTER||MISS. AFRUJA AKTER||MOST. MORZINA BEGUM||ROUSHOANARA KHATUN",
               "uncle_wife_age"=>"38||28||37||43||38||26||22||27||28",
               "uncle_wife_education"=>"H.S.C||CLASS 8||S.S.C||H.S.C||CLASS 8||H.S.C||H.S.C||H.S.C||B.A.hons",
               "uncle_wife_occupation"=>"HOUSEWIFE||HOUSEWIFE||HOUSEWIFE||HOUSEWIFE||HOUSEWIFE||HOUSEWIFE||HOUSEWIFE||HOUSEWIFE||HOUSEWIFE",
               "aunt_type"=>"Paternal Aunt||Paternal Aunt||Maternal Aunt||Maternal Aunt||Maternal Aunt",
               "aunt_age"=>"51||43||43||36||32",
               "aunt_sibling_order"=>"||||||||",
               "aunt_hus_name"=>"MD. SALAM MIA||MD. SIRAJUL ISLAM||MD. ABDUL MOTIN MIA||MD. LOTIF MIA||MD. SOFIQUL ISLAM",
               "aunt_hus_age"=>"56||50||45||48||41",
               "aunt_hus_education"=>"N/A||CLASS 9||ALIM (MADRASA)||S.S.C||B.A.ed",
               "aunt_hus_occupation"=>"FARMER||BUSINESS||TEACHER (ARABIC) IN CHAITANTALA IDEAL ALIM MADRASA||FARMER||TEACHER (ENGLISH) IN CHAITANTALA IDEAL ALIM MARDASA",
               "family_friends_relative"=>"N/A",
               "arrested"=>"No",
               "sndremark"=>"CT-S",
               "fbid"=>"M Mahmud-Ul Hasan Emon",
               "marriage_date"=>"0000-00-00",
               "separation_date"=>"0000-00-00",
               "huswife_occu"=>"N/A",
               "father_org_name"=>"N/A",
               "father_monthly_income"=>"N/A",
               "mother_org_name"=>"N/A",
               "mother_monthly_income"=>"N/A",
               "father_type"=>"FATHER'S PENSION",
               "mother_type"=>"Monthly",
               "mother_source_income"=>null,
               "mother_source_monthly_income"=>0,
               "mother_total_monthly_income"=>0,
               "mother_total_yearly_income"=>0,
               "president_sign"=>null,
               "ic"=>"3",
               "eiin"=>"127500",
               "course_type"=>"regular",
               "sibling_option"=>"1",
               "sibling_number"=>"3",
               "my_position"=>"1",
               "ssc_range"=>"5",
               "hsc_range"=>"5",
               "hsc_roll"=>"134323",
               "hsc_reg"=>"1417607884",
               "father_profession_category"=>"other",
               "father_token"=>1,
               "father_service"=>"JCO",
               "father_rank"=>"SENIOR WORRENT OFFICER",
               "father_education"=>"SSC",
               "father_income"=>"Nil",
               "mother_profession_category"=>"other",
               "mother_token"=>3,
               "mother_service"=>null,
               "mother_rank"=>"HOUSEWIFE",
               "mother_education"=>"SSC",
               "mother_income"=>"Nil",
               "long_previous_attendance"=>"Once Rejected",
               "short_previous_attendance"=>"Not Applicable",
               "permanent_district_id"=>32,
               "permanent_thana_id"=>445,
               "permanent_postal_code"=>"5450",
               "present_district_id"=>32,
               "present_thana_id"=>444,
               "present_postal_code"=>"5400",
               "tab_status"=>null,
               "created_at"=>"2020-01-13 08:12:12",
               "updated_at"=>"2020-02-06 13:28:40",
               "board"=>[
                  "id"=>129,
                  "board_no"=>"2200",
                  "batch_no"=>"RC-84/BN-20B/BAFA-82/\t",
                  "start_date"=>"2020-02-03",
                  "notifying_date"=>"2020-02-03",
                  "end_date"=>"2020-02-06",
                  "status"=>3,
                  "lastchestno"=>51,
                  "created_at"=>"2020-01-23 10:23:42",
                  "updated_at"=>"2020-07-05 10:43:22"
            ],
               "group"=>[
                  "id"=>2,
                  "title"=>"N/BLUE",
                  "status"=>0,
                  "whitests"=>1,
                  "gto_id"=>"140",
                  "gto_name"=>"Maj Samiul Sunny, inf",
                  "dp_id"=>"21",
                  "dp_name"=>" Cdr Monirul Ahsan, (TAS), psc, BN",
                  "psy_id"=>"27",
                  "psy_name"=>"Lt Col Md Mahbubur Rahman, AEC",
                  "board_id"=>147,
                  "applicantids"=>"",
                  "president_sign"=>"",
                  "created_at"=>"2017-04-26 15:06:27",
                  "updated_at"=>"2020-09-11 15:11:19"
               ],
               "evaluationrpt"=>[
                  
               ]
            ]
        ];
        $contents = (object) $contents;
        $content = (object) $contents->data;

        $candidate = Candidate::first();
        \dump(  $contents );
        \dump(  $candidate );
        
        
        $data = [
            "name" => $content->name,
            "image" => $content->photo,  //api mod needed
            "sex" => $content->gender,
            "present_address" => $content->present_address,
            "present_division" => $content->present_address,
            "present_district" => $content->permanent_district_id, //api mod needed
            "parmanent_address" => $content->permanent_address,
            "parmanent_division" => $content->permanent_address,
            "parmanent_district" => $content->permanent_district_id, //api mod needed
            "dob" =>  $content->dob,
            "age" => date_diff(date_create($content->dob), date_create('today'))->y,
            "height_in_meter" => $content->height, //calculation needed
            "weight_in_kg" => $content->weight,
            "built" => $content->applicant_physical_structure,
            "complexion" => $content->applicant_color,
            "present_occupation" => null,
            "monthly_income" => $content->applicant_income,
            "maritaial_status" => $content->marital_status,
            "religion" => $content->marital_status,
            "caste_or_tribe" => $content->sect,
            "mother_tounge" => $content->applicant_language,
            "hobby" => $content->game_name2,
            "visit_abroad" => null,
            "physical_or_mental_disease" => $content->disease_flag,
            "preparation_of_issb" => $content->issb_coaching_address,
            "previous_result_in_issb" => $content->long_previous_attendance,
            "break_of_study" => $content->study_break_flag,
            "name_of_school" => $content->school_name1,
            "name_of_college" => $content->school_name2,
            "name_of_last_college_or_university" => $content->institute_name2,
            "standard_of_college_or_university" => null,
            "accademic_qualification" => null,
            "year_of_passing" => $content->institute_name2,
            "standard_of_academic_attainments" => null,
            "HSC" => null,
            "graduate" => null,
            "masters" => null,
            "name_of_present_organization" => null,
            "extra_curricular_activities" => $content->game_name1,
            "father_name" => $content->father,
            "father_educational_qualification" => $content->father_edu_quali,
            "father_profession" => $content->father_occu,
            "father_professional_status" => $content->father_profession_category,
            "father_average_monthly_income" => $content->father_monthly_income,
            "father_last_professional_status" => $content->father_profession_category,
            "mother_name" =>  $content->mother,
            "mother_educational_qualification" => $content->mother_edu_quali,
            "mother_profession" =>  $content->mother_occu,
            "mother_professional_status" => $content->mother_profession_category,
            "mother_average_monthly_income" => $content->mother_monthly_income,
            "mother_last_professional_status" => $content->mother_profession_category,
            "parental_relation_status" => null,
            "guardian_name" => $content->gurdian_name,
            "relation_with_guardian" => $content->gurdian_relation,
            "guardian_profession" => $content->gardian_occupation_detail,
            "guardian_professional_status" => $content->gurdian_designation,
            "guardian_average_monthly_income" => null,
            "family_monthly_income" => $content->parent_source_income,
            "number_of_brother" => $content->brother_name, //explode then calculate
            "number_of_sister" => $content->brother_name, //explode then calculate
            "number_of_step_brother" => null,
            "number_of_step_sister" => null,
            "total_number_of_sibling" => null, //calculation needed
    "sibling_order" => null,
    "social-status_of_family" => null
];
\dump(  $data );
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'gender' => 'required',
            'password' => 'required|min:6|same:confirm-password',
            'role' => 'required',
            ]);
            
        }
        
    public function add()
    {

        $params = [
            'user_id' => auth()->user()->id,
            'secret_key' => 'issb@rnd#2020f@rdin',
            'request_from' => 'rnd',
        ];

        $client = new Client(['base_uri' => 'https://reqres.in/api/']);
        $response = $client->post('users', [
            RequestOptions::JSON => $params,

        ],
            ['Content-Type' => 'application/json']);

        if ($response->getBody()) {
            $contents = json_decode($response->getBody(), true);
            // JSON string: { ... }
        }
        \dd($contents);
    }

}
