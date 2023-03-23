
function Validator(options) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    var selectorRules = {};


    function validate(inputElement, rule) {
        var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
        var errorMessage;


        var rules = selectorRules[rule.selector];
        
        for (var i = 0; i < rules.length; ++i) {
            switch (inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked')
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            if (errorMessage) break;
        }
        
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement, options.formGroupSelector).classList.add('invalid');
        } else {
            errorElement.innerText = '';
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
        }

        return !errorMessage;
    }
    

    var formElement = document.querySelector(options.form);
    if (formElement) {
        formElement.onsubmit = function (e) {
            e.preventDefault();

            var isFormValid = true;

            options.rules.forEach(function (rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);
                if (!isValid) {
                    isFormValid = false;
                }
            });

            if (isFormValid) {
                if (typeof options.onSubmit === 'function') {
                    var enableInputs = formElement.querySelectorAll('[name]');
                    var formValues = Array.from(enableInputs).reduce(function (values, input) {
                        
                        switch(input.type) {
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                                break;
                            case 'checkbox':
                                if (!input.matches(':checked')) {
                                    values[input.name] = '';
                                    return values;
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value);
                                break;
                            case 'file':
                                values[input.name] = input.files;
                                break;
                            default:
                                values[input.name] = input.value;
                        }

                        return values;
                    }, {});
                    options.onSubmit(formValues);
                }
                else {
                    formElement.submit();
                }
            }
        }

        options.rules.forEach(function (rule) {

            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElements = formElement.querySelectorAll(rule.selector);

            Array.from(inputElements).forEach(function (inputElement) {
                inputElement.onblur = function () {
                    validate(inputElement, rule);
                }

                inputElement.oninput = function () {
                    var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                    errorElement.innerText = '';
                    getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                } 
            });
        });
    }

}


Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined :  message || 'Vui lòng nhập trường này'
        }
    };
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined :  message || 'Trường này phải là email';
        }
    };
}

Validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined :  message || `Vui lòng nhập tối thiểu ${min} kí tự`;
        }
    };
}

Validator.isConfirmed = function (selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
            return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}

function confim(){
    var password=document.getElementById("password").value;
    var password_confirmation=document.getElementById("password_confirmation").value;
    var x = document.getElementById("snackbar");
    if(password=="123456"&& password_confirmation=="123456"){
        
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        return false;
    }else{
    }
}

function confimLogin(){
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var x = document.getElementById("snackbar");
    if(email !="123@gmail.com"|| password !="123456"){
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        return false;
    }else{

    }
}

function surveyDetail(){
    var x = document.getElementById("survey-snackbar");
    x.className = "show";
    return false;
}


function addMoreOption() {
    var div = document.createElement("div");
    div.setAttribute("class", "del-option")
    div.innerHTML = '<div class="chose" style="margin-top: 10px;"><p><label for="" class="survey-label"><input type="radio" name="source" class="inputRadio"> <input class="add-option" type="text" placeholder="Add your option"</label></p></div><div style="margin-left: 690px; margin-top: -30px;"><button type="button" onclick="deleteCurrentOption()" id="delete-current-option"><i class="fa-regular fa-circle-xmark"></i></button></div>';
    document.getElementById("more-option").appendChild(div);
}

function deleteCurrentOption(){
    var elements = document.getElementsByClassName("del-option");
    var lastElement = elements[elements.length - 1];
    lastElement.parentNode.removeChild(lastElement);
}

function addMoreQuestion(){
    var div = document.createElement("div");
    div.setAttribute("class", "del-question")
    div.innerHTML = '<div class="spacer"></div><div><div class="quest-num"><h3 style="color: white; padding-top: 10px;">Câu hỏi 1</h3> </div><form action="" id="survey-form"><div class="form-group1"><div style="background-color: aqua; border-radius: 10px; font-weight: 600;"><p id="quest">Question</p><label for="" class="add-question"><input type="text" placeholder="  Add your question"style="background-color: aqua; border-style: hidden; height: 20px; width: 170px; "></label></div><div class="d-flex flex-column align-items-end"><div class="d-flex flex-column" style="margin-right: -70px; margin-top: -70px;"><button type="button" onclick="addMoreQuestion()" style="height: 35px; width: 35px; border-style: hidden; border-top-left-radius: 10px; border-top-right-radius: 10px;"><i class="fa-regular fa-square-plus"></i></button><button type="button" onclick="deleteCurrentQuestion()" style="height: 35px; width: 35px; border-style: hidden; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"><i class="fa-regular fa-circle-xmark"></i></button></div></div><div class="spacer"></div><h4 style="padding-left: 5px;">Options</h4><div class="chose"><p><label for="" class="survey-label"><input type="radio" name="source" class="inputRadio"> <input class="add-option" type="text" placeholder="Add your option"></label></p></div><div class="chose"><p> <label for="" class="survey-label"><input type="radio" name="source" class="inputRadio"> <input class="add-option" type="text" placeholder="Add your option"></label></p></div><div id="more-option"></div><button type="button" class="add-option-btn" onclick="addMoreOption()"><i class="fa-regular fa-square-plus" style="font-size: initial;"></i><p style="padding-left: 2px;">Add other option</p></button></div></form></div>';
    document.getElementById("more-question").appendChild(div);
}

function deleteCurrentQuestion(){
    var elements = document.getElementsByClassName("del-question");
    var lastElement = elements[elements.length - 1];
    lastElement.parentNode.removeChild(lastElement);
}