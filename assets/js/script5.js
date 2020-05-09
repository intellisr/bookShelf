(function($) {
    $(function() {

        var puzzleData = [{
            clue: "Genre that deals with aparticular subjects of proffessionals activity",
            answer: "journal",
            position: 1,
            orientation: "across",
            startx: 1,
            starty: 1
        },
        {
            clue: "Genre of books that entertains making fun of vices,foolishness,short coming etc",
            answer: "satire",
            position: 2,
            orientation: "across",
            startx: 2,
            starty:4 
        },

        {
            clue: "Books that shows an event or a series of events that happen outside the course of protagonist's ordinary life",
            answer: "comic",
            position: 1,
            orientation: "down",
            startx: 3,
            starty: 2
        },
        {
            clue: "Push and pull between the protogonist and the villain",
            answer: "thriller",
            position: 2,
            orientation: "down",
            startx: 9,
            starty: 4
        },
        {
            clue: "Genre of books which is about tension and what can happen",
            answer: "suspense ",
            position: 2,
            orientation: "down",
            startx: 9,
            starty: 4
        },

        ]

        $('#puzzle-wrapper').crossword(puzzleData);

    })

})(jQuery)