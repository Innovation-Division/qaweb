<style>
    /* Upload Button Container */
    .upload-button-container {
        width: fit-content;
        height: 54px;
        display: flex;
        padding: 15px;
        align-items: center;
        gap: 15px;
        border-radius: 5px;
        background: var(--Primary-Pink, #E4509A);
        cursor: pointer;
        user-select: none;
    }

    /* Upload Icon */
    .upload-icon {
        width: auto;
        height: 24px; /* Adjust the icon size as per your preference */
        object-fit: contain;
    }

    /* Upload Text */
    .upload-text {
        color: var(--Primary-White, #FFF);
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px; /* 150% */
    }

    /* Optional: Hover Effect */
    .upload-button-container:hover {
        background-color: #d23b81; /* A lighter shade of the background color */
    }
</style>

<!-- Dynamic Upload Button -->
<div id="{{ $id }}" class="upload-button-container">
    <!-- Upload Icon -->
    <img src="{{ asset('assets/icons/Icon-Upload.svg') }}" alt="Upload Icon" class="upload-icon">
    
    <span class="upload-text">{{ $slot }}</span>
</div>
