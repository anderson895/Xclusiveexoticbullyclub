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
                dogSelect.empty(); // clear previous options
                dogSelect.append('<option value="">-- Select Dog --</option>');

                response.data.forEach(function(dog) {
                    const option = $("<option>")
                        .val(dog.dog_id)
                        .text(dog.dog_name);
                    dogSelect.append(option);
                });

                // Initialize Select2 after options are loaded
                dogSelect.select2({
                    placeholder: "-- Select Dog --",
                    width: '100%',
                    allowClear: true
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

                   

                    $('#result_dog_name').text(data.main_dog_name ?? '');

                    $('.dog_code').text(data.dog_code ?? 'N/A');

                    updateImageOrIcon('#result_dog_image', data.main_dog_image);
                    updateImageOrIcon('#result_dog_banner', data.main_dog_banner);
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

  
    function updateImageOrIcon(selector, imagePath, targetDogId) {
            const $img = $(selector);
            $img.off('click'); // Remove previous click handlers

            if (imagePath && imagePath.trim() !== '') {
                $img.attr('src', '../static/upload/' + imagePath)
                    .addClass('cursor-pointer hover:scale-105 transition-transform duration-200')
                    .show();
            } else {
                // 👇 Use default.png if imagePath is empty or invalid
                $img.attr('src', '../static/assets/icons/default.png')
                    .addClass('bg-yellow-400 cursor-pointer hover:scale-105 transition-transform duration-200')
                    .show();
            }

            // ✅ Apply click event if dog ID is available
            if (targetDogId) {
                $img.on('click', function () {
                    window.location.href = 'generation?dog_id=' + targetDogId;
                });
            }
    }

    function updateDog(id, name, image,genid) {
        const imgSelector = '#' + id;
        const labelSelector = $(imgSelector).next('span');
        labelSelector.text(name ?? '');
        updateImageOrIcon(imgSelector, image);
    
            $(imgSelector).parent().off('click').on('click', function () {

            const altValue = $(imgSelector).attr('alt');

            $('#dogRole').val(id);
            $('#dogName').val(labelSelector.text());
            $('#dogImage').val('');
            $('#generation').text(altValue);

            $("#gen_dog_id").val(genid);


           
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

        let registeredDog = $("#registeredDog").val();
        let dogName = $("#dogName").val();
        let dogImage = $("#dogImage").val(); // This is a file input
        let dogType = $("#dogType").val();

        if (dogType === "registered") {
            if (!registeredDog) {
                alertify.error("Please select a registered dog.");
                return;
            }
        } else if (dogType === "not_registered") {
            if (!dogName || dogName.trim() === "") {
                alertify.error("Please enter a dog name.");
                return;
            }

            if (!dogImage) {
                alertify.error("Please upload a dog image.");
                return;
            }
        }



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







    
