var title, input, add, edit, uL, elements, total, viewer;
title = document.getElementsByTagName("h1");
input = document.getElementById("note-id");
add = document.getElementById("add-note");
edit = document.getElementById("edit-note");
uL = document.getElementById("notes-list");
elements = document.querySelectorAll("#notes-list li");
viewer = document.getElementById("view-list");
total = elements.length;
document.getElementById("note-counter").textContent = total;



function clearInput(){
    data = uL.lastChild.innerText;
    uL.removeChild(uL.lastChild);
    document.getElementById("note-counter").textContent = total;
    var xhr = new XMLHttpRequest();
        xhr.open("POST", "database.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                console.log("Data sent successfully!");
                // You can update the list of notes here if needed
            }
        };  
        xhr.send(JSON.stringify({ note1: data }));
    }
    

edit.addEventListener("click", clearInput, false);


add.addEventListener("click", function() {
    var noteText = input.value.trim();
    if (noteText !== "" && noteText.length < 20) {
        const element = document.createElement("li");
        element.innerText = noteText; // we are going to send this value, to the json response header
        uL.appendChild(element);
        input.value = "";
        const elements = document.querySelectorAll("#notes-list li");
        const total = elements.length;
        document.getElementById("note-counter").textContent = total;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "database.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                console.log("Data sent successfully!");
                // You can update the list of notes here if needed
            }
        };
        xhr.send(JSON.stringify({ note: noteText }));
    } else {
        const descrip = document.getElementById("number-of");
        descrip.innerText = "Sorry, that note is too long (max 20 characters).";
    }
}, false);

var notesVisible = false;
var elements = document.querySelectorAll(".newnote");

function popup() {
    notesVisible = !notesVisible; // Corrected variable name
    
}



viewer.addEventListener("click", popup);

