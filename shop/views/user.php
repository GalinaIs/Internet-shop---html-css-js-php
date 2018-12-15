<div class="container div_register">
    <form class="checkout__checkbox__form__flex" id="no_log_in_user">
        <h4>If you already have the account</h4>
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
    <form class="checkout__checkbox__form__flex" id="form_regisration">
        <h4>If you no have the account</h4>
        <p>You may register an account, if you fill form below</p>
        
        <div class="checkout__checkbox__form__flex__text">
            name
            <span>  *</span>
        </div>
        <input type="text" required autocomplete="username">
        <p class="error_forgot"></p>
        <div class="checkout__checkbox__form__flex__text">
            PASSWORD
            <span>*</span>
        </div>
        <input type="password" required autocomplete="new-password">
        <p class="error_forgot"></p>
        <div class="checkout__checkbox__form__flex__text">
            repeat PASSWORD
            <span>*</span>
        </div>
        <p class="error_forgot"></p>
        <input type="password" required autocomplete="new-password">
        <div class="checkout__checkbox__form__flex__text">
            EMAIL ADDRESS
            <span>  *</span>
        </div>
        <input type="email" required autocomplete="username">
        <p class="error_forgot"></p>
        <div class="checkout__checkbox__form__flex__text">
            gender
            <span>  *</span>
        </div>
        <select>
            <option>Male</option>
            <option>Female</option>
        </select>
        <div class="checkout__checkbox__form__flex__text">
            credit cart
            <span>  *</span>
        </div>
        <input type="text" required pattern="^\d{7}-\d{4}-\d{6}-\d{3}$">
        <p class="error_forgot"></p>

        <div class="checkout__checkbox__form__flex__text_red">
            * Required Fileds
        </div>
        
        <button id="new_account_button">registration</button>
    </form>
</div>

<script src="/js/jsForAccount.js"></script>