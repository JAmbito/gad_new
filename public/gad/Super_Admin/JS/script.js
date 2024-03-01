

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav #desktop-menu');
const sidebar = document.getElementById('sidebar');

if (menuBar) {
    menuBar.addEventListener('click', function () {
        sidebar.classList.toggle('hide');
    })
}



// TOGGLE DROPDOWN
const nav = document.querySelector('.profile');
const profdropdown = document.getElementById('prof-dropdown');

if (nav) {
    nav.addEventListener('click', function () {
        profdropdown.classList.toggle('show');
    })
}

// TOGGLE NOTIF

const nav1 = document.querySelector('.bell-cont');
const profdropdown1 = document.getElementById('notif-dropdown');

if (nav1) {
    nav1.addEventListener('click', function () {
        profdropdown1.classList.toggle('show-notif');
    })
}

// SIDEBAR SIDE MENU DROPDOWN START

const nav3 = document.querySelector('.dash-drop');
const dashdropdown = document.getElementById('dash-dropdown');

if (nav3) {
    nav3.addEventListener('click', function () {
        dashdropdown.classList.toggle('drop-dash');
    })
}

// CHEVRON START

const nav4 = document.querySelector('.dash-drop');
const chevdropdown = document.getElementById('chev-rotate');

if (nav4) {
    nav4.addEventListener('click', function () {
        chevdropdown.classList.toggle('drop-chev');
    })

}

// SIDEBAR SIDE MENU DROPDOWN START

const nav_bom = document.querySelector('.bom-drop');
const bom_dropdown = document.getElementById('bom-dropdown');

if (nav_bom) {
    nav_bom.addEventListener('click', function () {
        bom_dropdown.classList.toggle('bom-dash');
    })
}

// CHEVRON START

const nav_bom1 = document.querySelector('.bom-drop');
const bom_chevdropdown = document.getElementById('bom-chev-rotate');

if (nav_bom1) {
    nav_bom1.addEventListener('click', function () {
        bom_chevdropdown.classList.toggle('bom_chev');
    })
}

// SIDEBAR SIDE MENU DROPDOWN START

const nav_proj = document.querySelector('.project-drop');
const proj_dropdown = document.getElementById('project-dropdown');

if (nav_proj) {
    nav_proj.addEventListener('click', function () {
        proj_dropdown.classList.toggle('project-dash');
    })
}

// CHEVRON START

const nav_proj1 = document.querySelector('.project-drop');
const  p_order_chevdropdown1 = document.getElementById('project-chev-rotate');

if (nav_proj1) {
    nav_proj1.addEventListener('click', function () {
        p_order_chevdropdown1.classList.toggle('project_chev');
    });

}

// RELEASE WAREHOUSE TOGGLE
$(".release-warehouse-drop").click(function(){
  $("#release-warehouse-dropdown").slideToggle(300);

  $("#release-warehouse-chev-rotate").toggleClass("add_class_release-warehouse");
})












$("#x-close").click(function(){
  $("#sidebar").hide();
});

$("#mobile-menu").click(function(){
  $("#sidebar").show();
});
