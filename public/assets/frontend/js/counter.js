
// Counter function
function counter() {
    $('.count').each(function () {
        $(this).prop('Count', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}

// Creating an observer
const observer = new IntersectionObserver(function (entries, observer) {
    let counterbox = entries[0]
    if (counterbox.isIntersecting) {
        counter() // counter function initiated
    } else {
        return
    }

})

// observer for counter container
observer.observe(document.querySelector('.counterbox'))