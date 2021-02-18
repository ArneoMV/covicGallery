$(document).ready(function() {

 $( "#img-1" ).click(function() {
  $("#main").load("html/Painting.html");
 });

 // SHOW/HIDE FILTERS 
 $(".filter_icon").click(function() {
  $("form").toggleClass("filter_active");
 });
});