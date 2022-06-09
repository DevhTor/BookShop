const selectElement = document.getElementById("txtRating");
const star1 = document.getElementById("star1");
const star2 = document.getElementById("star2");
const star3 = document.getElementById("star3");
const star4 = document.getElementById("star4");
const star5 = document.getElementById("star5");

selectElement.addEventListener("change", (event) => {
  var rating = parseInt(event.target.value);

  if (rating >= 2) {
    star2.className += "fa fa-star checked";
  } else {
    star2.className += "fa fa-star";
  }

  if (rating >= 3) {
    star3.className += "fa fa-star checked";
  } else {
    star3.className += "fa fa-star";
  }

  if (rating >= 4) {
    star4.className += "fa fa-star checked";
  } else {
    star4.className += "fa fa-star";
  }

  if (rating >= 5) {
    star5.className += "fa fa-star checked";
  } else {
    star5.className += "fa fa-star";
  }
});

//
