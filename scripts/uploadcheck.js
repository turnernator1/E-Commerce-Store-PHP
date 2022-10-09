//Function to check input size when uploading images
//Author: Jack Turner
function validateSize(input){
    const filesize = input.files[0].size;
    if(filesize>10000){
        alert('File size exceeds 10kb');
        document.getElementById("image").value=null;



    } else {

    }
}