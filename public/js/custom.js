// =================== loading animation =========================

$(window).on("load", function(){
  $('.loader-wrapper').fadeOut("fast");
});

// =================== format tanggal =========================

function formatTanggal(date){
    let tahun = date.getFullYear();
    let bulan = (1 + date.getMonth()).toString().padStart(2, '0');
    let tanggal = date.getDate().toString().padStart(2, '0');

    return tanggal + '/' + bulan + '/' + tahun;
}