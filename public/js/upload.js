// Adiciona a imagem e o input hidden com o nome da imagem no drag and drop
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

// Recupera o código base 64 que servira como "src" para o thumb da imagem exibido no drag and drop
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