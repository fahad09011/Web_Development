  <!-- File Name: task2.html
  Description: this file contains the form
  Name: Muhmmad Fahad
  Student ID : c00311349
  Date: 26/02/2025 -->


  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="../stle.css">
  </head>

  <body>
      <div class="div">
          <header>
              <nav>
                  <ul>
                      <li><a href="../report/report.php" class="btn">Person Report</a></li>
                      <li><a href="../View/listbox.php" class="btn">View Record</a></li>
                      <li><a href="../Amend_View/listbox.php" class="btn">Amen/View Details</a></li>
                      <li><a href="../menu.php" class="btn">Main Page</a></li>
                  </ul>
              </nav>
          </header>
          <form action="insert.php" class="form" id="form" method="post">
              <div class="inputmain">
                  <label for="firstName">First Name</label>
                  <input type="text" name="firstName" id="firstName" placeholder="firstName" autocomplete="off" required>
              </div>


              <div class="inputmain">
                  <label for="lastName">Last Name</label>
                  <input type="text" name="lastName" id="lastName" placeholder="last name" autocomplete="off" required>
              </div>
              <div class="inputmain">
                  <label for="email">Email Address</label>
                  <input type="email" name="email" id="email" placeholder="enter email" autocomplete="off" required>
              </div>
              <div class="inputmain">
                  <label for="phone">Phone Number</label>
                  <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number" autocomplete="off" required>
              </div>

              <div class="inputmain">
                  <label for="dob">Date of Birth</label>
                  <input type="date" name="dob" id="dob" placeholder="last name" required>
              </div>
              <div class="form_buttons">
                  <input type="submit" class="form_button" value="submit">
                  <input type="reset" class="form_button" value="Clear">
              </div>
          </form>
          </div>
          <script src="script.js"></script>
  </body>

  </html>