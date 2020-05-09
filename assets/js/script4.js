(function($) {
    $(function() {

        var puzzleData = [{
            clue: "A book containing madeup stories that did not actually happen in real life",
            answer: "fiction",
            position: 1,
            orientation: "across",
            startx: 1,
            starty: 1
        },
        {
            clue: "Genre which are usually full of fun,fancy and exitment",
            answer: "humor",
            position: 2,
            orientation: "across",
            startx: 2,
            starty:4 
        },
        {
            clue: "A collection of series of work such as short stories,poems,essays,play etc",
            answer: "anthology",
            position: 1,
            orientation: "down",
            startx: 3,
            starty: 2
        },
        {
            clue: "A narrative on someone's  written by someone else",
            answer: "biography",
            position: 2,
            orientation: "down",
            startx: 9,
            starty: 4
        },
        {
            clue: "Books that are written about that incidents happen in the past",
            answer: "History",
            position: 2,
            orientation: "down",
            startx: 9,
            starty: 4
        },
        

        ]

        $('#puzzle-wrapper').crossword(puzzleData);

    })

})(jQuery)