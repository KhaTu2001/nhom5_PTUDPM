@extends('main')
@section('top')
    @include('blocks.header')
@endsection
@section('content')

<div class="spacer" style="height:5px; background-color: #9bc5ef; margin: 0 50px 0 90px;"></div>
<div class="container" style="margin-top: 100px;">
    <form action="" id="name-survey-form">
        <div class="form-group1">
            <div style="height: 40px; background-color: aqua; border-radius: 10px;">
                <input class="name-survey-input" type="text" placeholder="Tên Form">
            </div>
            <div class="spacer" style=" margin-top: 12px;"></div>
            <div style="height: 40px; background-color: aqua; border-radius: 10px;">
                <input class="name-type-survey" type="text" placeholder="Loại khảo sát:">
            </div>
        </div>
    </form>
    <div class="spacer"></div>
    <div>
        <div class="quest-num">
            <h3 style="color: white; padding-top: 10px;">Câu hỏi 1</h3>
        </div>
        <form action="" id="survey-form">

            <div class="form-group1">
                <div style="height: 70px; background-color: aqua; border-radius: 10px; font-weight: 600;">
                    <label for="" class="add-question">
                        <input class="name-question-input" type="text" placeholder="  Add your question">
                    </label>
                </div>
                <div class="d-flex flex-column align-items-end">
                    <div class="d-flex flex-column" style="margin-right: -70px; margin-top: -70px;">
                        <button type="button" onclick="addMoreQuestion()"
                            style="height: 35px; width: 35px; border-style: hidden; border-top-left-radius: 10px; border-top-right-radius: 10px;"><i
                                class="fa-regular fa-square-plus"></i></button>
                        <button type="button" onclick="deleteCurrentQuestion()"
                            style="height: 35px; width: 35px; border-style: hidden; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"><i
                                class="fa-regular fa-circle-xmark"></i></button>
                    </div>
                </div>
                <div class="spacer"></div>
                <h4 style="padding-left: 5px;">Options</h4>
                <div class="chose">
                    <p>
                        <label for="" class="survey-label">
                            <input type="radio" name="source" class="inputRadio"> <input class="add-option" type="text"
                                placeholder="Add your option">
                        </label>
                    </p>
                </div>
                <div class="chose">
                    <p>
                        <label for="" class="survey-label">
                            <input type="radio" name="source" class="inputRadio"> <input class="add-option" type="text"
                                placeholder="Add your option">
                        </label>
                    </p>
                </div>
                <div id="more-option"></div>
                <button type="button" class="add-option-btn" onclick="addMoreOption()"><i class="fa-regular fa-square-plus"
                        style="font-size: initial;"></i>
                    <p style="padding-left: 2px;">Add other option</p>
                </button>
            </div>
        </form>
    </div>
    <div id="more-question"></div>
</div>

<div style="display: flex;">
    <button class="col-6 d-flex flex-column align-items-end"
        style="border-style: hidden; background-color: #0dcaf0;">
        <div class="" style="text-align: center; padding-top: 55px; padding-right: 270px; font-size: medium;"><i
                class="fa-sharp fa-regular fa-square-check" style="font-size: x-large;"></i> Random</div>
    </button>
    <div class="col-6">
        <button class="form-survey-submit mt-5">Tạo</button>
    </div>
</div>
<div class="spacer"></div>

@endsection
