document.getElementsByClassName('c')[0].style.color = 'green';
document.getElementsByTagName('table')[0].className += " a";
document.getElementById('t').style.color = 'green';
document.getElementById('t').className += " a";

// При наличии jQuery
$('.c').css('color','green');
$('#t').addClass('a');