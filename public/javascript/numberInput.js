const myInput = document.getElementById("my-input");
const modalInput = document.getElementById("modal-input");

function stepper(btn) {
  let id = btn.getAttribute("id");
  let min = myInput.getAttribute("min");
  let max = myInput.getAttribute("max");
  let step = myInput.getAttribute("step");
  let val = myInput.getAttribute("value");
  let calcStep = id == "increment" ? step * 1 : step * -1;
  let newValue = parseInt(val) + calcStep;
  console.log(newValue);
  if (newValue >= min && newValue <= max) {
    myInput.setAttribute("value", newValue);
  }
}

function modalStepper(btn) {
  let id = btn.getAttribute("id");
  let min = modalInput.getAttribute("min");
  let max = modalInput.getAttribute("max");
  let step = modalInput.getAttribute("step");
  let val = modalInput.getAttribute("value");
  let calcStep = id == "increment" ? step * 1 : step * -1;
  let newValue = parseInt(val) + calcStep;
  console.log(newValue);
  if (newValue >= min && newValue <= max) {
    modalInput.setAttribute("value", newValue);
  }
}
