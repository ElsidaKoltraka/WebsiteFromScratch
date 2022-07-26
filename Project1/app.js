//Collapse navbar when clicking away (phone)
$(document).ready(function () {
     $(document).click(function (event) {
         var clickover = $(event.target);
		 console.log(clickover);
         var _opened = $(".navbar-collapse").hasClass("show");
         if (_opened === true && (!clickover.hasClass("navbar-toggler") )) {
             $(".navbar-toggler").click();
         }
     });
 });

//Autohide navbar when scrolling
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
	var currentScrollPos = window.pageYOffset;
	if ((prevScrollpos > currentScrollPos) || (currentScrollPos < 98)) {
		document.getElementById("nb").style.top = "0";
	} else {
		document.getElementById("nb").style.top = "-98px";
	}
	prevScrollpos = currentScrollPos;
};