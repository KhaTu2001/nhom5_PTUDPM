
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
  
              switch (input.type) {
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
        return value ? undefined : message || 'Vui lòng nhập trường này'
      }
    };
  }
  
  Validator.isEmail = function (selector, message) {
    return {
      selector: selector,
      test: function (value) {
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return regex.test(value) ? undefined : message || 'Trường này phải là email';
      }
    };
  }
  
  Validator.minLength = function (selector, min, message) {
    return {
      selector: selector,
      test: function (value) {
        return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu ${min} kí tự`;
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
  
  function confim() {
    var password = document.getElementById("password").value;
    var password_confirmation = document.getElementById("password_confirmation").value;
    var x = document.getElementById("snackbar");
    if (password == "123456" && password_confirmation == "123456") {
  
      x.className = "show";
      setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
      return false;
    } else {
    }
  }
  
  function confimLogin() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var x = document.getElementById("snackbar");
    if (email != "123@gmail.com" || password != "123456") {
      x.className = "show";
      setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
      return false;
    } else {
  
    }
  }
  
  function surveyDetail() {
    var x = document.getElementById("survey-snackbar");
    x.className = "show";
    return false;
  }

  function offOtherOption(){
    
  }
  
  
  
  // thêm câu hỏi, option
  let questionCount = 1;
  let defaultId = 1;
  let deleteOptionId = 1;
  
  function addMoreQuestion() {
    var div = document.createElement("div");
    div.setAttribute("class", "del-question");
    div.innerHTML = `<div class="spacer"></div>
                    <div>
                      <div class="quest-num">
                        <h3 style="color: white; padding-top: 10px;">Câu hỏi ${questionCount + 1}</h3>
                      </div>
                      <form action="" id="survey-form">
                        <div id="form-option" class="form-group1">
                          <div style="background-color: aqua; border-radius: 10px; font-weight: 600;">
                            <label for="" class="add-question">
                              <input class="name-question-input" type="text" placeholder="  Add your question">
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
                          <div id="question-${defaultId}"></div>
                          <button type="button" class="add-option-btn" onclick="addMoreOption(${defaultId})"><i class="fa-regular fa-square-plus"
                              style="font-size: initial;"></i>
                            <p style="padding-left: 2px;">Add other option</p>
                          </button>
                        </div>
                      </form>
                    </div>`;
    document.getElementById("more-question").appendChild(div);
    questionCount++;
    defaultId++;
  }
  
  function deleteCurrentQuestion() {
    var elements = document.getElementsByClassName("del-question");
    var lastElement = elements[elements.length - 1];
    lastElement.parentNode.removeChild(lastElement);
    questionCount--;
  }
  
  function addMoreOption(defaultId) {
    var div = document.createElement("div");
    var questionDiv = document.getElementById(`question-${defaultId}`);
  
    div.setAttribute("class", `del-option`);
    div.innerHTML = `<div class="chose">
                      <p>
                        <label for="" class="survey-label">
                          <input type="radio" name="source" class="inputRadio"> <input class="add-option" type="text"
                            placeholder="Add your option">
                        </label>
                      </p>
                      <div style="margin-left: 695px; margin-top: -35px; "><button type="button" style=" border-style: none; background-color: white;" onclick="deleteCurrentOption(${deleteOptionId})"
                        id="delete-current-option-${deleteOptionId}"><i class="fa-regular fa-circle-xmark"></i></button></div>
                    </div>`;
    if (questionDiv) {
      questionDiv.appendChild(div);
    } else {
      document.getElementById(`more-option`).appendChild(div);
    }
    deleteOptionId++;
  }

  function addAnotherOption(defaultId) {
    var x = document.getElementById("another-option-btn");
    x.setAttribute("class", "getoff");
    var div = document.createElement("div");
    var questionDiv = document.getElementById(`question-${defaultId}`);
  
    div.setAttribute("class", `del-option`);
    div.innerHTML = `<div class="chose">
                      <p>
                        <label for="" class="survey-label">
                        <div style="display: flex;margin-left: 10px;">
                        <input type="radio" name="source" class="inputRadio">
                          <div style="color: #787878;">Khác...</div>
                        </div>
                        </label>
                      </p>
                      <div style="margin-left: 695px; margin-top: -35px; "><button type="button" style=" border-style: none; background-color: white;margin-top: 10px;" onclick="deleteCurrentOption(${deleteOptionId})"
                        id="delete-current-option-${deleteOptionId}"><i class="fa-regular fa-circle-xmark"></i></button></div>
                    </div>`;
    if (questionDiv) {
      questionDiv.appendChild(div);
    } else {
      document.getElementById(`more-option`).appendChild(div);
    }
    deleteOptionId++;
  }
  
  function deleteCurrentOption(deleteOptionId) {
    var deleteOption = document.getElementById(`delete-current-option-${deleteOptionId}`);
    deleteOption.parentElement.parentElement.parentElement.remove();
    var x = document.getElementById("another-option-btn");
    x.setAttribute("class", "geton");
  }