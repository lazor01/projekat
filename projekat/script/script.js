function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function myFunction(event) {
    event.currentTarget.nextElementSibling.classList.toggle("show");
}



var select = document.getElementById("exampleFormControlSelect2");
select.addEventListener("focus", function() {
    select.classList.add("open");
});
select.addEventListener("blur", function() {
    select.classList.remove("open");
});


//2 dropdown