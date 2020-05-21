@extends('user.layouts.master')

@section('title')
Home | Active Boys
@endsection

@section('content')
<div class="functional-workout-banner banner">
    <div class="banner-txt">
        <div class="container">
            <h2 class="functional-main-heading">FUNCTIONAL FITNESS WORKOUT</h2>
            <div class="button-image"> <img src="{{asset('asset/assets_user/Images/Functional-fitness-workout/Date-Background.png')}}" alt="Los Angeles" style="width:100%;"> </div>
            <div class="banner-date">
                <p class="date-txt">{{ date("d-M-Y") }}</p>
            </div>
        </div>
    </div>
</div>
<div class="overlay-workout-section" id="scroll-video">
    <div class="container">
        <div class="row nav nav-tabs">
            @foreach ($excercise as $wk_type)
            <a data-toggle="tab" href="#{{$wk_type['id']}}">
                <div class="col-xs-12 col-md-3 col-sm-6 hover-workout-img">
                    <div class="hover-img-bx-wrapper">
                        <div class="hover-img"> <img src="{{asset('public/workouttypes/workouttype_images/'.$wk_type['workouttype_image'])}}" alt="Fitness-Workout" style="width:100%;"> </div>
                        <div class="hover-txt">
                            <div class="fitness-icon"> <i style="zoom:2.0;" class="ion {{$wk_type['icon']}}"></i> </div>
                            <h4 class="hver-title">{{$wk_type['name']}}</h4> <a href="#" class="read-more-txt"></a> </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
<div class="tab-content">
    @php
    $count=1;
    @endphp
    @foreach ($excercise as $wk_type)
        @if ($wk_type['id'] != 4)
        <div id="{{$wk_type['id']}}" class="tab-pane fade in @if ($count == 1) {{'active'}} @endif">
            <div class="video-section ">
                @foreach ($wk_type['workouts'] as $wk_item)
                        <div class="container" id="video_container_{{$wk_type['id']}}">
                            <video width="100%" height="" controls>
                                <source src="{{asset('public/workouts/workout_videos/'.$wk_item['workout_video'])}}" type="video/mp4">
                            </video>
                            <br>
                        </div>

                        <div class="fitness-informatiom">
                            <div class="container">
                            <h4>{{$wk_item['desc_heading']}}</h4>
                                <p>{{$wk_item['long_desc']}}</p>
                            </div>
                        </div>
                    @break;
                @endforeach

                <div class="class-schedule-area">
                    <div class="container">
                        <div class="class-schedule-tab-area">
                            <div class="row">
                                <ul class="nav nav-tabs">
                                    @foreach ($wk_type['workouts'] as $wk_item)
                                        <li @if (Carbon\Carbon::now()->format('Y-m-d') == $wk_item['to_publish_on']) {{ 'class=active' }}@endif ><a data-toggle="tab" href="#{{$wk_item['to_publish_on']}}">{{Carbon\Carbon::parse($wk_item['to_publish_on'])->format('l')}}</a></li>
                                    @endforeach

                                    {{-- <li><a data-toggle="tab" href="#menu1">Tuesday</a></li>
                                    <li><a data-toggle="tab" href="#menu2">Wednesday</a></li>
                                    <li><a data-toggle="tab" href="#menu3">Thursday</a></li>
                                    <li><a data-toggle="tab" href="#menu4">Friday</a></li>
                                    <li><a data-toggle="tab" href="#menu5">Saturday</a></li>
                                    <li><a data-toggle="tab" href="#menu6">Sunday</a></li> --}}
                                </ul>

                                <div class="tab-content">
                                    @foreach ($wk_type['workouts'] as $wk_item)

                                            <div id="{{$wk_item['to_publish_on']}}" class="tab-pane fade in @if (Carbon\Carbon::now()->format('Y-m-d') == $wk_item['to_publish_on']) {{'active'}} @endif">
                                                <table class="table-wrapper table table-bordered">
                                                    <thead>
                                                        <tr class="table-header">
                                                            <th class="table-heading">TITLE</th>
                                                            <th class="table-heading">ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $old_mv_type ='';
                                                        @endphp
                                                        @foreach ($wk_item['moves'] as $mv_item)
                                                        @php
                                                            $new_mv_type = $mv_item['movetypes_id'];
                                                        @endphp
                                                        @if (($old_mv_type != $new_mv_type))

                                                        <tr><td class="table-col1" colspan="2">@if ($mv_item['movetypes']['name'] == "Rest")
                                                            {{$mv_item['move_name']}}
                                                        @else
                                                            {{$mv_item['movetypes']['name']}}
                                                        @endif</td></tr>
                                                        @endif
                                                        @php
                                                            $old_mv_type = $mv_item['movetypes_id'];
                                                        @endphp
                                                        @if($mv_item['movetypes']['name'] != "Rest")
                                                            <tr>
                                                                <td class="table-col1">{{$mv_item['move_name']}}</td>

                                                                <td class="table-col3">
                                                                    @if ($mv_item['move_video'] != 'NA')
                                                                    <span>
                                                                        <div class="start-button">
                                                                            <button type="button" class="btn btn-default start-btn-txt"><i class="fa fa-youtube-play"></i><a class="hidden-xs" id="video_play_{{$wk_item['workouttypes_id']}}" data-video="{{$mv_item['move_video']}}">START</a></button>
                                                                        </div>
                                                                    </span>
                                                                    @else
                                                                        --
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
                                                        @if (Carbon\Carbon::now()->format('Y-m-d') == $wk_item['to_publish_on'] && $wk_type['id'] == 1 )
                                                        <tr>
                                                            <td colspan="2">
                                                                    <button id="complete-workout"  class="btn btn-danger btn-lg" style="background: #cb1313;color:#fff;text-transform: uppercase;text-decoration: none;">Workout Complete</button>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fitness-chart-table">
                <div class="container">
                    <br>
                    <div class="leaderboard-btn pull-right">
                        <a href="{{route('leaderboard.index')}}" class="leader-btn-txt">Post To Leader Board</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div id="{{$wk_type['id']}}" class="tab-pane fade in @if ($count == 1) {{'active'}} @endif">
            <div class="container">
                <h3>NUTRITION CHALLENGE</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                    specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                    passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                    essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <br>
                <div class="leaderboard-btn pull-right">
                <a href="{{ url('download') }}" class="workout-guide-btn">Download Nutrition Workout Guide <i class="fa fa-caret-down" style="font-size:20px;color:#cb1313;padding-left: 5px;"></i></a>
                </div>
            </div>
        </div>
        @endif

        @php
            $count++;
        @endphp
    @endforeach
</div>

<br>
<div class="post-comment">
    <div class="container">
        <h2 class="comment-title">COMMENTS :</h2>
    </div>
    <div class="container" >
    @if(empty($comments[0]))
        <div class="comment-box">
            <div class=" col-md-1 col-sm-2 col-xs-12"></div>
            <div class="col-xs-12 col-md-11 col-sm-10">
                <div class="customer-review ">
                    <div class="cust-name">
                        <h4>No comments posted today.</h4>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="scrollbar" id="style-3">
            <div class="force-overflow"></div>
            @foreach($comments as $comment)
            <div class="comment-container">
                    <div class="comment-box">
                        <div class=" col-md-1 col-sm-2 col-xs-12">
                            <div class="customer-img"> <img class="img-circle" src="{{asset('public/profile_pic/'.$comment->user->profile_pic)}}" alt="Mobility-Workout" style="width:100%;"> </div>
                        </div>
                        <div class="col-xs-12 col-md-11 col-sm-10">
                            <div class="customer-review ">
                                <div class="cust-name">
                                    <h4> {{ $comment->user->fname }} {{ $comment->user->lname }}</h4>
                                </div>
                                @if( Auth::user()->id !=  $comment->user->id )
                                <a style="cursor: pointer;" cid="{{ $comment->id }}" name_a="{{ Auth::user()->fname}} {{ Auth::user()->lname }}" tog_val="{{ $comment->id }}_tog" token="{{ csrf_token() }}" class="reply"><h5 class=" pull-right">reply</h5></a>
                                @endif
                                <br>
                                <p>{{ $comment->comment }}</p>
                                <div class="reply-form">

                                </div>
                            </div>
                        </div>
                    </div>
                <br>
                @foreach($comment->replies as $rep)
                    @if($comment->id === $rep->comment_id)
                    <div class="comment-box">
                        <div class="col-md-offset-1 col-md-1  col-sm-offset-2 col-sm-2 col-xs-12 ">
                            <div class="customer-img"> <img class="img-circle" src="{{asset('public/profile_pic/'.$rep->user->profile_pic)}}" alt="Mobility-Workout" style="width:100%;"> </div>
                        </div>
                        <div class="col-xs-12 col-md-10 col-sm-8 ">
                            <div class="customer-review ">
                                <div class="cust-name">
                                    <h4> {{ $rep->user->fname }} {{ $rep->user->lname }}</h4>
                                </div>
                                @if( Auth::user()->id !=  $rep->user->id )
                                <a rname="{{ Auth::user()->fname}} {{ Auth::user()->lname }}" rid="{{ $comment->id }}" rep_id="{{ $rep->id }}" tog_val_rep="{{ $rep->id }}_tog_rep" style="cursor: pointer;" class="reply-to-reply" token="{{ csrf_token() }}"><h5 class="reply pull-right">reply</h5></a>
                                @endif
                                <br>
                                <p>{{ $rep->reply }} </p>
                                <div class="reply-to-reply-form">

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

<div class="comment-section">
    <div class="container">
        <h2 class="comment-title">LEAVE A COMMENT :</h2>
        <form method="POST"  id="comment-form" class="comment-form " action="{{ route('excercise.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
            <input type="hidden" name="return_to" value="excercise" >
            <div class="form-group">
                <div class="col-sm-12">
                    <textarea name="comment"  id="comment" placeholder="Your Comment" rows="5" cols="90" name="name" style="width: 100%;"></textarea>
                    @if ($errors->has('comment'))
                    <span id="firstname_error"
                        style="color:#D79150;">{{ $errors->first('comment') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 send-button">
                    <button type="submit" name="submit" class="btn btn-default send-btn-txt">SEND MESSAGE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        var APP_URL = {!! json_encode(url('/')) !!}
        var app_path = APP_URL+'/public/moves/move_videos/';
        $('a[id^=video_play_]').on('click',function(){
            var btn_id = $(this).attr('id');
            var arr = btn_id.split('_');
            var id = arr[2];
            var video_link = $(this).data('video');
            $('#video_container_'+id).find('video').get(0).pause();
            $('#video_container_'+id).find('video').find('source').attr('src',app_path+video_link);
            $('#video_container_'+id).find('video').get(0).load();
            $('#video_container_'+id).find('video').get(0).play();
        });

        $('#complete-workout').on('click',function(){
            var APP_URL = {!! json_encode(url('/')) !!}
            var app_path = APP_URL+"/complete_user_workout";
            var id = {{ json_encode(Auth::user()->id) }}
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url : app_path,
                method : "POST",
                data : {_method : "POST", _token: token,'id':id},
                dataType: 'JSON',
                success:function(response){
                    if(response.status == 200){
                        new PNotify({
                            title: response.message,
                            text: '',
                            icon: 'icofont icofont-info-circle',
                            type: 'error'
		                });
                    }
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function(){
        $(".comment-container").delegate(".reply","click",function(){
            var tog_val = $(this).attr('tog_val');
            alert(tog_val);
            var well = $(this).parent().parent();
            var cid = $(this).attr("cid");
            var name = $(this).attr('name_a');
            var token = $(this).attr('token');
            // alert("Comment Id->"+cid);

            if(tog_val != cid+"_tog"){
                $("."+cid+'_'+token).remove();
                $(this).attr("tog_val",  cid+"_tog");
                // alert("Div deleted....!")
            }else{
                var form = '<div class="'+cid+'_'+token+'"><form method="post" action="{{ route('store_reply') }}"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="return_to" value="excercise"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+name+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Enter your reply" required> </textarea> </div> <div class="form-group"> <input class="btn btn-danger" style="max-width: fit-content;" type="submit"> </div></form></div>';

                well.find(".reply-form").append(form);
                // $(cid).attr('tog_val').val = cid+"_div_deleted";
                $(this).attr("tog_val",  cid+"_div_deleted");
                var tog_val_changed = $(this).attr('tog_val');
                // alert(tog_val_changed);
                // alert("Div id available....!")
            }
        });


        $(".comment-container").delegate(".delete-comment","click",function(){

        	var cdid = $(this).attr("comment-did");
        	var token = $(this).attr("token");
        	var well = $(this).parent().parent();
        	$.ajax({
                    url : "/comments/"+cdid,
                    method : "POST",
                    data : {_method : "delete", _token: token},
                    success:function(response){
                    if (response == 1 || response == 2) {
                        well.hide();
                    }else{
                        alert('Oh ! you can delete only your comment');
                        console.log(response);
                    }
                }
            });

        });

        $(".comment-container").delegate(".reply-to-reply","click",function(){
            var tog_val_rep = $(this).attr('tog_val_rep');
            // alert(tog_val_rep);
            var well = $(this).parent().parent();
            var cid = $(this).attr("rid");
            var rep_id = $(this).attr("rep_id");
            var rname = $(this).attr("rname");
            var token = $(this).attr("token");
            // alert("Reply--->"+token);
            // alert("Reply Id->"+rep_id);
            if(tog_val_rep != rep_id+"_tog_rep"){
                $("."+rep_id+'_'+token).remove();
                $(this).attr("tog_val_rep",  rep_id+"_tog_rep");
                // alert("Div deleted....!")
            }else{
                // alert("Div id available....!")
                var form = '<div class="'+rep_id+'_'+token+'"><form method="post" action="{{ route('store_reply') }}"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="return_to" value="excercise"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+rname+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Enter your reply" > </textarea> </div> <div class="form-group"> <input class="btn btn-danger" style="max-width: fit-content;" type="submit"> </div></form></div>';
                well.find(".reply-to-reply-form").append(form);
                $(this).attr("tog_val_rep",  rep_id+"_div_deleted");
                // var tog_val_rep_changed = $(this).attr('tog_val_rep');
                // alert(tog_val_rep_changed);
            }
        });

        $(".comment-container").delegate(".delete-reply", "click", function(){

            var well = $(this).parent().parent();

            if (confirm("Are you sure you want to delete this..!")) {
                var did = $(this).attr("did");
                    var token = $(this).attr("token");
                    $.ajax({
                        url : "/replies/"+did,
                        method : "POST",
                        data : {_method : "delete", _token: token},
                        success:function(response){
                            if (response == 1) {
                                well.hide();
                                //alert("Your reply is deleted");
                            }else if(response == 2){
                                alert('Oh! You can not delete other people comment');
                            }else{
                                alert('Something wrong in project setup');
                            }
                        }
                    })
            }



        });
    });

    $(document).ready(function (){
            $(".start-btn-txt").click(function (){
                $('html, body').animate({
                    scrollTop: $("#scroll-video").offset().top
                }, 2000);
            });
        });
</script>
@endsection
