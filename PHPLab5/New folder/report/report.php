<?php
include 'PersonReport.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stle.css">
</head>

<body>
    <h1>Person Report</h1>
    <form action="" method="POST" class="form" id="form">
        <button type="submit" class="button buttons" name="sort" value="personID" >Sort by ID</button>

        <button type="submit" class="button buttons" name="sort" value="firstName" >Sort by First Name</button>
        
        <button type="submit" class="button buttons" name="sort" value="lastName" >Sort by Last Name</button>
        
        <button type="submit" class="button buttons" name="sort" value="DOB" >Sort by Date of Birth</button>
        

        
        <!-- <label for="option">Sort by</label>
        <select name="sort" id="option">

            <option value="personID"
                <?php echo ($sort == 'personID')
                    ?
                    'selected'
                    :
                    ''
                ?>>ID
            </option>

            <option value="firstName"
                <?php echo ($sort == 'firstName')
                    ?
                    'selected'
                    :
                    ''
                ?>>First Name
            </option>




            <option value="lastName"
                <?php echo ($sort == 'lastName')
                    ?
                    'selected'
                    :
                    ''
                ?>>Last Name
            </option>





            <option value="DOB"
                <?php echo ($sort == 'DOB')
                    ?
                    'selected'
                    :
                    ''
                ?>>Date of Birth
            </option>



        </select> -->
    </form>



    <table>
        <tr>
            <th>ID:</th>
            <th>First Name:</th>
            <th>Last Name:</th>
            <th>Email Address</th>
            <th>PhoneNumber</th>
            <th>Date of Birth</th>
        </tr>

        <?php
        foreach ($result as $rs)
            echo "
        <tr>
            <td> {$rs['personID']}</td>
            <td> {$rs['firstName']}</td>
            <td>{$rs['lastName']}</td>
            <td>{$rs['EmailAddress']}</td>
            <td>{$rs['PhoneNumber']}</td>
            <td>{$rs['DOB']}</td>
        </tr>";
        ?>
    </table>
    
<form action="../menu.php" method="post">
    <button type="submit" value="Return to insert Page"></button>
    
    <script>
        let allButtons = document.querySelectorAll(".buttons" )

        allButtons.forEach(button=>{
            button.addEventListener("click",()=>{
                event.preventDefault();
                allButtons.forEach(btn=>{btn.setAttribute("disabled","disabled")
                });
                
            button.removeAttribute("disabled");
            setTimeout(() => {
                allButtons.forEach(btn=>{
                    btn.removeAttribute("disabled")
                })
            }, 2000);
            });

        });
        
    
    </script>
</body>

</html>












