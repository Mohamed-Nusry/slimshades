<style>
  
    #accept-button{
      display: inline-block;
    }

    .img_res{
        margin:auto;
        box-shadow: 10px 10px 8px #888888;
    }

    
    .btn-circle {
      width: 30px;
      height: 30px;
      text-align: center;
      padding: 6px 0;
      font-size: 12px;
      line-height: 1.428571429;
      border-radius: 15px;
    }
    .btn-circle.btn-lg {
      width: 50px;
      height: 50px;
      padding: 10px 16px;
      font-size: 18px;
      line-height: 1.33;
      border-radius: 25px;
    }
    .btn-circle.btn-xl {
      width: 70px;
      height: 70px;
      padding: 10px 16px;
      font-size: 24px;
      line-height: 1.33;
      border-radius: 35px;
    }

    /* .show-img{
      width: 112%;
      height: 108%;
      margin-left: -15px;
      margin-top: -15px;
      border-radius: 12px;
    } */

    .profile_image{
    /* width:87%; 
    margin: auto !important;
    min-height: 300px !important;
    max-height: 300px !important; */
    width: 100%;
    height: 100%;
    border-radius: 15px;
    min-height: 300px !important;
  }
  

    #active_done{
    background-color: #000;
    height: 2px;
    cursor: pointer;
  }
  
  #active_request{
    background-color: red;
    height: 2px;
    cursor: pointer;
  }

  .column{
    padding-right: 22px;
    padding-left: 22px;
    
    min-width: 488px !important;
  }
  
  .tabs{
    cursor: pointer;
  }


  .single_information{
    /* height: 11% !important; */
    /* width: 62% !important; */
    width: 50% !important;
    
  }

  
  .req_tabs{
    background-color: #d8a4c8 !important;
    border-radius: 7px !important;
  }

  .req_tabs_link{
    font-size: 20px !important;
    font-weight: bold !important;
  }

  .single_information > h5{
    font-size: 14px;
  }
  
  .contents{
    padding-bottom: 12px;
    background-color: #fff;
  }
  .container-fluid{
    width: 77% !important;
  }

  @media (min-width: 50%) {
    .container-fluid{
        max-width: 77%;
        
    }
}

.single_options > h5 {
    font-size: 14px;
  }

  .nav_select{
    background-color: #fff;
    width: 100% !important;
    max-width: 500%;
    margin-left: -24px;
    margin-top: -55px;
    
    box-shadow: 5px 4px 10px;
    z-index: -1;
  }

  .nav_font{
    color: #545151;
    /* padding: 8px; */
    /* padding-left: 23px !important; */
    /* font-weight:  */
  }

  .active_tab{
    border-bottom: 4px solid #ff1a1a;
  }

  .main_content_div{
    margin-top: 22px !important;
  }

  a:hover{
    
    text-decoration: none;
    opacity: 1;
  }

  .sub_nav_select{
    margin-top: 11px !important;
    font-weight:400;
    color: red !important;
  }

  .nav_font:hover{
    color:red;
  }

  .nav-item-tab{
    padding-right: 20.77% !important
  }

  .tab-font{
    margin-left:225px;
  }


  #reason_date{
    text-align: center;
    margin-top: 2px;
    margin-bottom: 0.2rem;
  }

  .single-details{
    min-height: 100px;
    max-height: 306px;
      /* min-height: 306px; */
    }

  .descriptive_information{
    /* width: 4%; */
    /* margin-top: -73px; */
    /* margin-left: 57%; */
    /* cursor: pointer; */
    width: 2%;
    height: 32px;
    margin-top: 8px;
    margin-left: -3%;
    cursor: pointer;
}

  @media only screen and (max-width: 600px) {
    .descriptive_information{
      width: 10%;
      /* margin-top: -73px; */
      /* margin-left: 83%; */
    }

    
   
  
  }

  
  .img_premium_badge{
    position: absolute;
    width: 22%;
    margin-left: -304px;
  }


  .premium_border{
    border-color: #bfac48 !important;
    /* border-width: 5px !important; */
  }

  .trust_verified_border{
    border-color: #61db2a !important;
  }

    
  </style>


  {{-- @php
      dd($blocked_by_others_det);
  @endphp --}}

  @include('account.home.descriptive_information')
  
  <div class="col-md-12 px-0 py-4 ml-4">
    
      <div class="container nav_select">
          <div class="row tab_align">
              <div class="col-sm sub_nav_select">
                <p></p>
              </div>
              <div class="col-sm sub_nav_select">
                <p></p>
              </div>
              <a href="{{route('account',['p'=>'recieved-interests'])}}"><div class="col-sm  sub_nav_select">
               <p class="nav_font">Received Interests</p>
              </div></a>
              <a href="{{route('account',['p'=>'sent-interests'])}}"><div class="col-sm sub_nav_select">
                  <p class="nav_font ">Sent Interests</p>
              </div></a>
             
              <a href="{{route('account',['p'=>'recieved-requests'])}}"><div class="col-sm sub_nav_select">
                  {{-- <img src="https://img.icons8.com/color/48/000000/collapse-arrow.png"> --}}
                 <p class="nav_font">Received Requests</p>
              </div></a>
              <a href="{{route('account',['p'=>'sent-requests'])}}"><div class="col-sm active_tab sub_nav_select">
                 <p class="nav_font">Sent Requests</p>
              </div></a>
              <div class="col-sm sub_nav_select">
                  <p></p>
                </div>
              <div class="col-sm sub_nav_select">
                  <p></p>
                </div>
              <div class="col-sm sub_nav_select">
                  <p></p>
                </div>
          </div>
      
        </div>
      
    
    <div class="container-fluid main_content_div">
    <div class="contents mt-n1">

            <nav>
              <div class="nav nav-tabs req_tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-item-tab nav-link active requests_tab req_tabs_link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span class="tab-font">Sent Requests</span></a><img data-toggle="modal" data-target="#sentRequestsDescriptiveModal" class="descriptive_information" src="{{asset("assets/upload/other/hint.png")}}" alt="Avatar">
                <a class="nav-item nav-item-tab nav-link done_tab req_tabs_link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="tab-font">Sent Responded Requests</span></a><img data-toggle="modal" data-target="#sentRespondedRequestsDescriptiveModal" class="descriptive_information" src="{{asset("assets/upload/other/hint.png")}}" alt="Avatar">
              </div>
          </nav>

       
          <br>
          <h3 align="center">Sent Requests</h3>
          <hr> 
       
        <br>
      <div class="row sent_requests">
  
  
        @if (count($user_filterings) > 0)

        @if(count($request_fetch_details) > 0)

        @foreach ($request_fetch_details as $request_fetch_detail)
  
       
     
        
        @foreach ($user_filterings as $key=>$user)
        
        
        @if($request_fetch_detail->requested_users_id == $user->id && $request_fetch_detail->users_id == Auth::user()->id)
       
        @php
        $request_data=explode(",",$request_fetch_detail->reasons_id);
        
       
        @endphp
          @foreach ($request_fetch_detail->requestDetails as $reason)
   
          @if($reason->status != 1 &&  $reason->status != 2 &&  $reason->status != 3)
        <div class="col-sm-4 column">
          
          
          
          <div class="col-md-12 px-0 d-flex">

              @if(($user->status) == 6)
                      
              <div class="single-details border border-dark rounded-left w-100 premium_border">
    
              @elseif(($user->status) == 5)
              <div class="single-details border border-dark rounded-left w-100 trust_verified_border">
    
              @else
                <div class="single-details border border-dark rounded-left w-100  ">
              @endif
            
            
           
              {{-- <a href="{{route('account',['p'=>'view-match','id'=>$user->id,'status'=>1])}}">
                <img class="show-img profile_image" src="{{asset("$user->profile_img")}}" alt="Avatar" ></a> --}}



                @if(in_array($user->id,$blocked_by_others_det) || in_array($user->id,$profile_hidden_status) || $user->suspend == 2 || $user->suspend == 3)

                @else
                  <a href="{{route('account',['p'=>'view-match','id'=>$user->id,'status'=>1])}}">
                @endif
                  @if(isset($user->profile_img))
                    <img class="show-img profile_image" src="{{asset("$user->profile_img")}}" alt="Avatar" ></a>
                    @else
                      @if($user->basicInformation->gender == 398)
                        <img class="show-img profile_image" src="{{asset('assets/img/img_avatar.png')}}" alt="Avatar" ></a>
    
                      @else
                        <img class="show-img profile_image" src="{{asset('assets/img/women_default.png')}}" alt="Avatar" ></a>
    
                      @endif
                    @endif

                    @if(($user->status) == 6)
            
                    <img class="img_premium_badge" src="{{asset("assets/img/profile/premium.png")}}" alt="badge">
    
                    @endif
    
    
    
                   

              </div>
              
              @php

              

              if(isset($user->userBackgroundDetail->ethnicities_id)){
                $ethnicities_status = $user->getValues($user->userBackgroundDetail->ethnicities_id);
              }else{
                $ethnicities_status = "";
              }

              if(isset($user->userBackgroundDetail->religions_id)){
                $religion_status = $user->getValues($user->userBackgroundDetail->religions_id);
              }else{
                $religion_status = "";
              }
              

              if(isset($user->basicInformation->marital_status)){
                $marital_status = $user->getValues($user->basicInformation->marital_status);
              }else{
                $marital_status = "";
              }

              if(isset($user->userBackgroundDetail->casts_id)){
                $caste = $user->getValues($user->userBackgroundDetail->casts_id);
              }else{
                $caste = "";
              }
              
              if(isset($user->userResidence->cities_id)){
                $city = $user->getValues($user->userResidence->cities_id);
              }else{
                $city = "";
              }
              
              if(isset($user->userEducationDetail->education_levels_id)){
                $education_level = $user->getValues($user->userEducationDetail->education_levels_id);
              }else{
                $education_level = "";
              }

              if(isset($user->userCareerDetail->occupations_id)){
                $user_career_level = $user->getValues($user->userCareerDetail->occupations_id);
              }else{
                $user_career_level = "";
              }

              if(isset($user->userPresonalAssetDetail->value_id)){
                $user_assets_value = $user->getValues($user->userPresonalAssetDetail->value_id);
              }else{
                $user_assets_value = "";
              }

              if(isset($user->userPhysicalDetail->height_id)){
                $user_height = $user->getValues($user->userPhysicalDetail->height_id);
              }else{
                $user_height = "";
              }

              
              $preference = $user_preference;

              $age_check = App\UserBasicInformation::where('users_id',$user->id)->select('*',DB::raw("TIMESTAMPDIFF(YEAR, DATE(dob), current_date) AS age"))
              ->where(function($q2) use ($preference){
                $q2->whereRaw("TIMESTAMPDIFF(YEAR, DATE(dob), current_date) >= ".$preference->min_age);
                $q2->whereRaw("TIMESTAMPDIFF(YEAR, DATE(dob), current_date) <= ".$preference->max_age);

              })->first();

              @endphp

              @if(($user->status) == 6)
                                                                            
              <div class="single-details border border-dark rounded-left w-100 p-3 ml-2 single_information premium_border"  >

              @elseif(($user->status) == 5)
              <div class="single-details border border-dark rounded-left w-100 p-3 ml-2 single_information trust_verified_border"  >

              @else
              <div class="single-details border border-dark rounded-left w-100 p-3 ml-2 single_information"  >
              @endif
              
              
             
                <h5 class="spcl_name">{{$user->basicInformation->short_name}}</h5>
                <h5>{{$age_check->age}} Years</h5>
                <h5>{{($user_height) ? $user_height->value : ''}}</h5>
                <h5>{{($ethnicities_status) ? $ethnicities_status->value : ''}}</h5>
                <h5>{{($religion_status) ? $religion_status->value : ''}}</h5>
                <h5>{{($caste) ? $caste->value : ''}}</h5>
                <h5>{{($marital_status) ? $marital_status->value : ''}}</h5>
                
                <h5>{{($city) ? $city->value : ''}}</h5>
                <h5>{{($education_level) ? $education_level->value : ''}}</h5>
                <h5>{{($user_career_level) ? $user_career_level->value : ''}}</h5>
                <h5>{{($user_assets_value) ? $user_assets_value->value : ''}}</h5>
                
              </div>  
              
            </div> 
            
            <br>
        
            <br>

            @if(($user->status) == 6)
            
            <div class="single-details border border-dark rounded-left w-100  mb-4 premium_border ">
  
          @elseif(($user->status) == 5)
            <div class="single-details border border-dark rounded-left w-100  mb-4 trust_verified_border">
  
          @else
          <div class="single-details border border-dark rounded-left w-100  mb-4 ">
            @endif
  
       
              
                
                  <div class="container">
                      <div class="row">

                          @if($user->suspend == 3)
                            <div class="col-sm-12">
                              <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                              <p id="accept-button" class="font-weight-bold text-danger" > This member has deleted the account</p>
                            </div>

                          
                          @else


                          @if($user->suspend == 2)
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > This profile has been suspended due to terms and conditions..</p>
                          </div>

                          
                          @else


                          @if(in_array($user->id,$profile_hidden_status))
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > This person hidden the profile.</p>
                          </div>

                          
                          @else

                          @if(in_array($user->id,$blocked_by_others_det))
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > Sorry, you have been blocked by this member. You can't interact until unblock.</p>
                          </div>

                          
                          @else

                          @if(in_array($user->id,$blocked_by_me_det))
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > Sorry, you have blocked this member. Go to profile to unblock.</p>
                          </div>
        
        
          
                          @else

                          <div class="col-sm-12">
   
                              @if($reason->reason_id == 5 && $reason->status == 0)
                                <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                                <p class="font-weight-bold">You have reminded to join online by SMS. <span class="text-danger">Notifies on members interest.</span></p>
                              @else
                              
                            
                              <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                              <p class="font-weight-bold">You have requested to {{$reason->reasons->reason}}. <span class="text-danger">Notifies you after completion.</span></p>

                              @endif

                           
                              
                            </div>

                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                         
                       
  
                          </div>
                </div>
        </div>
           
        </div>
        @else                         
        @endif   
        @endforeach
     
        @endif
        @endforeach
        @endforeach
        @else
        <img class="mt-4 img_res" width="30%" src="{{asset('assets/img/profile/no_matches.png')}}" alt="" >
        @endif

        @endif

      </div>


      {{-- sent done part --}}
      <div class="row done_requests">
  
  
        @if (count($user_filterings) > 0)

        @if(count($request_fetch_details) > 0)

        @foreach ($request_fetch_details as $request_fetch_detail)
  
       
     
        
        @foreach ($user_filterings as $key=>$user)
        
        
        @if($request_fetch_detail->requested_users_id == $user->id && $request_fetch_detail->users_id == Auth::user()->id)
       
        @php
        $request_data=explode(",",$request_fetch_detail->reasons_id);
        
       
        @endphp
          @foreach ($request_fetch_detail->requestDetails as $reason)
   
          @if($reason->status == 1 &&  $reason->status != 3)
        <div class="col-sm-4 column">
          
          
          
          <div class="col-md-12 px-0 d-flex">

              @if(($user->status) == 6)
                      
              <div class="single-details border border-dark rounded-left w-100 premium_border">
    
              @elseif(($user->status) == 5)
              <div class="single-details border border-dark rounded-left w-100 trust_verified_border">
    
              @else
                <div class="single-details border border-dark rounded-left w-100  ">
              @endif
            
            
            
              {{-- <a href="{{route('account',['p'=>'view-match','id'=>$user->id,'status'=>1])}}">
                <img class="show-img profile_image" src="{{asset("$user->profile_img")}}" alt="Avatar" ></a> --}}



                @if(in_array($user->id,$blocked_by_others_det) || in_array($user->id,$profile_hidden_status) || $user->suspend == 2 || $user->suspend == 3)

                @else
                  <a href="{{route('account',['p'=>'view-match','id'=>$user->id,'status'=>1])}}">
                @endif
                  @if(isset($user->profile_img))
                    <img class="show-img profile_image" src="{{asset("$user->profile_img")}}" alt="Avatar" ></a>
                    @else
                      @if($user->basicInformation->gender == 398)
                        <img class="show-img profile_image" src="{{asset('assets/img/img_avatar.png')}}" alt="Avatar" ></a>
    
                      @else
                        <img class="show-img profile_image" src="{{asset('assets/img/women_default.png')}}" alt="Avatar" ></a>
    
                      @endif
                    @endif
    
                    @if(($user->status) == 6)
            
                    <img class="img_premium_badge" src="{{asset("assets/img/profile/premium.png")}}" alt="badge">
    
                    @endif
                   

              </div>
              
              @php

              

              if(isset($user->userBackgroundDetail->ethnicities_id)){
                $ethnicities_status = $user->getValues($user->userBackgroundDetail->ethnicities_id);
              }else{
                $ethnicities_status = "";
              }

              if(isset($user->userBackgroundDetail->religions_id)){
                $religion_status = $user->getValues($user->userBackgroundDetail->religions_id);
              }else{
                $religion_status = "";
              }
              

              if(isset($user->basicInformation->marital_status)){
                $marital_status = $user->getValues($user->basicInformation->marital_status);
              }else{
                $marital_status = "";
              }

              if(isset($user->userBackgroundDetail->casts_id)){
                $caste = $user->getValues($user->userBackgroundDetail->casts_id);
              }else{
                $caste = "";
              }
              
              if(isset($user->userResidence->cities_id)){
                $city = $user->getValues($user->userResidence->cities_id);
              }else{
                $city = "";
              }
              
              if(isset($user->userEducationDetail->education_levels_id)){
                $education_level = $user->getValues($user->userEducationDetail->education_levels_id);
              }else{
                $education_level = "";
              }

              if(isset($user->userCareerDetail->occupations_id)){
                $user_career_level = $user->getValues($user->userCareerDetail->occupations_id);
              }else{
                $user_career_level = "";
              }

              if(isset($user->userPresonalAssetDetail->value_id)){
                $user_assets_value = $user->getValues($user->userPresonalAssetDetail->value_id);
              }else{
                $user_assets_value = "";
              }

              if(isset($user->userPhysicalDetail->height_id)){
                $user_height = $user->getValues($user->userPhysicalDetail->height_id);
              }else{
                $user_height = "";
              }

              
              $preference = $user_preference;

              $age_check = App\UserBasicInformation::where('users_id',$user->id)->select('*',DB::raw("TIMESTAMPDIFF(YEAR, DATE(dob), current_date) AS age"))
              ->where(function($q2) use ($preference){
                $q2->whereRaw("TIMESTAMPDIFF(YEAR, DATE(dob), current_date) >= ".$preference->min_age);
                $q2->whereRaw("TIMESTAMPDIFF(YEAR, DATE(dob), current_date) <= ".$preference->max_age);

              })->first();

              @endphp
              
              @if(($user->status) == 6)
                                                                            
              <div class="single-details border border-dark rounded-left w-100 p-3 ml-2 single_information premium_border"  >

              @elseif(($user->status) == 5)
              <div class="single-details border border-dark rounded-left w-100 p-3 ml-2 single_information trust_verified_border"  >

              @else
              <div class="single-details border border-dark rounded-left w-100 p-3 ml-2 single_information"  >
              @endif
              
              
                <h5 class="spcl_name">{{$user->basicInformation->short_name}}</h5>
                <h5>{{$age_check->age}} Years</h5>
                <h5>{{($user_height) ? $user_height->value : ''}}</h5>
                <h5>{{($ethnicities_status) ? $ethnicities_status->value : ''}}</h5>
                <h5>{{($religion_status) ? $religion_status->value : ''}}</h5>
                <h5>{{($caste) ? $caste->value : ''}}</h5>
                <h5>{{($marital_status) ? $marital_status->value : ''}}</h5>
                
                <h5>{{($city) ? $city->value : ''}}</h5>
                <h5>{{($education_level) ? $education_level->value : ''}}</h5>
                <h5>{{($user_career_level) ? $user_career_level->value : ''}}</h5>
                <h5>{{($user_assets_value) ? $user_assets_value->value : ''}}</h5>
                
              </div>  
              
            </div> 
            
            <br>
        
            <br>

            @if(($user->status) == 6)
            
            <div class="single-details border border-dark rounded-left w-100  mb-4 premium_border ">
  
          @elseif(($user->status) == 5)
            <div class="single-details border border-dark rounded-left w-100  mb-4 trust_verified_border">
  
          @else
          <div class="single-details border border-dark rounded-left w-100  mb-4 ">
            @endif
       
             
                
                  <div class="container">
                      <div class="row">

                        @if($user->suspend == 3)
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > This member has deleted the account</p>
                          </div>

                          
                          @else


                          @if($user->suspend == 2)
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > This profile has been suspended due to terms and conditions..</p>
                          </div>

                          
                          @else


                          @if(in_array($user->id,$profile_hidden_status))
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > This person hidden the profile.</p>
                          </div>

                          
                          @else

                          @if(in_array($user->id,$blocked_by_others_det))
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > Sorry, you have been blocked by this member. You can't interact until unblock.</p>
                          </div>

                          
                          @else

                          @if(in_array($user->id,$blocked_by_me_det))
                          <div class="col-sm-12">
                            <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                            <p id="accept-button" class="font-weight-bold text-danger" > Sorry, you have blocked this member. Go to profile to unblock.</p>
                          </div>
        
        
          
                          @else

                          <div class="col-sm-12">
   
                              @if($reason->reason_id == 5 && $reason->status == 0)
                                <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                                <p class="font-weight-bold">The person accepted join online by SMS.</p>
                                {{-- <p class="font-weight-bold">You have reminded to join online by SMS. <span class="text-danger">Notifies on members interest.</span></p> --}}
                              @else
                              
                            
                              <p class="text-primary font-weight-bold" id="reason_date">{{$reason->created_at}}</p>
                              <p class="font-weight-bold">The person have completed {{$reason->reasons->reason}}.</p>
                              {{-- <p class="font-weight-bold">The person have completed {{$reason->reasons->reason}}. <span class="text-danger">Notifies you after completion.</span></p> --}}

                              @endif

                           
                              
                            </div>

                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                         
                       
  
                          </div>
                </div>
        </div>
           
        </div>
        @else                         
        @endif   
        @endforeach
     
        @endif
        @endforeach
        @endforeach
        @else
        <img class="mt-4 img_res" width="30%" src="{{asset('assets/img/profile/no_matches.png')}}" alt="" >
        @endif

        @endif

      </div>



        </div>
    </div>
  </div>
  </div>


  <script>
                  
                  
                  
      document.addEventListener('DOMContentLoaded', (event) => {
        $( document ).ready(function() {              
          $(".done_requests").hide();
        });
        
        
        $(".done_tab").click(function(){
          
          $(".sent_requests").hide();
          $(".done_requests").show();
          $("#active_request").css("background-color","#000");
          $("#active_done").css("background-color","red");
          
        });
        
        
        $(".requests_tab").click(function(){
          
          $(".sent_requests").show();
          $(".done_requests").hide();
          $("#active_request").css("background-color","red");
          $("#active_done").css("background-color","#000");
          
        });
      });
                  
       
      
      
    </script>