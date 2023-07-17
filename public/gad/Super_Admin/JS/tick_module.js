

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav #desktop-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})



// TOGGLE DROPDOWN
const nav = document.querySelector('.profile');
const profdropdown = document.getElementById('prof-dropdown');

nav.addEventListener('click', function () {
    profdropdown.classList.toggle('show');
})


// TOGGLE NOTIF

const nav1 = document.querySelector('.bell-cont');
const profdropdown1 = document.getElementById('notif-dropdown');

nav1.addEventListener('click', function () {
    profdropdown1.classList.toggle('show-notif');
})




// SIDEBAR SIDE MENU DROPDOWN START

const nav3 = document.querySelector('.dash-drop');
const dashdropdown = document.getElementById('dash-dropdown');

nav3.addEventListener('click', function () {
    dashdropdown.classList.toggle('drop-dash');
})


// CHEVRON START

const nav4 = document.querySelector('.dash-drop');
const chevdropdown = document.getElementById('chev-rotate');

nav4.addEventListener('click', function () {
    chevdropdown.classList.toggle('drop-chev');
})




// SIDEBAR SIDE MENU DROPDOWN START

const nav6 = document.querySelector('.p-order-drop');
const p_order_dropdown = document.getElementById('p-order-dropdown');

nav6.addEventListener('click', function () {
    p_order_dropdown.classList.toggle('p-order-dash');
})

// CHEVRON START

const nav7 = document.querySelector('.p-order-drop');
const  p_order_chevdropdown = document.getElementById('p-order-chev-rotate');

nav7.addEventListener('click', function () {
     p_order_chevdropdown.classList.toggle('p_order_chev');
})



// SIDEBAR SIDE MENU DROPDOWN START

const nav_proj = document.querySelector('.project-drop');
const proj_dropdown = document.getElementById('project-dropdown');

nav_proj.addEventListener('click', function () {
    proj_dropdown.classList.toggle('project-dash');
})

// CHEVRON START

const nav_proj1 = document.querySelector('.project-drop');
const  p_order_chevdropdown1 = document.getElementById('project-chev-rotate');

nav_proj1.addEventListener('click', function () {
     p_order_chevdropdown1.classList.toggle('project_chev');
})



// SIDEBAR SIDE MENU DROPDOWN START

const nav_bom = document.querySelector('.bom-drop');
const bom_dropdown = document.getElementById('bom-dropdown');

nav_bom.addEventListener('click', function () {
bom_dropdown.classList.toggle('bom-dash');
})

// CHEVRON START

const nav_bom1 = document.querySelector('.bom-drop');
const bom_chevdropdown = document.getElementById('bom-chev-rotate');

nav_bom1.addEventListener('click', function () {
bom_chevdropdown.classList.toggle('bom_chev');
})




// SIDEBAR SIDE MENU DROPDOWN START

const nav_proj_bom = document.querySelector('.proj-bom-drop');
const proj_bom_dropdown = document.getElementById('proj-bom-dropdown');

nav_proj_bom.addEventListener('click', function () {
proj_bom_dropdown.classList.toggle('proj-bom-dash');
})

// CHEVRON START

const nav_proj_bom1 = document.querySelector('.proj-bom-drop');
const proj_bom_chevdropdown = document.getElementById('proj-bom-chev-rotate');

nav_proj_bom1.addEventListener('click', function () {
proj_bom_chevdropdown.classList.toggle('proj-bom_chev');
})







// SIDEBAR SIDE MENU DROPDOWN START

const nav_ntp = document.querySelector('.ntp-drop');
const ntp_dropdown = document.getElementById('ntp-dropdown');

nav_ntp.addEventListener('click', function () {
ntp_dropdown.classList.toggle('ntp-dash');
})

// CHEVRON START

const nav_ntp1 = document.querySelector('.ntp-drop');
const ntp_chevdropdown = document.getElementById('ntp-chev-rotate');

nav_ntp1.addEventListener('click', function () {
ntp_chevdropdown.classList.toggle('ntp_chev');
})






// SIDEBAR SIDE MENU DROPDOWN START

const nav_warehouse = document.querySelector('.warehouse-drop');
const warehouse_dropdown = document.getElementById('warehouse-dropdown');

nav_warehouse.addEventListener('click', function () {
warehouse_dropdown.classList.toggle('warehouse-dash');
})

// CHEVRON START

const nav_warehouse1 = document.querySelector('.warehouse-drop');
const warehouse_chevdropdown = document.getElementById('warehouse-chev-rotate');

nav_warehouse1.addEventListener('click', function () {
warehouse_chevdropdown.classList.toggle('warehouse_chev');
})




// RECEIVE WAREHOUSE TOGGLE
$(".receive-warehouse-drop").click(function(){
  $("#receive-warehouse-dropdown").slideToggle(300);

  $("#receive-warehouse-chev-rotate").toggleClass("add_class");
});



// RELEASE CONTRACTOR TOGGLE
$(".release-contractor-drop").click(function(){
  $("#release-contractor-dropdown").slideToggle(300);

  $("#release-contractor-chev-rotate").toggleClass("add_class_release-contractor");
})



// RELEASE WAREHOUSE TOGGLE
$(".release-warehouse-drop").click(function(){
  $("#release-warehouse-dropdown").slideToggle(300);

  $("#release-warehouse-chev-rotate").toggleClass("add_class_release-warehouse");
})



// INVENTORY  TOGGLE
$(".inventory-drop").click(function(){
  $("#inventory-dropdown").slideToggle(300);

  $("#inventory-chev-rotate").toggleClass("add_class_inv");
})








$("#x-close").click(function(){
  $("#sidebar").hide();
});

$("#mobile-menu").click(function(){
  $("#sidebar").show();
});
