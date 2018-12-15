<link rel="stylesheet" href="/lybrary/css/jcarousel.responsive.css">

<main>
    <div class="one_items_main">
    <div class="container">
        <div id="item_product"></div>
        <div class="template_item">
            <div id="my_id"><?= $id; ?></div>
            <img class="img_one_item">
            <div class="item_info">
                <div class="info_item_container">
                    <span class="collection"></span>
                    <div class="flex_div_center">
                        <div class="rec_div"></div>
                        <div class="rec_div_red"></div>
                        <div class="rec_div"></div>
                    </div>
                    <h2></h2>
                    <div class="div_star"></div>
                    <p class="info_item"></p>
                    <div class="flex_div_center">
                        <div class="flex_div_center_member">
                            MATERIAL: <span class="item_material"></span><!--!!!-->
                        </div>
                        <div class="flex_div_center_member">
                            DESIGNER: <span class="item_designer"></span>
                        </div>
                    </div>
                    <span class="span1 item_cost"></span>
                    <div class="div_borber_bottom"></div>
                    <div class="flex_div_center form_div">
                        <div class="input_flex_member">
                            <label>CHOOSE COLOR</label>
                            <select class="item_select_color"></select>
                        </div>
                        <div class="input_flex_member">
                            <label>CHOOSE SIZE</label>
                            <select class="item_select_size"></select>
                        </div>
                        <div class="input_flex_member">
                            <label>QUANTITY</label>
                            <input type="number" min="1" max="100" id="count_item">
                        </div>
                    </div>
                    <form class="div_button_add">
                        <button class="button_d_f" type="submit">
                            <img class="mini_card_img" src="/images/card_red.png" alt="card" title="Add to Cart">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<div class="preview_menu margin_preview_menu">
    <div class="container">
        <div class="preview_menu_title">
            <h3>you may like also</h3>
        </div>
        <div class="jcarousel-wrapper">
            <div class="jcarousel">
                <ul></ul>
            </div>

            <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
            <a href="#" class="jcarousel-control-next">&rsaquo;</a>
            <p class="jcarousel-pagination"></p>
        </div>
        <div class="preview_menu_member carusel_view template_carusel">
            <a href="#" class="href_carus">
                <img class="img_prod">
                <div class="unit_name"></div>
                <div class="div_preview_info">
                    <div class="unit_cost"></div>
                    <div class="div_star"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<script src="/lybrary/js/jquery.jcarousel.min.js"></script>
<script src="/lybrary/js/jcarousel.responsive.js"></script>

<script src="/js/Product.js"></script>
<script src="/js/jsForOneItem.js"></script>