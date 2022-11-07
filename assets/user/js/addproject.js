// Start Add project Form
var form_1 = document.querySelector(".form_1");
var form_2 = document.querySelector(".form_2");
var form_3 = document.querySelector(".form_3");

var form_1_btns = document.querySelector(".form_1_btns");
var form_2_btns = document.querySelector(".form_2_btns");
var form_3_btns = document.querySelector(".form_3_btns");

var form_1_next_btn = document.querySelector(".form_1_btns .btn_next");
var form_2_back_btn = document.querySelector(".form_2_btns .btn_back");
var form_2_next_btn = document.querySelector(".form_2_btns .btn_next");
var form_3_back_btn = document.querySelector(".form_3_btns .btn_back");

var form_2_progessbar = document.querySelector(".form_2_progessbar");
var form_3_progessbar = document.querySelector(".form_3_progessbar");

var btn_done = document.querySelector(".btn_done");
var modal_wrapper = document.querySelector(".modal_wrapper");
var shadow = document.querySelector(".shadow");

let formOneErroMsg = document.querySelector(".formOneErroMsg");

if (form_1_next_btn) {
  form_1_next_btn.addEventListener("click", function () {
    let inputFormOne = $(".formInputOne").toArray(); //document.querySelectorAll('.formInputOne')
    inputFormOne.forEach((e) => {
      let formValue = e.value.trim();
      if (formValue == "") {
        console.log("it's empty");
        formOneErroMsg.style.display = "flex";
      } else {
        formOneErroMsg.style.display = "none";
        form_1.style.display = "none";
        form_2.style.display = "block";
        form_1_btns.style.display = "none";
        form_2_btns.style.display = "flex";
        form_2_progessbar.classList.add("active");
      }
    });
  });
}

if (form_2_back_btn) {
  form_2_back_btn.addEventListener("click", function () {
    form_1.style.display = "block";
    form_2.style.display = "none";

    form_1_btns.style.display = "flex";
    form_2_btns.style.display = "none";

    form_2_progessbar.classList.remove("active");
  });

  form_2_next_btn.addEventListener("click", function () {
    form_2.style.display = "none";
    form_3.style.display = "block";

    form_3_btns.style.display = "flex";
    form_2_btns.style.display = "none";

    form_3_progessbar.classList.add("active");
  });
}

if (form_3_back_btn) {
  form_3_back_btn.addEventListener("click", function () {
    form_2.style.display = "block";
    form_3.style.display = "none";

    form_3_btns.style.display = "none";
    form_2_btns.style.display = "flex";

    form_3_progessbar.classList.remove("active");
  });
}

// End Form

// The WYSIWYG Editor
tinymce.init({
  selector: "#about-wysiwyg",
  height: 300,
  plugins: [
    "advlist",
    "autolink",
    "lists",
    "link",
    "charmap",
    "preview",
    "anchor",
    "searchreplace",
    "visualblocks",
    "code",
    "fullscreen",
    "insertdatetime",
    "table",
    "wordcount",
  ],
  toolbar:
    "undo redo | blocks | " +
    "bold italic backcolor | alignleft aligncenter " +
    "alignright alignjustify | bullist numlist outdent indent | " +
    "removeformat",
  content_style:
    "body { font-family:Helvetica,Arial,sans-serif; font-size:15px }",
});

// End WYSIWYG

// Start Upload Preview
function showPreview(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("logoPreviewBox");
    preview.src = src;
    preview.style.display = "block";
  }
}
// End Upload Prview

// Start toggle for team members
var checkbox = document.getElementById("checkbox");
var role_form = document.getElementById("role_form");
if (checkbox) {
  checkbox.addEventListener("change", (e) => {
    if (e.target.checked) {
      role_form.style.display = "block";
    } else {
      role_form.style.display = "none";
    }
  });
}

// End
