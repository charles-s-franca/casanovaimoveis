$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Adiciona a imagem ao inicio da lista
function addNewDropzone(file) {
    getBase64(file, function(imageurl){
        var li = $("<li />")
        .addClass("ui-state-default");

        var input = $("<input />")
            .attr({
                name: "images[]",
                type: "hidden"
            }).val(file.name)
            .appendTo(li);

        var img = $("<img />")
            .attr("src", imageurl)
            .css({
                width: "100px",
                "max-heigth": "100px"
            })
            .appendTo(li);

        li.prependTo($("#sortable"));
    })
}

// "myAwesomeDropzone" is the camelized version of the HTML element's ID
// Dropzone.options.myAwesomeDrop = {
//     url: url,
//     paramName: "file", // The name that will be used to transfer the file
//     maxFilesize: 2, // MB
//     accept: function (file, done) {
//         addNewDropzone(file, done);
//         this.removeFile(file);
//     }, complete(param1, param2) {
//         console.log(param1, param2);
//     }, success: function(data){
//         console.log(data);
//     }
// };

// Pega o caminho base 64 da imagem para poder adicionala ao grid
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