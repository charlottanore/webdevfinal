<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-image: url('dirty.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman' padding-top: 20%; " >
<body>
    
     <form action="signup-check.php" method="post">
        <h2>SIGN UP</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>Full Name</label>
            <input type="text" name="name" placeholder="Full Name"><br>

        <label>Email</label>
            <input type="email" name="email" placeholder="Email"><br>

        <label>Password</label>
        <input type="password" 
               name="password" 
               placeholder="Password" id="p1"><br>

        <label>Re-enter Password</label>
        <input type="password" 
               name="re_password" 
               placeholder="Re-enter Password" onblur="checkPass()" id="p2"><br>

               
        <label>Role</label>
            <select name="role" id="">
            <option value="">Role</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            </select><br><br><br>

               
        <label>Gender</label>
        <select name="gender" id="">
        <option value="">Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>


        <button type="submit">Sign Up</button>
        <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>
<script>

    function checkPass(){

        const p1 = document.getElementById("p1").value;
        const p2 = document.getElementById("p2").value;


       if(p1 != p2){ 
            alert("password not match!");
        }
    }     

</script>
</html>