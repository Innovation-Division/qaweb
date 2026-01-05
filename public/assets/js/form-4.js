$(document).ready(function () {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    let selectedFiles = {};

    // Retrieve the policyholder_id from sessionStorage
    const policyholderId = sessionStorage.getItem("policyholder_id");

    if (!policyholderId) {
        console.error("No policyholder_id found in sessionStorage.");
        //return;
    }

    // Set the policyholder_id in the hidden input field
    $('#policyholder_id').val(policyholderId);

    // Debugging: Log the policyholder_id
    // console.log('Policyholder ID:', policyholderId);

    function initializeFileUpload(id) {
        const uploadButton = $(`#uploadButton-${id}`);
        const fileInput = $(`#fileInput-${id}`);
        const filePreview = $(`#filePreview-${id}`);
        const fileName = $(`#fileName-${id}`);
        const fileSize = $(`#fileSize-${id}`);
        const viewFileButton = $(`#viewFile-${id}`);
        const deleteFileButton = $(`#deleteFile-${id}`);

        uploadButton.on('click', function (e) {
            e.preventDefault();
            fileInput.trigger('click');
        });

        fileInput.on('change', function (e) {
            e.preventDefault();
            const file = this.files[0];
            if (file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Only image files are allowed.');
                    fileInput.val(""); 
                    deleteFileButton.trigger('click');
                    return;
                }

                // Validate file size (15KB - 5MB)
                //alert(file.size);
                if (file.size > 5242880) {
                    alert(file.size);
                    alert('File size must not exceed 5MB');
                    fileInput.val(""); 
                    deleteFileButton.trigger('click');
                    return;
                }

                selectedFiles[id] = file;

                // Truncate file name while preserving extension
                const maxLength = 20;
                const fileNameFull = file.name;
                const fileExtension = fileNameFull.split('.').pop();
                const fileNameWithoutExtension = fileNameFull.slice(0, -(fileExtension.length + 1));
                const truncatedFileName = fileNameWithoutExtension.slice(0, maxLength) + (fileNameWithoutExtension.length > maxLength ? '...' : '') + '.' + fileExtension;

                // Update file details
                fileName.text(truncatedFileName);
                fileSize.text((file.size / 1024).toFixed(2) + ' KB');

                // Show file preview and hide upload button
                filePreview.removeClass('d-none');
                uploadButton.parent().addClass('d-none');

                // View file
                viewFileButton.off('click').on('click', function (e) {
                    e.preventDefault();
                    const fileURL = URL.createObjectURL(file);
                    window.open(fileURL, '_blank');
                });

                // Delete file
                deleteFileButton.off('click').on('click', function (e) {
                    e.preventDefault();
                    fileInput.val('');
                    filePreview.addClass('d-none');
                    uploadButton.parent().removeClass('d-none');
                    fileName.text('No file uploaded');
                    fileSize.text('0 KB');
                    delete selectedFiles[id];
                });
            }
        });
    }

    initializeFileUpload('uploadID');
    initializeFileUpload('uploadDisplayPicture');

    $('#nextForm4').on('click', function (e) {
        e.preventDefault();
        // Create FormData object
        let formData = new FormData();

        if (selectedFiles['uploadID']) {
            formData.append('uploadID', selectedFiles['uploadID']);
        }

        if (selectedFiles['uploadDisplayPicture']) {
            formData.append('uploadDisplayPicture', selectedFiles['uploadDisplayPicture']);
        }

        let fileInput = $("#fileInput-uploadID");
        let file = fileInput[0].files[0]; // Get the selected file
        let isValid = true; // Flag for overall validation status
        let errors = []; // Array to store error messages
	console.log(fileInput);
        console.log(file);
        if (!file) {
            errors.push("No file selected!"); // Check if the file is empty
            $('#form4').hide();
            $('#form5').show();
        } else {
            let fileSize = file.size; // Get file size
            let fileType = file.type; // Get file MIME type
            let allowedTypes = ["image/jpeg", "image/jpg", "image/png", "image/tiff", "image/webp", "image/gif"]; // Only image types
            console.log('upload here');
            // Check if file size exceeds 5MB
            if (fileSize > 5 * 1024 * 1024) {
                errors.push("File size exceeds 5MB. Please select a smaller image.");
                isValid = false;
            }
            
            // Check if the file type is allowed
            if (!allowedTypes.includes(fileType)) {
                errors.push("Invalid file type! Only JPG, JPEG, PNG, TIFF, WEBP, or GIF images are allowed.");
                isValid = false;
            }
            $(".identification-title span").removeClass("is-invalid-text");
        if (!isValid) {
            //$(".identification-title span").addClass("is-invalid-text");
            // alert(errors.join("\n")); 
            fileInput.val(""); 
            return false;
        } 
        let btnloading = $(this);
        handleButtonClick.call(btnloading);

        formData.append('policyholder_id', $("input[name='hdn_id']").val()); // Use the retrieved policyholder_id

        // Send the AJAX request
        $.ajax({
            url: $('meta[name="url"]').attr("content") + "/upload-images",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': csrfToken },
            success: function (data) {
                // console.log("Upload Successful", data);
               console.log("success upload");
                $('#form4').hide();
                $('#form5').show();
                stopButtonLoading.call(btnloading);
            },
            error: function (xhr, status, error) {
                console.error("Upload Failed:", xhr.responseText);
                //alert("Upload Failed! Check the console for details.");
            }
        });
        }
        
    });


    $("#continueLaterForm4").on("click", function (e) {
        console.log(121);
        e.preventDefault(); // Prevents default action if needed
        $("#continueLaterModal").fadeIn(); // Use fadeIn() for smooth effect
        return false; // Prevents further propagation
    });
    // Back button functionality
    $('#backForm4').on('click', function (e) {
        e.preventDefault();
        $('#form4').hide();
        $('#form5').hide();
        $('#form6').hide();
        $('#form3').show();
        return false;
    });
});
