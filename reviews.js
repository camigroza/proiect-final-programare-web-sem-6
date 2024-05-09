const menuIcon = document.getElementById("menu-icon");
const slideoutMenu = document.getElementById("slideout-menu");
const searchIcon = document.getElementById("search-icon");
const searchBox = document.getElementById("search-box");
const scrollToTopBtn = document.getElementById('scrollToTop');

searchIcon.addEventListener('click', function() {
if(searchBox.style.display === 'none' || searchBox.style.display === '') {
    searchBox.style.display = 'block';
    searchBox.style.pointerEvents = 'auto';
    searchIcon.style.color = 'rgb(243, 236, 244)';
} else {
    searchBox.style.display = 'none';
    searchBox.style.pointerEvents = 'none';
    searchIcon.style.color = 'black';
}
});

menuIcon.addEventListener('click', function() {
if(slideoutMenu.style.opacity == '1') {
    slideoutMenu.style.opacity ='0';
    slideoutMenu.style.pointerEvents = 'none';
    menuIcon.style.color = 'black';
} else {
    slideoutMenu.style.opacity ='1';
    slideoutMenu.style.pointerEvents = 'auto';
    menuIcon.style.color = 'rgb(243, 236, 244)';
}
})

scrollToTopBtn.addEventListener('click', function(e) {
e.preventDefault();
scrollToTop(600); 
});

function scrollToTop(scrollDuration) {
var scrollStep = -window.scrollY / (scrollDuration / 15),
    scrollInterval = setInterval(function() {
        if (window.scrollY !== 0) {
            window.scrollBy(0, scrollStep);
        } else {
            clearInterval(scrollInterval);
         }
    }, 15);
}

function deleteReview(review_id) {
    if (confirm("Are you sure you want to delete this review?")) {
        $.ajax({
            url: 'delete-review.php',
            method: 'POST',
            contentType: 'application/x-www-form-urlencoded',
            data: { review_id: review_id },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error deleting review');
            }
        });
    }
}
