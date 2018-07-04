<table class="table table-striped">
    <tbody>
    <tr>
        <td align="left" valign="top" class="text-center"><span class="textwhite10">CLASSIC DISH TV PACKAGES</span></td>
        <td align="left" valign="top" class="text-center"><span class="textwhite10">Special 2-Year Offer</span></td>
        <td align="left" valign="top" class="text-center"><span
                    class="textwhite10">FREE HD For Life: Limited Time Offer!</span></td>
    </tr>
    <?php foreach ($products as $product):
        /* @var $product \CYH\Models\Product */
        ?>
        <tr>
            <td align="left" valign="top" class="text-center">
                 » <b><a href="#<?php echo $product->Id ?>"><?php echo $product->Name ?></a></b>
            </td>
            <td align="left" valign="top" class="text-center">
                <strong><span class="red122">$<?php echo (strpos($product->Price, '.') !== false) ? $product->Price : $product->Price . '.00' ?></span></strong>
            </td>
            <td align="left" valign="top" class="text-center">
                <a href="/dish-programming/channels/hdchannels/">Channels</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p>
    <span style="font-size: xx-small;"> <i>**For 24 months with eAutoPay</i></span>
</p>
