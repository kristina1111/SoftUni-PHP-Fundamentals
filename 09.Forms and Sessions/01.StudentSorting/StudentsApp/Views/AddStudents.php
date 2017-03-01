<form method="POST" id="form">
    <table class="add-students">
        <thead>
        <tr>
            <th>First name:</th>
            <th>Second name:</th>
            <th>Email:</th>
            <th>Exam score:</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" name="firstName[]"/></td>
            <td><input type="text" name="secondName[]"/></td>
            <td><input type="text" name="email[]"/></td>
            <td><input type="text" name="examScore[]" class="exam-score" /></td>
            <td><button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button></td>
        </tr>
        <!-- The template for adding new field -->
        <tr id="template" class="input-container">
            <td><input type="text" name="firstName[]"/></td>
            <td><input type="text" name="secondName[]"/></td>
            <td><input type="text" name="email[]"/></td>
            <td><input type="text" name="examScore[]" class="exam-score" /></td>
            <td><button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button></td>
        </tr>
        </tbody>
    </table>
    <section>
        <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
        <label for="">Sort by: </label>
        <select name="howSort" id="">
            <option value="firstName">First name</option>
            <option value="secondName">Second name</option>
            <option value="email">Email</option>
            <option value="examScore">Exam score</option>
        </select>

        <label for="">Order</label>
        <select name="howOrder" id="">
            <option value="descending">Descending</option>
            <option value="ascending">Ascending</option>
        </select>
        <input type="submit" name="submitStudentForm"/>
    </section>

</form>