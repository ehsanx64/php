<div class="col-xs-12">
    <!-- We are not going to use the HTML form, becuase submission is done using FormData -->
    <div class="the-form">
        <div class="file-field input-field">
            <div class="btn">
            <span>Select images</span>
            <input id="images" type="file" name="images" multiple>
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>

        <button class="btn" id="submit-formdata">Submit</button>
    </div>
</div>

<script>
window.addEventListener('load', function () {
    $("#submit-formdata").on("click", function (event) {
        event.preventDefault();
        var formData = new FormData();
        formData.append("param1", "value1");
        var files = $("#images")[0].files;
        for (var i in files) {
            formData.append("files[]", files[i]);
        }

        console.log("From data");
        console.log(formData);
        $.ajax({
            url: "/ajax/handle-formdata",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false
        });
    });
});
</script>
