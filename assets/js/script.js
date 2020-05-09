(function($) {
    $(function() {

        var puzzleData = [{
            clue: "Books that investigates the crime and criminals",
            answer: "detective",
            position: 1,
            orientation: "across",
            startx: 3,
            starty: 1
        },
        {
            clue: "fictions that are considered as most important books of a perticular period or place",
            answer: "classic",
            position: 2,
            orientation: "across",
            startx: 1,
            starty:5 
        },

        {
            clue: "Books that contain stories composed in verse or prose usually for theoritical performance",
            answer: "drama",
            position: 1,
            orientation: "down",
            startx: 3,
            starty: 1
        },
        {
            clue: "Books that based on a sequence of hand-drawn pictures",
            answer: "comic",
            position: 2,
            orientation: "down",
            startx: 7,
            starty: 1
        }

        ]

        $('#puzzle-wrapper').crossword(puzzleData);

    })

})(jQuery)