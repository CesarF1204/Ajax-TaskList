<?php
    class Task extends CI_Model {
        public function add_tasks($task) {
            $query = "INSERT INTO tasks (name, created_at, updated_at) VALUES (?, NOW(), NOW())";
            $values = array($task['name']);
            return $this->db->query($query, $values);
        }
        public function get_all_tasks() {
            $query = "SELECT * FROM tasks";
            return $this->db->query($query)->result_array();
        }
        public function update_task($task_id, $task_update){
            $where = "id = ". $task_id; 
            return $this->db->update('tasks', $task_update, $where);
        }
        public function delete_task($id){
            $query = "DELETE FROM tasks WHERE tasks.id = $id";
            return $this->db->query($query);
        }
    }
?>