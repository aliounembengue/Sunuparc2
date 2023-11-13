var menu_encours = null;
var id_div_container = 'div_container';

$("body").on("click", ".menu", function () {
    if($(this).attr('id') == undefined)
        return false;

    menu_encours = $(this).attr('id');

    $('.menu').each(function (a) {
        $(this).closest('li').removeClass('active')
    });
    $(this).closest('li').addClass('active');

    var href = $(this).attr('href');
    $('#' + id_div_container).empty().load(href).fadeIn('slow');

    return false;
});

function callBack_menu(href){
    $('#' + id_div_container).empty().load(href).fadeIn('slow');
    return false;
}