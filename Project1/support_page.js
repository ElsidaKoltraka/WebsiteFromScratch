jj = document.getElementById("contact");
jj.addEventListener("click", contact);
mybutton = document.getElementById("scroll");

function Q1() {
    if (q1.style.display == "none") {
        q1.style.display = "block";
        document.getElementById("test").style.color = "#0d6efd";
    } else {
        q1.style.display = "none";
    }
}

function Q2() {
    if (q2.style.display == "none") {
        q2.style.display = "block";
        document.getElementById("test2").style.color = "#0d6efd";
    } else {
        q2.style.display = "none";
    }
}

function Q3() {
    if (q3.style.display == "none") {
        q3.style.display = "block";
        document.getElementById("test3").style.color = "#0d6efd";
    } else {
        q3.style.display = "none";
    }
}

function Q4() {
    if (q4.style.display == "none") {
        q4.style.display = "block";
        document.getElementById("test4").style.color = "#0d6efd";
    } else {
        q4.style.display = "none";
    }
}

function Q5() {
    if (q5.style.display == "none") {
        q5.style.display = "block";
        document.getElementById("test5").style.color = "#0d6efd";
    } else {
        q5.style.display = "none";
    }
}

function Q6() {
    if (q6.style.display == "none") {
        q6.style.display = "block";
        document.getElementById("test6").style.color = "#0d6efd";
    } else {
        q6.style.display = "none";
    }
}

function Q7() {
    if (q7.style.display == "none") {
        q7.style.display = "block";
        document.getElementById("test7").style.color = "#0d6efd";
    } else {
        q7.style.display = "none";
    }
}

function show() {
    if (c1.style.display == "none") {
        c1.style.display = "block";
    } else {
        c1.style.display = "none";
    }
}

function contact() {
    if (c1.style.display == "none") {
        jj.innerHTML = "+ Contact Us"
    } else {
        jj.innerHTML = "- Contact Us"
    }
}


window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
/* Function that show the result when searching on search box  */
function showResult(str) {
    if (str.length == 0) {
        document.getElementById("SearchedWord").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("SearchedWord").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "toSearchForSPage.php?q=" + str, true);
    xmlhttp.send();
}