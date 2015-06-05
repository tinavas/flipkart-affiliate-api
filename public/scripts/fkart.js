// when document is ready, we use jQuery's getJSON to get data from file
$(document).ready(function() {
    $.getJSON("./data/dotd.json")
    .done(function(data, textStatus, jqXHR) {

        // Lets pick random Ad!
        var rnd = Math.floor(Math.random() * (data.dotdList.length));
        var ad = data.dotdList[rnd];

        // Add title of ad to dom
        document.getElementById('offer').innerHTML = ad.title;

        // Add description of ad to dom
        document.getElementById('detail').innerHTML = ad.description;

        // Link whole div to affiliate url
        document.getElementById('affurl').setAttribute('href', ad.url);

        // Add image url to dom
        document.getElementsByTagName('img')[0].setAttribute('src', ad.imageUrls[0].url);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
         // log error to browser's console
         console.log(errorThrown.toString());
     });
});
