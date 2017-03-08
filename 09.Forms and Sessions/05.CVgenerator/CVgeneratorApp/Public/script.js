$(document).ready(function () {
    addFieldForComputerLanguages();
    addFieldForLanguages();
});

function addFieldForComputerLanguages() {
    // Add button click handler
    $('#personal-info').on('click', '.add-field-comp-language', function () {
        let template = $('.comp-skills-fieldset .multiply-programming-language-input').last(),

            clone = template
                .clone()
                .addClass('programming-lang-input');

            clone.find('input').val('');
            clone.insertAfter(template);
    })
    // Remove button click handler
        .on('click', '.remove-field-comp-language', function () {
            $('.comp-skills-fieldset .programming-lang-input').last().remove();
        })
}

function addFieldForLanguages() {
    // Add button click handler
    $('#personal-info').on('click', '.add-field-language', function () {
        let template = $('.other-skills-fieldset .multiply-language-input').last(),
            clone = template
                .clone()
                .addClass('language-input');
        clone
            .find('input').val('');

        clone
            .insertAfter(template);
    })
    // Remove button click handler
        .on('click', '.remove-field-language', function () {
            $('.other-skills-fieldset .language-input').last().remove();
        })
}






