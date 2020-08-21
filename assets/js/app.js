/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

$(function() {
  $("#game-id").html("Partida: "+gameId);
  if (winner != null) {
    $("#winner").html("Ganador: " + (winner == 0 ? 'O' : 'X'));
  } else {
    if (turn == 9) $("#winner").html("Empate");
    else {
      $("#gameTurn").html("Turno: "+(turn+1)+" Juega: "+((turn % 2) == 0 ? 'O' : 'X'));
      $("#game > .empty").wrap(function() {
        var square = $(this).attr('id').substring(5);
        return '<a href="/game/movement/'+gameId+'/'+square+'"></a>';
      });
    }
  }
  $("#game > .caja-0").html('<div class="game-text">O</div>');
  $("#game > .caja-1").html('<div class="game-text">X</div>');
});
