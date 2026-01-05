<div class="uploaded-file-container" id="{{ $id }}">
    <div class="file-details">
        <div class="file-info">
            <img src="{{ asset('assets/icons/Icon-Image.svg') }}" alt="File Icon" class="file-icon">
            <div class="file-meta">
                <span class="file-name">No file uploaded</span>
                <span class="file-size">0 KB</span>
            </div>
        </div>
        <div class="file-actions">
            <x-buttons.primary-button id="view-file">View</x-primary-button>
            <x-buttons.danger-lined-button id="delete-file">Delete</x-danger-lined-button>
        </div>
    </div>
</div>

<style>
.uploaded-file-container {
    width: 100%;
    height: 116px;
    display: flex;
    padding: 30px 20px;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 10px;
}

.file-details {
    display: flex;
    align-items: center;
    gap: 166px;
    align-self: stretch;
}

.file-info {
    display: flex;
    align-items: flex-start;
    gap: 27px;
}

.file-icon {
    width: 24px;
    height: 24px;
}

.file-meta {
    display: flex;
    width: 271px;
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
}

.file-name {
    color: var(--Primary-Black, #2D2727);
    font-family: Inter, sans-serif;
    font-size: 16px;
    font-weight: 700;
    line-height: 24px;
}

.file-size {
    color: var(--Surfaces-LVL-5, #848A90);
    font-family: Inter, sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 24px;
}

.file-actions {
    display: flex;
    align-items: center;
    gap: 20px;
}
</style>

<script>

</script>