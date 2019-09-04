$(document).ready(function() {

$(".reveal1").mousedown(function() {
$(".pwd1").replaceWith($('.pwd1').clone().attr('type', 'text'));
})
.mouseup(function() {
$(".pwd1").replaceWith($('.pwd1').clone().attr('type', 'password'));
})
.mouseout(function() {
$(".pwd1").replaceWith($('.pwd1').clone().attr('type', 'password'));
});

});
