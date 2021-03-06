<!--Корзина отдельно!-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Интернет магазин</title>

    <link rel="stylesheet" href="/lybrary/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="/style/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <header>
        <div class="container header-flex">
            <div class="header-left">
                <a href="/product" class="ref_logo">
                    <img src="/images/logo.png" alt="logo" title="logo">
                    <div class="logo_brand">
                        BRAN
                        <span>D</span>
                    </div>
                </a>
                <form action="#">
                    <div class="button_browse">
                        Browse
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        <div class="drop_down">
                            <div class="member_drop_down">
                                <h6>Women</h6>
                                <hr>
                                <div class="par_drop_down">
                                    <p>
                                        <a href="#">Dresses</a>
                                    </p>
                                    <p>
                                        <a href="#">Tops</a>
                                    </p>
                                    <p>
                                        <a href="#">Sweaters/Knits</a>
                                    </p>
                                    <p>
                                        <a href="#">Jackets/Coats</a>
                                    </p>
                                    <p>
                                        <a href="#">Blazers</a>
                                    </p>
                                    <p>
                                        <a href="#">Denim</a>
                                    </p>
                                    <p>
                                        <a href="#">Leggings/Pants</a>
                                    </p>
                                    <p>
                                        <a href="#">Skirts/Shorts</a>
                                    </p>
                                    <p>
                                        <a href="#">Accessories</a>
                                    </p>
                                </div>
                            </div>
                            <div class="member_drop_down">
                                <h6>Men</h6>
                                <hr>
                                <div class="par_drop_down">
                                    <p>
                                        <a href="#">Tees/Tank tops</a>
                                    </p>
                                    <p>
                                        <a href="#">Shirts/Polos</a>
                                    </p>
                                    <p>
                                        <a href="#">Sweaters</a>
                                    </p>
                                    <p>
                                        <a href="#">Sweatshirts/Hoodies</a>
                                    </p>
                                    <p>
                                        <a href="#">Blazers</a>
                                    </p>
                                    <p>
                                        <a href="#">Jackets/vests</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" placeholder="Search for Item...">
                    <button class="button_search" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div class="header-right">
                <a href="/basket" class="ref_to_cart">
                    <img src="/images/card.png" alt="card" title="card">
                    <div class="elipse_card">2</div>
                </a>
                <div class="menu_account">
                    <a href="/user" class="button_account">
                        My Account
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="div_cart">
                    <div id="product_cart"></div>
                    <div class="cart_member template_cart">
                        <a href="#" class="cart_product">
                            <img class="cart_img" src="">
                            <div class="cart_member_label">
                                <p>Rebox Zane</p>
                                <div class="div_star">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>
                                <span>1  x   $250</span>
                            </div>
                        </a>
                        <a href="#" class="button_delete">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="total_price">
                        <p>TOTAL</p>
                        <p>$500.00</p>
                    </div>
                    <a href="/order/checkout" class="ref_button">Checkout</a>
                    <a href="/basket" class="ref_button">Go to cart</a>
                </div>
                <div class="div_account">
                    <div id="user_noreg">
                        <form>
                            <h4>Already registed?</h4>
                            <p>Please log in below</p>
                            <div class="checkout__checkbox__form__flex__text">
                                EMAIL ADDRESS
                                <span>  *</span>
                            </div>
                            <input type="email" required id="user_email">
                            <p class="error_forgot"></p>
                            <div class="checkout__checkbox__form__flex__text">
                                PASSWORD
                                <span>*</span>
                            </div>
                            <input type="password" required id="user_password">
                            <p class="error_forgot"></p>
                            <div class="checkout__checkbox__form__flex__text_red">
                                * Required Fileds
                            </div>
                            <div class="checkout__checkbox__form__flex__flex">
                                <button id="user_log_in">Log in</button>
                                <div class="div_account_ref">
                                    <a href="#">Forgot Password ?</a>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form>
                            <h4>If you no have the account</h4>
                            <p>You may register</p>
                            <div class="checkout__checkbox__form__flex__flex">
                                <a href="/user">registration</a>
                            </div>
                        </form>
                    </div>
                    <div id="user_reg">
                        <form>
                        <h4>You logged in as:</h4>
                        <p class="user_name">Galina</p>
                        <p>You may change information in your account</p>
                        <div class="checkout__checkbox__form__flex__flex">
                            <button class="change_acc" id="user_change">Change information</button>
                        </div>
                        <p>You may log out form your account</p>
                        <div class="checkout__checkbox__form__flex__flex">
                            <button class="change_acc" id="user_logout">Exit from account</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul class="menu">
                <li>
                    <a href="/product" class="ref_page1">Home</a>
                </li>
                <li>
                    <div id="ref_man_page">
                        <a href="/product/man" class="ref_page1">Man</a>
                        <div id="mega_menu_man" class="mega_menu">
                            <div class="mega_menu_flex">
                                <div class="mega_menu_member">
                                    <div class="member_drop_down">
                                        <h6>man</h6>
                                        <hr>
                                        <div class="par_drop_down">
                                            <p>
                                                <a href="#">Dresses</a>
                                            </p>
                                            <p>
                                                <a href="#">Tops</a>
                                            </p>
                                            <p>
                                                <a href="#">Sweaters/Knits</a>
                                            </p>
                                            <p>
                                                <a href="#">Jackets/Coats</a>
                                            </p>
                                            <p>
                                                <a href="#">Blazers</a>
                                            </p>
                                            <p>
                                                <a href="#">Denim</a>
                                            </p>
                                            <p>
                                                <a href="#">Leggings/Pants</a>
                                            </p>
                                            <p>
                                                <a href="#">Skirts/Shorts</a>
                                            </p>
                                            <p>
                                                <a href="#">Accessories</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega_menu_member">
                                    <div class="member_drop_down">
                                        <h6>man</h6>
                                        <hr>
                                        <div class="par_drop_down">
                                            <p>
                                                <a href="#">Dresses</a>
                                            </p>
                                            <p>
                                                <a href="#">Tops</a>
                                            </p>
                                            <p>
                                                <a href="#">Sweaters/Knits</a>
                                            </p>
                                            <p>
                                                <a href="#">Jackets/Coats</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="member_drop_down">
                                        <h6>man</h6>
                                        <hr>
                                        <div class="par_drop_down">
                                            <p>
                                                <a href="#">Dresses</a>
                                            </p>
                                            <p>
                                                <a href="#">Tops</a>
                                            </p>
                                            <p>
                                                <a href="#">Sweaters/Knits</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mega_menu_member">
                                    <div class="member_drop_down">
                                        <h6>man</h6>
                                        <hr>
                                        <div class="par_drop_down">
                                            <p>
                                                <a href="#">Dresses</a>
                                            </p>
                                            <p>
                                                <a href="#">Tops</a>
                                            </p>
                                            <p>
                                                <a href="#">Sweaters/Knits</a>
                                            </p>
                                            <p>
                                                <a href="#">Jackets/Coats</a>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="#" class="div_img_mega">
                                        <img src="/images/mega-menu/man/img1.jpg" alt="man_sale">
                                        <div class="img_lable_mega_menu">Super sale!</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="ref_page1">Women</a>
                </li>
                <li>
                    <a href="#" class="ref_page1">Kids</a>
                </li>
                <li>
                    <a href="#" class="ref_page1">Accoseriese</a>
                </li>
                <li>
                    <a href="#" class="ref_page1">Featured </a>
                </li>
                <li>
                    <a href="#" class="ref_page1">Hot Deals </a>
                </li>
            </ul>
        </div>
    </nav>

    <?= $content; ?>

    <div class="feedback_form">
        <div class="container">
            <div class="feedback_form_left">
                <div class="feedback_information_flex" id="feedback1">
                        <div class="feedback_information_member">
                            <div id="feedback_face">
                                <img src="/images/feedback/image1.png" alt="feedback1" title="feedback1">
                            </div>
                        </div>
                        <div class="feedback_information_member">
                            <div class="feedback_text">
                                “Vestibulum quis porttitor dui! Quisque viverra nunc mi, a pulvinar purus condimentum a. Aliquam condimentum mattis neque sed pretium”
                            </div>
                            <div class="feedback_label">
                                <span>Bin Burhan</span><br>Dhaka, Bd
                            </div>
        
                        </div>     
                    </div>
                    <div class="feedback_information_flex" id="feedback2">
                        <div class="feedback_information_member">
                            <div id="feedback_face">
                                <img src="/images/feedback/image1.png" alt="feedback1" title="feedback1">
                            </div>
                        </div>
                        <div class="feedback_information_member">
                            <div class="feedback_text">
                                “Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.”
                            </div>
                            <div class="feedback_label">
                                <span>Bin Burhan</span><br>Dhaka, Bd
                            </div>
        
                        </div>     
                    </div>
                    <div class="feedback_information_flex" id="feedback3">
                        <div class="feedback_information_member">
                            <div id="feedback_face">
                                <img src="/images/feedback/image1.png" alt="feedback1" title="feedback1">
                            </div>
                        </div>
                        <div class="feedback_information_member">
                            <div class="feedback_text">
                                “Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc”
                            </div>
                            <div class="feedback_label">
                                <span>Bin Burhan</span><br>Dhaka, Bd
                            </div>
        
                        </div>     
                    </div>
                    <div id="fb_div_flex">
                        <div class="fb_div_member">
                            <a href="#feedback1"></a>
                        </div>
                        <div class="fb_div_member">
                            <a href="#feedback2"></a>
                        </div>
                        <div class="fb_div_member">
                            <a href="#feedback3"></a>
                        </div>
                    </div>
                </div>
            
            <div class="feedback_form_right">
                <div id="group_label_fb_right">
                    <div id="large_label_fb_right">Subscribe</div>
                    <div id="label_fb_right">FOR OUR NEWLETTER AND PROMOTION</div>
                </div>
                <form action="#">
                    <input type="email" placeholder="Enter Your Email">
                    <button class="button_subscribe" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>

    <div class="flex_total_info">
        <div class="container">
            <div class="flex_total_info_flex">
                <div class="flex_total_member">
                    <div class="logo_div">
                        <a href="/product" class="ref_logo">
                            <img src="/images/logo.png" alt="logo" title="logo">
                            <div class="logo_brand">
                                BRAN
                                <span>D</span>
                            </div>
                        </a>
                    </div>
                    <div class="total_info_text">
                        Objectively transition extensive data rather than cross functional solutions. Monotonectally syndicate multidisciplinary
                        materials before go forward benefits. Intrinsicly syndicate an expanded array of processes and cross-unit
                        partnerships.
                        <br>
                        <br> Efficiently plagiarize 24/365 action items and focused infomediaries. Distinctively seize superior
                        initiatives for wireless technologies. Dynamically optimize.
                    </div>
                </div>
                <div class="flex_total_member">
                    <div class="total_info_title">COMPANY</div>
                    <div class="total_info_ref">
                        <div>
                            <a href="/product">Home</a>
                        </div>
                        <div>
                            <a href="#">Shop</a>
                        </div>
                        <div>
                            <a href="#">About</a>
                        </div>
                        <div>
                            <a href="#">How It Works</a>
                        </div>
                        <div>
                            <a href="#">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="flex_total_member">
                    <div class="total_info_title">INFORMATION</div>
                    <div class="total_info_ref">
                        <div>
                            <a href="#">Tearms & Condition</a>
                        </div>
                        <div>
                            <a href="#">Privacy Policy</a>
                        </div>
                        <div>
                            <a href="#">How to Buy</a>
                        </div>
                        <div>
                            <a href="#">How to Sell</a>
                        </div>
                        <div>
                            <a href="#">Promotion</a>
                        </div>
                    </div>
                </div>
                <div class="flex_total_member">
                    <div class="total_info_title">SHOP CATEGORY</div>
                    <div class="total_info_ref">
                        <div>
                            <a href="#">Men</a>
                        </div>
                        <div>
                            <a href="#">Women</a>
                        </div>
                        <div>
                            <a href="#">Child</a>
                        </div>
                        <div>
                            <a href="#">Apparel</a>
                        </div>
                        <div>
                            <a href="#">Brows All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dialog_cart"></div>
    <div id="result_add_to_cart"></div>
    <div id="login_error"></div>
    <div id="dialog_forgot_password"></div>
    <div id="dialog_change_info"></div>
    <div id="dialog_registration"></div>

    <footer>
        <div class="container">
            <div class="footer_flex">
                <div class="footer_member">© 2017 Brand All Rights Reserved.</div>
                <div class="footer_member">
                    <div class="footer_flex_icon">
                        <div class="memeber_flex_icon">
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="memeber_flex_icon">
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="memeber_flex_icon">
                            <a href="#">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="memeber_flex_icon">
                            <a href="#">
                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="memeber_flex_icon">
                            <a href="#">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/hoverHeaderRight.js"></script>
    <script src="/js/star.js"></script>
    <script src="/js/cart.js"></script>
    <script src="/js/feedback.js"></script>
    <script src="/js/User.js"></script>
</body>

</html>