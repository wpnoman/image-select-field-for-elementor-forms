(function ($) {
    "use strict";

    $(document).ready(function () {

        $("[data-isfef-modernize]").each(function () {
            var $form = $(this);
            var imageSelectFields = $form.data("isfef-modernize");
            console.log(imageSelectFields)
            if (imageSelectFields == true) {
                // Add class to the form for modernizing radio and checkbox styles
                $form.addClass('isfef-modernize-radio-checkbox');
            }
        });

        $("[data-isfef-images]").each(function () {

            var $form = $(this);
            var imageSelectFields = $form.data("isfef-images");

            // Loop through each image select field configuration
            for (var i = 0; i < imageSelectFields.length; i++) {
                var fieldData = imageSelectFields[i];

                var fieldId = fieldData.isfeforms_image_select_id;

                var select = '.elementor-field-group-' + fieldId
                var gallery = fieldData.isfeforms_image_gallery;
                var images = gallery.map(item => item.url)
                addImageSelectElementor(select, images);
            }
        });

        function addImageSelectElementor(selector, images) {
            const field = document.querySelector(selector);
            if (!field) return;

            // add class
            $(selector).addClass('isfef-image-select');
            const options = field.querySelectorAll('.elementor-field-option');


            options.forEach((option, index) => {
                const input = option.querySelector('input');
                const label = option.querySelector('label');

                if (images[index]) {
                    const img = document.createElement('img');
                    const label_span = document.createElement('span');
                    img.src = images[index];
                    img.alt = label.innerText;
                    label_span.innerText = label.innerText;

                    label.innerHTML = ''; // clear original text
                    label.appendChild(img);
                    label.appendChild(label_span);
                }
            });

        }

    });
}(jQuery));