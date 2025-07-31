$(document).ready(function () {
    const dogId = getUrlParameter('dog_id');





    // TO FETCH DROPDOWN BULLIES
    $.ajax({
        url: "../controller/admin/end-points/controller.php",
        type: "GET",
        data: {
            requestType: "fetch_all_registered_dogs_once",
            dogId: dogId,
        },
        dataType: "json",
        success: function(response) {
          
                const dogSelect = $("#registeredDog");
                response.data.forEach(function(dog) {
                        const option = $("<option>")
                            .val(dog.dog_id)
                            .text(dog.dog_name);
                        dogSelect.append(option);
                });
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
        }
    });





    if (dogId) {
        $.ajax({
            url: "../controller/admin/end-points/controller.php",
            type: 'GET',
            data: { dog_id: dogId, requestType: "fetch_dogs_generation" },
            dataType: 'json',
            success: function (response) {
                if (response.status === 200) {
                    const data = response.data;

                   

                    $('#result_dog_name').text(data.main_dog_name ?? 'Unknown');
                    updateImageOrIcon('#result_dog_image', data.main_dog_image);
                    updateDog('father', data.father_name, data.father_image,data.gen_dog_id);
                    updateDog('mother', data.mother_name, data.mother_image,data.gen_dog_id);
                    updateDog('grandfather1', data.grandfather1_name, data.grandfather1_image,data.gen_dog_id);
                    updateDog('grandmother1', data.grandmother1_name, data.grandmother1_image,data.gen_dog_id);
                    updateDog('grandfather2', data.grandfather2_name, data.grandfather2_image,data.gen_dog_id);
                    updateDog('grandmother2', data.grandmother2_name, data.grandmother2_image,data.gen_dog_id);
                    updateDog('ggfather1', data.ggfather1_name, data.ggfather1_image,data.gen_dog_id);
                    updateDog('ggmother1', data.ggmother1_name, data.ggmother1_image,data.gen_dog_id);
                    updateDog('ggfather2', data.ggfather2_name, data.ggfather2_image,data.gen_dog_id);
                    updateDog('ggmother2', data.ggmother2_name, data.ggmother2_image,data.gen_dog_id);
                    updateDog('ggfather3', data.ggfather3_name, data.ggfather3_image,data.gen_dog_id);
                    updateDog('ggmother3', data.ggmother3_name, data.ggmother3_image,data.gen_dog_id);
                    updateDog('ggfather4', data.ggfather4_name, data.ggfather4_image,data.gen_dog_id);
                    updateDog('ggmother4', data.ggmother4_name, data.ggmother4_image,data.gen_dog_id);
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

   function updateImageOrIcon(selector, imagePath) {
            const $img = $(selector);
            const $existingIcon = $img.siblings('.material-icons');

            if ($existingIcon.length) {
                $existingIcon.remove();
            }

            if (imagePath && imagePath.trim() !== '') {
                $img.attr('src', '../static/upload/' + imagePath)
                    .addClass('cursor-pointer hover:scale-105 transition-transform duration-200')
                    .show();
            } else {
                $img.hide().after(`
                    <span class="material-icons text-yellow-500 text-5xl cursor-pointer hover:text-yellow-600 transition-colors duration-200">
                        pets
                    </span>
                `);
            }
        }


    function updateDog(id, name, image,genid) {
        const imgSelector = '#' + id;
        const labelSelector = $(imgSelector).next('span');
        labelSelector.text(name ?? 'UNKNOWN');
        updateImageOrIcon(imgSelector, image);
    
            $(imgSelector).parent().off('click').on('click', function () {

            const altValue = $(imgSelector).attr('alt');

            $('#dogRole').val(id);
            $('#dogName').val(labelSelector.text());
            $('#dogImage').val('');
            $('#generation').text(altValue);

            $("#gen_dog_id").val(genid);


            console.log(id);
            openModal();
        });
    }

    
});




$(document).ready(function () {
  $('#dogType').on('change', function () {
    const value = $(this).val();
    if (value === 'registered') {
        
      $('#registeredSection').removeClass('hidden');
      $('#notRegisteredSection').addClass('hidden');
    } else {
      $('#registeredSection').addClass('hidden');
      $('#notRegisteredSection').removeClass('hidden');
    }
  });
});

function openModal() {
    
  $('#dogModal').removeClass('hidden').addClass('flex');
}

function closeModal() {
  $('#dogModal').removeClass('flex').addClass('hidden');
}




$('#updateGenForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        formData.append("requestType", "updateGenForm");

        $.ajax({
            url: "../controller/admin/end-points/controller.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
            if (response.status === 200) {
                Swal.fire('Success!', response.message || 'Dog info updated.', 'success').then(() => {
                    location.reload();
                });
            } else {
                alertify.error(response.message || "Error updating dog info.");
            }
            },
            error: function (xhr, status, error) {
            console.error("Update error:", error);
            alertify.error("Failed to update dog info. Please try again.");
            }
        });
    });







    
