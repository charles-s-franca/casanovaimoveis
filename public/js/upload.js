$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addNewDropzone(file, done) {
    getBase64(file, function(url){
        var li = $("<li />")
        .addClass("ui-state-default");

        var img = $("<img />")
            .attr("src", url)
            .css({
                width: "100px",
                "max-heigth": "100px"
            })
            .appendTo(li);

        li.prependTo($("#sortable"));
    })
}

// "myAwesomeDropzone" is the camelized version of the HTML element's ID
Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function (file, done) {
        addNewDropzone(file, done);
        this.removeFile(file);
    }, complete(param1, param2) {
        console.log(param1, param2);
    }
};

function getBase64(file, callback) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
        callback(reader.result);
    };
    reader.onerror = function (error) {
        console.log('Error: ', error);
    };
}

$(function () {
    $("#sortable").sortable();
    $("#sortable").disableSelection();
});

// $(document).ready(function(){
//     $("li.upload-box").dropzone({ 
//         url: url,
//         accept: function(file, done) {
//             this.removeFile(file);
//         }, success: function(){
//             // alert("foi")
//         }
//     });
// })