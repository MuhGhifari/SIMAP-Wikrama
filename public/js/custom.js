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

// =================== sidebar dropdown =========================
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
	dropdown[i].addEventListener("click", function(){
		var dropdownContent = this.nextElementSibling;
		if (dropdownContent.style.display === "block") {
			dropdownContent.style.display = "none";
		}else{
			dropdownContent.style.display = "block";
		}
	});
}