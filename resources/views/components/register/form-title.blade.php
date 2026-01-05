<style>
    .title-container {
        display: flex;
        flex-direction: column;
        text-align: left;
        width: 100%;
        height: 48px;
        border-left: 3px solid var(--Secondary-Blue, #003592);
        border-radius: 2px;
    }

    .title-text {
        font-size: 23px;
        font-weight: bold;
        color: black;
        font-family: 'Inter', sans-serif;
        padding-left: 15px;
        padding-top: 10px;
    }

    @media (max-width: 1280px) {
        .title-container {
            height: auto !important;
        }

        .title-text {
            font-size: 18px;
            padding-top: 0;
            padding-left: 15px;
        }
    }
</style>

<div class="title-container">
    <h1 class="title-text">{{ $title }}</h1>
</div>
