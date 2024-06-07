<?php
class Student {
    public $name;
    public $marks;

    public function __construct($name, $marks) {
        $this->name = $name;
        $this->marks = $marks;
    }

    public function getGrade() {
        if ($this->marks >= 90) {
            return 'A';
        } elseif ($this->marks >= 80) {
            return 'B';
        } elseif ($this->marks >= 70) {
            return 'C';
        } elseif ($this->marks >= 60) {
            return 'D';
        } else {
            return 'F';
        }
    }
}

$students = [
    new Student('Alice', 95),
    new Student('Bob', 85),
    new Student('Charlie', 72),
    new Student('Dave', 60),
    new Student('Eve', 55)
];

foreach ($students as $student) {
    echo $student->name . " has received grade: " . $student->getGrade() . "\n";
}
?>
