function notEmpty(elementID) {
  var myElement = document.getElementById(elementID);
  if(myElement.value == "")
    alert("Required fields are empty")
}
