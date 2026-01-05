<!-- resources/views/components/reminder-update-profile.blade.php -->
<style>
.reminder-container {
    background-color: #FFF9EC;
    display: flex;
    align-items: center; /* Aligns icon & text properly */
    gap: 20px; /* Increases spacing between icon and text */
    padding: 16px;
    max-width: 705px;
}

.icon-container {
    flex-shrink: 0; /* Prevents icon from shrinking */
    width: 24px; 
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-container img {
    width: 24px;
    height: 24px;
}

.reminder-content {
    flex: 1; /* Allows text to take up remaining space */
    color: #303030;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 24px;
    word-break: break-word; /* Ensures text wraps properly */
}

</style>

<div class="reminder-container">
    <!-- Fixed 24x24 SVG Icon -->
    <div class="icon-container">
        <img src="{{ asset('assets/icons/Icon-Lightbulb.svg') }}" alt="Lightbulb" />
    </div>

    <!-- Right Content -->
    <div class="reminder-content">
        Your personal information is automatically entered in the form. If you need to update your information, go to Profile &gt; Personal Information.
    </div>
</div>
