@extends('layouts.master_layouts.base')
<style>

    .boatHeader{
        padding: 0px;
    }
    .boat-info{
        border: 3px solid cyan;
        padding-top: 30px;
        border-radius: 12%;
    }
    .content-page{
        display: flex;
        background-color: grey;
    }
    .content-page>div{
        background-color: #f1f1f1;
        margin: 10px;
        padding: 20px;
        font-size: 30px;
        flex: 1 1 0;
        width: 0;
        color: black;
    }
    {{--  please note below button is not responsive but still worked very fine  --}}
    .join-btn{
        float: right;
        width: 100px;
        margin-right: 10px;
    }
    .addCont-btn{
        float: right;
        width: 100px;
        margin-right: 10px;
    }

    .total-mem{
        font-size: 20px;
    }
    .total-dev{
        font-size: 20px;
    }
    .total-post{
        font-size: 20px;
    }
    .members{
        font-size: 15px;
    }

    .no-li-dots{
        list-style-type: none;
    }

    #exampleRadios2{
        {{-- margin-top: 5px; --}}
    }

    .content-side-bar>*{
        color: white;
        font-family: fantasy;
    }
    .content-posts>*{
        color: white;
    }
    .mcq-option1, .mcq-option2, .mcq-option3, .mcq-option4{
        border: 2px dotted burlywood;
        border-radius: 20px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    .mcq-question{
        text-transform: capitalize;
        font-family: fantasy;
    }

    .mcq-submit-btn{
        float: right;
    }
    .no-close .ui-dialog-titlebar-close {
        display: none;
    }
</style>

@section('content')

<section class = "boatHeader">
    <div class="row justify-content-md-center">
        <div class="col-md-8 boat-info">
            <button class="btn btn-success join-btn" id="joinBtn">Join</button>
            <h1>{{ $boat->boat_name }}</h1>
            <div class="boat-add-content-btn">
                <a href="{{ url('/posts/test/'. $boat->boat_name . '/' . $boat->boat_id) }}">
                    <button class="btn btn-success addCont-btn" id="addContBtn">Play & collabrate</button>
                </a>
            </div>

            <h4>level : {{ $boat->boat_level }}</h4>
            <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, facere ad non ab quam beatae culpa ratione quidem nam perspiciatis ipsum saepe eligendi, reiciendis eaque consequuntur tempore? Repellendus, accusantium aliquid.</h6>

        </div>
    </div>
</section>

<section class="content-page">
{{--  <div>  --}}
    <div class= "content-side-bar" style="flex-grow: 1; background-color: black" >
        <div class="total-mem">Total members: {{ $boat->total_members }}</div>
        <div class="total-dev">Total developers: {{ $boat->total_devs }}</div>
        <div class="total-post">Total posts : {{ count($boat->posts) }}</div>
       {{-- {{ dd($logged_stu_id) }} --}}
        <div class="boat-member-label">
            Boat-Members:
        </div>
        @foreach ($students as $stu)

        <a href="{{ URL('/student/name/'.$stu->stu_name . '/' . $stu->s_id) }}">
            <div class="members">
                {{ $stu->email }}
            </div>
        </a>
        @endforeach
    </div>

    <div class = "content-posts" style="flex-grow: 4;background-color: black">
        <h1>Public Posts of boat</h1>
        {{-- {{ dd($posts->count() == 0) }} --}}
        @if ( $posts->count()  === 0)
           <div class="content-posts">
                No posts to show
           </div>
        @else
            @foreach ($posts as $index=>$post)

                <div class="mcq-question">
                    {{ $index+1 }} :
                    {{ $post->mcqs[0]->mcqQuestion }}
                    <button type="button" class="btn btn-primary py-0" id="mcq-btn" value="{{ $post->mcqs[0]->mcq_id }},{{$index+1}}" name="mcq-btnName">Submit Answer</button>
                    {{-- <button type="button" class="btn btn-primary py-0" id="dialog" value="" name="" >Comments</button>                     --}}
                    <br>
                </div>
                <ul class="no-li-dots">
                    <div class="mcq-options">
                        <li>
                            <div class="mcq-option1">
                                <input class="form-check-input" type="radio" name="exampleRadios{{$index+1}}" id="exampleRadios2" value="1" checked>
                                {{ $post->mcqs[0]->option1 }} <br>
                            </div>
                        </li>

                        @if ($post->mcqs[0]->option2)
                            <li>
                                <div class="mcq-option2">
                                    <input class="form-check-input" type="radio" name="exampleRadios{{$index+1}}" id="exampleRadios2" value="2" checked>
                                    {{ $post->mcqs[0]->option2 }} <br>
                                </div>
                            </li>
                        @endif
                        @if ($post->mcqs[0]->option3)
                            <li>
                                <div class="mcq-option3">
                                    <input class="form-check-input" type="radio" name="exampleRadios{{$index+1}}" id="exampleRadios2" value="3" checked>
                                    {{ $post->mcqs[0]->option3 }} <br>
                                </div>
                            </li>
                        @endif
                        @if ($post->mcqs[0]->option4)
                            <li>
                                <div class="mcq-option4">
                                    <input class="form-check-input" type="radio" name="exampleRadios{{$index+1}}" id="exampleRadios2" value="4" checked>
                                    {{ $post->mcqs[0]->option4 }}  <br>
                                </div>
                            </li>
                        @endif
                    </div>
                </ul>
                <br>
            @endforeach
        @endif
    </div>

</section>
{{--  </div>  --}}
{{--  base content section is now ended  --}}

@endsection

@section('scripts')

<script>
    $(document).ready(function(){


        //our basic idea is to call a function as soon the document is ready
        //it should call a function which shows user join btn about,
        // that whether he is joinined or not, so a new ajax request,
        //which does not change any data in database

        $.ajax({
            type: 'GET',
                url: "{{ env('APP_URL') }}/test/ajaxReq/knowJoinOrLeave",
                data:  { boat_id : '{{ $boat->boat_id }}' },
                success: function(response){
                    if(response.isMember == "true"){
                        $("#joinBtn").html("leave")
                            .attr('class','btn btn-warning join-btn');
                    }else{
                        $("#joinBtn").html("Join")
                            .attr('class','btn btn-success join-btn');
                    }
                },
                error: function(){ alert("something is wrong"); }

            }).done(function(data){
                //do something here
            });
    //});

        //the below ajax request will be called on btn click
        $("#joinBtn").click(function(){
            $.ajax({
                type: 'GET',
                url: "{{ env('APP_URL') }}/test/ajaxReq/joinOrLeave",
                data:  { boat_id : '{{ $boat->boat_id }}' },
                success: function(response){
                    joinOrLeave(response.isMember);
                },
                error: function(){ alert("something is wrong") }

            }).done(function(data){
                //do something here
            });
        });
        function joinOrLeave(isMember){
            if ( isMember == "false" ){
                //sweetAlert("a", "b", "error");
                $('#joinBtn').html("Leave")
                    .attr('class','btn btn-warning join-btn');
                    swal("Congrats!", ", You are now member of {{ $boat->boat_name }}!", "success");
            }else{
                $('#joinBtn').html("Join")
                    .attr('class','btn btn-success join-btn');
                swal("Congrats!", ", You Have Left {{ $boat->boat_name }}", "warning");
            }
        };

    });

    {{--  nam vagar nu function banavyu and anne direct call karyu ()();  --}}
</script>


<script>
    {{-- this section of script is dedicated for working on content inputs and thier animation --}}
    var whichQuestion = 0;
    $("[name=mcq-btnName]").each(function(){
        $(this).click(function(){
            whichQuestion = $(this).val();
            var whichQuestionArray = whichQuestion.split(",");
            var whichRadio = "exampleRadios".concat(whichQuestionArray[1]);
            var ans_index = $("input[name=" + whichRadio + "]:checked").val();
            {{-- alert(whichQuestionArray[0]); --}}
            {{-- alert( $("input[name=" + whichRadio + "]:checked").val() ); --}}
            $.ajax({
                type: 'GET',
                    url: "{{ env('APP_URL') }}/test/ajaxReq/ResponsedAnswer",
                    data:  {
                                bId : '{{ $boat->boat_id }}',
                                mcqId : whichQuestionArray[0],
                                stuId : '{{ $logged_stu_id }}',
                                mcqAns : ans_index
                            },
                    success: function(response){
                        if(response.isMember == "true"){
                                alert("yeas");
                        }else{
                            alert("nope");
                        }
                    },
                    error: function(){ alert("something is wrong"); }

                }).done(function(data){
                    //do something here
                });
        });
    });
</script>

<script>


</script>
{{--  scripts section is now ended  --}}
@endsection
