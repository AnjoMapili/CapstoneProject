// let form = document.forms["my-form"];
// let menu = form.flavor;
// let options = form.flavor.options;

// // menu.disabled = true;
// // menu.required = true;
// options[0].selected = true;
// menu.onchange = function () {
//   let optionValue = this.value;
//   // document.body.remove();
//   optionText = this[this.selectedIndex].innerText;
//   // let index = this.selectedIndex;
//   // optionText = this.options[index].innerText;
//   console.log(optionText);
// };

if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}
function ready() {
  const select = document.querySelector(".flavor-item");
  const button = document.querySelector(".add-more-item");

  button.addEventListener("click", function () {
    localStorage.setItem("lastname", "Smith");
    document.getElementById("paste-item").innerHTML =
      localStorage.getItem("lastname");
    console.log(select.value);
  });
}

// var addItemButtons = document.getElementsByClassName("add-more-item");
// for (var i = 0; i < addItemButtons.length; i++) {
//   var button = addItemButtons[i];
//   button.addEventListener("click", addItemClicked);
// }
// function addItemClicked(event) {
//   var button = event.target;
//   var flavorItem = button.parentElement.parentElement;
//   var flavor = flavorItem.getElementsByClassName("flavor-item")[0].innerText;
//   console.log(flavor);
// }
