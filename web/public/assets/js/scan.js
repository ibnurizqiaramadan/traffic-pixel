$(document).ready(e => {
    // msgSweetSuccess("Sukses")
    setOferflow()
})

$(window).resize(() => {
    setOferflow()
}) 

function setOferflow() {
    if ($(document).width() < 992) {
        $("body").attr("style", "overflow: hidden")
        window.scrollTo(0, 0);
    } else {
        $("body").attr("style", "overflow: auto")
    }
}