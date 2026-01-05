   <h2>Upload an Image for OCR</h2>
    <form action="{{ url('/upload-ocr') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload & Extract Text</button>
    </form>