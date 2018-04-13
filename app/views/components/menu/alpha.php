<div class="header-control-elements another-menu" id="c-menu">
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="do-link-back"><span class="lnr lnr-arrow-left"></span></a>
    <a href="/"><img src="/public/img/l.mini.png" alt=""></a>
    <a href="#" class="do-link-filter" id="open-alpha"><span class="lnr lnr-sort-alpha-asc"></span></a>
</div>

<div class="header-control-elements" id="a-menu">
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="do-link-back"><span class="lnr lnr-arrow-left"></span></a>
    <a href="/"><img src="/public/img/l.mini.png" alt=""></a>
    <a href="#" class="do-link-back" id="close-alpha"><span class="lnr lnr-cross"></span></a>
</div>

<!--
<div class="alpha-menu">
    <div class="persons">

    </div>
    <div class="king-products">

    </div>

    <div class="alpha-button">
        <div class="alpha-apply">
            <button class="btn-alpha-apply" id="alpha-set-apply" datasrc="">APPLY</button>
        </div>
    </div>
</div>
-->

<div class="alpha-menu">
    <form class="form cf">
        <section class="plan cf">
            <h4 class="plan-titles">Gender</h4>
            <input type="radio" name="gender" id="free" value="men" checked><label class="free-label four col"
                                                                           for="free">Men</label>
            <input type="radio" name="gender" id="basic" value="women"><label class="basic-label four col"
                                                                                      for="basic">Women</label>
        </section>
        <section class="payment-plan cf">
            <h4 class="plan-titles">
                Category of goods</h4>
            <input type="radio" name="denomination" id="monthly" value="all"><label
                    class="monthly-label four col" for="monthly">All</label>
            <input type="radio" name="denomination" id="yearly" value="hoodies" checked><label class="yearly-label four col"
                                                                                       for="yearly">Hoodies</label>
        </section>
        <!--        <section class="payment-type cf">-->
        <!--            <h4 class="plan-titles">Select a payment type:</h4>-->
        <!--            <input type="radio" name="radio3" id="credit" value="credit"><label class="credit-label four col" for="credit">Credit Card</label>-->
        <!--            <input type="radio" name="radio3" id="debit" value="debit"><label class="debit-label four col" for="debit">Debit Card</label>-->
        <!--            <input type="radio" name="radio3" id="paypal" value="paypal" checked><label class="paypal-label four col" for="paypal">Paypal</label>-->
        <!--        </section>-->
        <input class="submit" id="set-off" type="submit" value="APPLY">
    </form>
</div>