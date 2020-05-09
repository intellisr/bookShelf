(function($) {
    $(function() {

        var puzzleData = [{
            clue: "The genre of speculative fiction set in fictional universe.",
            answer: "fantacy",
            position: 1,
            orientation: "across",
            startx: 3,
            starty: 2
        },
        {
            clue: "Books which the expression of feelings and ideas are given intensly by the use of rythm",
            answer: "poetry",
            position: 2,
            orientation: "across",
            startx: 1,
            starty:6 
        },

        {
            clue: "Typically features animals,plants,legenndary creatures etc",
            answer: "fable",
            position: 1,
            orientation: "down",
            startx: 3,
            starty: 2
        },
        {
            clue: "Mystereous death of crime",
            answer: "Mystery",
            position: 2,
            orientation: "down",
            startx: 9,
            starty: 1
        },
        {
        clue: "The genre which focuse on relationship and love between two people",
            answer: "romance",
            position: 3,
            orientation: "down",
            startx: 5,
            starty: 6
        }

        ]

        $('#puzzle-wrapper').crossword(puzzleData);

    })

})(jQuery)