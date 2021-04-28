<h2>List of Tasks</h2>
<?php foreach($tasks as $task) { ?>
    <form action="/tasks/update/<?= $task['id'] ?>" method="POST">
        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
        <input type="checkbox" name="added_task" id="added_task">

        <input type="text" value="<?= $task['name'] ?>" name="new_task_name" id="task_added">
        
        <input type="submit" id="edit_task" value="Edit">
    </form>
    <form action="/tasks/delete" method="POST">
        <button type="submit" id="delete_button" name="task_id" value="<?= $task['id'] ?>">Delete</button> 
    </form>
<?php } ?>
</div>