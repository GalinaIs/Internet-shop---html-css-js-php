<main>
    <div class="cart_main container">
        <table class="my_table" id="table_cart">        </table>
        <table class="template">
            <tr id="header_card">
                <th class="product_item_table">Product Details</th>
                <th>unite Price</th>
                <th>Quantity</th>
                <th>shipping</th>
                <th>Subtotal</th>
                <th>ACTION</th>
            </tr>
            <tr class="tr_template_cart">
                <td class="product_item_table">
                    <a href="#" class="id_card_href"><img></a>
                    <h4></h4>
                    <p>
                        <span class="info">Color: </span><span class="color_item">Red</span></p>
                    <p>
                        <span class="info">Size: </span><span class="size_item">Xll</span></p>
                </td>
                <td class="cost"></td>
                <td>
                    <input type="number" size="3" min="1" max="100" value="2" class="count_td">
                </td>
                <td>FREE</td>
                <td class="item_total_price">$300</td>
                <td class="delete_button">
                    <a href="#">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        </table>
        <div class="cart_is_empty">Cart is empty</div>

        <div class="my_flex_button">
            <a href="#" id="clear_cart">cLEAR SHOPPING CART</a>
            <a href="/product">cONTINUE sHOPPING</a>
        </div>

        <form class="my_form_d_f">
            <div class="my_form_d_f_member">
                <h3>Shipping Address</h3>
                <select>
                    <option>Bangladesh</option>
                    <option>Brasil</option>
                    <option>Russia</option>
                    <option>USA</option>
                </select>
                <input type="text" placeholder="State">
                <input type="number" min="100000" max="999999" placeholder="Postcode / Zip">
                <button>get a quote</button>
            </div>
            <div class="my_form_d_f_member">
                <h3>coupon discount</h3>
                <p>Enter your coupon code if you have one</p>
                <input type="text" placeholder="State">
                <button>Apply coupon</button>
            </div>
            <div class="my_form_d_f_member">
                <div class="total_card">
                    <p>Sub total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="sub_total">$900</span></p>
                    <h3>GRAND TOTAL &nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="grand_total">$900</span>
                    </h3>
                    <hr>
                    <a href="/order/checkout">proceed to checkout</a>
                    <!--<button>proceed to checkout</button>-->
                </div>
            </div>
        </form>
    </div>
</main>

<script src="/js/Product.js"></script>
<script src="/js/jsForCartHtml.js"></script>