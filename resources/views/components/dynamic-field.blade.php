<div id="dynamic-fields">
    <label class="font-semibold text-gray-700">
        {{ $label ?? 'Enter Text' }} <span class="text-red-500">*</span>
    </label>
    
    <div class="field-group d-flex align-items-center mb-2">
        <input type="text" name="fields[]" class="border p-2 rounded w-full" placeholder="Enter text" />
        <button type="button" class="remove-btn d-none p-1 bg-red-500 rounded hover:bg-red-600 ms-2">
            <img src="{{ asset('icons/remove-icon.svg') }}" class="w-5 h-5" alt="Remove">
        </button>
        <button type="button" class="add-btn p-1 bg-green-500 rounded hover:bg-green-600 ms-2">
            <img src="{{ asset('icons/add-icon.svg') }}" class="w-5 h-5" alt="Add">
        </button>
    </div>
</div>


<script>
$(document).ready(function () {
    function updateButtons() {
        let fieldGroups = $("#dynamic-fields .field-group");
        fieldGroups.each(function (index) {
            $(this).find(".remove-btn").toggleClass("d-none", fieldGroups.length <= 1);
            $(this).find(".add-btn").toggleClass("d-none", fieldGroups.length >= 3 || index < fieldGroups.length - 1);
        });
    }

    $("#dynamic-fields").on("click", ".add-btn", function () {
        let fieldGroups = $("#dynamic-fields .field-group");
        if (fieldGroups.length < 3) {
            let newField = fieldGroups.first().clone();
            newField.find("input").val("");
            $("#dynamic-fields").append(newField);
            updateButtons();
        }
    });

    $("#dynamic-fields").on("click", ".remove-btn", function () {
        if ($("#dynamic-fields .field-group").length > 1) {
            $(this).closest(".field-group").remove();
            updateButtons();
        }
    });

    updateButtons();
});
</script>
