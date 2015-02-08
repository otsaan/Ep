<script type="text/javascript">

    (function () {
        var input = document.getElementById("thePhoto"),
            formdata = false;

        if (window.FormData) {
            formdata = new FormData();
            document.getElementById("btn").style.display = "none";
        }
      

        function showUploadedItem (source) {
            var img  = document.getElementById("profileImg");
            img.src = source;
        }

        if (input.addEventListener) {
            input.addEventListener("change", function (evt) {
                var i = 0, len = this.files.length, img, reader, file;
            
                document.getElementById("response").innerHTML = "Uploading . . ."
            
                for ( ; i < len; i++ ) {
                    file = this.files[i];
                    // console.log(file);
                    if (!!file.type.match(/image.*/)) {
                        if ( window.FileReader ) {
                            reader = new FileReader();
                            reader.onloadend = function (e) { 
                                showUploadedItem(e.target.result);
                            };
                            reader.readAsDataURL(file);
                        }
                        if (formdata) {
                            formdata.append("photo", file);
                        }      
                    } 
                }
                if (formdata) {
                    $.ajax({
                        url: "/modifierimg",
                        type: "POST",
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function (res) {
                          document.getElementById("response").innerHTML = ''; 
                        }
                  });
                }
                 
          }, false);
        }

            
    }());

</script>