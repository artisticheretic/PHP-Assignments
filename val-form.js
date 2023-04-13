// Live Update Full Name Field When Entering First & Last Name Separately 

const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const fullname = document.getElementById('fullname');

fname.addEventListener("input", ()=> {
    fullname.value = fname.value
})

lname.addEventListener("input", ()=> {
    fullname.value = fname.value + " " + lname.value
})


// If Fields Are Empty Form Won't Submit

function validateTheForm() {
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;

    if (fname =="" || lname =="") {
        alert("Fields Can't Be Empty");
        return false;
    }
    else {
        return true;
    }

}

// If Fields Contain Not JUST Alphabets Form Won't Submit

function fnameTheForm() {
    var fname = document.getElementById('fname').value;
    var regEx = /^[a-zA-Z]+$/;
    if(fname.match(regEx))
     {
      return true;
     }
   else
     {
     alert("First Name Can Only Contain Alphabets And NO Empty Space");
     return false;
     }
}

function lnameTheForm() {
    var lname = document.getElementById('lname').value;
    var regEx = /^[a-zA-Z]+$/;
    if(lname.match(regEx))
     {
      return true;
     }
   else
     {
     alert("Last Name Can Only Contain Alphabets And NO Empty Space");
     return false;
     }
}


