let dataArray;
var counter = document.getElementsByClassName("count")[0]; // Assuming you want to target the first matching element
var countValue = parseInt(counter.innerText) || 0;



fetch('data.json')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    dataArray = data.map(item => ({ name: item.name, country: item.country }));




var button = document.getElementById("button-add");

button.addEventListener('click', function(){
    var icon = document.getElementsByClassName("material-symbols-outlined")[0]; // Assuming you want to target the first matching element
    icon.style.transform = "scale(2)"; // Use "scale" to increase the size
    icon.style.transition = "transform 1s";


    var inp = document.getElementById("inp").value; // Get input value
    dataArray.forEach(item => {
        if (inp === item.name){
            var additions = document.createElement("li"); // Create new list item
    additions.textContent = inp; // Set text content of list item
    counter.innerText = (countValue + 1).toString();

    var ul = document.querySelector(".elements");
    if (ul) {
        ul.appendChild(additions);
    }
    else {
        alert("This item is not available");
    }

        }
    })

    setTimeout(function(){
        icon.style.transform = ""; // Revert icon transformation after 1 second

    }, 1000);
});


var buttonRemove = document.getElementById("button-remove");
buttonRemove.addEventListener("click", function(){
    var icon1 = document.getElementsByClassName("material-symbols-outlined")[1]; // Assuming you want to target the first matching element
    icon1.style.transform = "scale(2)"; // Use "scale" to increase the size
    icon1.style.transition = "transform 1s";
    counter.innerText = (countValue - 1).toString();
    var parent = document.getElementsByClassName("elements")[0]; // Assuming you want to target the first matching element
var last = parent.lastElementChild;
if (last) {
    last.remove();

}


    setTimeout(function(){
        icon1.style.transform = ""; // Revert icon transformation after 1 second

    }, 1000);

})
  })

