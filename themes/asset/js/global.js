var baseurl = 'http://localhost/Bittytorrent/';

/*some global function*/
$(document).ready(function() {
    var url = window.location;
    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

    var pageName = "" 
    pageName = thisPage();

    $('ul.nav a').filter(function() {
        pageName = baseurl + pageName
        $('ul.nav a[href="'+ pageName +'"]').parent().addClass('active');
    });


});

function thisPage(){
    pageName = window.location.href.split(baseurl);
    pageName = pageName[1].split('/');
    pageName = pageName[0];

    return pageName;
}


