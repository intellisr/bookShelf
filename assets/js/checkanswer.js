function answercheck() {

    var mark = document.getElementById("answert").innerHTML;
    var level = document.getElementById("level").innerHTML;
    if (mark > 1) {
        var r = confirm("If Your are Submit answer You Can't Play this Level Again!");
        if (r == true) {

            $.ajax({
                url: "savegamemark.php",
                type: "POST",
                data: {
                    mark: mark,
                    level: level
                },
                cache: false,
                //  dataType:"text",  
                success: function(data) {
                    var data = JSON.parse(data);
                    if (data == 1) {
                        window.location.replace("selectlevel.php");
                    } else {
                        alert(data);
                    }

                }
            });


        } else {

        }

    } else {

        alert("Get Minimum 2 mark to submit Answer");
    }



}