<?php /** @var $person \CVgeneratorApp\Entities\Person */ ?>
<section id="cv-output-container" class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-10">
    <h1>CV</h1>

    <table>
        <colgroup span="2"></colgroup>
        <thead>
        <tr>
            <th colspan="2" scope="colgroup">Personal information</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>First name</td>
            <td><?= $person->getFirstName(); ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?= $person->getLastName(); ?></td>
        </tr>
        <tr>
            <td>Emali</td>
            <td><?= $person->getEmail(); ?></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><?= $person->getPhone(); ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?= ucfirst($person->getGender()); ?></td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td><?= date_format($person->getBirthDate(), 'Y-m-d'); ?></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><?= ucfirst($person->getNationality()); ?></td>
        </tr>
        </tbody>
    </table>

    <table>
        <colgroup span="2"></colgroup>
        <thead>
        <tr>
            <th colspan="2" scope="colgroup">Last Work Position</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Company name</td>
            <td><?= $person->getLastWorkPosition()['employer']; ?></td>
        </tr>
        <tr>
            <td>From</td>
            <td><?= $person->getLastWorkPosition()['startDate']; ?></td>
        </tr>
        <tr>
            <td>To</td>
            <td><?= $person->getLastWorkPosition()['endDate']; ?></td>
        </tr>
        </tbody>
    </table>

    <table>
        <colgroup span="3"></colgroup>
        <thead>
        <tr>
            <th colspan="3" scope="colgroup">Computer Skills</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th rowspan="<?= count($person->getProgrammingLangs()) + 1 ?>">Programming languages</th>
            <th>Language</th>
            <th>Skill Level</th>
        </tr>
        <?php foreach ($person->getProgrammingLangs() as $key => $value) : ?>
            <tr>
                <td><?= $key; ?></td>
                <td><?= $value; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <table>
        <colgroup span="5"></colgroup>
        <colgroup span="1"></colgroup>
        <colgroup span="4"></colgroup>
        <thead>
        <tr>
            <th colspan="5" scope="colgroup">Other Skills</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th rowspan="<?= count($person->getLanguages()) + 1 ?>">Languages</th>
            <th>Language</th>
            <th>Comprehension</th>
            <th>Reading</th>
            <th>Writing</th>
        </tr>
        <?php foreach ($person->getLanguages() as $key => $value) : ?>
            <tr>
                <td><?= $key; ?></td>
                <?php foreach ($value as $level) : ?>
                    <td><?= $level; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Driver's license</th>
            <td colspan="4" scope="colgroup"><?= implode(', ', $person->getDriversLicense()); ?></td>
        </tr>
        </tbody>
    </table>
</section>