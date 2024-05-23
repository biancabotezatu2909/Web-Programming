$(document).ready(function() {
    // initialize puzzle pieces
    for (let i = 0; i < 16; i++) {
      // generate a unique color for each piece
      const color = `hsl(${(i * 360 / 16)}, 100%, 75%)`;
      
      $('<div></div>', {
        id: 'piece-' + i,
        'class': 'puzzle-piece',
        text: i + 1,
        css: {
          'background-color': color,
          'color': '#ffffff' // text color = white
        }
      }).appendTo('#puzzle-container');
    }
  
    // shuffle pieces function
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
          const j = Math.floor(Math.random() * (i + 1)); // random index from 0 to i
          [array[i], array[j]] = [array[j], array[i]]; // swap elements
        }
      }
  
    // apply shuffle
    let pieces = $('.puzzle-piece').toArray();
    shuffle(pieces);
    $('#puzzle-container').html(pieces);
  
    // swap pieces logic
    let firstPiece = null;
    $('.puzzle-piece').click(function() {
      if (firstPiece === null) {
        firstPiece = this;
        $(this).addClass('selected');
      } else {
        // swap DOM elements
        let secondPieceHtml = $(this).prop('outerHTML');
        let firstPieceHtml = $(firstPiece).removeClass('selected').prop('outerHTML');
        $(firstPiece).replaceWith(secondPieceHtml);
        $(this).replaceWith(firstPieceHtml);
  
        // reset selection
        firstPiece = null;
        
        // rebind click event to the swapped pieces
        $('.puzzle-piece').off('click').click(arguments.callee);
      }
    });
  });
  