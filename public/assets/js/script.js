$(function () {
    let minimized = false
    $(".sidebar-toggler").on('click', function () {
        if (!minimized) {
            $(".sidebar").removeClass("col-lg-3 col-xl-2").addClass("col-lg-1 col-xl-1").addClass("minimized")
            $(".content").removeClass("col-lg-9 col-xl-10").addClass("col-lg-11 col-xl-11")
        }else{
            $(".content").removeClass("col-lg-11 col-xl-11").addClass("col-lg-9 col-xl-10")
            $(".sidebar").removeClass("col-lg-1 col-xl-1").removeClass("minimized").addClass("col-lg-3 col-xl-2")
        }
        minimized = !minimized
    })
})