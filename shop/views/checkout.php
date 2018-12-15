<main>
    <div class="container checkout">
    <input class="checkout__checkbox" id="checkout__checkbox__id1" type="checkbox" >
        <label class="checkout__checkbox__label" for="checkout__checkbox__id1">01. &nbsp;&nbsp;Shipping Address</label>
        <div class="checkout__checkbox__hide">
            <form class="checkout__checkbox__form__flex">
                <h4>Check as a guest or register</h4>
                <p>Register with us for future convenience</p>
                
                <div class="checkout__checkbox__form__flex__radio">
                    <label>
                        <input class="radio"  type="radio" name="radio_name" checked>
                        <span class="radio-custom"></span>
                        <span class="checkout__checkbox__form__flex__radio__label">checkout as guest</span><br>
                    </label>    
                    <label>
                        <input class="radio" type="radio" name="radio_name">
                        <span class="radio-custom"></span>
                        <span class="checkout__checkbox__form__flex__radio__label">register</span><br>
                    </label>
                </div>

                <h4>register and save time!</h4>
                <p>Register with us for future convenience</p>
                <p class="checkout__checkbox__form__flex__p_top">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    Fast and easy checkout
                </p>
                <p>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    Easy access to your order history and status
                </p>
                <button>Continue</button>
            </form>
            <form class="checkout__checkbox__form__flex" id="no_log_in_user">
                <h4>Already registed?</h4>
                <p>Please log in below</p>
                <div class="checkout__checkbox__form__flex__text">
                    EMAIL ADDRESS
                    <span>  *</span>
                </div>
                <input type="email" required id="input_email_log_in" autocomplete="username">
                <p class="error_forgot"></p>
                <div class="checkout__checkbox__form__flex__text">
                    PASSWORD
                    <span>*</span>
                </div>
                <input type="password" required id="input_password_log_in" autocomplete="current-password">
                <p class="error_forgot"></p>
                <div class="checkout__checkbox__form__flex__text_red">
                    * Required Fileds
                </div>
                <div class="checkout__checkbox__form__flex__flex">
                    <button id="log_in_button">Log in</button>
                    <div class="checkout__checkbox__form__flex__flex__ref">
                        <a href="#" id="forgot_password">Forgot Password ?</a>
                    </div>
                </div>
            </form>
            <form class="checkout__checkbox__form__flex" id="log_in_user">
                <h4>Your account information</h4>
                <p class="p_header"></p>
                <div class="checkout__checkbox__form__flex__text">
                    Name
                </div>
                <p id="your_name_p"></p>
                <div class="checkout__checkbox__form__flex__text">
                    PASSWORD
                </div>
                <p id="your_password_p"></p>
                <div class="checkout__checkbox__form__flex__text">
                    email
                </div>
                <p id="your_email_p"></p>
                <div class="checkout__checkbox__form__flex__text">
                    gender
                </div>
                <p id="your_gender_p"></p>
                <div class="checkout__checkbox__form__flex__text">
                    credit card
                </div>
                <p id="your_credit_p"></p>

                <div class="checkout__checkbox__form__flex__flex space-beetween">
                    <button id="change_info_account_button">Change information in account</button>
                    <button id="exit_account_button">Exit from account</button>
                </div>
            </form>
        </div>
    <input class="checkout__checkbox" id="checkout__checkbox__id2" type="checkbox" >
        <label class="checkout__checkbox__label" for="checkout__checkbox__id2">02. &nbsp;&nbsp;BILLING INFORMATION</label>
        <div class="checkout__checkbox__hide">
            <p>Скрытое содержание......</p>
            </div>
    <input class="checkout__checkbox" id="checkout__checkbox__id3" type="checkbox" >
        <label class="checkout__checkbox__label" for="checkout__checkbox__id3">03. &nbsp;&nbsp;SHIPPING INFORMATION</label>
        <div class="checkout__checkbox__hide">
            <p>Скрытое содержание......</p>
        </div>
    <input class="checkout__checkbox" id="checkout__checkbox__id4" type="checkbox" >
        <label class="checkout__checkbox__label" for="checkout__checkbox__id4">04. &nbsp;&nbsp;SHIPPING METHOD</label>
        <div class="checkout__checkbox__hide">
            <p>Скрытое содержание......</p>
        </div>
    <input class="checkout__checkbox" id="checkout__checkbox__id5" type="checkbox" >
        <label class="checkout__checkbox__label" for="checkout__checkbox__id5">05. &nbsp;&nbsp;PAYMENT METHOD</label>
        <div class="checkout__checkbox__hide">
            <p>Скрытое содержание......</p>
        </div>
    <input class="checkout__checkbox" id="checkout__checkbox__id6" type="checkbox" >
        <label class="checkout__checkbox__label" for="checkout__checkbox__id6">06. &nbsp;&nbsp;ORDER REVIEW</label>
        <div class="checkout__checkbox__hide">
            <p>Скрытое содержание......</p>
        </div>
    </div>
</main>

<script src="/js/jsForCheckout.js"></script>