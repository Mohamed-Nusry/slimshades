
<link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/select2-bootstrap4.min.css')}}" rel="stylesheet" />

<style>
  
  .profile_photo{
    
    width: 100%;
    height: 100%;
    border-radius: 15px;
    min-height: 300px !important;
    
  }
  
  .single-details{
    max-height: 306px;
  }
  
  .contents{
    background-color: #fff;
    margin-top: -54px;
  }
  
  .search_single{
    float: right;
    margin: inherit;
    margin-top: -45px;
  }
  
  .img_premium_badge{
    position: absolute;
    width: 22%;
    margin-left: -270px;
  }
  
  .premium_border{
    border-color: #bfac48 !important;
    /* border-width: 5px !important; */
  }

  .trust_verified_border{
    border-color: #61db2a !important;
  }
  
  .single_information{
    
    /* width: 62% !important; */
    width: 60% !important;
    /* min-height: 300px !important; */
  }
  
  .single_information > h5{
    font-size: 14px;
  }
  .container-fluid{
    width: 77% !important;
  }
  
  @media (min-width: 50%) {
    .container-fluid{
      max-width: 77%;
      
    }
  }
  
  
  .column{
    padding-right: 22px;
    padding-left: 22px;
    
    min-width: 488px !important;
  }

  .match_single_btn{
    position: absolute !important;
    margin-top: 262px;
    margin-left: 110px;
    float: right !important;
    background-color: #909090 !important;
    border-radius: 20px;
  }


  #show_perc_partner{
    color: #ff00a0 !important;
  }

  #show_perc_user{
    color: #0090ff !important;
    margin-left: -168px;
  }

  #show_perc{
    position: absolute !important;
    margin-top: 261px;
    float: right !important;
    border-radius: 0px 0px 18px 14px;

    background: #f0b76a;
    text-align: center;
    /* margin: auto; */
    width: 251px;
    max-width: 251px;
    font-weight: bold;
    height: 13%;
    max-height: 13%;
  }

  
  .img_blank_heart, .img_heart{
    position: absolute;
    width: 30px;
    margin-left: -10%;
    margin-top: 1%;
    cursor: pointer;
  }

  .img_heart{
    margin-top: 1px;
    height: 11%;
  }

  .descriptive_information{
    width: 2%;
    margin-top: -73px;
    margin-left: 55%;
    cursor: pointer;
  }

  .pagination-div{
    padding-left: 65%;
    padding-right: 47%;
    position: absolute;
    /* padding-top: 60%; */
    margin-top: -26px;
  }

  .pagination-div .pagination li{
    margin: 10px;
  }
  .pagination-div .pagination a{
    text-decoration: none;
  }

  @media only screen and (max-width: 600px) {
    .descriptive_information{
      width: 10%;
      margin-left: 72%;
      margin-top: -77px;
    }

    .search_single {
      float: right;
    
      margin-top: -31px;
   
    }
  
  }

</style>


@php
  $check_expire = App\User::where(['id'=>Auth::user()->id])->first();

  //Check expire of the user levels
  if($check_expire){
    $suspend_type = $check_expire->suspend;
    
  }else{
    $suspend_type = 0;
  }

  // dd($suspend_type);
@endphp


@include('account.home.descriptive_information')

<div class="modal fade " id="matchSingleModal" tabindex="-1" role="dialog" aria-labelledby="matchSingleModalLabel" aria-hidden="true" style="margin: auto;" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content matchSingleContent">
      <div class="modal-header">
        <h5 class="modal-title" id="matchSingleModalLabel">Match Single</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body matchSingleBody">
        <div id="match-partner-contant"></div>
        {{-- {!!$match_data!!} --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>


<div class="col-md-12 px-0 py-4 ml-4">
  
  
  
  
  <div class="container-fluid">
    <div class="contents mt-n4">
      <br>
      <h3 align="center">All Singles</h3> 
        <img data-toggle="modal" data-target="#allSinglesDescriptiveModal" class="descriptive_information" src="{{asset("assets/upload/other/hint.png")}}" alt="Avatar">
      {{-- <button data-toggle="modal" data-target="#exampleModal" href="#">Search</button> --}}
      
      <button class="btn btn-primary gill-sans-mt-regular-font home-search-btn p20 home-search-letter-spacing search_single mr-4" data-toggle="modal" data-target="#exampleModal">&nbsp;Search&nbsp;</button>
      
      <hr> 
      @if (count($user_details)>0)

        <div class="pagination-div">
          {{ $user_details->links() }}
        </div>

      <div class="row" id="load_singles">

        @foreach ($user_details as $key=>$user_detail)
        
        
        <div class="col-sm-4 column">
          <br>
          
          <div class="col-md-12 px-0 d-flex">
          @php
            $user_percentages[] = array();
            $user_percentages = $user_detail->checkMatch($user_detail->id);
          @endphp
            
            @if(($user_detail->status) > 5)
            <div class="single-details border border-dark rounded-left w-90  premium_border">


              @if($user_detail->suspend == 3)
                <div class="match_details_border" id="show_perc">
                  <p class="mt-2 font-red text-danger" id="">This member deleted the account</p>
                </div>
              @else

              @if($user_detail->suspend == 2)
                <div class="match_details_border" id="show_perc">
                  <p class="mt-2 font-red text-danger" id="">This account has been suspended</p>
                </div>
              @else

              @if(in_array($user_detail->id,$profile_hidden_status))
                <div class="match_details_border" id="show_perc">
                  <p class="mt-2 font-red text-danger" id="">This person hidden the profile</p>
                </div>
                @else

              @if(in_array($user_detail->id,$blocked_by_others_det))
              <div class="match_details_border" id="show_perc">
                <p class="mt-2 font-red text-danger" id="">You have been blocked</p>
              </div>
              @else

              @if(in_array($user_detail->id,$blocked_by_me_det))
              <div class="match_details_border" id="show_perc">
                <p class="mt-2 font-red text-danger" id="">You blocked this person</p>
              </div>
              @else

              @if(!empty($user_percentages))
              <div class="match_details_border" id="show_perc">
                <p class="mt-2" id=""><span id="show_perc_user">&nbsp; &nbsp;{{$user_percentages[0]}}% </span><span id="show_perc_partner">&nbsp; {{$user_percentages[1]}}% </span></p>
              </div>
              @endif

              <button class="btn btn-danger match_single_btn"  onclick="showPartnerMatch({{$user_detail->id}})">Check Match</button>

              @endif
              @endif
              @endif
              @endif
              @endif

              @if(in_array($user_detail->id,$blocked_by_others_det) || in_array($user_detail->id,$profile_hidden_status) || $user_detail->suspend == 2 || $user_detail->suspend == 3 || $suspend_type > 1)

              @else

              
                <a href="{{route('account',['p'=>'view-match','id'=>$user_detail->id,'type'=>''])}}">

              @endif

              @if(isset($user_detail->profile_img))
                  <img class="profile_photo" src="{{asset("$user_detail->profile_img")}}" alt="Avatar"></a> 
                  @else
                    @if($user_detail->basicInformation->gender == 398)
                      <img class="profile_photo" src="{{asset('assets/img/img_avatar.png')}}" alt="Avatar" ></a>
  
                    @else
                      <img class="profile_photo" src="{{asset('assets/img/women_default.png')}}" alt="Avatar" ></a>
  
                    @endif
                  @endif


                {{-- <img class="profile_photo" src="{{asset(($user_detail->profile_img) ? $user_detail->profile_img : "assets/upload/user_profiles/default_single.png" )}}" alt="Avatar" ></a> --}}
               
               
                <img class="img_premium_badge" src="{{asset("assets/img/profile/premium.png")}}" alt="badge">

                @if(in_array($user_detail->id,$blocked_by_others_det) || in_array($user_detail->id,$blocked_by_me_det) || in_array($user_detail->id,$profile_hidden_status) || $user_detail->suspend == 2 || $user_detail->suspend == 3 || $suspend_type > 1)  
                
                @else

                @if(isset($favourite_exist))
                  @if(in_array($user_detail->id,$favourite_exist))
                    <img class="img_heart img_favourite_{{$user_detail->id}}" src="{{asset("assets/img/profile/heart.png")}}" alt="heart"  onclick="addFavourite({{$user_detail->id}});">
                  @else
                    <img class="img_blank_heart img_favourite_{{$user_detail->id}}" src="{{asset("assets/img/profile/blank-heart.png")}}" alt="heart"  onclick="addFavourite({{$user_detail->id}});">
                  @endif
                @endif

                @endif

              </div>
              @else
              @if(($user_detail->status) == 5)
              <div class="single-details border border-dark rounded-left w-90 trust_verified_border">
                @else
              <div class="single-details border border-dark rounded-left w-90  ">
                @endif

                @if($user_detail->suspend == 3)
                  <div class="match_details_border" id="show_perc">
                    <p class="mt-2 font-red text-danger" id="">This member deleted the account</p>
                  </div>
                @else
                
                @if($user_detail->suspend == 2)
                  <div class="match_details_border" id="show_perc">
                    <p class="mt-2 font-red text-danger" id="">This account has been suspended</p>
                  </div>
                @else
                
                @if(in_array($user_detail->id,$profile_hidden_status))
                <div class="match_details_border" id="show_perc">
                  <p class="mt-2 font-red text-danger" id="">This person hidden the profile</p>
                </div>
                @else

                @if(in_array($user_detail->id,$blocked_by_others_det))
                <div class="match_details_border" id="show_perc">
                  <p class="mt-2 font-red text-danger" id="">You have been blocked</p>
                </div>
                @else
  
                @if(in_array($user_detail->id,$blocked_by_me_det))
                <div class="match_details_border" id="show_perc">
                  <p class="mt-2 font-red text-danger" id="">You blocked this person</p>
                </div>
                @else


                @if(!empty($user_percentages))
                <div class="match_details_border" id="show_perc">
                  <p class="mt-2" id=""><span id="show_perc_user">&nbsp; &nbsp;{{$user_percentages[0]}}% </span><span id="show_perc_partner">&nbsp; {{$user_percentages[1]}}% </span></p>
                </div>
                @endif

                <button class="btn btn-danger match_single_btn"  onclick="showPartnerMatch({{$user_detail->id}})">Check Match</button>

                @endif
                @endif
                @endif
                @endif
                @endif

                @if(in_array($user_detail->id,$blocked_by_others_det) || in_array($user_detail->id,$profile_hidden_status) || $user_detail->suspend == 2 || $user_detail->suspend == 3 || $suspend_type > 1)

                @else

                  <a href="{{route('account',['p'=>'view-match','id'=>$user_detail->id,'type'=>''])}}">

                @endif

                @if(isset($user_detail->profile_img))
                <img class="profile_photo" src="{{asset("$user_detail->profile_img")}}" alt="Avatar"></a> 
                @else
                  @if($user_detail->basicInformation->gender == 398)
                    <img class="profile_photo" src="{{asset('assets/img/img_avatar.png')}}" alt="Avatar" ></a>

                  @else
                    <img class="profile_photo" src="{{asset('assets/img/women_default.png')}}" alt="Avatar" ></a>

                  @endif
                @endif

                  {{-- <img class="profile_photo" src="{{asset(($user_detail->profile_img) ? $user_detail->profile_img : "assets/upload/user_profiles/default_single.png" )}}" alt="Avatar" ></a> --}}
                    


                  @if(in_array($user_detail->id,$blocked_by_others_det) || in_array($user_detail->id,$blocked_by_me_det) || in_array($user_detail->id,$profile_hidden_status) || $user_detail->suspend == 2 || $user_detail->suspend == 3 || $suspend_type > 1) 
                
                  @else
  
                  @if(isset($favourite_exist))
                    @if(in_array($user_detail->id,$favourite_exist))
                      <img class="img_heart img_favourite_{{$user_detail->id}}" src="{{asset("assets/img/profile/heart.png")}}" alt="heart"  onclick="addFavourite({{$user_detail->id}});">
                    @else
                      <img class="img_blank_heart img_favourite_{{$user_detail->id}}" src="{{asset("assets/img/profile/blank-heart.png")}}" alt="heart"  onclick="addFavourite({{$user_detail->id}});">
                    @endif
                  @endif
  
                  @endif
                 
                
                </div>
                @endif
                
                @php
                if($user_detail->userBackgroundDetail){
                  $ethnicities_status = $user_detail->getValues($user_detail->userBackgroundDetail->ethnicities_id);
                  $religion_status = $user_detail->getValues($user_detail->userBackgroundDetail->religions_id);
                  $caste = $user_detail->getValues($user_detail->userBackgroundDetail->casts_id);
                }else{
                  $ethnicities_status = "";
                  $religion_status = "";
                  $caste = "";
                }
                
                if($user_detail->basicInformation){
                  $marital_status = $user_detail->getValues($user_detail->basicInformation->marital_status);
                  $age = $user_detail->getValues($user_detail->basicInformation->age);
                }else{
                  
                  $marital_status = "";
                  $age = "";
                }
                
                if($user_detail->userResidence){
                  $city = $user_detail->getValues($user_detail->userResidence->cities_id);
                }else{
                  $city = "";
                }
                
                if($user_detail->userEducationDetail){
                  $education_level = $user_detail->getValues($user_detail->userEducationDetail->education_levels_id);
                }else{
                  $education_level ="";
                }
                
                
                if($user_detail->userCareerDetail){
                  $user_career_level = $user_detail->getValues($user_detail->userCareerDetail->career_description);
                }else{
                  $user_career_level = "";
                }
                
                if($user_detail->userPresonalAssetDetail){
                  $user_assets_value = $user_detail->getValues($user_detail->userPresonalAssetDetail->value_id);
                }else{
                  $user_assets_value = "";
                }
                
                if($user_detail->userPhysicalDetail){
                  $user_height = $user_detail->getValues($user_detail->userPhysicalDetail->height_id);
                }else{
                  $user_height = "";
                }
                
                if($user_detail && $user_detail->basicInformation){
                  $age = date_diff(date_create($user_detail->basicInformation->dob), date_create('now'))->y;
                }
                
                @endphp
                
                @if(($user_detail->status) > 5)
                <div class="single-details border border-dark rounded-left w-50 p-3 ml-2 single_information premium_border"  >
                  @elseif(($user_detail->status) == 5) 
                  <div class="single-details border border-dark rounded-left w-65 p-3 ml-2 single_information trust_verified_border"  >
  
                  @else
                  <div class="single-details border border-dark rounded-left w-50 p-3 ml-2 single_information "  >
                    @endif
                    <h5 class="spcl_name">{{($user_detail->basicInformation) ? $user_detail->basicInformation->short_name : ""}}</h5>
                    
                    <h5>{{($age !=null) ? $age : ""}} Years</h5>
                    <h5 class="spcl_name">{{($user_height) ? $user_height->value : ''}}</h5>
                    
                    <h5>{{($ethnicities_status) ? $ethnicities_status->value : ''}}</h5>
                    
                    <h5 class="spcl_name">{{($religion_status) ? $religion_status->value : ''}}</h5>
                    <h5>{{($caste) ? $caste->value : ''}}</h5>
                    <h5 class="spcl_name">{{($marital_status) ? $marital_status->value : ''}}</h5>
                    
                    <h5>{{($city) ? $city->value : ''}}</h5>
                    <h5 class="spcl_name">{{($education_level) ? $education_level->value : ''}}</h5>
                    <h5>{{($user_career_level) ? $user_career_level->value : ''}}</h5>
                    <h5 class="spcl_name">{{($user_assets_value) ? $user_assets_value->value : ''}}</h5>
                    
                  </div>
                  
                  
                  
                </div>  
                
                
              </div> 
              @endforeach
              
              
            </div>
          </div>


            @else
            <div id="data_view">
              <p>No Matching Data Found</p>
            </div>
            @endif
            <br>
            
         
          
        </div>
        {{-- <div class="container">
          <div class="row">
            <div class="col-sm-6">
              
            </div>
            <div class="col-sm-6" id="btn_load_more_div">
              <a href="#"><button type="button" data-id="{{ ($user_detail) ? $user_detail->id : '' }}" data-count="{{count($user_details)}}" class="btn btn-primary mt-4" id="btn-more">Load More</button></a>
              <input type="hidden" name="btn_click_count" id="btn_click_count" value="0">
            </div>
          </div>
        </div> --}}
      </div>
      </div>
      
      
      <script>
        
         function addFavourite(id){
          // alert(id);
          var url = '{{ route("add-favourite", ":user_id") }}';
          url = url.replace(':user_id', "partner_id="+id);

          $.ajax({
            url: url,
            method: 'POST',
            data:  id,
            beforeSend: function () {},
            complete: function () {},
            success: function (data) {

              if(data == 1){
                $(".img_favourite_"+id).attr("src","{{asset("assets/img/profile/heart.png")}}");

                notify.success("Added As Favourite");

              }else{
                $(".img_favourite_"+id).attr("src","{{asset("assets/img/profile/blank-heart.png")}}");
                notify.success("Removed From Favourites");
              }
            
               
             
                // notify.error("OTP code invalid");
              
          
            },
            error: function (data) {
              notify.error(data);
            }
        });

          

         
        }

      function showPartnerMatch(id){
           
        var url = '{{ route("match-user", ":user_id") }}';
        url = url.replace(':user_id', "partner_id="+id);

        // console.log(url);

        $.ajax({
          url: url, 
          success: function(result){
            $("#matchSingleModal").modal()
            $("#match-partner-contant").html(result);
          // $("#div1").html(result);
        }

        });
      }


        document.addEventListener('DOMContentLoaded', (event) => {
      


            $(document).ready(function(){
              $(document).on('click','#btn-more',function(){

                var count = $(this).data('count');
                var u_id = $(this).data('id');

                var btn_click = $('#btn_click_count').val();

                var btn_click_count = +btn_click + 1;

                // alert(count);

                $('#btn_click_count').val(btn_click_count);

                $.ajax({
                  url : '{{url("loadmoredata")}}',
                  method : "POST",
                  headers: {'X-CSRF-TOKEN': token},
                  data : {count:count,u_id:u_id,btn_click_count:$('#btn_click_count').val()},
                  dataType : "text",
                  success : function (data)
                  {
                    // alert(data);
                    if(data != '')
                    {
                      $('#load_singles').append(data);
                    }
                    else
                    {
                      $('#btn_load_more_div').remove();
                    }
                  }
                });
              });
            });
            });
            
            
            
          </script>