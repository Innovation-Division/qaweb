@props([
    'image' => '', // Path to the image
    'title' => '', // Card title
    'description' => '', // Card description
    'buttonText' => 'Click Me', // Button text (default value)
    'id' => 'default-id', // Button ID (default value)
    'dataTarget' => '', // Optional data-target attribute
    'onclick' => '', // Optional onclick event handler
    'disabled' => false, // Whether the button is disabled
])

<style>
    .card-container {
        width: 332px !important;
        height: 564px !important;
        min-width: 332px;
        max-width: 332px;
        min-height: 564px;
        max-height: 564px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        padding: 20px;
        border-radius: 5px;
        border: 1px solid #C0E6E6;
        background: #FFF;
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
        overflow: hidden;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .card-container:hover {
        background-color: #F0FAFF;
        border-color: #008080;
    }

    .card-image {
        width: 292px !important;
        height: 300px !important;
        border-radius: 5px;
        background: lightgray 50% / cover no-repeat;
        object-fit: cover;
        flex-shrink: 0;
        display: block;
    }

    .card-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 100%;
        flex-grow: 1;
    }

    .card-title {
        color: #2D2727;
        font-size: 23px;
        font-weight: 700;
        line-height: normal;
        margin: 10px 0;
    }

    .card-description {
        color: #585858;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 500;
        line-height: 24px;
        margin: 10px 0;
        text-align: justify;
    }

    .card-button-container {
        width: 100%;
        margin-top: auto;
    }

    /* Hover Effect for Secondary Button */
    .card-container:hover .secondary-btn {
        background-color: #008080;
        color: white;
        border: 1px solid #008080;
    }

    /* Ensure active state still applies when the button is clicked */
    .card-container:hover .secondary-btn:active,
    .card-container:hover .secondary-btn:focus {
        background-color: #60B3B3 !important;
        color: white !important;
        border: 1px solid #60B3B3 !important;
    }

    /* Media Queries for Responsiveness */
    
</style>

<div class="card-container">
    <!-- Fixed Image -->
    <img src="{{ asset('assets/' . $image) }}" alt="Image" class="card-image">

    <!-- Card Content -->
    <div class="card-content">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-description">{{ $description }}</p>

        <!-- Dynamic Secondary Button -->
        <div class="card-button-container">
            <x-buttons.secondary-button
                :id="$id"
                :data-target="$dataTarget"
                :onclick="$onclick"
                :disabled="$disabled"
                class="secondary-button"
            >
                {{ $buttonText }}
            </x-buttons.secondary-button>
        </div>
    </div>
</div>