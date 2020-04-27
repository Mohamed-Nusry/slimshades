<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Response;
use App\DetailKeyValues;
use App\UserDetailKeys;
use App\UserPhysicalStatus;
use App\UserResidence;
use App\User;
use App\UserPhoto;
use App\FamilyPhoto;
use App\UserBackgroundDetail;
use App\UserLifeStyle;
use App\UserEducationDetail;
use App\UserCareerDetail;
use App\UserPresonalAssetDetail;
use App\UserFamilyDetail;
use App\UserAfterMarriageDetail;
use App\UserHoroscopeDetail;
use App\UserAboutYourselfAndPartner;
use App\UserPrivacySetting;
use App\UserPartnerPreferenceDetail;
use App\UserWhoAmIDetail;
use App\UserRestrictedContact;
use App\UserLog;
use App\Notification;
use App\UserLevelDetail;
use App\UserLevelSetting;

use Image;
use File;
use DB;
use Auth;

class UserFormController extends Controller
{


  //Load all user form according to the user form number
  public function userFormView($form_no){
    
    

    $heights = DetailKeyValues::getValuesByKey(USER_HEIGHT);
    $weights = DetailKeyValues::getValuesByKey(USER_WEIGHT);
    $body_shapes = DetailKeyValues::getValuesByKey(USER_BODY_SHAPE);
    $skin_colors = DetailKeyValues::getValuesByKey(USER_SKIN_COLOR);
    $disabilitys = DetailKeyValues::getValuesByKey(USER_DISABILITY);
    $blood_groups = DetailKeyValues::getValuesByKey(USER_BLOOD_GROUP);
    $health_informations = DetailKeyValues::getValuesByKey(USER_HEALTH_INFORMATION);

    $all_countries = DetailKeyValues::getValuesByKey(USER_ALL_COUNTRIES);
    $residence_status = DetailKeyValues::getValuesByKey(USER_RESIDENCE_STATUS);
    $provinces = DetailKeyValues::getValuesByKey(USER_PROVINCE);
    $districts = DetailKeyValues::getValuesByKey(USER_DISTRICT);
    $cities = DetailKeyValues::getValuesByKey(USER_CITY);
    $ownership_of_address = DetailKeyValues::getValuesByKey(USER_OWNERSHIP_OF_ADDRESS);

    $mother_tongues = DetailKeyValues::getValuesByKey(USER_MOTHER_TONGUE);
    $ethncities = DetailKeyValues::getValuesByKey(USER_ETHNICITY);
    $religions = DetailKeyValues::getValuesByKey(USER_RELIGION);
    $casts = DetailKeyValues::getValuesByKey(USER_CASTE);
    $sub_casts = DetailKeyValues::getValuesByKey(USER_SUB_CAST);
    $police_report = DetailKeyValues::getValuesByKey(USER_POLICE_REPORT);

    $diets = DetailKeyValues::getValuesByKey(USER_DIET);
    $drinks = DetailKeyValues::getValuesByKey(USER_DRINKS);
    $smokes = DetailKeyValues::getValuesByKey(USER_SMOKE);
    $languages_speak = DetailKeyValues::getValuesByKey(USER_LANGUAGES);
    $dress_makeup = DetailKeyValues::getValuesByKey(USER_DRESS_MAKEUP);
    $used_to_travel = DetailKeyValues::getValuesByKey(USER_USED_TO_TRAVEL);
    $call_to_parents = DetailKeyValues::getValuesByKey(USER_CALL_TO_PARENTS);
    $customs = DetailKeyValues::getValuesByKey(USER_CUSTOMS);
    $live_in = DetailKeyValues::getValuesByKey(USER_LIVE_IN);

    $education_level = DetailKeyValues::getValuesByKey(USER_EDUCATION_LEVEL);
    $education_field = DetailKeyValues::getValuesByKey(USER_EDUCATION_FIELD);
    $school_university = DetailKeyValues::getValuesByKey(USER_SCHOOL_UNIVERSITY);

    $working_with = DetailKeyValues::getValuesByKey(USER_WORKING_WITH);
    $working_as = DetailKeyValues::getValuesByKey(USER_WORKING_AS);
    $describe_career = DetailKeyValues::getValuesByKey(USER_WORKING_AS);
    // $describe_career = DetailKeyValues::getValuesByKey(USER_DESCRIBE_CAREER);

    $monthly_income = DetailKeyValues::getValuesByKey(USER_MONTHLY_INCOME);
    $monthly_income_routes = DetailKeyValues::getValuesByKey(USER_MONTHLY_INCOME_ROUTES);
    $asset_value = DetailKeyValues::getValuesByKey(USER_ASSET_VALUE);
    $asset_routes = DetailKeyValues::getValuesByKey(USER_ASSET_ROUTES);
    $ownership_of_assets = DetailKeyValues::getValuesByKey(USER_OWNERSHIP_OF_ASSETS);

    $family_type = DetailKeyValues::getValuesByKey(USER_FAMILY_TYPE);
    $family_values = DetailKeyValues::getValuesByKey(USER_FAMILY_VALUES);
    $family_class = DetailKeyValues::getValuesByKey(USER_FAMILY_CLASS);
    $family_culture = DetailKeyValues::getValuesByKey(USER_FAMILY_CULTURE);
    $parent_status = DetailKeyValues::getValuesByKey(USER_FAMILY_PARENT_STATUS);

    $prefer_to_live = DetailKeyValues::getValuesByKey(USER_PREFER_TO_LIVE);
    $help_family = DetailKeyValues::getValuesByKey(USER_HELP_FAMILY);
    $after_marriage_job = DetailKeyValues::getValuesByKey(USER_AFTER_MARRIAGE_JOB);
    $after_marriage_education = DetailKeyValues::getValuesByKey(USER_AFTER_MARRIAGE_EDUCATION);
    $children_likes = DetailKeyValues::getValuesByKey(USER_CHILDREN_LIKES);

    $privacy_settings=DetailKeyValues::getValuesByKey(USER_PRIVACY_SETTINGS_DETAILS);

    $marital_status=DetailKeyValues::getValuesByKey(USER_MARITAL_STATUS);

    $enrichment_hobbies=DetailKeyValues::getValuesByKey(USER_ENRICHMENT_HOBBIES);
    $sport_physical_activities=DetailKeyValues::getValuesByKey(USER_SPORT_PHYSICAL_ACTIVITIES);
    $social_activities=DetailKeyValues::getValuesByKey(USER_SOCIAL_ACTIVITIES);
    $creative_hobbies=DetailKeyValues::getValuesByKey(USER_CREATIVE_HOBBIES);
    $collecting_hobbies=DetailKeyValues::getValuesByKey(USER_COLLECTING_HOBBIES);
    $outdoor_hobbies=DetailKeyValues::getValuesByKey(USER_OUTDOOR_HOBBIES);
    $domestic_hobbies=DetailKeyValues::getValuesByKey(USER_DOMESTIC_HOBBIES);
    $select_all=DetailKeyValues::getValuesByKey(USER_SELECT_ALL);

    $matching_horoscope=DetailKeyValues::getValuesByKey(USER_MATCHING_HOROSCOPE);
    $zodiac_sign=DetailKeyValues::getValuesByKey(ZODIAC_SIGN);
    $ganaya=DetailKeyValues::getValuesByKey(GANAYA);
    $nekatha=DetailKeyValues::getValuesByKey(NEKATHA);
    $papa_kendara=DetailKeyValues::getValuesByKey(PAPA_KENDARA);
    


    $edit_physical_status = UserPhysicalStatus::where('users_id',Auth::user()->id)->first();
    
    $edit_partner_preferences = UserPartnerPreferenceDetail::where('users_id',Auth::user()->id)->first();
    $edit_restricted_contacts = UserRestrictedContact::where('users_id',Auth::user()->id)->first();
    $edit_privacy_setting = UserPrivacySetting::where('users_id',Auth::user()->id)->first();
    $edit_about_me_and_partner = UserAboutYourselfAndPartner::where('users_id',Auth::user()->id)->first();
    $edit_horoshcope_details = UserHoroscopeDetail::where('users_id',Auth::user()->id)->first();
    $edit_after_marriage_details = UserAfterMarriageDetail::where('users_id',Auth::user()->id)->first();
    $edit_family_details = UserFamilyDetail::where('users_id',Auth::user()->id)->first();
    $edit_assets_details = UserPresonalAssetDetail::where('users_id',Auth::user()->id)->first();
    $edit_career_details = UserCareerDetail::where('users_id',Auth::user()->id)->first();
    $edit_education_details = UserEducationDetail::where('users_id',Auth::user()->id)->first();
    $edit_life_style_details = UserLifeStyle::where('users_id',Auth::user()->id)->first();   
    $edit_background_details = UserBackgroundDetail::where('users_id',Auth::user()->id)->first();    
    $edit_residences_details = UserResidence::where('users_id',Auth::user()->id)->first();    
    $edit_who_iam_details = UserWhoAmIDetail::where('users_id',Auth::user()->id)->first();
    $edit_profile_photos_details = User::select('profile_img')->where('id',Auth::user()->id)->first();

    $edit_physical_status_count = UserPhysicalStatus::where('users_id',Auth::user()->id)->count();
    $edit_residences_details_count = UserResidence::where('users_id',Auth::user()->id)->count();
    $edit_background_details_count = UserBackgroundDetail::where('users_id',Auth::user()->id)->count();
    $edit_life_style_details_count = UserLifeStyle::where('users_id',Auth::user()->id)->count();
    $edit_who_iam_details_count = UserWhoAmIDetail::where('users_id',Auth::user()->id)->count();
    $edit_education_details_count = UserEducationDetail::where('users_id',Auth::user()->id)->count();
    $edit_career_details_count = UserCareerDetail::where('users_id',Auth::user()->id)->count();
    $edit_assets_details_count = UserPresonalAssetDetail::where('users_id',Auth::user()->id)->count();
    $edit_family_details_count = UserFamilyDetail::where('users_id',Auth::user()->id)->count();
    $edit_after_marriage_count = UserAfterMarriageDetail::where('users_id',Auth::user()->id)->count();
    $edit_horoshcope_count = UserHoroscopeDetail::where('users_id',Auth::user()->id)->count();
    $edit_about_me_and_partner_count = UserAboutYourselfAndPartner::where('users_id',Auth::user()->id)->count();
    $edit_privacy_setting_count = UserPrivacySetting::where('users_id',Auth::user()->id)->count();
    $edit_partner_preferences_count = UserPartnerPreferenceDetail::where('users_id',Auth::user()->id)->count();

    $family_photos = FamilyPhoto::where('users_id',Auth::user()->id)->get();

    $user_galleries_photo = UserPhoto::where('users_id',Auth::user()->id)->get();

    $user = User::find(Auth::user()->id);

    $min_age = 18;
    $max_age = 68;
    $min_height_inches = 48;
    $max_height_inches = 84;

    if ($form_no == USER_PHYSICAL_STATUS) {
      $content = view('registration-forms.physical-status',compact('edit_physical_status_count','heights','weights','body_shapes','skin_colors','disabilitys','blood_groups','health_informations','form_no','edit_physical_status'))->render();
    }elseif ($form_no == USER_RESIDENCES) {
      $content =  view('registration-forms.residences',compact('edit_residences_details_count','all_countries','residence_status','provinces','districts','cities','ownership_of_address','form_no','edit_residences_details'))->render();
    }elseif ($form_no == USER_BACKGROUND) {
      $content =  view('registration-forms.background',compact('edit_background_details_count','mother_tongues','ethncities','religions','casts','sub_casts','police_report','form_no','edit_background_details'))->render();
    }elseif ($form_no == USER_LIFE_STYLE) {
      $content =  view('registration-forms.life-style',compact('edit_life_style_details_count','form_no','diets','drinks','smokes','languages_speak','dress_makeup','used_to_travel','call_to_parents','customs','live_in','edit_life_style_details'))->render();
    }elseif ($form_no == USER_WHO_I_AM) {
      $content =  view('registration-forms.who-i-am',compact('edit_who_iam_details_count','form_no','enrichment_hobbies','sport_physical_activities','social_activities','creative_hobbies','collecting_hobbies','outdoor_hobbies','domestic_hobbies','edit_who_iam_details'))->render();
    }elseif ($form_no == USER_EDUCATION) {
      $content =  view('registration-forms.education',compact('edit_education_details_count','form_no','education_level','education_field','school_university','edit_education_details'))->render();
    }elseif ($form_no == USER_CAREER) {
      $content =  view('registration-forms.career',compact('edit_career_details_count','form_no','working_with','working_as','provinces','describe_career','edit_career_details','districts','cities'))->render();
    }elseif ($form_no == USER_ASSETS) {
      $content =  view('registration-forms.assets',compact('edit_assets_details_count','form_no','monthly_income','monthly_income_routes','asset_value','asset_routes','ownership_of_assets','edit_assets_details'))->render();
    }elseif ($form_no == USER_FAMILY) {
      $content =  view('registration-forms.family',compact('family_photos','edit_family_details_count','form_no','districts','family_type','family_values','family_class','family_culture','parent_status','edit_family_details'))->render();
    }elseif ($form_no == USER_AFTER_MARRIAGE) {
      $content =  view('registration-forms.after-marriage',compact('edit_after_marriage_count','form_no','prefer_to_live','help_family','after_marriage_job','after_marriage_education','children_likes','edit_after_marriage_details'))->render();
    }elseif ($form_no == USER_HOROSHCOPE) {
      $content =  view('registration-forms.horoshcope',compact('edit_horoshcope_count','form_no','matching_horoscope','zodiac_sign','ganaya','nekatha','papa_kendara','edit_horoshcope_details'))->render();
    }elseif ($form_no == USER_PHOTO_VIDEO) {
      // $data =  view('registration-forms.photo_video_modal')->render();

      $content =  view('registration-forms.my-photo-video',compact('user','form_no','edit_profile_photos_details','user_galleries_photo'))->render();

    }elseif ($form_no == USER_ABOUT_ME_AND_PARTNER) {
      $content =  view('registration-forms.more_about_me_and_partner',compact('edit_about_me_and_partner_count','form_no','edit_about_me_and_partner'))->render();
    }elseif ($form_no == USER_PRIVACY_SETTINGS) {
      $content =  view('registration-forms.privacy_settings',compact('edit_privacy_setting_count','form_no','privacy_settings','edit_privacy_setting'))->render();
    }elseif ($form_no == USER_PARTNER_PREFERENCES) {
      $content =  view('registration-forms.partner_preferences',compact('min_age','max_age','min_height_inches','max_height_inches','edit_partner_preferences_count','edit_restricted_contacts','form_no','marital_status','children_likes','religions','ethncities','mother_tongues','live_in','education_level','working_as','monthly_income','asset_value','disabilitys','diets','select_all','edit_partner_preferences'))->render();
    }elseif ($form_no == USER_SEARCH_PARTNER) {
      $content =  view('registration-forms.search_partner',compact('form_no'))->render();
    }


// dd($content);

    return view('registration-forms.main',compact('content','form_no','user_galleries_photo'));

  }

  //Store form data functions
  //Or update form data
  private function storePhysicalStatus(Request $request)
  {



        $this->validate($request, $this->getphysicalStatusRules(), $this->getphysicalStatusMsg());

        if($request->exist > 0){ //check whether database fields includes data. If so proceed to update else proceed to store
          $physical_status= UserPhysicalStatus::where('users_id',Auth::user()->id)->first();
    
    
        }else{
          $physical_status= new UserPhysicalStatus();
          $physical_status->users_id = Auth::user()->id;
        }

       
        $physical_status->height_id = $request->height;
        $physical_status->weight = $request->weight;
        $physical_status->body_shape_id = $request->body_shape;
        $physical_status->skin_color_id = $request->skin_color;
        $physical_status->disability_id = $request->disability;
        $physical_status->blood_group_id = $request->blood_group;
        $physical_status->health_information_id = $request->health_information;
       
        $physical_status->save();

        if ($physical_status) {

          $user_form = User::findOrFail(Auth::user()->id);
          $user_form->form_no = $request->form_no;
          $user_form->save();
          $user_log = new UserLog();
          $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Physical Form');
    
        }

        if ($physical_status && $user_form) {

          DB::commit();

          return response()->json(['msg'=>'successfully!'], 200);
        }
  }

  private function storeUserResidences(Request $request)
  {


    $this->validate($request, $this->getResidencesRules(), $this->getResidencesMsg());

    if($request->exist > 0){ //check whether database fields includes data. If so proceed to update else proceed to store
      $residences= UserResidence::where('users_id',Auth::user()->id)->first();


    }else{
      $residences= new UserResidence();
      $residences->users_id = Auth::user()->id;
    }


    $residences->countries_id = $request->living_another_country;
    $residences->residence_status_id = $request->residences_status;
    $residences->provinces_id = $request->province;

    // if (is_int($request->district)){
      $residences->districts_id = $request->district;

    // }else{
      // $residences->districts_id = 0;
    // }

    if ($request->city){
      $residences->cities_id = $request->city;

    }else{
      $residences->cities_id = 0;
    }


    $residences->sl_address = $request->address_of_srilanka;
    $residences->ownership_id = $request->ownership_of_address;
    $residences->native_district_id = $request->native_district;

    $residences->save();

    if ($residences) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
      $user_log = new UserLog();
      $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Residence Form');

    }

    if ($residences && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }
  }

  private function storeUserBackground(Request $request)
  {
    $this->validate($request, $this->getBackgroundRules(), $this->getBackgroundMsg());


    if($request->exist > 0){
      $background_details= UserBackgroundDetail::where('users_id',Auth::user()->id)->first();


    }else{
      $background_details= new UserBackgroundDetail();
      $background_details->users_id = Auth::user()->id;
    }



    $background_details->mother_tongues_id = $request->mother_tongue;
    $background_details->ethnicities_id = $request->ethncity;
    $background_details->religions_id = $request->religion;
    $background_details->casts_id = $request->caste;
    $background_details->sub_caste_id = $request->sub_caste;
    $background_details->police_report_id = $request->policeReport;

    $background_details->save();

    if ($background_details) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
      $user_log = new UserLog();
      $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Background Form');


    }

    if ($background_details && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }
  }

  private function storeUserLifeStyle(Request $request)
  {
    $language = '';


    $this->validate($request, $this->getLifeStyleRules(), $this->getLifeStyleMsg());

    if($request->exist > 0){
      $lifestyle_details= UserLifeStyle::where('users_id',Auth::user()->id)->first();
    }else{
      $lifestyle_details= new UserLifeStyle();
      $lifestyle_details->users_id = Auth::user()->id;
    }
    if ($request->languages_speak) {

      $language = implode(',',$request->languages_speak);

    }


    $lifestyle_details->diet_id=$request->diet;
    $lifestyle_details->drink_id=$request->drinks;
    $lifestyle_details->smoke_id=$request->smokes;

    $lifestyle_details->languages_speak= $language;

    $lifestyle_details->dresses_and_makeups_id=$request->dressMakeup;
    $lifestyle_details->used_to_travel=$request->usedToTravel;
    $lifestyle_details->call_to_parents=$request->callToParents;
    $lifestyle_details->customs=$request->customs;
    $lifestyle_details->live_in=$request->liveIn;

    $lifestyle_details->save();

    if ($lifestyle_details) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
      $user_log = new UserLog();
      $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Lifestyle Form');


    }

    if ($lifestyle_details && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }

  }

  private function storeUserEducation(Request $request)
  {
    $this->validate($request, $this->getEducationDetailRules(), $this->getEducationDetailMsg());

    if($request->exist > 0){
      $education_details= UserEducationDetail::where('users_id',Auth::user()->id)->first();


    }else{
      $education_details= new UserEducationDetail();
      $education_details->users_id = Auth::user()->id;
    }



    $education_details->education_levels_id=$request->education_level;
    $education_details->education_fields_id=$request->education_field;
    $education_details->education_centers_id=$request->school_university;

    $education_details->save();

    if ($education_details) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
      $user_log = new UserLog();
      $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Education Form');


    }

    if ($education_details && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }
  }

  private function storeUserWhoIAm(Request $request)
  {

    
   

    $this->validate($request, $this->getWhoIAmRules(), $this->getWhoIAmMsg());

    // dd($request->all());
   
    if($request->exist > 0){
      $who_iam_details= UserWhoAmIDetail::where('users_id',Auth::user()->id)->first();
    }else{
      $who_iam_details= new UserWhoAmIDetail();
      $who_iam_details->users_id = Auth::user()->id;
    }

    if ($request->enrichment_hobbies) {

      $enrichment_hobbies_details = implode(',',$request->enrichment_hobbies);

    }else{
      $enrichment_hobbies_details = "";
    }

    if ($request->sport_physical_activities) {

      $sport_physical_activities_details = implode(',',$request->sport_physical_activities);

    }else{
      $sport_physical_activities_details = "";
    }


    if ($request->social_activities) {

      $social_activities_details = implode(',',$request->social_activities);

    }else{
      $social_activities_details = "";
    }

    if ($request->creative_hobbies) {

      $creative_hobbies_details = implode(',',$request->creative_hobbies);

    }else{
      $creative_hobbies_details = "";
    }

    if ($request->collecting_hobbies) {

      $collecting_hobbies_details = implode(',',$request->collecting_hobbies);

    }else{
      $collecting_hobbies_details = "";
    }

    if ($request->outdoor_hobbies) {

      $outdoor_hobbies_details = implode(',',$request->outdoor_hobbies);

    }else{
      $outdoor_hobbies_details = "";
    }

    if ($request->domestic_hobbies) {

      $domestic_hobbies_details = implode(',',$request->domestic_hobbies);

    }else{
      $domestic_hobbies_details = "";
    }






    

    $who_iam_details->openness_to_experience=str_replace("%","",$request->openness_to_experience);
    $who_iam_details->conscientionssness=str_replace("%","",$request->conscientionssness);
    $who_iam_details->extrovert_personality =str_replace("%","",$request->extrovert_personality);
    $who_iam_details->introvert_personality=str_replace("%","",$request->introvert_personality);
    $who_iam_details->agreeableness=str_replace("%","",$request->agreeableness);
    $who_iam_details->neuroticism=str_replace("%","",$request->neuroticism);
    $who_iam_details->family_bond=str_replace("%","",$request->family_bond);
    $who_iam_details->money=str_replace("%","",$request->money);
    $who_iam_details->religious=str_replace("%","",$request->religious);
    $who_iam_details->physically_active=str_replace("%","",$request->physically_active);
    $who_iam_details->politics=str_replace("%","",$request->politics);
    $who_iam_details->knowledge=str_replace("%","",$request->knowledge);
    $who_iam_details->love_affairs=str_replace("%","",$request->love_affairs);
    $who_iam_details->importance_of_virginity=str_replace("%","",$request->importance_of_virginity);

    $who_iam_details->enrichment_hobbies=$enrichment_hobbies_details;
    $who_iam_details->sport_physical_activities=$sport_physical_activities_details;
    $who_iam_details->social_activities=$social_activities_details;
    $who_iam_details->creative_hobbies=$creative_hobbies_details;
    $who_iam_details->collecting_hobbies=$collecting_hobbies_details;
    $who_iam_details->outdoor_hobbies=$outdoor_hobbies_details;
    $who_iam_details->domestic_hobbies	=$domestic_hobbies_details;

    $who_iam_details->users_id = Auth::user()->id;




    $who_iam_details->save();

    if ($who_iam_details) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
      $user_log = new UserLog();
      $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Who I Am Form');


    }

    if ($who_iam_details && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }
  }


  private function storeUserCareer(Request $request)
  {
 
    // dd($request->all());

    $this->validate($request, $this->getCareerDetailRules($request->working_with), $this->getCareerDetailMsg());


    if($request->exist > 0){
      $career_details= UserCareerDetail::where('users_id',Auth::user()->id)->first();


    }else{
      $career_details= new UserCareerDetail();
      $career_details->users_id = Auth::user()->id;
    }



    $career_details->occupation_areas_id  =$request->working_with;
    $career_details->occupations_id =$request->working_as;
    $career_details->occupations_sub_id =$request->sub_working_as;
    $career_details->working_locations_id =$request->working_location;
    $career_details->working_district_id  =$request->working_distric;
    $career_details->working_city_id  =$request->working_city;
    //$career_details->career_description=$request->describe_career;
    $career_details->career_description =$request->describe_career;
   
    $career_details->save();
    $user_log = new UserLog();
    $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Career Form');


    if ($career_details) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
     
      

    }

    // if ($user_form) {
    //   dd('ok');
    // } else {
    //   dd('not ok');
    // }
    

    

    if ($career_details && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }

  }


  private function storeUserAssets(Request $request)
  {
    $route_job = '';
    $asset_route = '';


    $this->validate($request, $this->getAssetsDetailRules(), $this->getAssetsDetailMsg());

    if($request->exist > 0){
      $assets_details= UserPresonalAssetDetail::where('users_id',Auth::user()->id)->first();


    }else{
      $assets_details= new UserPresonalAssetDetail();
      $assets_details->users_id = Auth::user()->id;
    }

    if ($request->asset_route) {

      $asset_route = implode(',',$request->asset_route);

    }

    if ($request->route_job) {

      $route_job = implode(',',$request->route_job);

    }







    $assets_details->monthly_income_id=$request->monthly_income;
    $assets_details->monthly_income_route_id=$route_job;
    $assets_details->value_id=$request->asset_value;

    $assets_details->asset_routes_id=$asset_route;

    $assets_details->ownership=$request->ownership_of_asset;

    $assets_details->save();

    if ($assets_details) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
      $user_log = new UserLog();
      $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Assets Form');


    }

    if ($assets_details && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }

  }

  private function storeUserFamily(Request $request)
  {
    $this->validate($request, $this->getFamilyDetailRules(), $this->getFamilyDetailMsg());



    if($request->exist > 0){
      $family_details= UserFamilyDetail::where('users_id',Auth::user()->id)->first();


    }else{
      $family_details= new UserFamilyDetail();
      $family_details->users_id = Auth::user()->id;
    }

    // dd($request->family_type);




     $family_details->location_id=$request->family_district;
     $family_details->type=$request->family_type;
     $family_details->values=$request->family_values;
     $family_details->family_class_id=$request->family_class;
     $family_details->culture=$request->family_culture;
     $family_details->father_status_id=$request->father_status;
     $family_details->mother_status_id=$request->mother_status;
     $family_details->description=$request->add_family_details;

     $family_details->save();

     if ($family_details) {

       $user_form = User::findOrFail(Auth::user()->id);
       $user_form->form_no = $request->form_no;
       $user_form->save();
       $user_log = new UserLog();
       $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Family Form');
 

     }

     if ($family_details && $user_form) {

       DB::commit();

       return response()->json(['msg'=>'successfully!'], 200);
     }
  }

  private function storeUserAfterMarriage(Request $request)
  {

    $this->validate($request, $this->getAfterMarriageDetailRules(), $this->getAfterMarriageDetailMsg());

    if($request->exist > 0){
      $after_marriage_details= UserAfterMarriageDetail::where('users_id',Auth::user()->id)->first();


    }else{
      $after_marriage_details= new UserAfterMarriageDetail();
      $after_marriage_details->users_id = Auth::user()->id;
    }


    $after_marriage_details->prefer_to_live_id=$request->prefer_to_live;
    $after_marriage_details->help_family=$request->help_family;
    $after_marriage_details->job=$request->after_marriage_job;
    $after_marriage_details->education=$request->after_marriage_education;
    $after_marriage_details->children_likes=$request->children_likes;
    $after_marriage_details->other_needs=$request->after_marriage_other_needs;

    $after_marriage_details->save();

    if ($after_marriage_details) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
      $user_log = new UserLog();
      $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated After Marriage Form');


    }

    if ($after_marriage_details && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }

  }

  private function storeUserHoroscope(Request $request)
  {

    // dd($request->all());

    $this->validate($request, $this->getHoroshcopeDetailRules(), $this->getHoroshcopeDetailMsg());

    if($request->exist > 0){
      $horoshcope_details= UserHoroscopeDetail::where('users_id',Auth::user()->id)->first();


    }else{
      $horoshcope_details= new UserHoroscopeDetail();
      $horoshcope_details->users_id = Auth::user()->id;
    }



    $horoshcope_details->matching_horoscope_id=$request->matching_horoscope;
    $horoshcope_details->zodiac_sign_id=$request->zodiac_sign;
    $horoshcope_details->ganaya_id=$request->ganaya;
    $horoshcope_details->nekatha_id=$request->nekatha;
    $horoshcope_details->ravi_grahaya=$request->grahaya_ravi;
    $horoshcope_details->moon_grahaya=$request->grahaya_moon;
    $horoshcope_details->mars_grahaya=$request->grahaya_mars;
    $horoshcope_details->mercury_grahaya=$request->grahaya_mercury;
    $horoshcope_details->jupiter_grahaya=$request->grahaya_jupiter;
    $horoshcope_details->venus_grahaya=$request->grahaya_venus;
    $horoshcope_details->saturn_grahaya=$request->grahaya_saturn;
    $horoshcope_details->rahu_grahaya=$request->grahaya_rahu;
    $horoshcope_details->kethu_grahaya=$request->grahaya_kethu;
    $horoshcope_details->papa_kendara_id=$request->papa_kendara;

    $horoshcope_details->save();

    if ($horoshcope_details) {

      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $request->form_no;
      $user_form->save();
      $user_log = new UserLog();
      $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Horoscope Form');

    }

    if ($horoshcope_details && $user_form) {

      DB::commit();

      return response()->json(['msg'=>'successfully!'], 200);
    }
  }

  private function storeUserPhotoVideo(Request $request)
  {
    try {
    
    $user_form = User::findOrFail(Auth::user()->id);
    $user_form->form_no = $request->form_no;
    $user_form->save();
    $user_log = new UserLog();
    $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated User Photo Video Form');


    if ($user_form) {

            DB::commit();

            return response()->json(['msg'=>'successfully!'], 200);
          }

            
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  private function storeUserAboutMeAndPartner(Request $request)
  {
    $this->validate($request, $this->getAboutMeAndPartnerRules(), $this->getAboutMeAndPartnerMsg());

    if($request->exist > 0){
      $aboutyourselfandpartner_details= UserAboutYourselfAndPartner::where('users_id',Auth::user()->id)->first();


    }else{
      $aboutyourselfandpartner_details = new UserAboutYourselfAndPartner();
      $aboutyourselfandpartner_details->users_id = Auth::user()->id;
    }



    $aboutyourselfandpartner_details->description=$request->add_about_you_and_partner;


    $aboutyourselfandpartner_details->save();

    if ($aboutyourselfandpartner_details) {

    $user_form = User::findOrFail(Auth::user()->id);
    $user_form->form_no = $request->form_no;
    $user_form->save();
    $user_log = new UserLog();
    $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated About Me and Partner Form');

    }

    if ($aboutyourselfandpartner_details && $user_form) {

            DB::commit();

            return response()->json(['msg'=>'successfully!'], 200);
          }
  }

 

  private function storePrivacySetting(Request $request)
  {
    $this->validate($request, $this->getPrivacySettingRules(), $this->getPrivacySettingMsg());

    if($request->exist > 0){
      $user_privacy_settings= UserPrivacySetting::where('users_id',Auth::user()->id)->first();


    }else{
      $user_privacy_settings = new UserPrivacySetting();
      $user_privacy_settings->users_id = Auth::user()->id;
    }



    $user_privacy_settings->my_photos	=$request->myPhoto;
    $user_privacy_settings->my_videos=$request->myVideo;
    $user_privacy_settings->assets_details=$request->assetDetails;
    $user_privacy_settings->home_assets_family_photos=$request->homeAssetsFamilyPhoto;
    $user_privacy_settings->family_details=$request->familyDetails;
    $user_privacy_settings->horoshcope	=$request->horoshcope;



    $user_privacy_settings->save();


    if ($user_privacy_settings) {
    $user_form = User::findOrFail(Auth::user()->id);
    $user_form->form_no = $request->form_no;
    $user_form->save();
    $user_log = new UserLog();
    $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Privacy Settings Form');

    }

    if ($user_privacy_settings && $user_form) {

            DB::commit();

            return response()->json(['msg'=>'successfully!'], 200);
          }
  }

  private function storeUserPartnerPreferences(Request $request)
  {
    // dd($request->all());
    

        $this->validate($request, $this->getPartnerPreferencesRules(), $this->getPartnerPreferencesMsg());

        //  dd($request->all());
        if($request->exist > 0){
          $user_partner_preference_detail= UserPartnerPreferenceDetail::where('users_id',Auth::user()->id)->first();
          
          $user_restricted_contacts_detail= UserRestrictedContact::where('users_id',Auth::user()->id)->first();

        }else{
          $user_partner_preference_detail=new UserPartnerPreferenceDetail();
          $user_partner_preference_detail->users_id = Auth::user()->id;
          
          $user_restricted_contacts_detail=new UserRestrictedContact();
          $user_restricted_contacts_detail->users_id = Auth::user()->id;
        }

       
       

         $user_partner_preference_detail->min_age	=$request->minAge;
         $user_partner_preference_detail->max_age	=$request->maxAge;
         $user_partner_preference_detail->min_height	=$request->minHeight;
         $user_partner_preference_detail->max_height	=$request->maxHeight;
         $user_partner_preference_detail->marital_status	= implode(',',$request->marital_status);
         $user_partner_preference_detail->children=implode(',',$request->children_like);
         $user_partner_preference_detail->religion=implode(',',$request->religion);
         $user_partner_preference_detail->ethnicity=implode(',',$request->ethnicity);
         $user_partner_preference_detail->mother_tongue=implode(',',$request->mother_tongue);
         $user_partner_preference_detail->live_in_srilanka	=implode(',',$request->live_in);
         $user_partner_preference_detail->education_level	=implode(',',$request->education_level);
         $user_partner_preference_detail->career_level=implode(',',$request->career_level);
         $user_partner_preference_detail->monthly_income=implode(',',$request->monthly_income);
         $user_partner_preference_detail->asset_level=implode(',',$request->asset_level);
         $user_partner_preference_detail->disability=implode(',',$request->disability);
         $user_partner_preference_detail->diet	=implode(',',$request->diet);

         $user_restricted_contacts_detail->marital_status	=$request->checkMaritalLabel;
         $user_restricted_contacts_detail->age	=$request->checkAgeLabel;
         $user_restricted_contacts_detail->religion	=$request->checkReligionLabel;
         $user_restricted_contacts_detail->ethnicity	=$request->checkEthniLabel;
         $user_restricted_contacts_detail->mother_tongue	=$request->checklangLabel;
         $user_restricted_contacts_detail->asset	=$request->checkAssetLabel;


         $user_partner_preference_detail->save();
         $user_restricted_contacts_detail->save();


         if ($user_partner_preference_detail) {
           $user_form = User::findOrFail(Auth::user()->id);
           $user_form->form_no = $request->form_no;
           $user_form->registered = 1;
           $user_form->status = 2;
           $user_form->save();

            $user_level_details = new UserLevelDetail();
            $user_level_details->user_id = Auth::user()->id;
            $user_level_details->user_level = 2;
            $user_level_details->save();
           
           $notification = new Notification();
           $notification->addNotification(Auth::user()->id,'Registered not approval user',2);

           $user_log = new UserLog();
           $user_log->createLog(Auth::user()->id,Auth::user()->status,'Completed/Updated Partner Preference Form');
     
         }

         if ($user_partner_preference_detail && $user_form) {

                 DB::commit();

                 return response()->json(['msg'=>'successfully!'], 200);
                 return redirect('home');
               }
  }



  //Save user form details according to the user form no
  public function userFormDetailsStore(Request $request){



    // check all reqest data ia match in DB data !important

    DB::beginTransaction();

    try {




      if ($request->form_no == USER_PHYSICAL_STATUS) {

        $this->storePhysicalStatus($request);

      }elseif ($request->form_no == USER_RESIDENCES) {

        $this->storeUserResidences($request);

      }elseif ($request->form_no == USER_BACKGROUND) {

        $this->storeUserBackground($request);

      }elseif ($request->form_no == USER_LIFE_STYLE) {

        $this->storeUserLifeStyle($request);

      }elseif ($request->form_no == USER_EDUCATION) {

        $this->storeUserEducation($request);
        //dd($request->form_no);

      }elseif ($request->form_no == USER_WHO_I_AM) {

        $this->storeUserWhoIAm($request);

      }elseif ($request->form_no == USER_CAREER) {

        $this->storeUserCareer($request);

      }elseif ($request->form_no == USER_ASSETS) {
        $this->storeUserAssets($request);

      }elseif ($request->form_no == USER_FAMILY) {

        $this->storeUserFamily($request);

      }elseif ($request->form_no == USER_AFTER_MARRIAGE) {

        $this->storeUserAfterMarriage($request);

      }elseif ($request->form_no == USER_HOROSHCOPE) {

        $this->storeUserHoroscope($request);

      }elseif ($request->form_no == USER_PHOTO_VIDEO) {

        $this->storeUserPhotoVideo($request);

      }elseif ($request->form_no == USER_ABOUT_ME_AND_PARTNER) {

        $this->storeUserAboutMeAndPartner($request);

      }elseif ($request->form_no == USER_PRIVACY_SETTINGS) {

        $this->storePrivacySetting($request);

      }else if ($request->form_no == USER_PARTNER_PREFERENCES) {

        $this->storeUserPartnerPreferences($request);



        }



    } catch (Exception $e) {
      DB::rollback();
      return response()->json(['msg'=>'Something Went wrong!'], 500);
    }
  }

          
public function userPhotoVideoStore(Request $request){
 
    $profile_image_upload_details = User::find(Auth::user()->id);

    if ($profile_image_upload_details) {

      if ($request->hasFile('user_profile_image')) {

        $image = $request->file('user_profile_image');

        $name  = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = 'assets/upload/user_profiles';

        $db_path= "assets/upload/user_profiles/".$name;

        $image->move($destinationPath, $name);
  
        $profile_image_upload_details->profile_img = $db_path;
        $profile_image_upload_details->save();

        $user_profile = User::find(Auth::user()->id);

        return $user_profile;
                
      }
    }

    



  
 

  // if ($request->hasFile('user_profile_image')) {
    
  // }

 
  
   
  //   if($request->user_profile_image != null){

    

  //   return redirect()->route('edit-settings',USER_PHOTO_VIDEO);
  //   // return response()->json(['msg'=>'User profile uploaded Successfully!'], 200);

  //   // if ($profile_image_upload_details) {

  //   //   DB::commit();

  //   //   return response()->json(['msg'=>'successfully!'], 200);
  //   //   // return redirect('home');
   
  //   //   // return back();
  //   // }
  // }else{
  //   return redirect()->route('edit-settings',USER_PHOTO_VIDEO);
  // }
  
  } 
  
  public function userPhotoVideoGoBack(Request $request){
    return redirect()->route('edit-settings',USER_PHOTO_VIDEO);
  }


  public function userBulkPhotoStore(Request $request){

    // dd("Under Maintanence");
    // dd($request->all());
    
    $user_id = User::select('id')->where('id',Auth::user()->id)->first();

    // dd($user_id->id);
   
    if($request->hasFile('files')){

      // $img_files = $request->file('files');

      $img_files = count($request->file('files'));

      if($img_files > 5){
        return Response::json(['error' => 'You have exceeded the photo upload limit'], 404); // Status code here
      }else{

      

      // dd($img_files);


      // dd($img_files);

      foreach ($img_files as $key => $img_file) {

          $name = $user_id->id.'_'.$img_file->getClientOriginalName();

          $destination_path = "assets/upload/user_image_uploads/";

          $db_path= "assets/upload/user_image_uploads/".$name;

          $img_file->move($destination_path, $name);

          $user_photos_upload = new UserPhoto();
          $user_photos_upload->image = $db_path;
          $user_photos_upload->type = 1;
          $user_photos_upload->users_id = $user_id->id;
          $user_photos_upload->save();

         
      }
      return "Images Uploaded Successfully!";

    }
  }else{
    return Response::json(['error' => 'No Images Selected'], 404); // Status code here

    // return redirect()->route('edit-settings',USER_PHOTO_VIDEO);
  }
  // return redirect()->route('edit-settings',USER_PHOTO_VIDEO);
  }


  //Upload User Family Photo. When fill registration form
  public function userFamilyBulkPhotoStore(Request $request){


    $user = User::where('id',Auth::user()->id)->first();

    if ($user) {

      $user_level_setting = UserLevelSetting::where('user_level',3)->first();

      $family_photo_count =  FamilyPhoto::where('users_id',Auth::user()->id)->count();

      $all_family_photo_count = count($request->file('files')) + $family_photo_count;

      if ($all_family_photo_count > $user_level_setting->photo) {
                
        return Response::json(['error' => 'You can upload '.$user_level_setting->photo.' only.'], 404);
      }

      if ($request->hasFile('files')) {

        $uploaded_family_photo = $request->file('files');
  
        foreach ($uploaded_family_photo as $key => $fa_photo) {

          $name = Auth::user()->id.'_'.$fa_photo->getClientOriginalName();

          $destination_path = "assets/upload/user_family_image_uploads/";

          $db_path= "assets/upload/user_family_image_uploads/".$name;

          $fa_photo->move($destination_path, $name);

          $user_family_photos_upload = new FamilyPhoto();
          $user_family_photos_upload->image = $db_path;
          $user_family_photos_upload->users_id = Auth::user()->id;
          $user_family_photos_upload->save();

        }

        $family_photos =  FamilyPhoto::where('users_id',Auth::user()->id)->get();

        return $family_photos;

      }else{
        return Response::json(['error' => 'No Images Selected'], 404); // Status code here
      }
    }

  }

  //Upload User Gallery Photo. When fill registration form
  public function userGalleryBulkPhotoStore(Request $request){


    $user = User::where('id',Auth::user()->id)->first();

    if ($user) {

      $user_level_setting = UserLevelSetting::where('user_level',3)->first();

      $gallery_photo =  UserPhoto::where('users_id',Auth::user()->id)->count();

      $all_gallery_photo = count($request->file('user_gallery')) + $gallery_photo;

      if ($all_gallery_photo > $user_level_setting->photo) {
                
        return Response::json(['error' => 'You can upload '.$user_level_setting->photo.' only.'], 404);
      }

      if ($request->hasFile('user_gallery')) {

        $user_gallery = $request->file('user_gallery');
  
        foreach ($user_gallery as $key => $g_photo) {

          $name = Auth::user()->id.'_'.$g_photo->getClientOriginalName();

          $destination_path = "assets/upload/user_image_uploads/";

          $db_path= "assets/upload/user_image_uploads/".$name;

          $g_photo->move($destination_path, $name);

          $user_gallery = new UserPhoto();
          $user_gallery->image = $db_path;
          $user_gallery->type = 1;
          $user_gallery->users_id = Auth::user()->id;
          $user_gallery->save();

        }

        $galleries =  UserPhoto::where('users_id',Auth::user()->id)->get();

        return $galleries;

      }else{
        return Response::json(['error' => 'No Images Selected'], 404); // Status code here
      }
    }

  }

  //Delete Selected Family Photo
  public function removeFamilyPhoto(Request $request){

    $family_photo = FamilyPhoto::find($request->photo_id);

    if ($family_photo) {
      File::delete($family_photo->image);

      $delete_photo = FamilyPhoto::find($request->photo_id)->delete();

      if ($delete_photo) {
        return 'success';
      }
    }

    
  }
  //Delete Selected Family Photo
  public function removeGalleryPhoto(Request $request){

    $gallery_photo = UserPhoto::find($request->photo_id);

    if ($gallery_photo) {
      
      File::delete($gallery_photo->image);

      $delete_photo = UserPhoto::find($request->photo_id)->delete();

      if ($delete_photo) {
        return 'success';
      }
    }

  }
  
  public function getPhotosVideosRules()
  {
    $this->rules = [
      'user_profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    return $this->rules;
  }
  public function getPhotosVideosMsg()
  {
    $this->message = [
      
    ];
    return $this->message;
  }


  public function getphysicalStatusRules()
  {
    $this->rules = [
      'height' => 'required',
      'weight' => 'required',
      'body_shape' => 'required',
      'skin_color' => 'required',
      'disability' => 'required',
      'blood_group' => 'required',
      'health_information' => 'required'
    ];

    return $this->rules;
  }
  public function getphysicalStatusMsg()
  {
    $this->message = [
      'height.required' => 'Height is required',
    ];
    return $this->message;
  }

 
  public function getResidencesRules()
  {
    $this->rules = [
      // 'living_another_country' => 'required',
      // 'residences_status' => 'required',
      'province' => 'required',
      'district' => 'required',
      'city' => 'required',
      'address_of_srilanka' => 'required',
      'ownership_of_address' => 'required',
      'native_district' => 'required'
    ];

    return $this->rules;
  }

  public function getResidencesMsg()
  {
    $this->message = [
      // 'height.required' => 'Height is required',
    ];
    return $this->message;
  }

  public function getBackgroundRules(){
    $this->rules = [
      'mother_tongue' => 'required',
      'ethncity' => 'required',
      'religion' => 'required',
      'caste' => 'required',
      'policeReport' => 'required',

    ];

    return $this->rules;
  }

  public function getBackgroundMsg(){
    $this->message = [
    ];
    return $this->message;
  }


  public function getLifeStyleRules(){
    $this->rules = [
      'diet' => 'required',
      'drinks' => 'required',
      'smokes' => 'required',
      'languages_speak' => 'required',
      'dressMakeup' => 'required',
      'usedToTravel' => 'required',
      'callToParents' => 'required',
      'customs' => 'required',
      'liveIn' => 'required',


    ];

    return $this->rules;
  }

  public function getLifeStyleMsg(){
    $this->message = [
    ];
    return $this->message;
  }


  public function getEducationDetailRules(){
    $this->rules = [
      'education_level' => 'required',
      'education_field' => 'required',
      'school_university' => 'required',



    ];

    return $this->rules;
  }

  public function getEducationDetailMsg(){
    $this->message = [
    ];
    return $this->message;
  }


  public function getCareerDetailRules($working_with_id){

    if ($working_with_id == USER_JOB_ASK) {

      $this->rules = [
        'working_with' => 'required',
      ];

    } else {

      $this->rules = [
        'working_with' => 'required',
        'working_as' => 'required',
        'working_location' => 'required',
        'working_distric' => 'required',
        'working_city' => 'required',
        'describe_career' => 'required',

      ];
    }



    return $this->rules;
  }

  public function getCareerDetailMsg(){
    $this->message = [
    ];
    return $this->message;
  }

  public function getAssetsDetailRules(){
    $this->rules = [
      'monthly_income' => 'required',
      'route_job' => 'required',
      'asset_value' => 'required',
      'asset_route' => 'required',
      'ownership_of_asset' => 'required',



    ];

    return $this->rules;
  }

  public function getAssetsDetailMsg(){
    $this->message = [
    ];
    return $this->message;
  }

  public function getFamilyDetailRules(){
    $this->rules = [
      'family_district' => 'required',
      'family_type' => 'required',
      'family_values' => 'required',
      'family_class' => 'required',
      'family_culture' => 'required',
      'father_status' => 'required',
      'mother_status' => 'required',



    ];

    return $this->rules;
  }

  public function getFamilyDetailMsg(){
    $this->message = [
    ];
    return $this->message;
  }

  public function getAfterMarriageDetailRules(){
    $this->rules = [
      'prefer_to_live' => 'required',
      'help_family' => 'required',
      'after_marriage_job' => 'required',
      'after_marriage_education' => 'required',
      'children_likes' => 'required',
      'after_marriage_other_needs' => 'required',




    ];

    return $this->rules;
  }

  public function getAfterMarriageDetailMsg(){
    $this->message = [
    ];
    return $this->message;
  }


  public function getHoroshcopeDetailRules(){
    $this->rules = [
      'matching_horoscope' => 'required',
      'zodiac_sign' => 'required',
      'ganaya' => 'required',
      'nekatha' => 'required',
      'grahaya_ravi' => 'required',
      'grahaya_moon' => 'required',
      'grahaya_mars' => 'required',
      'grahaya_mercury' => 'required',
      'grahaya_jupiter' => 'required',
      'grahaya_venus' => 'required',
      'grahaya_saturn' => 'required',
      'grahaya_rahu' => 'required',
      'papa_kendara' => 'required',





    ];

    return $this->rules;
  }

  public function getHoroshcopeDetailMsg(){
    $this->message = [
    ];
    return $this->message;
  }

  public function getAboutMeAndPartnerRules(){
    $this->rules = [
      'add_about_you_and_partner' => 'required',






    ];

    return $this->rules;
  }

  public function getAboutMeAndPartnerMsg(){
    $this->message = [
    ];
    return $this->message;
  }

  public function getPrivacySettingRules(){
    $this->rules = [
      'myPhoto' => 'required',
      'myVideo' => 'required',
      'assetDetails' => 'required',
      'homeAssetsFamilyPhoto' => 'required',
      'familyDetails' => 'required',
      'horoshcope' => 'required',

    ];

    return $this->rules;
  }

  public function getPrivacySettingMsg(){
    $this->message = [
    ];
    return $this->message;
  }

  public function getWhoIAmRules(){
    $this->rules = [
      'openness_to_experience' => 'required',
      'conscientionssness' => 'required',
      'extrovert_personality' => 'required',
      'introvert_personality' => 'required',
      'agreeableness' => 'required',
      'neuroticism' => 'required',
      'family_bond' => 'required',
      'money' => 'required',
      'religious' => 'required',
      'physically_active' => 'required',
      'knowledge' => 'required',
      'love_affairs' => 'required',
      'importance_of_virginity' => 'required',
      'enrichment_hobbies' => 'required',
      'sport_physical_activities' => 'required',
      'social_activities' => 'required',
      'creative_hobbies' => 'required',
      'collecting_hobbies' => 'required',
      'outdoor_hobbies' => 'required',
      'domestic_hobbies' => 'required',
     
    ];

    return $this->rules;
  }

  public function getWhoIAmMsg(){
    $this->message = [
    ];
    return $this->message;
  }



  public function getPartnerPreferencesRules(){
    $this->rules = [
      'marital_status' => 'required',
      'children_like' => 'required',
      'religion' => 'required',
      'ethnicity' => 'required',
      'mother_tongue' => 'required',
      'live_in' => 'required',
      'education_level' => 'required',
      'career_level' => 'required',
      'monthly_income' => 'required',
      'asset_level' => 'required',
      'disability' => 'required',
      'diet' => 'required',


    ];

    return $this->rules;
  }

  public function getPartnerPreferencesMsg(){
    $this->message = [
    ];
    return $this->message;
  }


  //Get District according to the provence
  public function getDistrict(Request $request){
    if($request->provence != null){
      if($request->provence == USER_DONT_KNOW){
        $districts = DetailKeyValues::getValuesByKey(USER_DISTRICT);
      }else {
      
          $districts = DetailKeyValues::where('parent_key',$request->provence)->get();
        
      }

    return $districts;

  }
}
  //Get City according to the district
  public function getCity(Request $request){
    //dd($request->district);
    if($request->district != null){
      $cities = DetailKeyValues::where('parent_key',$request->district)->get();

      return $cities;
    }
  }

  public function getSubCaste(Request $request){

    if($request->caste!=null){
      if ($request->caste != USER_DISREGARD_THE_CASTE && $request->caste != USER_ASK_CASTE) {

        $sub_castes = DetailKeyValues::where('parent_key',$request->caste)->get();

        return $sub_castes;

      }
    }
  }

  public function getSubWorkingAs(Request $request){
    // dd($request->all());

    if($request->working_as != null){
      // if ($request->working_as != USER_DISREGARD_THE_CASTE && $request->working_as != USER_ASK_CASTE) {

        $sub_working_as_det = DetailKeyValues::where('parent_key',$request->working_as)->get();
        // dd($sub_working_as_det);
        return $sub_working_as_det;

      // }
    }
  }

  public function verify(){  //Redirect to verify email page if email not verified

    return view('verify-email');

  }

  public function skipPage($form_no){


    try {
      $user_form = User::findOrFail(Auth::user()->id);
      $user_form->form_no = $form_no;

     if($form_no==15){
      $user_form->registered = 1;
      $user_form->save();
      return redirect('/home');

     }else{
      $user_form->save();
      return redirect('/home');
    }
    } catch (Exception $e) {

    }

  }

  


  // public function goBack($form){
  //   dd($form);
  //   return redirect(\URL::previous());

  // }


}
