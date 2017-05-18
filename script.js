$(document).ready(function () {
    $("form").validate({
        rules: {
            name: {
                maxlength: 8
            }
        }
    });

    $('#ajax').click(function () {
        //requete ajax
        $.getJSON('https://raw.githubusercontent.com/Coda-Wikicoda/Shops-List/master/list.json', function (magasins) {
            console.log(magasins);
            $.each(magasins, function (cle, magasin) {
                console.log(magasin);
                $('.list_mag').append(
                    '<article class="ville'+magasin.id+' col-sm-4 col-md-4 col-xs-12"><div class="britness">' +
                        '<p class="magasin">' +
                            '<span class="mag_attr1">'+magasin.city+'</span>' +
                            '<span class="espa"> <hr> </span>' +
                            '<span class="mag_attr2">'+magasin.name+'</span>' +
                        '</p>' +
                    '</div></article>'
                );
            });
        });
    });

});