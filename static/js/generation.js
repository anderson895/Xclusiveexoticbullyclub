$(document).ready(function () {
    const dogId = getUrlParameter('dog_id');

    if (dogId) {
        $.ajax({
            url: "controller/admin/end-points/controller.php",
            type: 'GET',
            data: { dog_id: dogId, requestType: "fetch_dogs_generation" },
            dataType: 'json',
            success: function (response) {
                if (response.status === 200) {
                    const data = response.data;

                   

                    $('#result_dog_name').text(data.main_dog_name ?? 'Unknown');
                    updateImageOrIcon('#result_dog_image', data.main_dog_image);
                    updateDog('father', data.father_name, data.father_image, data.father_dog_id);
                    updateDog('mother', data.mother_name, data.mother_image, data.mother_dog_id);

                    updateDog('grandfather1', data.grandfather1_name, data.grandfather1_image, data.grandfather1_dog_id);
                    updateDog('grandmother1', data.grandmother1_name, data.grandmother1_image, data.grandmother1_dog_id);
                    updateDog('grandfather2', data.grandfather2_name, data.grandfather2_image, data.grandfather2_dog_id);
                    updateDog('grandmother2', data.grandmother2_name, data.grandmother2_image, data.grandmother2_dog_id);

                    updateDog('ggfather1', data.ggfather1_name, data.ggfather1_image, data.ggfather1_dog_id);
                    updateDog('ggmother1', data.ggmother1_name, data.ggmother1_image, data.ggmother1_dog_id);
                    updateDog('ggfather2', data.ggfather2_name, data.ggfather2_image, data.ggfather2_dog_id);
                    updateDog('ggmother2', data.ggmother2_name, data.ggmother2_image, data.ggmother2_dog_id);
                    updateDog('ggfather3', data.ggfather3_name, data.ggfather3_image, data.ggfather3_dog_id);
                    updateDog('ggmother3', data.ggmother3_name, data.ggmother3_image, data.ggmother3_dog_id);
                    updateDog('ggfather4', data.ggfather4_name, data.ggfather4_image, data.ggfather4_dog_id);
                    updateDog('ggmother4', data.ggmother4_name, data.ggmother4_image, data.ggmother4_dog_id);

                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", error);
            }
        });
    }

    function getUrlParameter(name) {
        const url = new URL(window.location.href);
        return url.searchParams.get(name);
    }

  function updateImageOrIcon(selector, imagePath, targetDogId) {
    const $img = $(selector);
    const $existingIcon = $img.siblings('.material-icons');

    if ($existingIcon.length) {
        $existingIcon.remove();
    }

    $img.off('click');

    if (imagePath && imagePath.trim() !== '') {
        $img.attr('src', 'static/upload/' + imagePath)
            .addClass('cursor-pointer hover:scale-105 transition-transform duration-200')
            .show();

        // ✅ Click image to go to generation.php?dog_id=targetDogId
        if (targetDogId) {
            $img.on('click', function () {
                window.location.href = 'generation.php?dog_id=' + targetDogId;
            });
        }

    } else {
        $img.hide().after(`
            <span class="material-icons text-yellow-500 text-5xl cursor-pointer hover:text-yellow-600 transition-colors duration-200 icon-${selector.replace('#', '')}">
                pets
            </span>
        `);

        // ✅ Click icon to go to generation.php?dog_id=targetDogId
        if (targetDogId) {
            $(`.icon-${selector.replace('#', '')}`).on('click', function () {
                window.location.href = 'generation.php?dog_id=' + targetDogId;
            });
        }
    }
}




    function updateDog(id, name, image, actualDogId) {
        const imgSelector = '#' + id;
        const labelSelector = $(imgSelector).next('span');

        labelSelector.text(name ?? 'UNKNOWN');

        // 👇 Pass real dog ID to updateImageOrIcon
        updateImageOrIcon(imgSelector, image, actualDogId);

        // Optional: keep modal logic if needed
        $(imgSelector).parent().off('click').on('click', function () {
            const altValue = $(imgSelector).attr('alt');

            $('#dogRole').val(id);
            $('#dogName').val(labelSelector.text());
            $('#dogImage').val('');
            $('#generation').text(altValue);

            openModal();
        });
    }


    
});

