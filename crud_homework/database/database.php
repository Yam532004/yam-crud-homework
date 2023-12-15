<?php

/**
 * Connect to database
 */
function db()
{
    
    $servername = "localhost";
    $username = "root";
    $database = "web_a";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

/**
 * Create new student record
 */
function createStudent($value)
{
    $name = $value['name'];
    $age = $value ['age'];
    $email = $value['email'];
    $image = $value ['image'];
    $conn = db();
    $st = $conn ->prepare('INSERT INTO student (name, age, email, profile) values (:names, :age, :email, :profile)');
    $st->bindParam (':names', $name);
    $st->bindParam (':age', $age);
    $st->bindParam (':email', $email);
    $st->bindParam (':profile', $image);
    $st->execute ();
    selectAllStudents();
}

/**
 * Get all data from table student
 */
function selectAllStudents()
{
    $conn = db();
    $st = $conn->query('SELECT * FROM student');
    $students = $st->fetchAll();
    return $students;
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id)
{
    $conn = db();
    $st = $conn->query("SELECT * FROM student WHERE id = '$id'");
    $student = $st->fetch(); // Lấy thông tin của học sinh từ kết quả truy vấn
    return $student;
   
}

/**
 * Delete student by id
 */
function deleteStudent($id)
{
    $conn = db();
    $delete = $conn->prepare('DELETE FROM student WHERE id = :id');
    $delete->bindParam(':id', $id);
    $delete->execute();
    selectAllStudents();
}


/**
 * Update students
 * 
 */
function updateStudent($id, $name, $profile, $email, $age)
{
    $conn = db();
    $st = $conn->prepare("UPDATE student SET name = :newName, age = :age, email = :email, profile = :profile WHERE id = :id");
    $st->bindParam(':id', $id);
    $st->bindParam(':newName', $name);
    $st->bindParam(':age', $age);   
    $st->bindParam(':email', $email);
    $st->bindParam(':profile', $profile);
    $st->execute();
    // selectAllStudents();
}