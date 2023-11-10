
const form = document.querySelector('form');
const submitbtn = document.querySelector('.btn');
const error = document.querySelector('.error');

form.onsubmit = (e) =>{
    e.preventDefault();
}

submitbtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST",'./includes/login.inc.php',true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "Login Successful"){
                    location.href = "./index.php";
                }else{
                    error.innerHTML = "<i>" + data + "</i>";
                    error.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}