<?php
class employees
{

      private $itemsTable = "employees";
      public $id;
      public $name;
      public $age;
      public $salary;
      private $con;

      public function __construct($db)
      {
            $this->con = $db;
      }

      function read()
      {
            if ($this->id) {
                  $stmt = $this->con->prepare("SELECT * FROM " . $this->itemsTable . " WHERE id = ?");
                  $stmt->bind_param("i", $this->id);
            } else {
                  $stmt = $this->con->prepare("SELECT * FROM " . $this->itemsTable);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
      }

      function create()
      {

            $stmt = $this->con->prepare("
			INSERT INTO " . $this->itemsTable . "(id,name,age,salary)
			VALUES(?,?,?,?)");

            $this->id = htmlspecialchars(strip_tags($this->id));

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->age = htmlspecialchars(strip_tags($this->age));
            

            $this->salary = htmlspecialchars(strip_tags($this->salary));

            $stmt->bind_param("ssii",  $this->id,$this->name, $this->age, $this->salary);

            if ($stmt->execute()) {
                  return true;
            }

            return false;
      }

      public function update()
      {
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->salary = htmlspecialchars(strip_tags($this->salary));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $sqlQuery = "UPDATE " . $this->itemsTable . " SET name = '" . $this->name . "',
age = '" . $this->age . "',
salary = '" . $this->salary . "'
WHERE id = " . $this->id;

            $this->db->query($sqlQuery);
            if ($this->db->affected_rows > 0) {
                  return true;
            }
            return false;
      }
      function delete()
      {

            $stmt = $this->con->prepare("
			DELETE FROM " . $this->itemsTable . " 
			WHERE id = ?");

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bind_param("i", $this->id);

            if ($stmt->execute()) {
                  return true;
            }

            return false;
      }
}
