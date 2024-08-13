/******/ (() => { // webpackBootstrap
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
$(document).ready(function () {
  if ($('#datatable').length) {
    $('#datatable').dataTable({
      "dom": 'frtip'
    });
  }
  $('#deleteUrl').on('submit', function (e) {
    if (!confirm('¿Are you sure?')) {
      e.preventDefault();
    }
  });
});
/******/ })()
;