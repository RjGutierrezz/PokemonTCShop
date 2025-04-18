<!DOCTYPE html>
<hmtl lang = "en">

<head>
    <meta charset = "UTF-8">
    <meta http-equip= "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel = "stylesheet" href="style.css">
    <title>Pokemon Trading Card Shop</title>

</head>

<body>
    <nav id = "nav"> 
        <div class="navTop">
            <div class="navItem">
                <img src="./img/pokemonTitle.png" with = "90" height = "70" alt="">
            </div>
            <div class="navItem">
                <div class="search">
                    <input type="text" placeholder="Search..." class="searchInput">
                    <img src="./img/search.png" width = "20" height = "20" alt="" class = "searchIcon">
                </div>
            </div>
            <div class="navItem">
                <span class="limitedOffer">Limited Offer!</span>
            </div>
        </div>

        <div class="navBottom">
            <h3 class="menuItem">Sword & Shield Brilliant Stars</h3>
            <h3 class="menuItem">Sword & Shield Lost Origin</h3>
            <h3 class="menuItem">Scarlet & Violet Paldean Fates</h3>
            <h3 class="menuItem">Scarlet & Violet Obsidian Flames</h3>
        </div>
    </nav>

    <div class="slider">
        <div class="sliderWrapper">
            <div class="sliderItem">
                <img src="./img/pack1.png" width="660" height ="655" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">Brilliant</br> Stars </br> Pack</h1>
                <h2 class="sliderPrice">$44.99</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/pack2.png" width="660" height ="655" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle"> Lost </br> Origin </br> Pack</h1>
                <h2 class="sliderPrice">$32.75</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/pac3.png" width="660" height ="655" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle"> Paldean </br> Fates </br> Pack</h1>
                <h2 class="sliderPrice">$26.94</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/pack4.png" width="660" height ="655" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle"> Obisidian </br> Booster </br> Pack</h1>
                <h2 class="sliderPrice">$27.99</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Function 1 MAINTENANCE -->
    <form method="POST" action="index.php" class="dbprompts">
        <h1 class="promptTitle">Add a New User</h1>
        <div class="fTest">
            <input type="text" name="name" placeholder="User Name" class="fInput" required>
            <input type="number" name="age" placeholder="User Age" class="fInput" required>
            <input type="email" name="email" placeholder="User Email" class="fInput" required>
            <button class="fButton" name="submit" type="submit">Submit</button>
        </div>

        <?php
        if (isset($_POST['submit']))  
        {
            
            $action = escapeshellarg("add user");
            $name = escapeshellarg($_POST["name"]);
            $age = escapeshellarg($_POST["age"]);
            $email = escapeshellarg($_POST["email"]);
            
            $command = "python3 insert_new_user.py $action $name $age $email";

            #$escaped_command = escapeshellarg($command);
            //echo "<p>command: $command <p>";
            system($command);
        }
        ?>
    </form>

    <!-- Function 2 MAINTENANCE -->
    <form method="POST" action="index.php" class="dbprompts" style="background-color: #f2eeed">
        <h1 class="promptTitle">Assign Bundle to User</h1>
        <div class="fTest">
        <input type="number" name="userid" placeholder="User ID" class="fInput" required>
        
        <select name="bundlename" class="fInput" required>
            <option value="">Select a Bundle</option>
            <option value="Sword & Shield Brilliant Stars">Brilliant Stars</option>
            <option value="Sword & Shield Lost Origin">Lost Origin</option>
            <option value="Scarlet & Violet Paldean Fates">Paldean Fates</option>
            <option value="Scarlet & Violet Obsidian Flames">Obsidian Flames</option>
        </select>
        
        <button class="fButton" type="submit" name="assign">Assign Bundle</button>
        </div>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["assign"])) {
            $userid = $_POST["userid"];
            $bundlename = $_POST["bundlename"];

            // call your new Python script
            $output = shell_exec("python3 assign_bundle.py " . escapeshellarg($userid) . " " . escapeshellarg($bundlename));
            echo "<div style='padding: 20px; color: blue; font-weight: bold;'>$output</div>";
            }
        ?>
    </form>

    <!-- Function 3 MAINTENANCE -->
    <form method="POST" action="index.php" class="dbprompts">
        <h1 class="promptTitle">View Users by Bundle</h1>
        <div class="fTest">
            <select name="bundleName" class="fInput" required>
                <option value="">Select a Bundle</option>
                <option value="Sword & Shield Brilliant Stars">Brilliant Stars</option>
                <option value="Sword & Shield Lost Origin">Lost Origin</option>
                <option value="Scarlet & Violet Paldean Fates">Paldean Fates</option>
                <option value="Scarlet & Violet Obsidian Flames">Obsidian Flames</option>
            </select>
            <button type="submit" name="view_by_bundle" class="fButton">Show Users</button>
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["view_by_bundle"])) {
            $bundle = $_POST["bundleName"];
            $output = shell_exec("python3 view_users_by_bundle.py " . escapeshellarg($bundle));
            echo "<div style='padding: 20px; font-family: monospace;'>$output</div>";
            }
        ?>
    </form>

    <!-- Function 4 MAINTENANCE -->
    <form method="POST" action="index.php" class="dbprompts" style="background-color: #f2eeed">
        <h1 class="promptTitle">View All Bundles and Their Owners</h1>
        <button type="submit" name="view_bundle_ownership" class="fButton">View Bundles</button>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["view_bundle_ownership"])) {
                $output = shell_exec("python3 view_bundle_ownership.py");
                echo "<div style='padding: 20px; font-family: monospace;'>$output</div>";
            }    
        ?>
    </form>

    <!-- Function 5 MAINTENANCE-->
    <form method="POST" action="index.php" class="dbprompts">
        <h1 class="promptTitle">Search Bundles by Request</h1>
        <div class="fTest">
        <label for="filter_type">Search By:</label>
        <select name="filter_type" class="fInput" required>
            <option value="">Select Type</option>
            <option value="region">Region</option>
            <option value="booster">Booster Pack Type</option>
        </select>
        
        <input type="text" name="filter_value" placeholder="Enter region or booster type" class="fInput" required>
        
        <button type="submit" name="filter_bundles" class="fButton">Search</button>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filter_bundles"])) {
        $type = $_POST["filter_type"];
        $value = $_POST["filter_value"];

        $output = shell_exec("python3 filter_bundles.py " . escapeshellarg($type) . " " . escapeshellarg($value));
        echo "<div style='padding: 20px; font-family: monospace;'>$output</div>";
        }
        ?>
    </form>

    <!-- Function 6 MAINTENANCE-->
    <form method="POST" action="index.php" class="dbprompts" style="background-color: #f2eeed">
        <h1 class="promptTitle">Find Matching Users</h1>
        <div class="fTest">
        <input type="number" name="match_user_id" class="fInput" placeholder="Enter User ID" required>
        <button type="submit" name="match_users" class="fButton">Find Matches</button>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["match_users"])) {
        $uid = $_POST["match_user_id"];
        $output = shell_exec("python3 match_users.py " . escapeshellarg($uid));
        echo "<div style='padding: 20px; font-family: monospace;'>$output</div>";
        }
        ?>
    </form>

    <!-- Function 7 MAINTENANCE-->
    <form method="POST" action="index.php" class="dbprompts">
        <h1 class="promptTitle">Bundle Report</h1>
        <div class="fTest">
        <button type="submit" name="bundle_report" class="fButton">Generate Report</button>
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bundle_report"])) {
            $output = shell_exec("python3 bundle_report.py");
            echo "<div style='padding: 20px; font-family: monospace;'>$output</div>";
            }
        ?>
    </form>




    <form>
    <h1 style = "text-align: center" >Show all users who own a specific Bundle</h1>
    <div class = "fTest">
    <select name="bundlename" class="fInput" required>
        <option value="">Select a Bundle</option>
        <option value="Sword & Shield Brilliant Stars">Brilliant Stars</option>
        <option value="Sword & Shield Lost Origin">Lost Origin</option>
        <option value="Scarlet & Violet Paldean Fates">Paldean Fates</option>
        <option value="Scarlet & Violet Obsidian Flames">Obsidian Flames</option>
    </select>
    <button class="fButton" type="submit" name="findUsers">Choose Bundle</button>

    </div>
    </form>


    

    <div class="features">
        <div class="feature">
            <img src="./img/shipping.png" alt="" class="featureIcon">
            <span class="featureTitle">FREE SHIPPING</span>
            <span class="featureDesc">Free worldwide shipping on all orders.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="./img/return.png" alt = "">
            <span class="featureTitle">30 DAYS RETURN</span>
            <span class="featureDesc">No question return and easy refund in 14 days.</span>
        </div>
        <div class="feature">
            <img class="featureIcon" src="./img/gift.png" alt = "">
            <span class="featureTitle">GIFT CARDS</span>
            <span class="featureDesc">Buy gift cards and use coupon codes easily.</span>
        </div>
        <div class="feature">
            <img src="./img/contact.png" alt="" class="featureIcon">
            <span class="featureTitle">CONTACT US!</span>
            <span class="featureDesc">Keep in touch via email and support system.</span>
        </div>
    </div>

    <div class="product" id="product">
        <img src="./img/pack1.png" alt="" class="productImg">
        <div class="productDetails">            
            <h1 class="productTitle">Brilliant Stars Pack</h1>
            <h2 class="productPrice">$44.99</h2>
            <p class="productDesc">Description</p>

            <div class="colors">
                <div class="color"></div>
                <div class="color"></div>
                <div class="color"></div>
                <div class="color"></div>
                <div class="color"></div>
            </div>
            <div class="quantities">
                <div class="quantity">1</div>
                <div class="quantity">5</div>
                <div class="quantity">10</div>
            </div>
            <button class="productButton">BUY NOW!</button>
        </div>
        <div class="payment">
            <h1 class="payTitle">Personal Information</h1>
            <label>Name and Surname</label>
            <input type="text" placeholder = "John Smith" class="payInput">
            <label>Phone Number</label>
            <input type="text" placeholder = "479 389 5360" class="payInput">
            <label>Address </label>
            <input type="text" placeholder = "2030 Tallgrass Ter. Centerton, AR" class="payInput">

            <h1 class="payTitle">Card Information</h1>
            <div class="cardIcons">
                <img src="./img/visa.png" width="40" alt="" class="cardIcon">
                <img src="./img/mastercard.png" width="40" alt="" class="cardIcon">
            </div>
            <input type="password" class="payInput" palceholder = "Card Number">
            <div class="cardInfo">
                <input type="text" placeholder="mm" class="payInput sm">
                <input type="text" placeholder="yyyy" class="payInput sm">
                <input type="text" placeholder="cvv" class="payInput sm">
            </div>
            <button class="payButton">Checkout</button>

            <span class="close">X</span>
        </div>
    </div>

    <div class="gallery">
        <div class="galleryItem">
            <h1 class="galleryTitle">Gotta</h1>
            <img src="https://i.pinimg.com/736x/f2/c0/e9/f2c0e99e44b2c1f2a4b5fda939e0f504.jpg"
                alt="" class="galleryImg">
        </div>
        <div class="galleryItem">
            <img src="https://i.pinimg.com/736x/2a/b0/4e/2ab04eddb28ebf4434632bab793f46fd.jpg"
                alt="" class="galleryImg">
            <h1 class="galleryTitle">catch</h1>
        </div>
        <div class="galleryItem">
            <h1 class="galleryTitle">'em all!</h1>
            <img src="https://i.pinimg.com/736x/4f/27/79/4f277972bc6a353ddd75389b7a94a1c0.jpg"
                alt="" class="galleryImg">
        </div>
    </div>

    <div class="newSeason">
        <div class="nsItem">
            <img src="https://i.pinimg.com/736x/2c/e9/cd/2ce9cdcf959adece8aecd939c9db390b.jpg"
                alt="" class="nsImg">
        </div>
        <div class="nsItem">
            <h3 class="nsTitleSm">COMING SOON</h3>
            <h1 class="nsTitle">New Season</h1>
            <h1 class="nsTitle">New Booster Pack</h1>
            <a href="#nav">
                <button class="nsButton">CHOOSE YOUR PACK</button>
            </a>
        </div>
        <div class="nsItem">
            <img src="https://i.pinimg.com/736x/07/f2/38/07f23816a0d6a0e33c06a19ed6ef13f6.jpg"
                alt="" class="nsImg">
        </div>
    </div>

    <footer>
        <div class="footerLeft">
            <div class = "footerMenu">
                <h1 class="fMenuTitle">About Us</h1>
                <ul class="fMenuList">
                    <li class="fListItem">Company</li>
                    <li class="fListItem">Contact</li>
                    <li class="fListItem">Careers</li>
                    <li class="fListItem">Affiliates</li>
                    <li class="fListItem">Stores</li>
                </ul>
            </div>
            <div class = "footerMenu">
                <h1 class="fMenuTitle">Useful Links</h1>
                <ul class="fMenuList">
                    <li class="fListItem">Support</li>
                    <li class="fListItem">Refund</li>
                    <li class="fListItem">FAQ</li>
                    <li class="fListItem">Feedback</li>
                    <li class="fListItem">Stories</li>
                </ul>
            </div>
            <div class = "footerMenu">
                <h1 class="fMenuTitle">Booster Bundles</h1>
                <ul class="fMenuList">
                    <li class="fListItem">Sword & Shield Brilliant Stars</li>
                    <li class="fListItem">Sword & Shield Lost Origin</li>
                    <li class="fListItem">Scarlet & Violet Paldean Fates</li>
                    <li class="fListItem">Scarlet & Violet Obsidian Flames</li>
                </ul>
            </div>
        </div>
        <div class="footerRight">
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
                <div class="fMail">
                    <input type="text" placeholder="your@gmail.com" class="fInput">
                    <button class="fButton">Join!</button>
                </div>
            </div>
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Follow Us</h1>
                <div class="fIcons">
                    <img src="./img/facebook.png" alt="" class = "fIcon">
                    <img src="./img/twitter.png" alt="" class = "fIcon">
                    <img src="./img/instagram.png" alt="" class = "fIcon">
                    <img src="./img/whatsapp.png" alt="" class = "fIcon">
                </div>
            </div>

            <div class="footerRightMenu">
                <span class="copyright">All rights reserved. 2024.</span>
            </div>
        </div>
    </footer>

    <script src="app.js"></script>
</body>
</html>


<?php
if (isset($_POST['func3'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    
    $output = shell_exec("python3 insert_new_user.py " . escapeshellarg($name) . " " . escapeshellarg($age) . " " . escapeshellarg($email));
    echo $output;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insert_new_item.py
    system($escaped_command);           
}

?>