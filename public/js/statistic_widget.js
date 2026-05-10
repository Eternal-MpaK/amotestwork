$(document).ready(function() {
    $.get("/api/save_stats", (res) => {
        console.log(res.success)
    })
})
