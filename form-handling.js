const nameInput = document.querySelector("#name");
const nameSuccess = document.querySelector("#nameSuccess");
const nameError = document.querySelector("#nameError");
nameInput.addEventListener("input", function () {
  validateField("name", this.value.trim(), this, nameError, nameSuccess);
});

const emailInput = document.querySelector("#email");
const emailSuccess = document.querySelector("#emailSuccess");
const emailError = document.querySelector("#emailError");
emailInput.addEventListener("input", function () {
  validateField("email", this.value.trim(), this, emailError, emailSuccess);
});

const phoneInput = document.querySelector("#phone");
const phoneSuccess = document.querySelector("#phoneSuccess");
const phoneError = document.querySelector("#phoneError");
phoneInput.addEventListener("input", function () {
  validateField("phone", this.value.trim(), this, phoneError, phoneSuccess);
});

const messageInput = document.querySelector("#message");
const messageSuccess = document.querySelector("#messageSuccess");
const messageError = document.querySelector("#messageError");
const messageRemaining = document.querySelector("#remaining");
messageInput.addEventListener("input", function () {
  validateField(
    "message",
    this.value.trim(),
    this,
    messageError,
    messageSuccess
  );
});

const validationRules = {
  name: {
    required: true,
    minLength: 2,
    maxLength: 50,
    pattern: /^[a-zA-ZÀ-ÿ\s]+$/,
    errorMessages: {
      required: "Name required",
      minLength: "Minimum 2 characters",
      maxLength: "Maximum 50 characters",
      pattern: "It can only have letters and spaces",
    },
    successMessage: "Valid name",
  },
  email: {
    required: true,
    pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
    errorMessages: {
      required: "Email is mandatory",
      pattern: "Invalid email format",
    },
    successMessage: "Valid email address!",
  },
  phone: {
    required: true,
    pattern: /^[0-9]{9}$/,
    errorMessages: {
      required: "Telephone is mandatory",
      pattern: "The phone must have exactly 9 digits",
    },
    successMessage: "Valid phone number!",
  },
  message: {
    required: true,
    minLength: 10,
    maxLength: 500,
    errorMessages: {
      required: "Obligatory message",
      minLength: "Minimum 10 characters",
      maxLength: "Maximum 500 characters",
    },
    successMessage: "Valid message",
  },
};

function showError(errorElement, message) {
  errorElement.innerText = message;
  errorElement.style.display = "block";
}

function hideError(errorElement) {
  errorElement.style.display = "none";
}

function showSuccess(successElement, message) {
  successElement.innerText = message;
  successElement.style.display = "block";
}

function hideSuccess(successElement) {
  successElement.style.display = "none";
}

function validateForm() {
  const fields = [
    {
      name: "name",
      value: nameInput.value.trim(),
      input: nameInput,
      error: nameError,
      success: nameSuccess,
    },
    {
      name: "email",
      value: emailInput.value.trim(),
      input: emailInput,
      error: emailError,
      success: emailSuccess,
    },
    {
      name: "phone",
      value: phoneInput.value.trim(),
      input: phoneInput,
      error: phoneError,
      success: phoneSuccess,
    },
    {
      name: "message",
      value: messageInput.value.trim(),
      input: messageInput,
      error: messageError,
      success: messageSuccess,
    },
  ];

  let isFormValid = true;

  fields.forEach((field) => {
    const isFieldValid = validateField(
      field.name,
      field.value,
      field.input,
      field.error,
      field.success
    );
    if (!isFieldValid) isFormValid = false;
  });

  return isFormValid;
}

function validateField(
  fieldName,
  value,
  inputElement,
  errorElement,
  successElement
) {
  let validation;

  switch (fieldName) {
    case "name":
      validation = validateName(value);
      break;
    case "email":
      validation = validateEmail(value);
      break;
    case "phone":
      validation = validatePhone(value);
      break;
    case "message":
      validation = validateMessage(value);
      break;
  }

  if (!validation.formOk) {
    hideSuccess(successElement);
    showError(errorElement, validation.message);
  } else {
    hideError(errorElement);
    showSuccess(successElement, validation.message);
  }

  return validation.formOk;
}

function validateName(value) {
  const rules = validationRules.name;

  if (rules.required && value === "") {
    return { formOk: false, message: rules.errorMessages.required };
  }

  if (value.length < rules.minLength) {
    return { formOk: false, message: rules.errorMessages.minLength };
  }

  if (value.length > rules.maxLength) {
    return { formOk: false, message: rules.errorMessages.maxLength };
  }

  if (!rules.pattern.test(value)) {
    return { formOk: false, message: rules.errorMessages.pattern };
  }

  return { formOk: true, message: rules.successMessage };
}

function validateEmail(value) {
  const rules = validationRules.email;

  if (rules.required && value === "") {
    return { formOk: false, message: rules.errorMessages.required };
  }

  if (!rules.pattern.test(value)) {
    return { formOk: false, message: rules.errorMessages.pattern };
  }
  return { formOk: true, message: rules.successMessage };
}

function validatePhone(value) {
  const rules = validationRules.phone;

  if (rules.required && value === "") {
    return { formOk: false, message: rules.errorMessages.required };
  }

  if (!rules.pattern.test(value)) {
    return { formOk: false, message: rules.errorMessages.pattern };
  }
  return { formOk: true, message: rules.successMessage };
}

function validateMessage(value) {
  const rules = validationRules.message;

  if (rules.required && value === "") {
    return { formOk: false, message: rules.errorMessages.required };
  }

  if (value.length < rules.minLength) {
    return { formOk: false, message: rules.errorMessages.minLength };
  }

  if (value.length > rules.maxLength) {
    return { formOk: false, message: rules.errorMessages.maxLength };
  }
  return { formOk: true, message: rules.successMessage };
}

document.querySelector("form").addEventListener("submit", function (event) {
  event.preventDefault();
  const isValid = validateForm();

  if (isValid) {
    this.submit();
  } else {
    summaryContent.innerText = "INVALID FORM... FIX ERRORS";
    const firstFieldError = document.querySelector("form .error");
    if (firstFieldError) {
      firstFieldError.focus();
      firstFieldError.parentNode.scrollIntoView();
    }
  }
});
