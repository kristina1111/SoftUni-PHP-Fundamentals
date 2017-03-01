<?php
if(!isset($studentsArr)) : ?>
        <?php header("Location: /"); ?>
        <?php exit; ?>
<?php endif; ?>
<table class="add-students result-table">
    <thead>
    <tr>
        <th>First name:</th>
        <th>Second name:</th>
        <th>Email:</th>
        <th>Exam score:</th>
    </tr>
    </thead>
    <tbody>
    <?php /** @var \StudentsApp\Entities\Student $student */
    foreach($studentsArr as $student) :?>
        <tr>
            <td><?= $student->getFirstName(); ?></td>
            <td><?= $student->getSecondName(); ?></td>
            <td><?= $student->getEmail(); ?></td>
            <td><?= $student->getExamScore(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>