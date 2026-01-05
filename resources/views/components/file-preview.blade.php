@props(['id', 'buttonText' => 'Upload']) <!-- Add a prop for button text -->

<div id="upload-section-{{ $id }}">
    <x-buttons.upload-button id="uploadButton-{{ $id }}">
        {{ $buttonText }} <!-- Use the buttonText prop -->
    </x-buttons.upload-button>
    <input type="file" id="fileInput-{{ $id }}" class="d-none"  accept="image/*">
</div>

<!-- New file-preview component -->
<div class="file-preview-container d-none" id="filePreview-{{ $id }}">
    <div class="file-preview-content">
        <div class="file-info-container">
            <div class="file-icon-container">
                <img src="{{ asset('assets/icons/Icon-Image.svg') }}" alt="File Icon" class="file-icon">
                <div class="file-details-container">
                    <span class="file-name" id="fileName-{{ $id }}">No file uploaded</span>
                    <span class="file-size" id="fileSize-{{ $id }}">0 KB</span>
                </div>
            </div>
        </div>
        <div class="file-actions-container">
            <x-buttons.primary-button id="viewFile-{{ $id }}">View</x-buttons.primary-button>
            <x-buttons.danger-lined-button id="deleteFile-{{ $id }}">Delete</x-buttons.danger-lined-button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const uploadButton = $('#uploadButton-{{ $id }}');
        const fileInput = $('#fileInput-{{ $id }}');
        const filePreview = $('#filePreview-{{ $id }}');
        const fileName = $('#fileName-{{ $id }}');
        const fileSize = $('#fileSize-{{ $id }}');
        const viewFileButton = $('#viewFile-{{ $id }}');
        const deleteFileButton = $('#deleteFile-{{ $id }}');

        // Trigger file input when upload button is clicked
        uploadButton.on('click', function(e) {
            e.preventDefault();
            fileInput.trigger('click');
        });

        // Handle file input change
        // fileInput.off('change').on('change', function() {
        //     const file = this.files[0]; // Get the selected file
        //     if (file) {
        //         // Validate file size
        //         if (file.size > 5120) {
        //             alert('File size must not exceed 5MB.');
        //             fileInput.val(""); 
        //             deleteFileButton.trigger('click');
        //             return;
        //         }

        //         // Truncate file name while preserving the extension
        //         const maxLength = 20; // Maximum number of characters to display (excluding extension)
        //         const fileNameFull = file.name;
        //         const fileExtension = fileNameFull.split('.').pop(); // Get the file extension
        //         const fileNameWithoutExtension = fileNameFull.slice(0, -(fileExtension.length + 1)); // Remove extension
        //         const truncatedFileName = fileNameWithoutExtension.slice(0, maxLength) + (fileNameWithoutExtension.length > maxLength ? '...' : '') + '.' + fileExtension;

        //         // Update file details
        //         fileName.text(truncatedFileName); // Use truncated file name
        //         fileSize.text((file.size / 1024).toFixed(2) + ' KB');

        //         // Show the file preview and hide the upload button
        //         filePreview.removeClass('d-none');
        //         uploadButton.parent().addClass('d-none');

        //         // Handle view file button click
        //         viewFileButton.off('click').on('click', function() {
        //             const fileURL = URL.createObjectURL(file);
        //             window.open(fileURL, '_blank');
        //         });

        //         // Handle delete file button click
        //         deleteFileButton.off('click').on('click', function(e) {
        //             e.preventDefault();
        //             fileInput.val(''); // Clear the file input
        //             filePreview.addClass('d-none'); // Hide the file preview
        //             uploadButton.parent().removeClass('d-none'); // Show the upload button
        //             fileName.text('No file uploaded'); // Reset file name
        //             fileSize.text('0 KB'); // Reset file size
        //         });
        //     }
        // });
    });
</script>

<style>
    .file-preview-container {
        width: 100%;
        height: auto;
        display: flex;
        padding: 30px 20px;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        gap: 10px;
        align-self: stretch;
        border-radius: 10px;
        background: #ECF5FA;
    }

    .file-preview-content {
        display: flex;
        align-items: center;
        gap: 166px;
        align-self: stretch;
    }

    .file-icon-container {
        display: flex;
        align-items: flex-start;
        gap: 27px;
    }

    .file-details-container {
        display: flex;
        width: 271px;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .file-name {
        align-self: stretch;
        color: #2D2727;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px;
        white-space: nowrap; 
        overflow: hidden;
        text-overflow: ellipsis; 
        max-width: 200px; 
    }

    .file-size {
        align-self: stretch;
        color: #848A90;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
    }

    .file-actions-container {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .file-icon {
        width: 24px;
        height: 24px;
        object-fit: fill;
    }

    @media (max-width: 1280px) {
        .file-preview-content {
            flex-direction: column; 
            align-items: center; 
            gap: 15px; 
        }

        .file-actions-container {
            justify-content: center; 
            gap: 10px; 
        }
    }
</style>