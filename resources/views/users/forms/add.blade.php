@extends('main')
@section('top')
    @include('blocks.header')
@endsection
@section('content')
    <form action="{{ route('users.form.store') }}" method="POST">
        @csrf
        <div class="spacer" style="height:5px; background-color: #9bc5ef; margin: 0 50px 0 90px;"></div>
        <div id="container1" class="container" style="margin-top: 100px;">
            <div action="" id="name-survey-form">
                <div class="form-group1">
                    <div style="height: 40px; background-color: aqua; border-radius: 10px;">
                        <input class="name-survey-input" type="text" name="name" placeholder="Tên Form">
                    </div>
                    <div class="spacer" style=" margin-top: 12px;"></div>
                    <div style="height: 40px; background-color: aqua; border-radius: 10px;">
                        <input class="name-type-survey" type="text" name="description" placeholder="Mô tả:">
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
            <div>
                <div class="quest-num">
                    <h3 style="color: white; padding-top: 10px;">Câu hỏi 1</h3>
                </div>
                <div action="" id="survey-form">
                    <div id="form-option" class="form-group1">
                        <div style="background-color: aqua; border-radius: 10px; font-weight: 600;">
                            <label for="" class="add-question">
                                <input class="name-question-input" type="text" name="questionlist[]"
                                    placeholder="Nội dung câu hỏi">
                            </label>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <div class="d-flex flex-column" style="margin-right: -70px; margin-top: -70px;">
                                <button id="add-question-btn" type="button" onclick="addMoreQuestion()"><i
                                        class="fa-regular fa-square-plus"></i></button>
                                <button id="delete-question-btn" type="button" onclick="deleteCurrentQuestion()"><i
                                        class="fa-regular fa-circle-xmark"></i></button>
                            </div>
                        </div>
                        <div class="spacer"></div>
                        <h4 style="padding-left: 5px;">Câu trả lời</h4>
                        <div class="chose">
                            <p>
                                <label for="" class="survey-label">
                                    <input type="radio" name="source" class="inputRadio"> <input class="add-option"
                                        type="text" name="answerlist[]" placeholder="Tùy chọn">
                                </label>
                            </p>
                        </div>
                        <div class="chose">
                            <p>
                                <label for="" class="survey-label">
                                    <input type="radio" name="source" class="inputRadio"> <input class="add-option"
                                        name="answerlist[]" type="text" placeholder="Tùy chọn">
                                </label>
                            </p>
                        </div>
                        <div id="more-option"></div>
                        <div id="another-option"></div>
                        <div class="d-flex" id="add-option-click">
                            <button type="button" class="add-option-btn" onclick="addMoreOption()"><i
                                    class="fa-regular fa-square-plus" style="font-size: initial;"></i>
                                <p style="padding-left: 2px;">Thêm tùy chọn </p>
                            </button>
                            <a style="color: blue" id="another-option-btn" onclick="addAnotherOption()">Đổi loại câu trả
                                lời</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="more-question"></div>
        </div>

        <div style="display: flex;">
            <div class="col-6"></div>
            <div class="col-6">
                <button class="form-survey-submit mt-5">Tạo</button>
            </div>
        </div>
    </form>
@endsection

@section('customJS')
    <script src="/template/js/form.js"></script>
@endsection
