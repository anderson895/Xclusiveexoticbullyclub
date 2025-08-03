 $(document).ready(function () {
    $("#addEventBtn").click(function (e) { 
        e.preventDefault();
        $("#addEventModal").fadeIn();
    });

     $("#closeAddPageantModal").click(function (e) { 
        e.preventDefault();
        $("#addEventModal").fadeOut();
    });



// ALL REQUEST


    $(document).on('click', '.removeBtn', function(e) {
        e.preventDefault();
        var event_id = $(this).data('event_id');
        var event_name = $(this).data('event_name');
        console.log(event_id);
    
        Swal.fire({
            title: `Are you sure to Remove <span style="color:red;">${event_name}</span> ?`,
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, remove it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../controller/admin/end-points/controller.php",
                    type: 'POST',
                    data: { event_id: event_id, requestType: 'removeEvents' },
                    dataType: 'json', 
                    success: function(response) {
                      console.log(response);
                        if (response.status === 200) {
                            Swal.fire(
                                'Removed!',
                                response.message, 
                                'success'
                            ).then(() => {
                                location.reload(); 
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message, 
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'There was a problem with the request.',
                            'error'
                        );
                    }
                });
            }
        });
    });



    $('#frmAddEvent').on('submit', function(e) {
        e.preventDefault();

        var eventName = $('#eventName').val().trim();
        if (!eventName) {
            alertify.error("Please enter event name.");
            return;
        }

        var description = $('#eventDescription').val().trim();
        if (!description) {
            alertify.error("Please enter event description.");
            return;
        }

        var banner = $('#eventBanner').val();
        if (!banner) {
            alertify.error("Please upload an image banner.");
            return;
        }

        var eventDate = $('#eventDate').val();
        if (!eventDate) {
            alertify.error("Please enter event date.");
            return;
        }

        var eventTime = $('#eventTime').val();
        if (!eventTime) {
            alertify.error("Please enter event time.");
            return;
        }

        $('.spinner').show();
        $('#frmAddEvent button[type="submit"]').prop('disabled', true);

        var formData = new FormData(this);
        formData.append('requestType', 'AddEvent');

        $.ajax({
            type: "POST",
            url: "../controller/admin/end-points/controller.php",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
            $('.spinner').hide();
            $('#frmAddEvent button[type="submit"]').prop('disabled', false);

            if (response.status === 200) {
                Swal.fire('Success!', response.message, 'success').then(() => {
                window.location.href = 'events';
                });
            } else {
                Swal.fire('Error', response.message || 'Something went wrong.', 'error');
            }
            }
        });
        });





        
   $.ajax({
    url: "../controller/admin/end-points/controller.php",
    method: "GET",
    data: { requestType: "fetch_all_events" },
    dataType: "json",
    success: function (res) {
        if (res.status === 200) {
            let count = 1;

            // Clear previous content (optional)
            $('#eventTableBody').empty();

            // Check if there is data
            if (res.data.length > 0) {
                res.data.forEach(event => {

                    const time24 = event.event_time; // e.g., "14:30"
                    const formattedTime = formatTo12Hour(time24);


                    $('#eventTableBody').append(`
                        <tr class="hover:bg-[#2B2B2B] transition-colors">
                            <td class="p-3 text-center font-mono">${count++}</td>
                            <td class="p-3 text-center font-mono">${event.event_name}</td>
                            <td class="p-3 text-center font-semibold">${event.event_description}</td>
                            <td class="p-3 text-center font-semibold">${event.event_date}</td>
                            <td class="p-3 text-center font-semibold">${formattedTime}</td>

                            <!-- Banner Image Column -->
                            <td class="p-3">
                                <div class="flex justify-center items-center">
                                    <img src="../static/upload/${event.event_banner}" alt="Banner" class="w-20 h-12 object-cover rounded" />
                                </div>
                            </td>

                            <td class="p-3 text-center">
                                <button class="viewDetailsBtn bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded text-xs font-semibold transition"
                                data-event_id='${event.event_id}'>Details</button>
                                <button class="removeBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold transition"
                                data-event_id='${event.event_id}'
                                data-event_name='${event.event_name}'>Remove</button>
                            </td>
                            </tr>

                    `);
                });
            } else {
                $('#eventTableBody').append(`
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-400 italic">
                            No record found
                        </td>
                    </tr>
                `);
            }
        }
    }
});



  // Search filter
  $('#searchInput').on('input', function () {
    const term = $(this).val().toLowerCase();
    $('#eventTableBody tr').each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(term));
    });
  });

});




// FUNCTIONS
function formatTo12Hour(time24) {
  const [hour, minute] = time24.split(':');
  const h = parseInt(hour);
  const suffix = h >= 12 ? 'PM' : 'AM';
  const hour12 = ((h + 11) % 12 + 1); // converts 0–23 to 1–12
  return `${hour12}:${minute} ${suffix}`;
}
