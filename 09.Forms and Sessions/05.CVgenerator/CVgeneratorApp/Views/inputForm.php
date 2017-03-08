<form action="" method="post" id="personal-info">
    <fieldset>
        <legend>Personal information</legend>
        <section>
            <input type="text" name="firstName" placeholder="First name"/>
            <input type="text" name="lastName" placeholder="Last name"/>
            <input type="text" name="email" placeholder="Email"/>
            <input type="text" name="phoneNum" placeholder="Phone number"/>
        </section>
        <section>
            <label for="">Female</label>
            <input type="radio" name="gender" value="female"/>
            <label for="">Male</label>
            <input type="radio" name="gender" value="male"/>
        </section>
        <section>
            <label for="">Birth Date</label>
            <input type="date" name="birthday" placeholder="dd/mm/yyyy"/>
        </section>
        <section>
            <label for="">Nationality</label>
            <select name="nationality" id="">
                <?php foreach (NATIONALITY_OPTIONS as $option) : ?>
                    <option value="<?= $option; ?>"><?= ucfirst($option); ?></option>
                <?php endforeach; ?>
            </select>
        </section>
    </fieldset>
    <fieldset>
        <legend>Last work position</legend>
        <label for="">Company name</label>
        <input type="text" name="lastEmployer">
        <div>
            <label for="">From</label>
            <input type="date" name="startWithLastEmployer" placeholder="dd/mm/yyyy"/>
        </div>
        <div>
            <label for="">To</label>
            <input type="date" name="endWithLastEmployer" placeholder="dd/mm/yyyy"/>
        </div>
    </fieldset>
    <fieldset class="comp-skills-fieldset">
        <legend>Computer skills</legend>
        <label for="">Programming languages</label>
        <section id="" class="multiply-programming-language-input">
            <input type="text" name="programmingLangs[]">
            <select name="levelProgrammingLang[]" id="">
                <?php foreach (COMPUTER_SKILLS_OPTIONS as $option) : ?>
                    <option value="<?= $option; ?>"><?= ucfirst($option); ?></option>
                <?php endforeach; ?>
            </select>
        </section>
        <button type="button" class="remove-field-comp-language">Remove language</button>
        <button type="button" class="add-field-comp-language">Add language</button>
    </fieldset>
    <fieldset class="other-skills-fieldset">
        <legend>Other skills</legend>
        <label for="">Languages</label>
        <section class="multiply-language-input">
            <input type="text" name="languages[]">
            <select name="comprehension[]" id="">
                <option value="0">-Comprehension-</option>
                <?php foreach (LANGUAGE_SKILLS_OPTIONS as $option) : ?>
                    <option value="<?= $option; ?>"><?= ucfirst($option); ?></option>
                <?php endforeach; ?>
            </select>
            <select name="reading[]" id="">
                <option value="0">-Reading-</option>
                <?php foreach (LANGUAGE_SKILLS_OPTIONS as $option) : ?>
                    <option value="<?= $option; ?>"><?= ucfirst($option); ?></option>
                <?php endforeach; ?>
            </select>
            <select name="writing[]" id="">
                <option value="0">-Writing-</option>
                <?php foreach (LANGUAGE_SKILLS_OPTIONS as $option) : ?>
                    <option value="<?= $option; ?>"><?= ucfirst($option); ?></option>
                <?php endforeach; ?>
            </select>
        </section>
        <button type="button" class="remove-field-language">Remove language</button>
        <button type="button" class="add-field-language">Add language</button>
        <label for="">Driver's License</label>
        <?php foreach (DRIVERS_LICENSE_OPTIONS as $option) : ?>
        <label class="element-inline-block" for=""><?= strtoupper($option); ?></label><input type="checkbox" name="driversLicense[]" value="<?= $option; ?>">
        <?php endforeach; ?>
    </fieldset>
    <input type="submit" name="generateCV" value="Generate CV!" />
</form>