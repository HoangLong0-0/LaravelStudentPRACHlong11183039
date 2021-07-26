<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Student Survey Form</title>
</head>
<body>
<h1> Student Survey Form </h1>
<form id="student_form">
    <label for="name">Name</label>
    <input id="name" name="name" type="text" value="" />

    <label for="name">Email</label>
    <input id="email" name="email" type="text" value="" />

    <label for="phone">Phone</label>
    <input id="phone" name="phone" type="text" value="" />

    <label for="name">Feedback</label>
    <input id="feedback" name="feedback" type="text" value="" />

    <input type="submit" value="Send" />
</form>
<script type="text/javascript">

    var request;


    $("#student_form").submit(function(event){


        event.preventDefault();


        if (request) {
            request.abort();
        }

        var $form = $(this);


        var $inputs = $form.find("input, select, button, textarea");


        var serializedData = $form.serialize();


        $inputs.prop("disabled", true);


        request = $.ajax({
            url: "/save",
            type: "post",
            data: serializedData
        });


        request.done(function (response, textStatus, jqXHR){
            console.log("Success");
        });


        request.fail(function (jqXHR, textStatus, errorThrown){

            console.error(
                "Error: "+
                textStatus, errorThrown
            );
        });

        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });

    });
</script>
</body>
</html>
