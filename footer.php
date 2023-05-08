    <footer>

        <div class="wrapper-flex">

            <div>

                <img src="./img/flogo.png" alt="logo" class="footer-brand">

                <div class="social-link">
                <a href="https://www.github.com">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
                <a href="https://www.linkedin.com">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                </div>

            </div>

            <div class="footer-nav">

                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="customers.php">View Customers</a></li>
                    <li><a href="transactions.php">Transactions</a></li>
                </ul>

            </div>

        </div>


        <div class="wrapper">

            <a href="customers.php">
                <button class="btn-primary">Transfer Money</button>
            </a>

            <p class="copyright"> &copy; GripBank. All Rights Reserved </p>

        </div>
        
    </footer>

</div>
      
    <!--- custom js -->
      
    <script>
      
      const navbarToggleBtn = document.querySelector('.navbar-toggle-btn');
      const navbarNav = document.querySelector('.navbar-nav');
  
      const navbarToggleFunc = () => {
        navbarToggleBtn.classList.toggle('active');
        navbarNav.classList.toggle('active');
      }
  
      navbarToggleBtn.addEventListener('click', navbarToggleFunc);
    
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      
    <!--- ionicon link --> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      
</body>
      
</html>
    