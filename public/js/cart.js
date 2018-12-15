/**
 * Функция - конструктор класса Корзина. 
 * @param {string} path Относительный путь для экземляра класса.
 * @param {boolean} myIsCartTable Уставаливаем признак - отрисовывать ли на странице полную информацию о корзине.
 */
var Cart = function (myIsCartTable = false) {
    this.pathHtml = '/images/products/';
    this.isCartTable = myIsCartTable;
    this.renderCart();

    var self = this;
    if (this.isCartTable) {
        this.renderTableCart();
        $('#clear_cart').on('click', function (event) {
            self.clearCart();
            event.preventDefault();
        });
    }
}

/**
 * Метод класса - отрисовка корзины. Получает с сервера коризну и отрисовывает ее на странице.
 */
Cart.prototype.renderCart = function () {
    $.ajax({
        url: '/basket/getCurrent',
        context: this,
        dataType: 'json',

        success: function (data) {

            var $divProductCart;
            var $divCart = $('#product_cart');
            $divCart.empty();
            var total = 0;
            var count = 0;
            var self = this;

            data.basket.forEach(function (item) {
                $('.template_cart .cart_product').attr('href', '/product/card?id=' + item.id_product);
                $('.template_cart .cart_product img').attr('src', self.pathHtml + item.path_img);
                $('.template_cart .cart_member_label p').html(item.name);
                $('.template_cart .cart_member_label span').html(item.quantity + '  x   $' + item.cost);
                $('.template_cart .cart_product').attr('data-id', item.id_product);
                $('.template_cart .cart_product').attr('data-quantity', item.quantity);
                $('.template_cart .cart_product').attr('data-color', item.color);
                $('.template_cart .cart_product').attr('data-size', item.size);
                total += (+item.quantity) * (+item.cost);
                count += +item.quantity;

                var star = new Star(item.range);
                $('.template_cart .div_star').html(star.starString);

                $divProductCart = $('.template_cart').clone();
                $divProductCart.removeClass('template_cart');
                $divCart.append($divProductCart);
            });

            $('.button_delete').on('click', function (event) {
                self.deleteElement(event);
                event.preventDefault();
            });

            $('div .elipse_card').html(count);
            $('div .total_price p').eq(1).html('$' + total);
        }
    })
}

/**
 * Метод класса - удаление элемента из корзины.
 * @param {Object} event Событие, которое вызвало удаление элемента из корзины.
 */
Cart.prototype.deleteElement = function (event) {
    var idProductCart = $(event.currentTarget).parent().children().attr('data-id');
    var quantityProduct = $(event.currentTarget).parent().children().attr('data-quantity') - 1;
    var colorProduct = $(event.currentTarget).parent().children().attr('data-color');
    var sizeProduct = $(event.currentTarget).parent().children().attr('data-size');

        $.ajax({
            url: '/basket/deleteProduct?id=' + idProductCart + '&count=' + quantityProduct + '&color=' + colorProduct +
                '&size=' + sizeProduct,
            context: this,
            dataType: 'json',

            success: function () {
                this.renderCart();
                if (this.isCartTable) {
                    this.renderTableCart();
                }
            }
        });
}

/**
 * Метод класса - очищение корзины - удаление всех элементов из корзины.
 */
Cart.prototype.clearCart = function () {
    $.ajax({
        url: '/basket/deleteAll',
        context: this,
        dataType: 'json',

        success: function () {
            this.renderCart();
            if (this.isCartTable) {
                this.renderTableCart();
            }
        }
    });
}

/**
 * Метод класса - чтение корзины пользователя и запись этой корзины в качестве текущей на сервер.
 * @param {string} idUser Идентификатор пользователя.
 */
Cart.prototype.readCartInUserProfile = function (idUser) {
    this.clearCart();

    $.ajax({
        url: '/basket/changeCurrent?id=' + idUser,
        context: this,
        dataType: 'json',

        success: function () {
            this.renderCart();
            if (this.isCartTable) {
                this.renderTableCart();
            }
        }
    });
}


/**
 * Метод класса - чтение текущей корзины и замена этой корзиной на сервере корзины пользователя.
 * @param {string} idUser Идентификатор пользователя.
 */
Cart.prototype.changeCartUserProfile = function (idUser) {
    $.ajax({
        url: '/basket/changeUserBacket?id=' + idUser,
        context: this,
        dataType: 'json',

        success: function () {
            this.renderCart();
            if (this.isCartTable) {
                this.renderTableCart();
            }
        }
    });
}

/**
 * Метод класса - отрисовка полной информации об элементах в корзине.
 */
Cart.prototype.renderTableCart = function () {
    $.ajax({
        url: '/basket/getCurrent',
        context: this,
        dataType: 'json',

        success: function (data) {
            var $tableCart = $('#table_cart');
            $tableCart.empty();
            $tableCart.append($('#header_card'));
            var $trItemCart;
            var total = 0;
            for (var ind = 0; ind < data.basket.length; ind++) {
                $('.tr_template_cart .id_card_href').attr('href', '/product/card?id=' + data.basket[ind].id_product);
                $('.tr_template_cart img').attr('src', this.pathHtml + data.basket[ind].path_img);
                $('.tr_template_cart h4').html(data.basket[ind].name);
                $('.tr_template_cart .cost').html('$' + (+data.basket[ind].cost));
                $('.tr_template_cart input').val(data.basket[ind].quantity);
                $('.tr_template_cart .item_total_price').html('$' + data.basket[ind].cost * +data.basket[ind].quantity);
                $('.tr_template_cart .delete_button a').attr('data-id', data.basket[ind].id_product);
                $('.tr_template_cart .delete_button a').attr('data-color', data.basket[ind].color);
                $('.tr_template_cart .delete_button a').attr('data-size', data.basket[ind].size);
                $('.tr_template_cart .count_td').attr('data-id', data.basket[ind].id_product);
                $('.tr_template_cart .count_td').attr('data-color', data.basket[ind].color);
                $('.tr_template_cart .count_td').attr('data-size', data.basket[ind].size);
                $('.tr_template_cart .color_item').html(data.basket[ind].color);
                $('.tr_template_cart .size_item').html(data.basket[ind].size);
                total += +data.basket[ind].cost * +data.basket[ind].quantity;

                $trItemCart = $('.tr_template_cart').clone();
                $trItemCart.removeClass('tr_template_cart');
                $tableCart.append($trItemCart);
            }

            $('.grand_total').html('$' + total);
            $('.sub_total').html('$' + total);

            var self = this;
            $('.delete_button').on('click', 'a', function (event) {
                self.cartTableDeleteElement(event);
                event.preventDefault();
            });

            if (data.basket.length === 0) {
                $('#clear_cart').addClass('opacity_yes');
                $tableCart.addClass('opacity_yes');
                $('.cart_is_empty').removeClass('opacity_yes');
            } else {
                $('#clear_cart').removeClass('opacity_yes');
                $tableCart.removeClass('opacity_yes');
                $('.cart_is_empty').addClass('opacity_yes');
            }

            $('.count_td').change(function () {
                self.cartTableChangeCountItem(event);
            });
        }
    })
}

/**
 * Метод класса - изменение количества элемента в корзине с помощью интерфейса полной отрисовки корзины.
 * @param {Object} event Событие, которое вызвало функцию.
 */
Cart.prototype.cartTableChangeCountItem = function (event) {
    var idProductCart = $(event.currentTarget).attr('data-id');
    var quantityProduct = $(event.currentTarget).val();
    var colorProductCart = $(event.currentTarget).attr('data-color');
    var sizeProductCart = $(event.currentTarget).attr('data-size');

    $.ajax({
        url: '/basket/deleteProduct?id=' + idProductCart + '&count=' + quantityProduct + '&size=' + sizeProductCart + 
            '&color=' + colorProductCart,
        dataType: 'json',
        context: this,
        
        success: function () {
            this.renderTableCart();
            this.renderCart();
        }
    })
}

/**
 * Метод класса - удаление элемента из корзины с помощью интерфейса полной отрисовки корзины.
 * @param {Object} event Событие, которое вызвало функцию.
 */
Cart.prototype.cartTableDeleteElement = function (event) {
    var idProductCart = $(event.currentTarget).parent().children().attr('data-id');
    var colorProductCart = $(event.currentTarget).parent().children().attr('data-color');
    var sizeProductCart = $(event.currentTarget).parent().children().attr('data-size');

    $.ajax({
        url: '/basket/deleteProduct?id=' + idProductCart + '&count=0' + '&color=' + colorProductCart + 
            '&size=' + sizeProductCart,
        dataType: 'json',
        context: this,

        success: function () {
            this.renderTableCart();
            this.renderCart();
        }
    })
}