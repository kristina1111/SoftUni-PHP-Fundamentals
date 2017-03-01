$(document).ready(function () {
    addInputForStudentInfo();
});

function addInputForStudentInfo() {
    var counter = 0;
    $('#form').on('click', '.addButton', function() {
        counter++;
        var $template = $('#template'),
            $clone    = $template
                .clone()
                .removeAttr('id')
                .attr('data-book-index', counter)
                .insertBefore($template);

        // Update the name attributes
        $clone
            .find('[name="number"]').attr('name', 'number-' + counter).end()
    })

    // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row  = $(this).parents('.input-container'),
                index = $row.attr('data-book-index');

            // Remove element containing the fields
            $row.remove();
        });
}