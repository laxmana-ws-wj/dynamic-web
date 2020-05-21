@extends('user.layouts.master')

@section('title')
Home | Active Boys
@endsection

@section('content')
<div class="leaderboard-banner">
    <div class="banner-txt leader-banner-txt">
        <div class="container">
            <h2 class="functional-main-heading">POST TIME TO LEADERBOARD</h2>

            <div class="leaderboard-grid-content">
                <div class="row row-content">
                    <div class="container">
                        @foreach ($users as $item)
                        <div class="col-md-3 col-sm-6 leader-box ">
                            <div class="card">
                                <div class="col-xs-3 col-sm-3 col-md-3 ">
                                    <div class="leader-img ">
                                        <img class="img-circle" src="{{asset('public/profile_pic/'.$item->profile_pic)}}"
                                            alt="Mobility-Workout" style="">
                                    </div>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 card-info">
                                    <h5 class="leader-name">{{$item->fname." ".$item->lname}} </h5>
                                    <span class="current-streak">
                                        <p>Current Streak</p>
                                        <div class="number-count">
                                            <h4 class="num">{{$item->streaks}}</h4><i class="glyphicon glyphicon-flash"></i>
                                        </div>
                                    </span>
                                    <span class="perfect-week">
                                        <p>Perfect Week</p>
                                        <div class="number-count">
                                            <h4 class="num">{{$item->perfect_weeks}}</h4><i class="fa fa-star"></i>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="refresh-button" id="MyButton">
        <a href="{{ route('leaderboard.index')}}"><img class="img-responsive" id="MyButton" src="{{asset('asset/assets_user/Images/Leaderboard/refresh.png')}}" alt="button" style=""></a>
        </div>
    </div>
</div>
</div>
</div>
<br>
<div class="post-comment">
    <div class="container">
        <h2 class="comment-title">COMMENTS :</h2>
    </div>
    <div class="container" style=" overflow-y: overlay; height: 600px;">

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
</div>

<div class="comment-section">
    <div class="container">
        <h2 class="comment-title">LEAVE A COMMENT :</h2>
        <form method="POST"  id="comment-form" class="comment-form " action="{{ route('excercise.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
            <input type="hidden" name="return_to" value="leaderboard" >
            <div class="form-group">
                <div class="col-sm-12">
                    <textarea name="comment"  id="comment" placeholder="Your Comment" rows="5" cols="90" name="name" style="width: 100%;"></textarea>
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
        $(".comment-container").delegate(".reply","click",function(){
            var tog_val = $(this).attr('tog_val');
            // alert(tog_val);
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
                var form = '<div class="'+cid+'_'+token+'"><form method="post" action="{{ route('store_reply') }}"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="return_to" value="leaderboard" ><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+name+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Enter your reply" > </textarea> </div> <div class="form-group"> <input class="btn btn-danger" style="max-width: fit-content;" type="submit"> </div></form></div>';

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
                var form = '<div class="'+rep_id+'_'+token+'"><form method="post" action="{{ route('store_reply') }}"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="return_to" value="leaderboard" ><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+rname+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Enter your reply" > </textarea> </div> <div class="form-group"> <input class="btn btn-danger" style="max-width: fit-content;" type="submit"> </div></form></div>';
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
</script>
@endsection
