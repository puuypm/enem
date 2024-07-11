<?php
    require_once "com/dbconnect.php";

      $select = db()->prepare("SELECT name, email, phone FROM registrasi");
      $select->execute();
      $rowRegis = $select->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <style>
            body{
                background-color: skyblue;
            }
            h3{
                text-align : center;
                color: rgb(155, 19, 75);
            }
            .error{
                color: red;
            }
            .card{
                background-color: rgb(214, 191, 147);
                box-shadow: 0 0 5px #182918;
                width: 800px;
                margin: 50px auto;
            }
            .card-header {
                background-color: beige;
                box-shadow: 0 0 5px #182918;
            }
            form button{
                background: beige;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Validation</h3>
                        </div>
                        <div class="card-body">
                            <form action="input.php" method="post" id="form">
                            <label for="name">Name :</label><br>
                            <input type="text" id="name" name="name"><br>
                            <span id="nameError" class="error"></span><br>
                    
                            <label for="email">Email :</label><br>
                            <input type="text" id="email" name="email"><br>
                            <span id="emailError" class="error"></span><br>
                    
                            <label for="phone">Phone :</label><br>
                            <input type="text" id="phone" name="phone"><br>
                            <span id="phoneError" class="error"></span><br>
                    
                            <label for="password">Password :</label><br>
                            <input type="password" id="password" name="password"><br>
                            <span id="passwordError" class="error"></span><br>
                    
                            <label for="confirmpassword">Confirm Password :</label><br>
                            <input type="password" id="confirmpassword" name="confirmpassword"><br>
                            <span id="confirmpasswordError" class="error"></span><br>
                    
                            <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            const form = document.getElementById("form");
            const nameInput = document.getElementById("name");
            const emailInput = document.getElementById("email");
            const phoneInput = document.getElementById("phone");
            const passwordInput = document.getElementById("password");
            const confirmpasswordInput = document.getElementById("confirmpassword");
            const nameError = document.getElementById("nameError");
            const emailError = document.getElementById("emailError");
            const phoneError = document.getElementById("phoneError");
            const passwordError = document.getElementById("passwordError");
            const confirmpasswordError = document.getElementById("confirmpasswordError");

            form.addEventListener("submit", function(event) {
                let valid = true;

                if(nameInput.value.trim() === "") {
                    nameError.textContent = "Name is Required";
                    valid = false;
                } else {
                nameError.textContent = "";
                }

                if(emailInput.value.trim() === "") {
                    emailError.textContent = "Email is Required";
                    valid = false;
                } else {
                emailError.textContent = "";
                }

                if(phoneInput.value.trim() === "") {
                    phoneError.textContent = "Masukkan Nomor Telepon Dengan Benar";
                    valid = false;
                } else {
                phoneError.textContent = "";
                }

                if(passwordInput.value.trim() === "") {
                    passwordError.textContent = "Password is Required";
                    valid = false;
                } else {
                passwordError.textContent = "";
                }

                if(confirmpasswordInput.value.trim() === "") {
                    confirmpasswordError.textContent = "Confirm Password is Required";
                    valid = false;
                } else {
                confirmpasswordError.textContent = "";
                }

                const regexEmail = /^\S+@\S+\.\S+$/;                                                               
                if(!regexEmail.test(emailInput.value.trim())){
                    emailError.textContent = "Invalid Email";
                    valid = false;
                }
                if(passwordInput.value.length < 8){
                    passwordError.textContent = "Panjang harus 8 karakter";
                    valid = false;
                }
                const regexPhone = /^\d+$/;
                if(regexPhone.test(phoneInput.value.trim())){
                    phoneError.textContent = "Masukkan Nomor Telepon Dengan Benar";
                    valid = false;
                }
                if(passwordInput.value !== confirmpasswordInput.value){
                    confirmpasswordError.textContent = "Password Don't Match";
                    valid = false;
                }
                if (!valid) {
                    event.preventDefault();
                }
            });
            
        </script>
    </body>
</html>