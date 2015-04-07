/*some custom function*/
$(document).ready(function() {

    /*set the active state on the menu*/
    var baseurl = $("input#baseurl").val() + '/';
    var url = window.location;

    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

    var pageName = thisPage(baseurl);

    $('ul.nav a').filter(function() {
        pageName = baseurl + pageName
        $('ul.nav a[href="'+ pageName +'"]').parent().addClass('active');
    });

});

/*have the current url page name*/
function thisPage(baseurl){
    pageName = window.location.href.split(baseurl);
    
    pageName = pageName[1].split('/');
    pageName = pageName[0];

    return pageName;
}


