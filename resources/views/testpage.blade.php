<input type="file" accept="image/jpeg, image/jpg, image/png">

<img id="img" style="max-height: 300px">

<script>
    let input = document.querySelector("input[type=file]")
    let reader = new FileReader()
    let file
    let value
    let event

    input.addEventListener("change", function(){
        value = this.value
        file = this.files[0]
        console.log("file: ", file);

        reader.readAsDataURL(file)
        console.log("reader: ", reader)

        reader.onload = function(e){
            event = e
            console.log("event: ", event)
            let result = event.target.result
            console.log("result: ", result)
            img.src = result
        }


    })
</script>
