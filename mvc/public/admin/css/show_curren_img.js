const img_input = document.querySelector("#img_current_show")
var uploaded_image = ""
img_input.addEventListener("change", function(){
    const reader = new FileReader();
    reader.addEventListener("load", ()=>{
        uploaded_image= reader.result;
        document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image})`
    })
    reader.readAsDataURL(this.file[0]);
})