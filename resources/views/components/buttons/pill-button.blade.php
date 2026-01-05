<style>
    .pill-buttons-container {
        display: flex;
        align-items: center;
        gap: 17px;
        width: 100%; 
    }

    .pill-button {
        display: flex;
        width: auto;
        min-width: 0;
        flex: 1;
        padding: 10px 25px;
        justify-content: center;
        align-items: center;
        border-radius: 25px;
        border: 1px solid #E4509A;
        background: transparent;
        color: #E4509A;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap; 
        text-overflow: ellipsis; 
        overflow: hidden; 
    }

    .pill-button:hover {
        background: #E4509A;
        color: white;
        box-shadow: 1px 3px 4px 0px rgba(203, 161, 182, 0.86);
    }

    .check-circle-icon {
        display: none;
        width: 24px;
        height: 24px;
        margin-right: 10px;
    }

    .pill-button.expanded {
        background: #E4509A;
        color: white;
    }

    .pill-button.expanded .check-circle-icon {
        display: inline-block;
    }

    @media (max-width: 1280px) {
    .pill-buttons-container {
        flex-direction: column;
        gap: 15px; 
    }
    
    .pill-button {
        width: 100%; 
    }
}
</style>

<div class="pill-buttons-container">
    <button class="pill-button" id="{{ $idOne ?? 'pill-one' }}" onclick="togglePill('{{ $idOne ?? 'pill-one' }}', '{{ $idTwo ?? 'pill-two' }}')">
        <img src="{{ asset('assets/icons/Icon-CheckCircle.svg') }}" class="check-circle-icon" alt="Check Icon">
        <span class="button-text">{{ $pillOneText }}</span>
    </button>

    <button class="pill-button" id="{{ $idTwo ?? 'pill-two' }}" onclick="togglePill('{{ $idTwo ?? 'pill-two' }}', '{{ $idOne ?? 'pill-one' }}')">
        <img src="{{ asset('assets/icons/Icon-CheckCircle.svg') }}" class="check-circle-icon" alt="Check Icon">
        <span class="button-text">{{ $pillTwoText }}</span>
    </button>
</div>

<script>
    function togglePill(selectedId, otherId) {
        let selected = document.getElementById(selectedId);
        let other = document.getElementById(otherId);

        if (selected && other) {
            selected.classList.add('expanded');
            other.classList.remove('expanded');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        let pillButtonState = sessionStorage.getItem("pillButtonState");
        if (pillButtonState) {
            togglePill(pillButtonState === "yes" ? '{{ $idTwo ?? 'pill-two' }}' : '{{ $idOne ?? 'pill-one' }}', pillButtonState === "yes" ? '{{ $idOne ?? 'pill-one' }}' : '{{ $idTwo ?? 'pill-two' }}');
        } else {
            togglePill('{{ $idTwo ?? 'pill-two' }}', '{{ $idOne ?? 'pill-one' }}');
        }
    });
</script>
