(function($) {
    $(function() {

        var puzzleData = [{
            clue: "Stories composed in prose or verse for theatricat performance",
            answer: "drama",
            position: 1,
            orientation: "across",
            startx: 1,
            starty: 1
        },
        {
            clue: "Writter periodically at regular definitive intervals",
            answer: "periodicacals",
            position: 2,
            orientation: "across",
            startx: 2,
            starty:4 
        },

        {
            clue: "Books that has ability to create the feelings of fear,repulsion,fright or terror",
            answer: "horror",
            position: 2,
            orientation: "across",
            startx: 1,
            starty:8 
        },

        {
            clue: "Books that shows an event or a series of events that happen outside the course of protagonist's ordinary life",
            answer: "adventure",
            position: 1,
            orientation: "down",
            startx: 3,
            starty: 2
        },
        {
            clue: "Books that are accepted as most important of a particular time periods of place",
            answer: "classic",
            position: 2,
            orientation: "down",
            startx: 9,
            starty: 4
        },
        

        ]

        $('#puzzle-wrapper').crossword(puzzleData);

    })

})(jQuery)