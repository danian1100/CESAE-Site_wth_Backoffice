function editNetwork() {
  idNet = document.querySelector("#id-network");
  action = document.querySelector("#action");
  btnSubmit = document.querySelector("#btn-submit");
  liMaster = this.closest("li");

  idNet.value = liMaster.dataset.id;
  action.value = this.dataset.action;

  title.value = liMaster.dataset.title;
  icon.value = liMaster.dataset.icon;
  site.value = liMaster.dataset.site;

  if (action.value == "edit") {
    btnSubmit.innerText = "Edit Social Network";
    btnSubmit.classList.remove("btn-primary", "btn-danger");
    btnSubmit.classList.add("btn-warning");
  } else if (action.value == "delete") {
    btnSubmit.innerText = "Delete Social Network";
    btnSubmit.classList.remove("btn-primary", "btn-warning");
    btnSubmit.classList.add("btn-danger");
  }
}

function editMenu() {
  idMenu = document.querySelector("#id-menu");
  action = document.querySelector("#action");
  btnSubmit = document.querySelector("#btn-submit");
  liMaster = this.closest("li");

  idMenu.value = liMaster.dataset.id;
  action.value = this.dataset.action;

  title.value = liMaster.dataset.title;
  file.value = liMaster.dataset.file;

  if (action.value == "edit") {
    btnSubmit.innerText = "Edit Menu Tab";
    btnSubmit.classList.remove("btn-primary", "btn-danger");
    btnSubmit.classList.add("btn-warning");
  } else if (action.value == "delete") {
    btnSubmit.innerText = "Delete Menu Tab";
    btnSubmit.classList.remove("btn-primary", "btn-warning");
    btnSubmit.classList.add("btn-danger");
  }
}

function editSongs() {
  idSong = document.querySelector("#id-song");
  action = document.querySelector("#action");
  btnSubmit = document.querySelector("#btn-submit");
  liMaster = this.closest("li");

  idSong.value = liMaster.dataset.id;
  action.value = this.dataset.action;

  title.value = liMaster.dataset.title;
  videolink.value = liMaster.dataset.videolink;
  file.required = false;

  if (action.value == "edit") {
    btnSubmit.innerText = "Edit Song";
    btnSubmit.classList.remove("btn-primary", "btn-danger");
    btnSubmit.classList.add("btn-warning");
  } else if (action.value == "delete") {
    btnSubmit.innerText = "Delete Song";
    btnSubmit.classList.remove("btn-primary", "btn-warning");
    btnSubmit.classList.add("btn-danger");
  }
}

function editAnswer() {
  const button = event.target;
  const liMaster = button.closest("li");

  const idFan = document.querySelector("#id-fan");
  const action = document.querySelector("#action");
  const nameField = document.querySelector("#name");
  const emailField = document.querySelector("#email");
  const messageField = document.querySelector("#message");
  const answerField = document.querySelector("#answer");
  const btnSubmit = document.querySelector("#btn-submit");

  idFan.value = liMaster.dataset.id;
  action.value = "answer";
  nameField.value = liMaster.dataset.name;
  emailField.value = liMaster.dataset.email;
  messageField.value = liMaster.dataset.message;
}

function editRead() {
  const button = event.target;
  const liRow = button.closest("li");

  liRow.classList.toggle("read-style");
}

function editDelete() {
  const button = event.target;
  const li = button.closest("li");
  const id = li.dataset.id;

  if (!confirm("Tem certeza que quer apagar esta mensagem?")) return;

  const form = document.querySelector("#delete-form");
  const inputId = document.querySelector("#delete-id-fan");
  inputId.value = id;

  form.submit();
}
