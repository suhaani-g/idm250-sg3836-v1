document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".site-header");

    function updateHeader() {
        if (window.scrollY > 50) {
            document.body.classList.add("scrolled"); 
        } else {
            document.body.classList.remove("scrolled"); 
        }
    }

    window.addEventListener("scroll", updateHeader);
    updateHeader(); 
});

