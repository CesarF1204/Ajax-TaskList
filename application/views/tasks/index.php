<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="/user_guide/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // we are getting all of the tasks so that when the user first requests the page the page 
            // will already be rendering the tasks
            $.get('tasks/index_html', function(res) {
            // this url returns html string so we can dump that straight into div#tasks_list
            $('#tasks_list').html(res);
            $(document).on("click","#added_task", function() {
                if ($(this).is(":checked")) {
                    $("#task_added").attr('disabled', true);
                    $("#task_added").focus();
                } else {
                    $("#task_added").removeAttr("disabled");
                }
            });
            });
            $('form').submit(function(){
            // there are three arguments that we are passing into $.post function
            //     1. the url we want to go to: '/tasks/new_task'
            //     2. what we want to send to this url: $(this).serialize()
            //            $(this) is the form and by calling .serialize() function on the form it will 
            //            send post data to the url with the names in the inputs as keys
            //     3. the function we want to run when we get a response:
            //            function(res) { $('#tasks_list').html(res) }
            $.post($(this).attr('action'), $(this).serialize(), function(res) {
                $('#tasks_list').html(res);
            });
            // We have to return false for it to be a single page application. Without it,
            // jQuery's submit function will refresh the page, which defeats the point of AJAX.
            // The form below still contains 'action' and 'method' attributes, but they are ignored.
            return false;
            });
        });
    </script>
</head>
<body>
<div class="container">
    <form id="new_task" action="/tasks/new_task" method="POST">
        <label for="new_task_name">Create a New Task: </label>
        <input type="text" id="new_task_name" name="new_task_name">

        <input type="submit" value="Add Task">
    </form>

    <div id="tasks_list"></div>

</body>
</html>