@extends('layouts.master_layouts.base') 

<style>
    .no-li-dots{
        list-style-type: none;
    }
    .no-li-dots-main{
        list-style-type: none;
    }

    .mcq-inputs{
        width: 200px;
        {{-- background-color: hotpink; --}}
    }
    .mcq-inputs::placeholder{
        text-align: center;
    }
    
    .content-btn-submit{
        margin-left: 20px;
    }
    
    .full-width{
        width: 100%;
        margin-bottom: 10px;
    }
</style>

@section('content')

<section class="all-content">
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('posts/test/' . $bId . '/' . $stu_id . '/collab') }}"><button type="button" class="btn btn-info full-width" id="" value="btn">Know Your Progress</button></a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('posts/test/' . $bId . '/' . $stu_id . '/showCollab') }}"><button type="button" class="btn btn-info full-width" id="" value="btn">Know your team Mates collabration</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"><h2 class="mcq-txt">MCQ &gt;&gt;</h2></div>
        <div class="col-md-4">
            <ul class="mcqs mcq-content">
                <li class="no-li-dots-main">
                    <input type="text" class="form-control mcq-content mcq-question" id="exampleFormControlInput1" placeholder="Enter Your question Here" required> 
                </li>

                <li class="no-li-dots">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="1" checked>
                    <input type="text" class="mcq-inputs " id="exampleFormControlInput1" placeholder="Option 1" required>
                </li>
                <li class="no-li-dots">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="2">
                    <input type="text" class="mcq-inputs " id="exampleFormControlInput1" placeholder="Option 2" required>
                </li>
                <li class="no-li-dots">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="3">
                    <input type="text" class="mcq-inputs " id="exampleFormControlInput1" placeholder="Option 3" required>
                </li>
                <li class="no-li-dots ">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="4">
                    <input type="text" class="mcq-inputs " id="exampleFormControlInput1" placeholder="Option 4" required>
                </li>
            </ul>
        </div>
        <div class="col-md-1  justify-content-center ">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-success mcq-content" id="mcq-btn-success" value="btn">Success</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2"><h2 class="c1">Q&A &gt;&gt;</h2></div>
        <div class="col-md-4"><h2 class="c2">hii</h2></div>
        <div class="col-md-4"><h3 class="c3">bye</h3></div>
    </div>
    <button id="hideToggle">click me</button>
</section>

@endsection




@section('scripts')
    <script>
        var isHidden = true;
        $("document").ready(function(){
            $(".mcq-content").hide();
        });

        $(".mcq-txt").click(function(){
            if(isHidden){
                $(".mcq-content").show(1000);
                $(".mcq-question").show(1000);
                $(".c3").show(1000);
                $(".no-li-dots").hide();
                isHidden = false;
            }else{
                $(".mcq-content").hide(1000);
                $(".c3").hide(1000);
                isHidden = true;
            }
        });
        $(".c1").click(function (){
            $(".c2").toggle(1000);
            $(".c3").toggle(1000);

        })

        $(".no-li-dots-main").hover(function(){
            $(".no-li-dots").hide(1000);               
        });
        $(".no-li-dots-main").mouseleave(function(){
            $(".no-li-dots").show(1000);               
        });
        
        $("#mcq-btn-success").click(function (){
            if(checkValidateMcq()){
                sendAjaxMcqReq();
            }else{
                alert("Please Give Correct Mcq to other members");
            }
        }); 

        function checkValidateMcq(){
            if($(".mcq-inputs").val()){
                return true;
            }
            return false;
        }

        function sendAjaxMcqReq(){
            var mcq_question = $(".mcq-question").val();
            var original_ans = $("input[name=exampleRadios]:checked").val();
            alert(original_ans);
            var mcq_inputs = [];
            //we have got mcq inputs here
            $.each($(".mcq-inputs"),function(index){
                mcq_inputs[index] = $(this).val(); 
            });

            $.ajax({
                type: 'GET',
                url: 'http://localhost:8000/ajax/make/mcq',
                data: {
                    mcqQuestion: mcq_question,
                    originalAns: mcq_inputs[original_ans-1],
                    mcqInputs: mcq_inputs,
                    boatId: {{ $bId }},
                    stuId: {{ $stu_id }},
                }, 
                success: function(response){ alert(response.res); },
                error: function(error_msg){ alert(error_msg); }
            }).done(function(){
                alert("completed");
            });
        }
    </script>
@endsection