<!-- Icon Info Component -->
<style>
    /* Overlay - Hidden by Default */
    .info-overlay {
        display: none;
        /* Ensures it's hidden initially */
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(158, 156, 156, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1050;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Modal Container - Centered */
    .info-modal {
        display: flex;
        flex-direction: column;
        width: 393px;
        padding: 20px;
        background: white;
        border-radius: 10px;
        gap: 15px;
        position: absolute;
        /* Ensures proper centering */
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* Centers modal */
    }

    .info-title {
        color: #2D2727;
        font-family: Inter, sans-serif;
        font-size: 16px;
        font-weight: 700;
        line-height: 24px;
    }

    .info-text {
        color: #2D2727;
        font-family: Inter, sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
    }

    .info-bold {
        font-weight: 700;
    }
</style>

<!-- Info Icon -->
<img src="{{ asset('assets/icons/Icon-Info2.svg') }}" width="21" height="21" class="infoIcon" style="cursor: pointer;" alt="Info Icon">

<!-- Modal Overlay -->
<div class="info-overlay">
    <div class="info-modal">
        <div>
            <p class="info-title">BRANCH HOURS</p>
        </div>
        <div>
            <p class="info-text">Cocogen branches are open Monday to Friday, from 8AM to 5PM. Please be reminded you will be accommodated within office hours only.</p>
        </div>
        <div>
            <p class="info-text">If you have concerns regarding account creation, you may email <span class="info-bold">client_services@cocogen.com</span></p>
        </div>
        <div>
            <x-buttons.secondary-button class="closeInfo">Close</x-buttons.secondary-button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.infoIcon').forEach(function(icon) {
            icon.addEventListener('click', function() {
                const overlay = icon.closest('form').querySelector('.info-overlay');
                overlay.style.display = 'flex';
                setTimeout(() => {
                    overlay.style.opacity = 1;
                }, 10);
            });
        });

        document.querySelectorAll('.closeInfo').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const overlay = button.closest('.info-overlay');
                overlay.style.opacity = 0;
                setTimeout(() => {
                    overlay.style.display = 'none';
                }, 300);
            });
        });
    });
</script>