let parent = document.getElementById("buttons");
let check = document.getElementById("result");

var result1;


function calc(event) {
    if (event.target.textContent !== "="){
        check.innerText += event.target.innerText;
        result1 = check.innerText;
    }

    else if (event.target.textContent === "+"){
        result1 += "+";
        check.textContent= "";

    }

    else if (event.target.textContent === "/"){
        check.textContent = "";
        result1 = result1.split("/");
        check.innerText = parseInt(result1[0]) / parseInt(result1[1]);

    }


    else if(event.target.textContent === "="){
        if (result1.includes("+")){
            console.log("yes it's include" + result1);
        }
        /*check.textContent = "";
        result1 = result1.split("+");
        check.innerText = parseInt(result1[0]) + parseInt(result1[1]);*/ // we can use a for loop to look for as many pluses or whatever;
        
    }


}

for (let i = 0; i <= 9; i++) {
    let newButton = document.createElement("button");
    newButton.textContent = i;
    newButton.addEventListener("click", calc, false);
    parent.appendChild(newButton);
}

let elements = document.getElementsByClassName("operations");
for (let i = 0; i < elements.length; i++) {
    const element = elements[i];
    element.addEventListener("click",calc, false);
}





