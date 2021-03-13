
$(document).ready(function () {
  get_presentation();
});

function get_presentation() {

  $.getJSON('../MVC/Controller/presentation.json', function (data) {

    $("#body").empty();

    $.each(data, function (i, Presentation) {
      $("#body").append('<h1 style="font-size: 170%;">' + Presentation.titre + '</h1>');
      $("#body").append('<p style="margin-left:3%;" >' + Presentation.presentation + '</li>');
    })
    setInterval(get_presentation, 6000);
  })
}